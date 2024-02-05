<h2 class="fw-semibold mb-4">Report</h2>
<div class="alert alert-info">
    Choose either term or date range, or use the combination of both.
</div>
<form action="<?= BASEURL ?>report/getreport" method="post" class="mb-5">
    <div class="mb-3">
        <label for="term" class="form-label">Term</label>
        <select name="term" id="term" class="form-select form-report">
            <option value="">-- Select Term --</option>
            <?php
            foreach ($data["terms"] as $key => $value) {
                echo '<option value="' . $value['id'] . '" ' . (isset($data['form']) && $data['form']['term'] == $value['id'] ? 'selected' : '') . '>' . $value['term_name'] . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="date-from" class="form-label">Date From</label>
            <input type="date" name="date-from" id="date-from" class="form-control form-report" value="<?= isset($data['form']) ? $data['form']['from'] : '' ?>">
        </div>
        <div class="col-6">
            <label for="date-to" class="form-label">Date To</label>
            <input type="date" name="date-to" id="date-to" class="form-control form-report" value="<?= isset($data['form']) ? $data['form']['to'] : '' ?>">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Generate</button>
    <button type="button" class="btn btn-secondary" id="btn-reset">Reset</button>
</form>

<?php
if (isset($data['report'])) {
    if (sizeof($data['report']) == 0) {
        echo "No data found";
    } else {
        $totalIn = 0;
        $totalOut = 0;
        foreach ($data['report'] as $key => $value) {
            if ($value['type'] == 0) {
                $totalOut += $value['amount'];
            } else {
                $totalIn += $value['amount'];
            }
        }
        $summary = $totalIn - $totalOut;
?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center text-nowrap">Num</th>
                        <th class="text-center text-nowrap">Term</th>
                        <th class="text-center text-nowrap">Date</th>
                        <th class="text-center">Desc</th>
                        <th class="text-center text-nowrap">Debit</th>
                        <th class="text-center text-nowrap">Credit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($data['report'] as $key => $value) {
                        echo '<tr>';
                        echo "<td class=\"text-nowrap text-center\">$i</td>";
                        echo "<td class=\"text-nowrap text-center\">$value[term_name]</td>";
                        echo "<td class=\"text-nowrap text-center\">" . date_format(date_create($value['date']), 'd M y') . "</td>";
                        echo "<td><div class=\"text-truncate\" style=\"max-width: 10rem;\"><a href=\"#\" class=\"desc-detail\" data-desc=\"$value[justification]\">$value[justification]</a></div></td>";
                        echo "<td class='text-nowrap text-end text-success'>" . ($value['type'] == 0 ? '' : 'Rp ' . number_format($value['amount'], 0, ',', '.')) . "</td>";
                        echo "<td class='text-nowrap text-end text-danger'>" . ($value['type'] == 0 ? 'Rp ' . number_format($value['amount'], 0, ',', '.') : '') . "</td>";
                        echo '</tr>';
                        $i++;
                    }
                    echo '<tr class="fw-bold">';
                    echo "<td class=\"text-nowrap text-center\" colspan=\"4\">Total</td>";
                    echo "<td class='text-nowrap text-end text-success'>Rp " . number_format($totalIn, 0, ',', '.') . "</td>";
                    echo "<td class='text-nowrap text-end text-danger'>Rp " . number_format($totalOut, 0, ',', '.') . "</td>";
                    echo '</tr>';
                    ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end">
            <table class="table table-sm table-borderless w-auto font-monospace fs-5 lh-sm align-middle">
                <tbody>
                    <tr class="fw-bold">
                        <td class="py-0"></td>
                        <td class="px-0 py-0 text-success">Rp</td>
                        <td class="py-0 text-success text-end"><?= number_format($totalIn, 0, ',', '.') ?></td>
                        <td class="py-0"></td>
                    </tr>
                    <tr class="fw-bold">
                        <td class="py-0"></td>
                        <td class="px-0 text-danger">Rp</td>
                        <td class="py-0 text-danger text-end"><?= number_format($totalOut, 0, ',', '.') ?></td>
                        <td class="py-0"></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="py-0 align-middle p-0">
                            <hr class="m-0 p-0 border border-secondary opacity-100">
                        </td>
                        <td class="py-0 lh-sm">
                            <hr class="m-0 ms-1 p-0 border border-secondary opacity-100" style="width: 8px;">
                        </td>
                    </tr>
                    <tr class="fw-bold">
                        <td class="py-0"></td>
                        <td class="py-0 px-0 <?= $summary == 0 ? 'text-dark' : ($summary > 0 ? 'text-success' : 'text-danger') ?>">Rp</td>
                        <td class="py-0 <?= $summary == 0 ? 'text-dark' : ($summary > 0 ? 'text-success' : 'text-danger') ?> text-end"><?= number_format(($summary), 0, ',', '.') ?></td>
                        <td class="py-0"></td>
                    </tr>
                </tbody>
            </table>
        </div>
<?php
    }
}
?>

<!-- Modal detail-->
<div class="modal fade" id="detail-modal" tabindex="-1" aria-labelledby="detail-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="detail-modalLabel">Description</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="desc-container">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#btn-reset").click(function() {
            $(".form-report").val("");
        });

        $(".desc-detail").click(function(e) {
            e.preventDefault();
            $('#desc-container').html($(this).data('desc'));
            $("#detail-modal").modal('show');
        });
    });
</script>