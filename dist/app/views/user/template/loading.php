<!-- loading -->
<div id="loading-modal" class="position-fixed vh-100 w-100 z-3 bg-black bg-opacity-75 top-0 start-0" style="display: none;">
    <div class="d-flex h-100 w-100 justify-content-center align-items-center">
        <div class="spinner-grow text-white" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

<script>
    function showLoad() {
        $('#loading-modal').fadeIn();
        $('body').addClass('overflow-hidden');
    }

    function hideLoad() {
        $('#loading-modal').fadeOut();
        $('body').removeClass('overflow-hidden');
    }
</script>