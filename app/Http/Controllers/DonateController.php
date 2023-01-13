<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonateController extends Controller {
	public function store(Request $request) {
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

		// Setup Stripe API call here

		$message = "SUCCESS! Thanks for supporting us.";

		return redirect(route($request->input('route')))->with('message', $message);
	}
}
