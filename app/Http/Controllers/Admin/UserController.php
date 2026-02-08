<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6|confirmed',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'name'       => $request->first_name.' '.$request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'city'       => $request->city,
            'country'    => $request->country,
            'role'       => 'user',
            'password'   => Hash::make($request->password),
        ]);

        // ✅ Redirect to index with success message
        return redirect()->route('admin.users.index')
                        ->with('success', 'User added successfully!');
    }

    // ✅ SHOW
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    // ✅ EDIT
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // UPDATE
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required',
            'email'      => 'required|email|unique:users,email,' . $user->id,
        ]);

        $data = [
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'name'       => $request->first_name.' '.$request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'city'       => $request->city,
            'country'    => $request->country,
        ];

        // যদি password দেওয়া হয়, আপডেট কর
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'confirmed|min:6',
            ]);
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        // ✅ Redirect to index with success message
        return redirect()->route('admin.users.index')
                        ->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')
                        ->with('success', 'User deleted successfully!');
    }
} 
