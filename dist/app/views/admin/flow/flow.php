<div class="hstack justify-content-between mb-4">
    <h2 class="fw-semibold mb-0">Cash Flow</h2>
    <a href="<?= BASEURL ?>flow/form" class="btn btn-primary">New Cash Flow</a>
</div>
<div class="row mb-3">
    <div class="col-12">
        <div class="card bg-secondary-subtle">
            <div class="card-header">Summary of <?= $data['term']['term_name'] ?></div>
            <div class="card-body fw-bold">
                <span class="text-success">Rp <?= number_format($data['currin'], 0, ',', '.') ?></span> &minus; <span class="text-danger">Rp <?= number_format($data['currout'], 0, ',', '.') ?></span> &equals; <span class="<?= $data['currin'] - $data['currout'] == 0 ? 'text-dark' : ($data['currin'] - $data['currout'] > 0 ? 'text-success' : 'text-danger') ?>">Rp <?= number_format(($data['currin'] - $data['currout']), 0, ',', '.') ?></span>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive p-0">
    <table id="flow-table" class="table table-hovered">
        <thead>
            <tr>
                <th class="text-nowrap">Num</th>
                <th class="text-nowrap">Date</th>
                <th class="text-nowrap">Debit</th>
                <th class="text-nowrap">Credit</th>
                <th class="text-nowrap">Desc</th>
                <th class="text-nowrap">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = sizeof($data['data']);
            foreach ($data['data'] as $key => $value) {
                echo "<tr>";
                echo "<td class='text-nowrap'>$i</td>";
                echo "<td class='text-nowrap'>" . date_format(date_create($value['date']), 'd M y') . "</td>";
                echo "<td class='text-nowrap text-success'>" . ($value['type'] == 0 ? '' : 'Rp ' . number_format($value['amount'], 0, ',', '.')) . "</td>";
                echo "<td class='text-nowrap text-danger'>" . ($value['type'] == 0 ? 'Rp ' . number_format($value['amount'], 0, ',', '.') : '') . "</td>";
                echo "<td><div class=\"text-truncate\" style=\"max-width: 10rem;\"><a href=\"#\" class=\"desc-detail\" data-desc=\"$value[justification]\">$value[justification]</a></div></td>";
                echo '<td class="text-nowrap">
                    <button type="button" class="btn btn-info btn-sm btn-split ' . ($value['type'] == 1 ? 'disabled' : '') . '" data-id="' . $value['id'] . '" title="Split"><i class="bi bi-diagram-2"></i></button>
                    <a href="' . BASEURL . 'flow/form/' . $value['id'] . '" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a>
                    <button type="button" class="btn btn-danger btn-sm delete-btn" data-delete="' . BASEURL . 'flow/delete/' . $value['id'] . '" title="Delete"><i class="bi bi-trash"></i></a>
                </td>';
                echo "</tr>";
                $i--;
            }
            ?>
        </tbody>
    </table>
</div>

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

<!-- Modal split-->
<div class="modal fade" id="split-modal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="split-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="split-modalLabel">Split Flow</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <div id="splitted-date" class="form-text small"></div>
                    <div id="splitted-desc"></div>
                    <div class="text-danger fw-semibold fs-5">
                        Rp <span id="splitted-credit"></span>
                    </div>
                </div>
                <form action="<?= BASEURL ?>flow/savesplit" method="post">
                    <input type="hidden" name="splitted-id" id="splitted-id">
                    <div class="mb-3">
                        <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col-6">
                                <input type="number" name="amount" id="amount" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="col-6 align-self-center fw-medium">Rp <span id="amount-preview">0</span></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="just" class="form-label">Justification <span class="text-danger">*</span></label>
                        <textarea name="just" id="just" class="form-control" required></textarea>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Split</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".desc-detail").click(function(e) {
            e.preventDefault();
            $('#desc-container').html($(this).data('desc'));
            $("#detail-modal").modal('show');
        });

        $(".btn-split").click(function() {
            $.ajax({
                url: "<?= BASEURL ?>flow/getdetail/" + $(this).data("id"),
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    let flowDate = new Date(response.date);
                    $("#splitted-id").val(response.id);
                    $("#splitted-date").html(`${flowDate.getDate()}/${flowDate.getMonth() + 1}/${flowDate.getFullYear()}`);
                    $("#splitted-desc").html(response.justification);
                    $("#splitted-credit").data("amount", response.amount);
                    $("#splitted-credit").html(Intl.NumberFormat('id-ID').format(response.amount));
                    $("#date").val(response.date);
                    $("#split-modal").modal("show");
                }
            });
        });

        $("#split-modal").on("shown.bs.modal", function() {
            $("#amount").focus();
        })

        $("#amount").keyup(function() {
            if ($("#splitted-credit").data("amount") > $(this).val()) {
                $("#amount-preview").html(Intl.NumberFormat('id-ID').format($(this).val()));
                $("#splitted-credit").html(Intl.NumberFormat('id-ID').format($("#splitted-credit").data("amount") - $(this).val()));
            } else {
                $(this).val("");
                $("#splitted-credit").html(Intl.NumberFormat('id-ID').format($("#splitted-credit").data("amount")));
                $("#amount-preview").html("0");
                setFlash("Cannot be higher or equal to splitted amount", "danger");
            }
        });
    });
</script>