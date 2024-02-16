<h2 class="fw-semibold mb-4">Dashboard</h2>

<div class="row g-5">
    <div class="col-auto">
        <div class="alert alert-primary">
            <div class="d-flex gap-3">
                <i class="bi bi-journal fs-3 align-self-center"></i>
                <div class="vstack">
                    <div class="mb-1 fw-medium fs-5">Total <?= $data['story'] ?> stories</div>
                    <div class="small">From <?= $data['series'] ?> series</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-auto">
        <div class="alert alert-warning">
            <div class="d-flex gap-3">
                <i class="bi bi-images fs-3 align-self-center"></i>
                <div class="vstack">
                    <div class="mb-1 fw-medium fs-5">Total <?= $data['photo'] ?> photos</div>
                    <div class="small">From <?= $data['tag'] ?> tags</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-auto">
        <div class="alert alert-success">
            <div class="d-flex gap-3">
                <i class="bi bi-bag-check fs-3 align-self-center"></i>
                <div class="vstack">
                    <div class="mb-1 fw-medium fs-5">Total <?= $data['item'] ?> items</div>
                    <div class="small">From <?= $data['collection'] ?> collections</div>
                </div>
            </div>
        </div>
    </div>
</div>