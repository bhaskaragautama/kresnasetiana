<h2 class="fw-semibold mb-4">Photo</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= BASEURL ?>photo">Photo</a></li>
        <li class="breadcrumb-item active" aria-current="page">Form</li>
    </ol>
</nav>
<form action="<?= BASEURL ?>photo/save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $data['form'] ? $data['form']['id'] : '' ?>">
    <div class="mb-3">
        <label for="title" class="form-label">Photo Title <span class="text-danger">*</span></label>
        <input type="text" name="title" id="title" class="form-control" value="<?= $data['form'] ? $data['form']['title'] : '' ?>" required autofocus>
    </div>
    <div class="mb-3">
        <label for="photo" class="form-label">Photo <span class="text-danger">*</span></label>
        <?php
            if(isset($data['form'])) {
                echo '<div class="mb-3 w-25 position-relative"><img class="w-100 rounded-2" src="'.IMGURL.$data['form']['picture'].'"><div class="position-absolute bottom-0 start-0 w-100 p-3 bg-black bg-opacity-50 text-white text-center rounded-bottom-2">Current Photo</div></div>';
            }
        ?>
        <input type="file" name="photo[]" id="photo" class="form-control" accept=".jpg,.jpeg,.png">
        <div id="photoHelp" class="form-text">Select one photo to create a new data or to replace the old photo.</div>
    </div>
    <div class="mb-3">
        <label class="form-label">Tag <span class="text-danger">*</span></label>
        <div class="d-flex flex-wrap gap-1">
            <?php
            $pivotList = [];
            if(isset($data['pivot'])) {
                foreach($data['pivot'] as $key => $value) {
                    array_push($pivotList, $value['tag_id']);
                }
            }
            foreach ($data['tag'] as $key => $value) {
                $match = in_array($value['id'], $pivotList);
                echo '<input type="checkbox" class="btn-check" id="btn-check-' . $value['id'] . '" name="tag[]" value="' . $value['id'] . '" autocomplete="off" '.($match ? 'checked' : '').'>
                    <label class="btn '.($match ? 'btn-success' : 'bg-secondary-subtle').' btn-sm" id="btn-label-' . $value['id'] . '" for="btn-check-' . $value['id'] . '">' . $value['tag'] . '</label>';
            }
            ?>
        </div>
    </div>
    <div class="form-check form-switch mb-3">
        <input class="form-check-input" type="checkbox" role="switch" id="is-best" name="is-best" value="1" <?= $data['form'] && $data['form']['is_best'] == 1 ? 'checked' : '' ?>>
        <label class="form-check-label" for="is-best">Set best</label>
    </div>
    <a href="<?= BASEURL ?>photo" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary">Save</button>
</form>

<script>
    $(document).ready(function() {
        $('.btn-check').click(function() {
            console.log($(this).is(':checked'));
            if ($(this).is(':checked')) {
                $('#btn-label-' + $(this).val()).removeClass('bg-secondary-subtle').addClass('btn-success');
            } else {
                $('#btn-label-' + $(this).val()).addClass('bg-secondary-subtle').removeClass('btn-success');
            }
        });
    });
</script>