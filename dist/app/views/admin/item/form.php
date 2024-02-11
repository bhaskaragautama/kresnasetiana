<h2 class="fw-semibold mb-4">Item</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= BASEURL ?>item">Item</a></li>
        <li class="breadcrumb-item active" aria-current="page">Form</li>
    </ol>
</nav>
<form action="<?= BASEURL ?>item/save" method="post">
    <input type="hidden" name="id" value="<?= $data['form'] ? $data['form']['id'] : '' ?>">
    <div class="mb-3">
        <label for="collection" class="form-label">Collection <span class="text-danger">*</span></label>
        <select name="collection" id="collection" class="form-select" required autofocus>
            <option value="">-- Select collection --</option>
            <?php
            foreach ($data['collection'] as $key => $value) {
                echo '<option value="' . $value['id'] . '" ' . ($data['form'] && $data['form']['cat_id'] == $value['id'] ? 'selected' : '') . '>' . $value['category'] . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Item Name <span class="text-danger">*</span></label>
        <input type="text" name="title" id="title" class="form-control" value="<?= $data['form'] ? $data['form']['title'] : '' ?>" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control"><?= $data['form'] ? $data['form']['description'] : '' ?></textarea>
    </div>
    <a href="<?= BASEURL ?>item" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary">Save</button>
</form>