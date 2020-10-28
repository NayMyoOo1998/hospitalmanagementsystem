@csrf
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{$patient->name}}">
    <input type="text" name="patient_id" value="{{$patient->id}}" hidden>
</div>
<div class="form-group">
    <label for="nrc">NRC</label>
    <input type="text" name="nrc" id="nrc" class="form-control" value="{{$patient->nrc}}">
</div>
<div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" class="form-control" value="{{$patient->contact_person_phone}}">
</div>
<div class="form-group">
    <label for="address">Address</label>
    <input type="text" name="address" id="address" class="form-control" value="{{$patient->current_address}}">
</div>
<div class="form-group">
    <label for="gender">Gender</label>
    <select name="gender" id="gender" class="form-control">
        @if($patient->gender == 1)
        <option value="{{$patient->gender}}">Male</option>
        @else
        <option value="{{$patient->gender}}">Female</option>
        @endif
        <option value="1">Male</option>
        <option value="0">Female</option>
    </select>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</div>