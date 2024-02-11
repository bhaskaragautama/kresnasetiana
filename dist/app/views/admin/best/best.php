<div class="hstack justify-content-between mb-4">
    <h2 class="fw-semibold mb-0">Best Photos</h2>
</div>
<div class="row g-3">
    <?php
    foreach ($data as $ket => $value) {
        echo '<div class="col-md-6 col-lg-4">
            <div class="position-relative">
                <div class="ratio ratio-1x1">
                    <img src="' . IMGDIR . $value['picture'] . '" class="object-fit-cover">
                </div>
                <div class="position-absolute top-0 end-0">
                    <button type="button" class="btn btn-danger btn-sm m-2 rounded-2 exclude-this" title="Exclude from best" data-exclude="' . BASEURL . 'best/exclude/' . $value['tablename'] . '/' . $value['id'] . '"><i class="bi bi-dash-circle"></i></button>
                </div>
            </div>
        </div>';
    }
    ?>
</div>

<!-- Modal -->
<div class="modal fade" id="exclude-modal" tabindex="-1" aria-labelledby="exclude-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exclude-modalLabel">Confirmation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure want to exclude this photo from best?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-danger" id="exclude-btn">Exclude</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.exclude-this').click(function() {
            $('#exclude-btn').attr('href', $(this).data('exclude'));
            $('#exclude-modal').modal('show');
        });
    });
</script>