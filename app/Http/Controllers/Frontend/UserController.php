<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\User;

class UserController extends Controller
{
    /**
    * Redirect the user to the Google authentication page.
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        // dd($user);

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect('/home')->with('status','Selamat Datang di Steam Motor Kami');
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }else{
            $data = User::create([
                'name'     => $user->name,
                'email'    => !empty($user->email)? $user->email : '' ,
                'provider' => $provider,
                'provider_id' => $user->id
            ]);
            return $data;
        }
    }
}
