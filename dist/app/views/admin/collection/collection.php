<div class="hstack justify-content-between mb-4">
    <h2 class="fw-semibold mb-0">Collection</h2>
    <a href="<?= BASEURL ?>collection/form" class="btn btn-primary">New Collection</a>
</div>
<div class="row">
    <div class="table-responsive p-0">
        <table id="collection-table" class="table table-hovered">
            <thead>
                <tr>
                    <th class="text-nowrap">Num</th>
                    <th class="text-nowrap">Collection Name</th>
                    <th class="text-nowrap">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($data as $key => $value) {
                    echo '<tr class="align-middle">';
                    echo '<td class="text-nowrap">' . $i . '</td>';
                    echo '<td class="text-nowrap">' . $value['category'] . '</td>';
                    echo '<td class="text-nowrap">
                        <a href="' . BASEURL . 'collection/form/' . $value['id'] . '" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil-square"></i> Edit</a>
                        <button type="button" class="btn btn-danger btn-sm delete-btn" data-delete="' . BASEURL . 'collection/delete/' . $value['id'] . '" title="Delete"><i class="bi bi-trash"></i> Delete</button>
                    </td>';
                    echo '</tr>';
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#collection-table').DataTable({
            'columns': [{
                    'searchable': false
                },
                null,
                {
                    'searchable': false,
                    'orderable': false
                }
            ]
        });
    });
</script>