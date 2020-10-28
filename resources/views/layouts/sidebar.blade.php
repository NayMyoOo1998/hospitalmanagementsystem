<aside class="pt-2 pl-2">
    <h4 class="mb-3">
        <a href="{{asset('/home')}}">
            <i class="fa fa-home" aria-hidden="true"></i>
            Dashboard
        </a>
    </h4>
    @if(Auth::user()->role->name == 'admin')
    <h4 class="dropdown-toggle mb-3" data-toggle="collapse" href="#admindorpdown" role="button" aria-expanded="false" aria-controls="collapseExample">
        <i class="fa fa-user" aria-hidden="true"></i>
        Admin
    </h4>
    <ul class="collapse list-unstyled pl-3" id="admindorpdown">
        <li>
            <a href="{{url('add-type')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                Add Type</a>
        </li>
        <li>
            <a href="{{url('type-list')}}"><i class="fa fa-th-list" aria-hidden="true"></i>
                Type List</a>
        </li>
        <li>
            <a href="{{url('add-group')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                Add Group</a>
        </li>
        <li>
            <a href="{{url('group-list')}}"><i class="fa fa-th-list" aria-hidden="true"></i>
                Group List</a>
        </li>
        <li>
            <a href="{{url('add-blood-type')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add Blood Type</a>
        </li>
        <li><a href="{{url('blood-list')}}"><i class="fa fa-th-list" aria-hidden="true"></i> Blood Type List</a></li>
        <li><a href="{{url('education')}}"><i class="fa fa-th-list" aria-hidden="true"></i> Education List</a></li>
        <li><a href="{{url('designation')}}"><i class="fa fa-th-list" aria-hidden="true"></i> Designation List</a></li>
        <li><a href="{{url('speciality')}}"><i class="fa fa-th-list" aria-hidden="true"></i> Speciality List</a></li>
    </ul>
    @endif
    <h4 class="dropdown-toggle mb-3" data-toggle="collapse" href="#doctorDown" role="button" aria-expanded="false" aria-controls="collapseExample">
        <i class="fa fa-user-md" aria-hidden="true"></i>
        Doctor
    </h4>
    <ul class="collapse list-unstyled pl-3" id="doctorDown">
        <!-- <li>
            <a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                Add Labs</a>
        </li> -->
        <li>
            <a href="{{url('/doctor-list')}}"><i class="fa fa-th-list" aria-hidden="true"></i>
                Doctor List</a>
        </li>
    </ul>
    <h4 class="dropdown-toggle mb-3" data-toggle="collapse" href="#labdropdown" role="button" aria-expanded="false" aria-controls="collapseExample">
        <i class="fa fa-flask" aria-hidden="true"></i>
        Laboratists
    </h4>
    <ul class="collapse list-unstyled pl-3" id="labdropdown">
        <!-- <li>
            <a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                Add Labs</a>
        </li> -->
        <li>
            <a href="{{url('lab-list')}}"><i class="fa fa-th-list" aria-hidden="true"></i>
                Labs List</a>
        </li>
    </ul>
    <h4 class="dropdown-toggle mb-3" data-toggle="collapse" href="#patient" role="button" aria-expanded="false" aria-controls="collapseExample">
        <i class="fa fa-users" aria-hidden="true"></i>
        Patients
    </h4>
    <ul class="collapse list-unstyled pl-3" id="patient">
        <li>
            <a href="{{url('/add-patient')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                Add Patients</a>
        </li>
        <li>
            <a href="{{url('patient-list')}}"><i class="fa fa-th-list" aria-hidden="true"></i>
                Patients List</a>
        </li>
        <li>
            <a href="{{url('deleted-patient-list')}}">Deleted Patient List</a>
        </li>
    </ul>
    <!-- <h4>Report</h4> -->
</aside>