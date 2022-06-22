<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    //
    public function index()
    {
        $setting = Setting::find(1);
        return view('admin.setting.index', compact('setting'));
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'websiteName' => 'required|max:255',
            'websiteLogo' => 'required',
            'websiteFavicon' => 'nullable',
            'websiteDescription' => 'nullable',
            'meta_title' => 'required|max:255',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $setting = Setting::where('id', '1')->first();
        if ($setting) {
            $setting = new Setting();
            $setting->website_name = $request->websiteName;

            if ($request->hasfile('websiteLogo')) {
                $destination = 'uploads/settings/' . $setting->websiteLogo;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('websiteLogo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings', $filename);
                $setting->logo = $filename;
            }
            if ($request->hasfile('websiteFavicon')) {
                $destination = 'uploads/settings/' . $setting->websiteFavicon;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('websiteFavicon');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings', $filename);
                $setting->favicon = $filename;
            }
            $setting->favicon = $request->websiteFavicon;
            $setting->description = $request->websiteDescription;
            $setting->meta_title = $request->meta_title;
            $setting->meta_keyword = $request->meta_description;
            $setting->meta_description = $request->meta_keyword;
            $setting->save();
            return redirect('admin/settings')->with('success', 'Settings updated successfully');
        } else {
            $setting = new Setting();
            $setting->website_name = $request->websiteName;

            if ($request->hasfile('websiteLogo')) {
                $file = $request->file('websiteLogo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings', $filename);
                $setting->logo = $filename;
            }
            if ($request->hasfile('websiteFavicon')) {
                $file = $request->file('websiteFavicon');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings', $filename);
                $setting->favicon = $filename;
            }
            $setting->favicon = $request->websiteFavicon;
            $setting->description = $request->websiteDescription;
            $setting->meta_title = $request->meta_title;
            $setting->meta_keyword = $request->meta_description;
            $setting->meta_description = $request->meta_keyword;
            $setting->save();
            return redirect('admin/settings')->with('success', 'Settings added successfully');
        }
    }
}
