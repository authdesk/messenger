<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SuperAdmin\StoreRequest;
use App\Http\Requests\Admin\SuperAdmin\UpdateRequest;

use Illuminate\Support\Facades\Hash;
use Validator;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Auth;

class SuperAdminController extends Controller
{
    public function index()
    {
       
        $isAdmin = User::find(Auth::user()->id); 
        $admins = User::all();
        return view('admin.super_admin.all', compact('admins','isAdmin'));
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.super_admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $validData = $request->validated();

        if (!$validData) 
        {
            Toastr::error('* fields are required!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->back();

        }else {

            //insert data

            $insert = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'isMain' => $request->isMain,
                ]);

            if ($insert) {
                Toastr::success('Admins inserted successfully!', 'Message', ["positionClass" => "toast-top-right"]);
                return redirect()->route('admin.super-admin.index');
            }else {
               Toastr::error('ERROR!', 'Message', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }
    }


    public function make_super_admin($id)
    {
        User::findOrFail($id)->update(['isMain' => 1]);
        Toastr::success('Super admin made successfully!', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.super-admin.index');
    }


    public function make_admin($id)
    {
        User::findOrFail($id)->update(['isMain' => 0]);
        Toastr::success('Super admin cancelled!', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.super-admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = User::findOrFail( $id);
        return view('admin.super_admin.view', compact('admin'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = User::findOrFail($id);
        return view('admin.super_admin.edit', compact('edit'));
    }

    public function update(UpdateRequest $request, $id)
    {
       
        $validData = $request->validated();

        $request->all();
        if (!$validData) 
        {
            Toastr::error('* fields are required!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->back();

        }else {

            //update data
            if ($request->has('password')) {
                $new_password = Hash::make($request->password);
                $update = User::findOrFail($id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $new_password
                ]);
                
            }else {
                $update = User::findOrFail($id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
            }

        
            if ($update) {
                Toastr::success('Admins updateed successfully!', 'Message', ["positionClass" => "toast-top-right"]);
                return redirect()->route('admin.super-admin.index');
            }else {
               Toastr::error('ERROR!', 'Message', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }

    }


    public function destroy($id)
    {
        $delete_admin = User::findOrFail($id)->delete();
        
        if ($delete_admin) {
            Toastr::success('Admin deleted successfully!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.super-admin.index');

        }else {
            Toastr::error('ERROR!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.super-admin.index');
        }
    }
}
