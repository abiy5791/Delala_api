<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);
        
        $avatar = $request->file('avatar');
        $avatar_full_name = md5(rand(1000, 10000)) . '.' . strtolower($avatar->getClientOriginalExtension());
        $upload_path = 'uploads/avatar/';
        $avatar->move($upload_path, $avatar_full_name);
        $avatar_url = $upload_path . $avatar_full_name;

        $kebelleId = $request->file('kebelleId');
        $kebelleId_full_name = md5(rand(1000, 10000)) . '.' . strtolower($kebelleId->getClientOriginalExtension());
        $upload_path = 'uploads/identification/';
        $kebelleId->move($upload_path, $kebelleId_full_name);
        $kebelleId_url = $upload_path . $kebelleId_full_name;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'delala',
            'status' => 0,
            'password' => Hash::make($request->password),
            'avatar' => $avatar_url,
            'kebelleId' => $kebelleId_url,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        event(new Registered($user));



        return response()->noContent();
    }
}