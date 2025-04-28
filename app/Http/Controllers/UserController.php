<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(string $id): View
    {
        return View('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }
}
