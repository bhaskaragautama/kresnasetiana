<h2 class="fw-semibold mb-4">Item</h2>
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= BASEURL ?>item">Item</a></li>
        <li class="breadcrumb-item active" aria-current="page">Photo</li>
    </ol>
</nav>
<div class="p-4 border rounded-4 position-relative mb-5">
    <div class="position-absolute top-0 mt-n2 px-2 bg-white fw-semibold small text-secondary">ADD OR EDIT PHOTO</div>
    <form action="<?= BASEURL ?>item/savephoto" method="post" enctype="multipart/form-data">
        <input type="hidden" name="item" value="<?= $data['item']['id'] ?>">
        <input type="hidden" name="id" value="<?= $data['photo'] ? $data['photo']['id'] : '' ?>">
        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control" value="<?= $data['photo'] ? $data['photo']['title'] : '' ?>" required autofocus>
        </div>
        <div class="mb-3">
            <label for="idr" class="form-label">Price (IDR) <span class="text-danger">*</span></label>
            <input type="number" name="idr" id="idr" class="form-control" value="<?= $data['photo'] ? $data['photo']['idr'] : '' ?>" required>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo <span class="text-danger">*</span></label>
            <?php
            if (isset($data['photo'])) {
                echo '<div class="mb-3 w-25 position-relative"><img class="w-100 rounded-2" src="' . IMGURL . $data['photo']['picture'] . '"><div class="position-absolute bottom-0 start-0 w-100 p-3 bg-black bg-opacity-50 text-white text-center rounded-bottom-2">Current Photo</div></div>';
            }
            ?>
            <input type="file" name="photo[]" id="photo" class="form-control" accept=".jpg,.jpeg,.png">
            <div id="photoHelp" class="form-text">Select one photo to create a new data or to replace the old photo.</div>
        </div>
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" role="switch" id="is-best" name="is-best" value="1" <?= $data['photo'] && $data['photo']['is_best'] == 1 ? 'checked' : '' ?>>
            <label class="form-check-label" for="is-best">Set best</label>
        </div>
        <a href="<?= BASEURL ?>item" class="btn btn-secondary">Back</a>
        <a href="<?= BASEURL ?>item/photo/<?= $data['item']['id'] ?>" class="btn btn-success">Reset</a>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
<h4 class="mb-3">Photos in current item</h4 class="mb-3">
<div class="row g-3">
    <?php
    if (sizeof($data['picts']) > 0) {
        foreach ($data['picts'] as $key => $value) {
            echo '<div class="col-md-4">';
            echo '<div class="position-relative"><div class="ratio ratio-1x1">
                <img src="' . IMGURL . $value['picture'] . '" class="object-fit-cover">
            </div>';
            echo '<div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-75 text-white text-center p-1">
                <div>' . $value['title'] . '</div>
                <div class="small">IDR ' . number_format($value['idr'], 0, ',', '.') . '</div>
            </div>';
            echo '<div class="position-absolute d-flex flex-row gap-2 top-0 start-0 p-2 w-100">
                <a href="' . BASEURL . 'item/photo/' . $data['item']['id'] . '/' . $value['id'] . '" class="btn btn-warning btn-sm rounded-1 shadow" title="Edit"><i class="bi bi-pencil"></i></a>
                <button class="btn btn-danger btn-sm rounded-1 me-auto shadow nt-delete-btn" title="Delete" data-delete="' . BASEURL . 'item/deletephoto/' . $value['id'] . '/' . $data['item']['id'] . '"><i class="bi bi-trash"></i></button>
                ' . ($value['is_best'] == 1 ? '<button type="button" class="btn btn-success btn-sm rounded-1 shadow" title="Best"><i class="bi bi-hand-thumbs-up"></i></button>' : '') . '
            </div>';
            echo '</div></div>';
        }
    } else {
        echo '<div class="col-12 mb-5">No photos yet.</div>';
    }
    ?>
</div>