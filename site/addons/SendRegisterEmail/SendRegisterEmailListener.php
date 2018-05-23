<?php

namespace Statamic\Addons\SendRegisterEmail;

use Statamic\Extend\Listener;

class SendRegisterEmailListener extends Listener
{
    /**
     * The events to be listened for, and the methods to call.
     *
     * @var array
     */
    public $events = ['user.registered' => 'handle'];

    public function handle($user){
    	$email = \Statamic\API\Email::create();
    	$vars = [
		  'email' => $user->email,
		  'url' => 'http://e-sides.eu/',
		];
		$email->to($user->email)->subject('Welcome to e-Sides')->with($vars)->template('register-email');
		$email->send();
    }
}
