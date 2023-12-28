<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke()
    {
        \Auth::login(User::inRandomOrder()->first(), true);

        return redirect()->route('chat');
    }
}
