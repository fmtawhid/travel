<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->paginate(10);
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only('name');

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/packages'), $filename);
            $data['image'] = $filename;
        }

        $package = Package::create($data);

        // Send notification to all users
        NotificationService::notifyAllUsers(
            'New Package Type Available! 📦',
            'A new package type "' . $package->name . '" has been added. Explore amazing tours now!',
            route('packages'),
            $package->image ? 'uploads/packages/' . $package->image : null
        );

        return redirect()->route('admin.packages.index')
            ->with('success', 'Package created successfully!');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only('name');

        // Handle image upload
        if ($request->hasFile('image')) {

            // Delete old image
            if ($package->image && file_exists(public_path('uploads/packages/' . $package->image))) {
                unlink(public_path('uploads/packages/' . $package->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/packages'), $filename);
            $data['image'] = $filename;
        }

        $package->update($data);

        return redirect()->route('admin.packages.index')
            ->with('success', 'Package updated successfully!');
    }

    public function destroy(Package $package)
    {
        if ($package->image && file_exists(public_path('uploads/packages/' . $package->image))) {
            unlink(public_path('uploads/packages/' . $package->image));
        }

        $package->delete();

        return redirect()->route('admin.packages.index')
            ->with('success', 'Package deleted successfully!');
    }
}
