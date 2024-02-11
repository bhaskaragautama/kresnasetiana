<h2 class="fw-semibold mb-4">Collection</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= BASEURL ?>collection">Collection</a></li>
        <li class="breadcrumb-item active" aria-current="page">Form</li>
    </ol>
</nav>
<form action="<?= BASEURL ?>collection/save" method="post">
    <input type="hidden" name="id" value="<?= $data ? $data['id'] : '' ?>">
    <div class="mb-3">
        <label for="category" class="form-label">Collection Name <span class="text-danger">*</span></label>
        <input type="text" name="category" id="category" class="form-control" value="<?= $data ? $data['category'] : '' ?>" required autofocus>
    </div>
    <a href="<?= BASEURL ?>collection" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary">Save</button>
</form>