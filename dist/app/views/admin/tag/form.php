<h2 class="fw-semibold mb-4">Tag</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= BASEURL ?>tag">Tag</a></li>
        <li class="breadcrumb-item active" aria-current="page">Form</li>
    </ol>
</nav>
<form action="<?= BASEURL ?>tag/save" method="post">
    <input type="hidden" name="id" value="<?= $data ? $data['id'] : '' ?>">
    <div class="mb-3">
        <label for="tag" class="form-label">Tag Name <span class="text-danger">*</span></label>
        <input type="text" name="tag" id="tag" class="form-control" value="<?= $data ? $data['tag'] : '' ?>" required autofocus>
    </div>
    <a href="<?= BASEURL ?>tag" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary">Save</button>
</form>