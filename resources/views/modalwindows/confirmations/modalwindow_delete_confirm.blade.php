@if(session('radmin'))
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
                <button type="button" class="btn-close error-btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <button class="btn btn-outline-danger w-50 fs-3" onclick="makeAjax()">Delete</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary error-btn-close" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
@endif