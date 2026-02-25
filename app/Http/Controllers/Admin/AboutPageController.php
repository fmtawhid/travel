<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function edit()
    {
        $aboutPage = AboutPage::first() ?? new AboutPage();
        return view('admin.pages.about', compact('aboutPage'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'remove_image' => 'nullable|boolean',
            'services' => 'nullable|array',
            'services.*.icon' => 'required_with:services|string',
            'services.*.title' => 'required_with:services|string',
            'services.*.description' => 'required_with:services|string',
        ]);

        // Clean services array
        if (isset($validated['services'])) {
            $validated['services'] = array_filter($validated['services'], function ($item) {
                return !empty($item['icon']) || !empty($item['title']) || !empty($item['description']);
            });
            $validated['services'] = array_values($validated['services']);
        }

        $aboutPage = AboutPage::first();
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($aboutPage && $aboutPage->image && file_exists(public_path($aboutPage->image))) {
                @unlink(public_path($aboutPage->image));
            }
            
            $file = $request->file('image');
            $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $path = $file->storeAs('uploads/about-page', $filename, 'public');
            $validated['image'] = 'storage/' . $path;
        } elseif ($request->has('remove_image') && $aboutPage) {
            // Delete image if remove checkbox is checked
            if ($aboutPage->image && file_exists(public_path($aboutPage->image))) {
                @unlink(public_path($aboutPage->image));
            }
            $validated['image'] = null;
        }

        if ($aboutPage) {
            $aboutPage->update($validated);
        } else {
            AboutPage::create($validated);
        }

        return redirect()->back()->with('success', 'About Page updated successfully!');
    }
}
