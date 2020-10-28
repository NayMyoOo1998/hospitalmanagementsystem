<?php

namespace App\Http\Controllers;

use App\Models\Blood;
use App\Models\Designation;
use App\Models\Education;
use App\Models\Group;
use App\Models\Speciality;
use App\Models\Type;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('isAdmin');
    // }


    public function addTypeCreate()
    {
        return view('admin.add-type');
    }

    public function addTypeStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Type::create([
            'name' => $request['name'],
        ]);
        return redirect()->back()->with('typeAddSuccess', 'Type add successfully');
    }

    public function showTypeList()
    {
        $types = Type::all();
        return view('admin.type-list', compact('types'));
    }

    public function typeDataTypeModal(Request $request)
    {
        $id = $request['id'];
        $type = Type::find($id);
        return view('admin.typeEditForm', compact('type'));
    }

    public function typeUpdate(Request $request){
        $id = $request['type_id'];
        $type = Type::find($id);
        $type->name = $request['name'];
        $type->save();
        return redirect()->back()->with('typeUpdateSuccess', 'Updated successfully');
    }

    public function typeDelete(Request $request){
        $id = $request['id'];
        Type::destroy($id);
        return redirect()->back()->with('typeDeleteSuccess', 'Deleted successfully');

    }



    public function addGroupCreate()
    {
        $types = Type::all();
        return view('admin.add-group', compact('types'));
    }

    public function addGroupStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type_id' => 'required',
        ]);

        Group::create([
            'name' => $request['name'],
            'is_active' => true,
            'type_id' => $request['type_id'],
        ]);

        return redirect()->back()->with('groupAddSuccess', 'You add group successfully');
    }

    public function showGroupList()
    {
        $groups = Group::all();
        return view('admin.group-list', compact('groups'));
    }

    public function groupTakeModal(Request $request)
    {
        $id = $request['id'];
        $group = Group::find($id);
        $types = Type::all();
        return view('admin.groupEditForm', compact('group', 'types'));
    }

    public function groupUpdate(Request $request)
    {
        $group = Group::find($request['group_id']);
        $group->name = $request['name'];
        $group->type_id = $request['type_id'];
        $group->save();
        return redirect()->back()->with('groupUpdateSuccess', 'Updated successfully');
    }

    public function groupDelete(Request $request){
        $id = $request['id'];
        Group::destroy($id);
        return redirect()->back()->with('groupDeleteSuccess', 'Deleted successfully');
    }


    public function addBloodType(){
       return view('admin.add-blood-type');
    }

    public function bloodTypeStore(Request $request){
        $request->validate([
            'type'=>'required',
        ]);

        Blood::create([
            'type' => $request['type'],
        ]);

        return redirect()->back()->with('addBloodSuccess', 'Blood Added Successfully');
    }

    public function showBloodList(){
        $bloods = Blood::all();
        return view('admin.blood-list', compact('bloods'));
    }

    public function bloodTakeModal(Request $request){
       $id = $request['id'];
       $blood = Blood::find($id);
        return view('admin.bloodEditForm', compact('blood'));
    }

    public function bloodUpdate(Request $request){
       $id = $request['type_id'];
       $blood = Blood::find($id);
       $blood->type = $request['type'];
       $blood->save();
       return redirect()->back()->with('bloodUpdateSuccess', 'Blood Updated successfully');
    }

    public function bloodDelete(Request $request){
       $id = $request['id'];
       Blood::destroy($id);
       return redirect()->back()->with('bloodDeleteSuccess', 'Blood Deleted Successfully');
    }

    public function education(){
        $educations = Education::all();
        return view('admin.education-list', compact('educations'));
    }

    public function addEducation(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        // var_dump($request->all());

        $name = $request['name'];
        Education::create([
            'name' => $name,
        ]);
        return redirect()->back()->with('addEducationSuccess', 'Add Education Successfully');
    }


    public function designation(){
        $designations = Designation::all();
        return view('admin.designation-list', compact('designations'));
    }

    public function addDesignation(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $name = $request['name'];
        Designation::create([
            'name' => $name,
        ]);
        return redirect()->back()->with('addDesignationSuccess', 'Add Education Successfully');


    }


    public function speciality(){
        $specialities = Speciality::all();
        return view('admin.speciality-list',compact('specialities'));
    }

    public function addSpeciality(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $name = $request['name'];
        Speciality::create([
            'name' => $name,
        ]);
        return redirect()->back()->with('addSpecialitySuccess', 'Add Education Successfully');
    }

    public function specialityEdit(Request $request){
        $id = $request['id'];
        $speciality = Speciality::find($id);
        return view('admin.specialityEdit', compact('speciality'));
    }

    public function specialityUpdate(Request $request){
       $id = $request['speciality_id'];
       $speciality = Speciality::find($id);
       $speciality->name = $request['name'];
       $speciality->save();
       return back();
    }

    public function specialityDelete(Request $request){
       $id =  $request['id'];
       $speciality = Speciality::find($id);
       $speciality->delete();
       return back();
    }



}
