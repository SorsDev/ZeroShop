<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $adminData = Admin::findOrFail(1);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function AdminProfileStore(Request $request){
        $data = Admin::find(1);
        $data->email= $request->email;
        $data->name= $request->name;
        $data->phone= $request->phone;
        $data->address= $request->address;
        $data->facebook= $request->facebook;
        $data->twitter= $request->twitter;
        $data->instagram= $request->instagram;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $filename = date('YmHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Perfil del administrador actualizado correctamente!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function UpdateChangePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hashPassword = Admin::find(1)->password;
        if(Hash::check($request->oldpassword,$hashPassword)){
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else{
            return Redirect()->back();
        }
    }

}
