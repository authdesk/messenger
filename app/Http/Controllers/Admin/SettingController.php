<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Settings\StoreSettingsRequest;
use App\Http\Requests\Admin\Settings\UpdateSettingsRequest;
use Illuminate\Support\Str;
use Validator;
use Flash;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class SettingController extends Controller
{

    public function index()
    {
        $settings = Setting::all();

        return view('admin.settings.all', compact('settings') );
    }


    public function create()
    {
        return view('admin.settings.create');
    }


    public function store(StoreSettingsRequest $request)
    {
        $validData = $request->validated();

        if (!$validData) 
        {
            Toastr::error('* fields are required!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->back();

        }else {

            $image=$request->file('Logo');

            //image url set
            $image_name=Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='public/backend_image/Logo/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
         
            //insert data
            $data = $request->all();
            $data['Logo'] = $image_url;
            $insert = Setting::create($data);

            if ($insert) {
                Toastr::success('Settings data inserted successfully!', 'Message', ["positionClass" => "toast-top-right"]);
                return redirect()->route('admin.settings.index');
            }else {
               Toastr::error('ERROR!', 'Message', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }
    }


    public function active_settings($id)
    {
        Setting::findOrFail($id)->update(['Status' => 1]);
        Toastr::success('Settings actived successfully!', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.settings.index');
    }


    public function inactive_settings($id)
    {
        Setting::findOrFail($id)->update(['Status' => 0]);
        Toastr::success('Settings deactived successfully!', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.settings.index');
    }


    public function show($id)
    {
        $settings = Setting::findOrFail( $id);
        return view('admin.settings.view', compact('settings'));  
    }


    public function edit($id)
    {
        $edit = Setting::findOrFail($id);
        return view('admin.settings.edit', compact('edit'));
    }


    public function update(UpdateSettingsRequest $request, $id)
    {
        $validData = $request->validated();

        if (!$validData) 
        {
            Toastr::error('* fields are required!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->back();

        }else {
            
            $image=$request->file('Logo');
            
            //update with image
            if ($image) {
    
                //image url set
                $image_name=Str::random(20);
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.".".$ext;
                $upload_path='public/backend_image/Logo/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);

                //remove old image
                $old_image = Setting::findOrFail($id);
                $old_image_path = $old_image->Logo;
                $delete_old_image = unlink($old_image_path);

                //update data
                $data = $request->all();
                $data['Logo']=$image_url;
                $update_with_image = Setting::findOrFail($id)->update($data);

                if ($update_with_image) {
                    Toastr::success('Settings data updated successfully!', 'Message', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('admin.settings.index');
                }else {
                    Toastr::success('ERROR!', 'Message', ["positionClass" => "toast-top-right"]);
                    return back();
                }
             
            //update without image
            } else {

               $data = $request->all();
               $update_without_image = Setting::findOrFail($id)->update($data);

               if ($update_without_image) {
                    Toastr::success('updated without image!', 'Message', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('admin.settings.index');
                }else {
                    Toastr::success('ERROR!', 'Message', ["positionClass" => "toast-top-right"]);
                    return back();
                }

            }

        }
    }


    public function destroy($id)
    {
        $image = Setting::findOrFail($id);
        $photo = $image->Logo;

        if ($photo) {
            unlink($photo);
            Setting::findOrFail($id)->delete();
            Toastr::success('Settings Data deleted successfully!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.settings.index');
        }else {
            Setting::findOrFail($id)->delete();
            Toastr::success('Image deleted successfully!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.settings.index');
        }
    
    }
}
