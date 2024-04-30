<div class="modal fade" id="changeAvatarModal" tabindex="-1" aria-labelledby="changeAvatarModalLabel" aria-hidden="false">
    <div class="modal-dialog" id="modalDialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="changeAvatarModalLabel">Change avatar window</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data" action="/profile/changeavatar/ajax/check">
                @csrf
                <div class="mb-3">
                    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
                    <input class="form-control" type="file" name="avatar">
                </div>
                <button type="submit" class="btn btn-primary" name="btnChangeAvatarModal">Change</button>
            </form>
        </div>
        </div>
    </div>
</div> 