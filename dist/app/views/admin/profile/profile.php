<div class="hstack justify-content-between mb-4">
    <h2 class="fw-semibold mb-0">Best Photos</h2>
</div>
<div class="alert alert-info">
    You will automatically logged out if you change your password.
</div>
<form action="<?= BASEURL ?>profile/save" method="post">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <div class="mb-3">
        <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
        <input type="text" name="username" id="username" class="form-control" value="<?= $data['username'] ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="full-name" class="form-label">Full Name <span class="text-danger">*</span></label>
        <input type="text" name="full-name" id="full-name" class="form-control" value="<?= $data['name'] ?>" required autofocus>
    </div>
    <div class="mb-3 small text-muted">Leave the password blank if you do not want to update it.</div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    <div class="mb-3">
        <label for="repeat-password" class="form-label">Repeat Password</label>
        <input type="password" name="repeat-password" id="repeat-password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>