<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // Edit Page
    public function edit()
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = Setting::create([]);
        }

        return view('admin.settings.edit', compact('setting'));
    }

    // Update
    public function update(Request $request)
    {
        $setting = Setting::first();

        $request->validate([
            'name'      => 'nullable|string|max:255',
            'logo'      => 'nullable|image|mimes:jpg,jpeg,png,webp,svg,ico|max:2048',
            'favicon'   => 'nullable|image|mimes:jpg,jpeg,png,ico|max:1024',
            'phone'     => 'nullable|string|max:50',
            'email'     => 'nullable|email|max:255',
            'location'  => 'nullable|string|max:255',
            'facebook'  => 'nullable|url',
            'instagram' => 'nullable|url',
            'x'         => 'nullable|url',
            'linkedin'  => 'nullable|url',
            'youtube'   => 'nullable|url',
        ]);

        $data = $request->except(['logo', 'favicon']);

        // Logo Upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time().'_logo.'.$logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/settings'), $logoName);
            $data['logo'] = $logoName;
        }

        // Favicon Upload
        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $faviconName = time().'_favicon.'.$favicon->getClientOriginalExtension();
            $favicon->move(public_path('uploads/settings'), $faviconName);
            $data['favicon'] = $faviconName;
        }

        $setting->update($data);

        return back()->with('success', 'Settings Updated Successfully');
    }
}
