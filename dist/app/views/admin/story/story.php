<div class="hstack justify-content-between mb-4">
    <h2 class="fw-semibold mb-0">Story</h2>
    <a href="<?= BASEURL ?>story/form" class="btn btn-primary">New Story</a>
</div>
<div class="row">
    <div class="table-responsive p-0">
        <table id="story-table" class="table table-hovered">
            <thead>
                <tr>
                    <th class="text-nowrap">Num</th>
                    <th class="text-nowrap">Series</th>
                    <th class="text-nowrap">Title</th>
                    <th class="text-nowrap">Contain Best</th>
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
                    echo '<td class="text-nowrap"><a href="#" class="story-detail" data-id="' . $value['id'] . '">' . $value['title'] . '<a></td>';
                    echo '<td class="text-nowrap">' . ($value['best'] > 0 ? '<i class="bi bi-check-lg text-success"></i>' : '<i class="bi bi-x-lg text-danger"></i>') . '</td>';
                    echo '<td class="text-nowrap">
                        <a href="' . BASEURL . 'story/form/' . $value['id'] . '" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil-square"></i> Edit</a>
                        <button type="button" class="btn btn-danger btn-sm delete-btn" data-delete="' . BASEURL . 'story/delete/' . $value['id'] . '" title="Delete"><i class="bi bi-trash"></i> Delete</a>
                    </td>';
                    echo '</tr>';
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detail-modal" tabindex="-1" aria-labelledby="detail-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="detail-modalLabel">Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="detail-series" class="text-secondary fw-semibold small"></div>
                <div id="detail-title" class="fw-semibold fs-2"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#story-table').DataTable({
            'columns': [{
                    'searchable': false
                },
                null,
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
        $('#story-table').on('click', '.story-detail', function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= BASEURL ?>story/getdetail/" + $(this).data('id'),
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $('#detail-modal').modal('show');
                }
            });
        });
    });
</script>