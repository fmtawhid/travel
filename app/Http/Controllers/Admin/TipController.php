<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tip;
use Illuminate\Http\Request;

class TipController extends Controller
{
    // Edit Page
    public function edit()
    {
        $tip = Tip::first();

        if (!$tip) {
            $tip = Tip::create([]);
        }

        return view('admin.pages.tips', compact('tip'));
    }

    // Update
    public function update(Request $request)
    {
        $tip = Tip::first();

        $request->validate([
            'title'       => 'nullable|string|max:255',
            'subtitle'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'phone'       => 'nullable|string|max:20',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
        ]);

        $data = $request->except(['image']);

        // Handle Tips Array (dynamic fields)
        $tips = [];
        if ($request->has('tips')) {
            foreach ($request->tips as $tipData) {
                if (!empty($tipData['title'])) {
                    $tips[] = [
                        'icon' => $tipData['icon'] ?? '',
                        'title' => $tipData['title'],
                        'description' => $tipData['description'] ?? '',
                    ];
                }
            }
        }
        $data['tips'] = !empty($tips) ? $tips : null;

        // Image Upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($tip->image && file_exists(public_path($tip->image))) {
                unlink(public_path($tip->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/pages'), $imageName);
            $data['image'] = 'uploads/pages/' . $imageName;
        }

        // Delete Image if checkbox is checked
        if ($request->has('remove_image')) {
            if ($tip->image && file_exists(public_path($tip->image))) {
                unlink(public_path($tip->image));
            }
            $data['image'] = null;
        }

        $tip->update($data);

        return back()->with('success', 'Tips Page Updated Successfully');
    }
}
