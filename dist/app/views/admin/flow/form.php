<h2 class="fw-semibold mb-4">Cash Flow</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= BASEURL ?>flow">Cash Flow</a></li>
        <li class="breadcrumb-item active" aria-current="page">Form</li>
    </ol>
</nav>
<form action="<?= BASEURL ?>flow/save" method="post" id="form-flow">
    <input type="hidden" name="id" value="<?= $data['data'] ? $data['data']['id'] : '' ?>">
    <div class="p-3 mb-3 bg-secondary-subtle rounded-3">
        <div class="mb-3">
            This data should not be changed. <a href="#" id="change-data">Change anyway</a>.
        </div>
        <div class="mb-3">
            <label for="term" class="form-label">Term <span class="text-danger">*</span></label>
            <select name="term" id="term" class="form-select form-auto" disabled required>
                <option value="">-- Select Term --</option>
                <?php
                foreach ($data["term"] as $key => $value) {
                    echo '<option value="' . $value['id'] . '" ' . ($value['is_active'] == 1 ? 'selected' : '') . '>' . $value['term_name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
            <input type="date" name="date" id="date" class="form-control form-auto" value="<?= $data['data'] ? $data['data']['date'] : date('Y-m-d') ?>" disabled required>
        </div>
    </div>
    <div class="mb-3">
        <input type="number" name="type" id="type" class="visually-hidden" value="<?= $data['data'] ? $data['data']['type'] : '' ?>" required>
        <label class="form-label">Flow Type <span class="text-danger">*</span></label>
        <div class="row g-3 z-3">
            <div class="col-6"><button type="button" class="btn-flow-type flow-out btn w-100 <?= isset($data['data']) && $data['data']['type'] == 0 ? 'btn-danger' : 'bg-danger bg-opacity-10' ?>" data-value="0">Cash Out</button></div>
            <div class="col-6"><button type="button" class="btn-flow-type flow-in btn w-100 <?= isset($data['data']) && $data['data']['type'] == 1 ? 'btn-success' : 'bg-success bg-opacity-10' ?>" data-value="1">Cash In</button></div>
        </div>
    </div>
    <div class="mb-3">
        <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
        <div class="row">
            <div class="col-6">
                <input type="number" name="amount" id="amount" class="form-control" value="<?= $data['data'] ? $data['data']['amount'] : '' ?>" autocomplete="off" required>
            </div>
            <div class="col-6 align-self-center fw-medium">Rp <span id="amount-preview">0</span></div>
        </div>
    </div>
    <div class="mb-3">
        <label for="just" class="form-label">Justification <span class="text-danger">*</span></label>
        <textarea name="just" id="just" class="form-control" required><?= $data['data'] ? $data['data']['justification'] : '' ?></textarea>
    </div>
    <a href="<?= BASEURL ?>flow" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary">Save</button>
</form>

<script>
    $(document).ready(function() {
        if ($("#amount").val() != "") {
            $("#amount-preview").html(Intl.NumberFormat('id-ID').format($("#amount").val()));
        }
        $('#change-data').click(function(e) {
            e.preventDefault();
            $('.form-auto').removeAttr('disabled');
        });
        $(".btn-flow-type").click(function() {
            if ($(this).hasClass('flow-out')) {
                $('.flow-in').removeClass('btn-success').addClass('bg-success bg-opacity-10');
                $('.flow-out').removeClass('bg-danger bg-opacity-10').addClass('btn-danger');
            } else {
                $('.flow-out').removeClass('btn-danger').addClass('bg-danger bg-opacity-10');
                $('.flow-in').removeClass('bg-success bg-opacity-10').addClass('btn-success');
            }
            $('#type').val($(this).data("value"));
        });
        $('#form-flow').submit(function() {
            $('.form-auto').removeAttr('disabled');
        });
        $("#amount").keyup(function() {
            $("#amount-preview").html(Intl.NumberFormat('id-ID').format($(this).val()));
        });
    });
</script>