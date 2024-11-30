<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(): Response
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->image = base64_encode($user->image);
        }

        return Inertia::render('Admin/Users', [
            'users' => $users
        ]);
    }
}
