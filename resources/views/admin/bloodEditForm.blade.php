<div class="modal-body">
    @csrf
    <div class="form-group">
        <label for="type">Blood Type</label>
        <input type="text" name="type" id="type" class="form-control" value="{{$blood->type}}">
        <input type="text" name="type_id" hidden value="{{$blood->id}}">
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</div>