<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repository\Interface\IUserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    protected $user;

    public function __construct(IUserRepository $user)
    {
        $this->user = $user;
    }

    public function VerifyEmail($token = null)
    {
    	if($token == null) {
    		session()->flash('message', 'Invalid Login attempt');
    		return redirect()->route('login');

    	}

       $user = User::where('remember_token',$token)->first();
       if($user == null )
       {
       	  session()->flash('message', 'Invalid Login attempt');
          return redirect()->route('login');
       }

       $user->update([
          'email_verified_at' => Carbon::now(),
          'remember_token' => ''

       ]);
       
       session()->flash('message', 'Your account is activated, you can log in now');
       return redirect()->route('login');
    }
}
