<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\SocialIdentity;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function redirectToProvider($provider)
    {
      return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
      try {
          $user = Socialite::driver($provider)->user();
      } catch (Exception $e) {
          return redirect('/login');
      }

      return $authUser = $this->findOrCreateUser($user, $provider);
      Auth::login($authUser, true);
      return redirect($this->redirectTo);
    }


    public function findOrCreateUser($user, $provider)
    {
        $account = SocialIdentity::whereProviderName($provider)
                  ->whereProviderId($user->getId())
                  ->first();

        if($account)
        {
            return $account->user;
        } 
        else 
        {
            $db_user = User::whereEmail($user->getEmail())->first();

            if(!$db_user) 
            {
                $db_user = User::create([
                    'email' => $user->getEmail(),
                    'name'  => $user->getName(),
                    'username' => $provider.'_user'.uniqid(),
                    'password' => Hash::make(uniqid())
                ]);
            }

            $db_user->identities()->create([
                'provider_id'   => $user->getId(),
                'provider_name' => $provider,
            ]);

            return $db_user;
        }
    }
}
