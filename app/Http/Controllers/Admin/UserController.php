<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->orderByDesc('id')
            ->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => ['required', 'in:user,admin'],
        ]);

        $user->update([
            'role' => $validated['role'],
        ]);

        return back()->with('success', 'تم تحديث صلاحية المستخدم بنجاح.');
    }

    public function destroy(Request $request, User $user)
    {
        if ($request->user()->is($user)) {
            return back()->withErrors(['user' => 'لا يمكنك حذف حسابك.']);
        }

        $user->delete();

        return back()->with('success', 'تم حذف المستخدم بنجاح.');
    }
}
