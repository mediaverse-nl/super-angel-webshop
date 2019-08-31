<?php

namespace App\Http\Controllers\Auth;

use App\ChargeBack;
use App\Http\Requests\Auth\User\InfoUpdateRequest;
use App\Http\Requests\Auth\User\PasswordUpdateRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user )
    {
        $this->user = $user;
    }

    public function edit()
    {
        return view('auth.user.edit');
    }

    public function password(PasswordUpdateRequest $request)
    {
        $user = $this->user->find(auth()->user()->id);

        $user->password = Hash::make($request->wachtwoord);
        $user->save();

        return redirect()->back();
    }

    public function info(InfoUpdateRequest $request)
    {
        $user = $this->user->find(auth()->user()->id);

        $user->first_name = $request->voornaam;
        $user->phone_nr = $request->telefoon_nr;
        $user->last_name = $request->achternaam;
        $user->country = $request->land;
        $user->city = $request->stad;
        $user->zipcode = $request->postcode;
        $user->street_name = $request->straat;
        $user->street_nr = $request->straat_nr;

        $user->save();

        return redirect()->back();
    }
}

