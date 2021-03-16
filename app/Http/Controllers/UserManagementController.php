<?php

namespace App\Http\Controllers;

use App\Models\PackageChangeRequest;
use App\Models\User;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;


class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user-management.index',[ "users" => $users ]);
    }

    public function create(Request $request)
    {
        Log::channel('stderr')->info($request->session()->all());
        return view('user-management.create');
    }

    public function store(Request $request)
    {
        $user_data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user_data['is_admin'] = $request->input('is_admin',0) === 'true' ? 1 : 0;

        $user = new User;
        $user->name = $user_data['name'];
        $user->email = $user_data['email'];
        $user->password = $user_data['password'];
        $user->is_admin = $user_data['is_admin'];


        $user->save();

        return  redirect()->route('admin.user-list');
    }

    public function packageChangeRequests(Request $request)
    {
        $change_requests =  PackageChangeRequest::where('is_active',true)->get();
        return  view('user-management.package-change-requests',[ "change_requests" => $change_requests  ]);
    }
}
