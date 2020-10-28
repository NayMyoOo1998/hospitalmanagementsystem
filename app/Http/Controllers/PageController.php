<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Education;
use App\Models\Role;
use App\Models\Speciality;
use App\Models\Township;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPSTORM_META\type;

class PageController extends Controller
{
    public function index()
    {
        // $roles = Role::all();

        // $doctor = User::paginate(1);

        return view('auth.login');
    }

    public function show($id)
    {
        $profile = User::find($id);
        // $township = $profile->townships->name;
        $educations = Education::all();
        $designations = Designation::all();
        $specialities = Speciality::all();
        $townships = Township::all();
        return view('profile', compact('profile','townships','educations', 'designations', 'specialities'));
    }

    public function profileEdit(Request $request){
        $id = $request['profile_id'];
        $prefix = $request['prefix'];
        $name = $request['name'];
        $email = $request['email'];
        $phone = $request['phone'];
        $address = $request['address'];
        $township_id = $request['township_id'];


        $user = User::find($id);
        $user->prefix = $prefix;
        $user->name = $name;
        $user->email = $email;
        $user->phone = $phone;
        $user->address = $address;
        $user->save();
        $user->townships()->sync($township_id);
        return back();
    }

    public function changeUserPassword(Request $request){
        $request->validate([
            'current_password' => ['required','string', 'min:8'],
            'new_password' => ['required','string', 'min:8'],
            'confirm_new_password' => ['required', 'string', 'min:8'],
        ]);
        $user_id = $request['user_id'];
        $user = User::find($user_id);
        $current_password = $request['current_password'];
        $new_password = $request['new_password'];
        $confirm_new_password = $request['confirm_new_password'];

       if(Hash::check($current_password, $user->password)){
          if($new_password === $confirm_new_password){
            $user->password = Hash::make($new_password);
            $user->save();
            return back();
          }else{
              echo "Your new password and confirm_password do not match";
          }
       }else{
           echo "Your password is wrong";
       }
       
        
    }



    public function userAddEducation(Request $request)
    {
        $id = $request['user_id'];
        $education_id = $request['education_id'];
        $user = User::find($id);
        $user->educations()->attach($education_id);
        return back();
    }

    public function userEducationDelete(Request $request){
        $user_id = $request['user_id'];
        $education_id = $request['education_id'];
        $user = User::find($user_id);
        $user->educations()->detach($education_id);
        return back();
    }

    public function userAddDesignation(Request $request){
        $id = $request['user_id'];
        $designation_id = $request['designation_id'];
        $user = User::find($id);
        $user->designations()->attach($designation_id);
        return back();
    }

    public function userDesignationDelete(Request $request){
        $user_id = $request['user_id'];
        $designation_id = $request['designation_id'];
        $user = User::find($user_id);
        $user->designations()->detach($designation_id);
        return back();
    }

    public function userAddSpeciality(Request $request){
       $user_id = $request['user_id'];
       $speciality_id = $request['speciality_id'];
       $user = User::find($user_id);
       $user->specialities()->attach($speciality_id);
       return back();
    }

    public function userSpecialityDelete(Request $request){
        $user_id = $request['user_id'];
        $speciality_id = $request['speciality_id'];

        $user = User::find($user_id);
        $user->specialities()->detach($speciality_id);
        return back();
    }


    public function showDoctor()
    {
        $doctors = User::where('role_id', 2)->get();

        return view('doctor.doctor-list', compact('doctors'));
    }

    public function showLab()
    {
        $labs = User::where('role_id', 3)->get();
        return view('lab.lab-list', compact('labs'));
    }
}
