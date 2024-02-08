<div class="hstack justify-content-between mb-4">
    <h2 class="fw-semibold mb-0">Photo</h2>
    <a href="<?= BASEURL ?>photo/form" class="btn btn-primary">New Photo</a>
</div>
<div class="row">
    <div class="table-responsive p-0">
        <table id="photo-table" class="table table-hovered">
            <thead>
                <tr>
                    <th class="text-nowrap">Num</th>
                    <th class="text-nowrap">Photo Name</th>
                    <th class="text-nowrap">Is Best</th>
                    <th class="text-nowrap">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($data as $key => $value) {
                    echo '<tr class="align-middle">';
                    echo '<td class="text-nowrap">' . $i . '</td>';
                    echo '<td class="text-nowrap"><a href="#" class="show-photo-detail" data-pict="' . $value['picture'] . '" data-orientation="' . $value['orientation'] . '">' . $value['title'] . '<a></td>';
                    echo '<td class="text-nowrap">' . ($value['is_best'] == 1 ? '<i class="bi bi-check-lg text-success"></i>' : '<i class="bi bi-x-lg text-danger"></i>') . '</td>';
                    echo '<td class="text-nowrap">
                        <a href="' . BASEURL . 'photo/form/' . $value['id'] . '" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil-square"></i> Edit</a>
                        <button type="button" class="btn btn-danger btn-sm delete-btn" data-delete="' . BASEURL . 'photo/delete/' . $value['id'] . '" title="Delete"><i class="bi bi-trash"></i> Delete</a>
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
<div class="modal fade" id="photo-modal" tabindex="-1" aria-labelledby="photo-modalLabel" aria-hidden="true">
    <div id="modal-setting" class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0 border-0 shadow">
            <div class="modal-body p-0">
                <div id="photo-modal-container">
                    <img id="photo-modal-img" class="object-fit-cover">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#photo-table').DataTable({
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
        $('.show-photo-detail').click(function(e) {
            e.preventDefault();
            $('#photo-modal-container').removeAttr('class');
            if ($(this).data('orientation') == 0) {
                // portrait
                $('#photo-modal-container').addClass('ratio ratio-3x4');
                $('#modal-setting').addClass('modal-sm');
            } else {
                // landscape
                $('#photo-modal-container').addClass('ratio ratio-4x3');
                $('#modal-setting').removeClass('modal-sm');
            }
            $('#photo-modal-img').attr('src', '<?= IMGURL ?>' + $(this).data('pict'));
            $('#photo-modal').modal('show');
        });
    });
</script>