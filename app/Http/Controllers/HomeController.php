<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\User;

class HomeController extends Controller
{
    public function welcome()
    {
        $providers = User::isProvider()->paginate();
        return view('welcome',compact('providers'));
    }
    public function index()
    {
        $user = auth()->user();
        if ($user->is_admin) {
            return redirect()->route('providers.index');
        } else {
            return redirect()->route('locations.index');
        }
        abort(404);
    }

    public function domain(User $provider)
    {
        $provider->load(['locations']);
        return view('domain.index', compact('provider'));
    }
}
