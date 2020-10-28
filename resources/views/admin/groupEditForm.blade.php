<div class="modal-body">
    @csrf 
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{$group->name}}" class="form-control">
        <input type="text" name="group_id" hidden value="{{$group->id}}">
    </div>
    <div class="form-group">
        <label for="type_name">Type Name</label>
        <select name="type_id" id="type_name " class="form-control">
            <option value="{{$group->type->id}}">{{$group->type->name}}</option>
            @foreach($types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
            @endforeach
        </select>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</div>