<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="successModalLabel">Success</h1>
            <button type="button" class="btn-close error-btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h3><span style="color: green">{{$message}}</span></h3>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary error-btn-close" data-bs-dismiss="modal">Understood</button>
        </div>
        </div>
    </div>
</div>
<script>new bootstrap.Modal(document.getElementById('successModal')).show();</script>