<?php

namespace App\Http\Controllers;

use Spatie\Newsletter\Facades\Newsletter;
use Illuminate\Http\Request;

class SubscribeController extends Controller {

	public function subscribe(Request $request) {
		$request->validate(
			[
				'fname'			=> 'required|string',
				'lname'			=> 'required|string',
				'email'			=> 'required|email:rfc,dns',
				'cemail'		=> 'required|same:email',
			],
			[
				'required'			=> 'This field is required.',
				'cemail.same'		=> 'The email fields do not match.'
			]
		);

		Newsletter::subscribeOrUpdate($request->input('email'), ['FNAME' => $request->input('fname'), 'LNAME' => $request->input('lname')]);

		$message = "SUCCESS! Thanks for supporting us. Check your inbox for a welcome email.";

		return redirect(route($request->input('route')))->with('message', $message);
	}
}