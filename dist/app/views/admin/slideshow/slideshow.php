<h2 class="fw-semibold mb-4">Slideshow - <?= $data['type'] == 0 ? 'Portrait' : 'Landscape' ?></h2>
<div class="p-4 border rounded-4 position-relative mb-5">
    <div class="position-absolute top-0 mt-n2 px-2 bg-white fw-semibold small text-secondary">ADD PHOTO</div>
    <form action="<?= BASEURL ?>slideshow/save" method="post" enctype="multipart/form-data">
        <input type="hidden" name="type" value="<?= $data['type'] ?>">
        <div class="mb-3">
            <label for="photo" class="form-label">Photo <span class="text-danger">*</span></label>
            <input type="file" name="photo[]" id="photo" class="form-control" accept=".jpg,.jpeg,.png">
            <div id="photoHelp" class="form-text">Select a landscape photo.</div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
<h4 class="mb-3">Photos in current landscape slideshow</h4 class="mb-3">
<div class="row g-3">
    <?php
    if (sizeof($data['photo']) > 0) {
        foreach ($data['photo'] as $key => $value) {
            echo '<div class="' . ($data['type'] == 0 ? 'col-sm-6 col-md-6 col-lg-3' : 'col-md-6 col-lg-4') . '">
                <div class="position-relative">
                    <div class="ratio ' . ($data['type'] == 0 ? 'ratio-4x6' : 'ratio-16x9') . '">
                        <img src="' . IMGURL . $value['picture'] . '" class="object-fit-cover">
                    </div>
                    <div class="position-absolute d-flex flex-row justify-content-end gap-2 top-0 start-0 p-2 w-100">
                        <button type="button" class="btn btn-danger btn-sm rounded-1 shadow nt-delete-btn" title="Delete" data-delete="' . BASEURL . 'slideshow/delete/' . $value['id'] . '/' . $data['type'] . '"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>';
        }
    } else {
        echo '<div class="col-12 mb-5">No photos yet.</div>';
    }
    ?>
</div>