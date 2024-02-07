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
                echo '<option value="' . $value['id'] . '">' . $value['category'] . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="photo" class="form-label">Photos</label>
        <input type="file" name="photo[]" id="photo" class="form-control" accept=".jpg,.jpeg,.png" multiple required>
    </div>
    <a href="<?= BASEURL ?>story" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary">Save</button>
</form>