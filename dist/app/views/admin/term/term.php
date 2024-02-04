<div class="hstack justify-content-between mb-4">
    <h2 class="fw-semibold mb-0">Term</h2>
    <a href="<?= BASEURL ?>term/form" class="btn btn-primary">New Term</a>
</div>
<div class="row">
    <div class="table-responsive p-0">
        <table id="term-table" class="table table-hovered">
            <thead>
                <tr>
                    <th class="text-nowrap">Num</th>
                    <th class="text-nowrap">Term Name</th>
                    <th class="text-nowrap">Is Active</th>
                    <th class="text-nowrap">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($data as $key => $value) {
                    echo "<tr>";
                    echo "<td class='text-nowrap'>$i</td>";
                    echo "<td class='text-nowrap'>$value[term_name]</td>";
                    echo "<td class='text-nowrap'>" . ($value["is_active"] == 1 ? '<span class="text-success">Active</span>' : '<span class="text-danger">Not Active</span>') . "</td>";
                    echo '<td class="text-nowrap">
                        <a href="' . BASEURL . 'term/setactive/' . $value['id'] . '" class="btn btn-success btn-sm ' . ($value["is_active"] == 1 ? 'disabled' : '') . '" title="Set Active"><i class="bi bi-check-square"></i></a>
                        <a href="' . BASEURL . 'term/form/' . $value['id'] . '" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a>
                        <button type="button" class="btn btn-danger btn-sm delete-btn" data-delete="' . BASEURL . 'term/delete/' . $value['id'] . '" title="Delete"><i class="bi bi-trash"></i></a>
                    </td>';
                    echo "</tr>";
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#term-table").DataTable({
            'columns': [{
                    'searchable': false
                },
                null,
                {
                    'searchable': false
                },
                {
                    'searchable': false,
                    'orderable': false
                }
            ]
        });
    });
</script>