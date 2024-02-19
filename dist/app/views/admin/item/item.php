<div class="hstack justify-content-between mb-4">
    <h2 class="fw-semibold mb-0">Item</h2>
    <a href="<?= BASEURL ?>item/form" class="btn btn-primary">New Item</a>
</div>
<div class="row">
    <div class="table-responsive p-0">
        <table id="item-table" class="table table-hovered">
            <thead>
                <tr>
                    <th class="text-nowrap">Num</th>
                    <th class="text-nowrap">Collection</th>
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
                    echo '<td class="text-nowrap"><a href="#" class="item-detail" data-id="' . $value['id'] . '">' . $value['title'] . '</a></td>';
                    echo '<td class="text-nowrap">' . ($value['best'] > 0 ? '<i class="bi bi-check-lg text-success"></i>' : '<i class="bi bi-x-lg text-danger"></i>') . '</td>';
                    echo '<td class="text-nowrap">
                        <a href="' . BASEURL . 'item/photo/' . $value['id'] . '" class="btn btn-success btn-sm" title="Add photo"><i class="bi bi-image"></i> Photo</a>
                        <a href="' . BASEURL . 'item/form/' . $value['id'] . '" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil-square"></i> Edit</a>
                        <button type="button" class="btn btn-danger btn-sm delete-btn" data-delete="' . BASEURL . 'item/delete/' . $value['id'] . '" title="Delete"><i class="bi bi-trash"></i> Delete</button>
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
                <div id="detail-collection" class="text-secondary fw-semibold small"></div>
                <div id="detail-title" class="fw-semibold fs-4"></div>
                <div id="detail-desc" class="mb-3"></div>
                <div class="fw-medium mb-2">Photos:</div>
                <div id="detail-collage" class="row g-3"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#item-table').DataTable({
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

        $('#item-table').on('click', '.item-detail', function(e) {
            e.preventDefault();

            $.ajax({
                url: "<?= BASEURL ?>item/getdetail/" + $(this).data('id'),
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $('#detail-collage').html('');
                    $('#detail-collection').html(response.detail.category);
                    $('#detail-title').html(response.detail.title);
                    $('#detail-desc').html(response.detail.description);
                    $.each(response.images, function(idx, val) {
                        $('#detail-collage').append(`<div class="col-md-6"><div class="position-relative"><div class="ratio ratio-1x1"><img src="<?= IMGDIR ?>${val.picture}" class="object-fit-cover"></div><div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-75 text-white text-center p-2"><div>${val.title}</div><div class="small">Rp ${Intl.NumberFormat('id-ID').format(val.idr)}</div></div><div class="position-absolute top-0 end-0 m-2">${val.is_best == 1 ? '<span class="d-inline-block bg-success py-1 px-2 rounded-1" title="Best"><i class="bi bi-hand-thumbs-up text-white"></i></span>' : ''}</div></div></div>`);
                    });
                    $('#detail-modal').modal('show');
                }
            });
        });
    });
</script>