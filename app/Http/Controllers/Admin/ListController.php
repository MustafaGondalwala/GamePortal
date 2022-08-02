<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Get All the User for Admin
     *
     * @param  Request  $request
     * @return void
     */
    public function list(Request $request)
    {
        $all_admins = Admin::latest()->get();

        return view('admin.auth.list', compact('all_admins'));
    }
    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->guard('admin')->logout();
        \Session::flush();
        \Session::put('success', 'You are logout successfully');

        return redirect(url('admin/login'));
        // return redirect(route('adminLogin'));
    }

    public function redirectToLogin()
    {
        return redirect(url('admin/login'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, $id = null)
    {
        $id = decrypt_param($id);
        if ($request->isMethod('GET')) {
            $data['heading'] = 'Add';
            $data['form_data'] = null;
            if ($id != null) {
                $data['form_data'] = Admin::find($id);
            }
            $data['id'] = $id;

            return view('admin.auth.add', $data);
        }
        if ($request->isMethod('POST')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:admins,email',
                'password' => 'required',
                'status' => 'required',
            ]);

            if ($id == null) {
                $instance = new Admin();
            } else {
                $instance = Admin::find($id);
            }

            $instance->name = $request->name;
            $instance->email = $request->email;
            if ($request->password) {
                $instance->password = $request->password;
            }
            $instance->status = $request->status;
            $instance->save();

            return redirect()->route('admin.list')->with('message', 'Admin created successfully');
        }
    }

    public function delete(Request $request, $id = null)
    {
        $id = decrypt_param($id);
        Admin::find($id)->delete();

        return redirect()->route('admin.list')->with('message', 'Admin data Deleted!!');
    }
}
