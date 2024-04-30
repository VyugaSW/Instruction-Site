<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="errorsModalLabel">Errors!</h1>
            <button type="button" class="btn-close error-btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @foreach($errors as $err)
                <h3><span style="color: red">{{$err}}</span></h3>
            @endforeach
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary error-btn-close" data-bs-dismiss="modal">Understood</button>
        </div>
        </div>
    </div>
</div>
<script>new bootstrap.Modal(document.getElementById('errorModal')).show();</script>