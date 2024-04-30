<div class="modal fade" id="complainModal" tabindex="-1" aria-labelledby="complainModalLabel" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="changeAvatarModalLabel">Complain window</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" name="complainType" aria-label="Type">
                    @foreach($complainTypes as $complainType)
                        <option value="{{$complainType->id}}">{{$complainType->type}}</option>
                    @endforeach
                </select>
                <label for="complainType">Choose type</label>
            </div>
            <div class="from-floating">
                <div id="descHelp" class="form-text text-info">Description can include not more than 128 chars</div>
                <textarea name="description" class="form-control mb-3" placeholder="Please leave a description"></textarea>
            </div>
            <input type="hidden" value="{{$instructionid}}" name="instructionid">
            <button type="submit" name="submit" class="btn btn-primary" onclick="sendComplains()" data-bs-dismiss="modal">Submit</button>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary error-btn-close" data-bs-dismiss="modal">Exit</button>
        </div>
        </div>
    </div>
</div>
