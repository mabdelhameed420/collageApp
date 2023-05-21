<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Traits\GeneralTraits;

class AdminController extends Controller
{
    use GeneralTraits;

    public function update(Request $request, Admin $admin)
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'national_id' => 'required|unique:admins,national_id,' . $admin->id,
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'phone_no' => 'required',
            'password' => 'required'

        ]);

        $admin->update($validatedData);
        return $this->returnData('admin_update',$admin,"admin updated successfully");
    }
    public function delete(Request $request)
    {
        $admin = Admin::find($request->input('id'));
        $admin->delete();

        return $this->returnSuccessMessage("Admin deleted successfully");
    }
    public function show(Request $request)
    {
        $admin = Admin::find($request->id);

        return $this->returnSuccessMessage("Admin found successfully");
    }
    public function index()
    {
        $admins = Admin::all();
        return $this->returnData('admins',$admins,"Admin found successfully");
    }

    public function login(Request $request)
    {
        $adminExists = Admin::where('national_id', $request->national_id)->first();
        if ($adminExists) {
            if (password_verify($request->password, $adminExists->password)) {
                return $this->returnData('admin_login',$adminExists,"Admin login successfully");
            } else {
                return $this->returnError("","Wrong password");
            }
        } else {
            return $this->returnError("","Admin don't exists");
        }
    }
}
