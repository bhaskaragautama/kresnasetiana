<h2 class="fw-semibold mb-4">Term</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= BASEURL ?>term">Term</a></li>
        <li class="breadcrumb-item active" aria-current="page">Form</li>
    </ol>
</nav>
<form action="<?= BASEURL ?>term/save" method="post">
    <input type="hidden" name="id" value="<?= $data ? $data['id'] : '' ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Term Name <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control" value="<?= $data ? $data['term_name'] : '' ?>" required autofocus>
    </div>
    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is-active" value="1" id="is-active" <?= $data && $data['is_active'] == 1 ? 'checked' : '' ?>>
            <label class="form-check-label" for="is-active">
                Activate
            </label>
        </div>
    </div>
    <a href="<?= BASEURL ?>term" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary">Save</button>
</form>