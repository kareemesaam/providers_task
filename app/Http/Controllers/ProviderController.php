<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = User::isProvider()->paginate();
        return view('providers.index', compact('providers'));
    }

    public function create()
    {
        return view('providers.create');
    }

    public function store(ProviderRequest $request)
    {
        $user = User::create($request->safe()->only(['name', 'email','user_name']) + ['password' => Hash::make($request->password)]);
        return redirect()->route('providers.index')->with('success', 'Provider added successfully');
    }
}
