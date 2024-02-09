<h2 class="fw-semibold mb-4">Story</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= BASEURL ?>story">Story</a></li>
        <li class="breadcrumb-item active" aria-current="page">Form</li>
    </ol>
</nav>
<form action="<?= BASEURL ?>story/save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $data['form'] ? $data['form']['id'] : '' ?>">
    <div class="mb-3">
        <label for="series" class="form-label">Series <span class="text-danger">*</span></label>
        <select name="series" id="series" class="form-select" required autofocus>
            <option value="">-- Select series --</option>
            <?php
            foreach ($data['series'] as $key => $value) {
                echo '<option value="' . $value['id'] . '" ' . (isset($data['form']) && $data['form']['cat_id'] == $value['id'] ? 'selected' : '') . '>' . $value['category'] . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
        <input type="text" name="title" id="title" class="form-control" value="<?= isset($data['form']) ? $data['form']['title'] : '' ?>" required>
    </div>
    <div class="mb-3">
        <label for="photo" class="form-label">Photos</label>
        <input type="file" name="photo[]" id="photo" class="form-control" accept=".jpg,.jpeg,.png" multiple>
        <div id="photoHelp" class="form-text">You can select multiple photos.</div>
    </div>
    <?php
    if (isset($data['images'])) {
        foreach ($data['images'] as $key => $value) {
            echo '<div class="row mb-3">
                <div class="col-4">
                    <div class="position-relative">
                        <button type="button" class="btn btn-danger nt-delete-btn position-absolute top-0 start-0 m-2 z-3 rounded-2" data-delete="' . BASEURL . 'story/deletephoto/' . $value['id'] . '/' . $data['form']['id'] . '"><i class="bi bi-x-lg"></i></button>
                        <div class="ratio ratio-4x3 position-relative">
                            <img src="' . IMGURL . $value['picture'] . '" class="h-100 w-100 object-fit-cover rounded-3">
                        </div>
                    </div>
                </div>
                <div class="col-8 vstack">
                    <div class="hstack gap-3 mb-3">
                        <div class="form-check form-switch align-self-center">
                            <input class="form-check-input" type="checkbox" role="switch" id="best-' . $value['id'] . '" name="best[' . $value['id'] . ']" value="1" ' . ($value['is_best'] == 1 ? 'checked' : '') . '>
                            <label class="form-check-label text-nowrap" for="best-' . $value['id'] . '">Set best</label>
                        </div>
                        <select class="form-select" name="position[' . $value['id'] . ']">
                            <option value="">-- Choose text position --</option>
                            <option value="1" ' . ($value['desc_position'] == 1 ? 'selected' : '') . '>Top</option>
                            <option value="2" ' . ($value['desc_position'] == 2 ? 'selected' : '') . '>Right</option>
                            <option value="3" ' . ($value['desc_position'] == 3 ? 'selected' : '') . '>Bottom</option>
                            <option value="4" ' . ($value['desc_position'] == 4 ? 'selected' : '') . '>Left</option>
                        </select>
                    </div>
                    <textarea class="form-control flex-grow-1" placeholder="Add Story" name="desc[' . $value['id'] . ']">' . $value['desc'] . '</textarea>
                </div>
            </div>';
        }
    }
    ?>
    <a href="<?= BASEURL ?>story" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
<!-- <div class="container-fluid"> -->
<div class="row justify-content-center g-3 mb-3">
    <?php
    $content = '';
    $count = 0;
    $orientation = '';
    foreach ($data['images'] as $key => $value) {
        if ($value['orientation'] == 0) {
            $content .= '<div class="col-md-4">
                    <div class="ratio ratio-portrait">
                        <img src="' . IMGURL . $value['picture'] . '" class="object-fit-cover shadow-sm">
                    </div>
                </div>';
            $orientation .= 'p';
        } else {
            $content .= '<div class="col-md-8">
                    <div class="ratio ratio-landscape">
                        <img src="' . IMGURL . $value['picture'] . '" class="object-fit-cover shadow-sm">
                    </div>
                </div>';
            $orientation .= 'l';
        }
        $count++;
        if ($count == 2) {
            if ($orientation == 'pl' || $orientation == 'lp') {
                echo $content;
                $content = '';
                $count = 0;
                $orientation = '';
            } else if ($orientation == 'll') {
                echo str_replace('col-md-8', 'col-md-6', $content);
                $content = '';
                $count = 0;
                $orientation = '';
            } else if ($orientation == 'pp') {
                $count--;
            } else if ($orientation == 'ppl') {
                echo str_replace('col-md-4', 'col-md-6', $content);
                $content = '<div class="col-md-8">
                        <div class="ratio ratio-landscape">
                            <img src="' . IMGURL . $value['picture'] . '" class="object-fit-cover shadow-sm">
                        </div>
                    </div>';
                $count = 1;
                $orientation = 'l';
            } else if ($orientation == 'ppp') {
                echo $content;
                $content = '';
                $count = 0;
                $orientation = '';
            }
        }
        if ($value['desc'] != '') {
        }
    }
    echo $content;
    ?>
</div>
<!-- </div> -->