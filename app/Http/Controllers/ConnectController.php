<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Connection;
use App\Mail\ConnectGuest;
use App\Mail\ConnectAdmin;

class ConnectController extends Controller {
	public function store(Request $request) {
		$request->validateWithBag(
			'connect',
			[
				'name'			=> 'required|string',
				'email'			=> 'required|email:rfc,dns',
				'cemail'		=> 'required|same:email',
				'topic'			=> 'required'
			],
			[
				'required'			=> 'This field is required.',
				'cemail.same'		=> 'The email fields do not match.'
			]
		);

		// Store request in DB
		$msg = Connection::create([
			'name'		=> $request->name,
			'email'		=> $request->email,
			'topic'		=> $request->topic,
		]);

		// Send notification email to admin
		Mail::to('admin@12twomissions.com')->send(new ConnectAdmin($msg));

		// Send notification email to user
		Mail::to($msg->email)->send(new ConnectGuest($msg));

		// Return with success message
		$message = "SUCCESS! We have recieved your message and one of our admins will be getting back to you in 24-48 hours. Check your inbox for a copy of the message you just sent us.";

		return redirect(route($request->input('route')) . '#connect')->with('message', $message);
	}
}
