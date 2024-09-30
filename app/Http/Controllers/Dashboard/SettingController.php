<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        // dd($settings);
        return view('dashboard.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = Setting::first();
        $data = $request->validate([
            'site_title' => 'required',
            'description' => 'nullable',
            'keywords' => 'nullable',
            'header_ads' => 'nullable',
            'footer_ads' => 'nullable',
            'single_ads' => 'nullable',
            'site_logo' => 'nullable|mimes:png,jpg,jpeg,svg,webp|max:2048',
            'site_favicon' => 'nullable|mimes:png,jpg,jpeg,svg,webp|max:2048',
        ]);

        if ($request->hasFile('site_logo')) {
            $image = $request->file('site_logo');
            $imageName = hexdec(uniqid('')) . '.' . $image->getClientOriginalExtension();

            $imagePath = $image->storeAs('settings', $imageName, 'public');

            $data["site_logo"] = $imagePath;
        }
        if ($request->hasFile('site_favicon')) {
            $image = $request->file('site_favicon');
            $imageName = hexdec(uniqid('')) . '.' . $image->getClientOriginalExtension();

            $imagePath = $image->storeAs('settings', $imageName, 'public');

            $data["site_favicon"] = $imagePath;
        }

        $settings->update($data);

        return redirect()->back()->with('success', 'Settings updated successfully');
    }
}
