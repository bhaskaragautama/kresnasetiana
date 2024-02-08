</div>
</div>
</div>
</div>

<!-- Modal delete-->
<div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="modal-deleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-deleteLabel">Warning!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure want to delete this data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a id="modal-delete-btn" class="btn btn-danger" data-id="0">Delete</a>
            </div>
        </div>
    </div>
</div>
<!-- End of modal delete -->

<script>
    $(document).ready(function() {
        $('#toggle-menu').click(function() {
            $('#main-content').toggleClass('col-md-10 offset-md-2 col-md-12');
            $(this).find('i').toggleClass('bi-chevron-double-right bi-chevron-double-left');
            $.ajax({
                url: "<?= BASEURL ?>home/togglemenu"
            });
        });
        $('.table-responsive').on('click', '.delete-btn', function() {
            $('#modal-delete-btn').attr('href', $(this).data('delete'));
            $('#modal-delete').modal('show');
        });
        $('.nt-delete-btn').click(function() {
            $('#modal-delete-btn').attr('href', $(this).data('delete'));
            $('#modal-delete').modal('show');
        });
    });
</script>

</body>

</html>