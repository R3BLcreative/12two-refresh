<?php

namespace App\Http\Controllers;

use NumberFormatter;
use Illuminate\Http\Request;
use App\Models\Donate;

class DonateController extends Controller {
	public function store(Request $request) {
		$request->validateWithBag(
			'donate',
			[
				'fname'			=> 'required|string',
				'lname'			=> 'required|string',
				'email'			=> 'required|email|confirmed',
			]
		);

		// Setup Stripe API call here
		$fmt = new NumberFormatter('en-US', NumberFormatter::CURRENCY);
		$donation = $fmt->parseCurrency($request->amount, $curr);
		$fee = $fmt->parseCurrency($request->ccfee, $curr);
		$prodDonate = option('prod_donation');
		$prodFee = option('prod_fee');

		$line_items = [];
		// donation
		$line_items[] = [
			'price_data' => [
				'currency' => 'usd',
				'product' => $prodDonate,
				'unit_amount' => $donation * 100,
			],
			'quantity' => 1,
		];

		// fee
		if ($request->addFee == 'yes') {
			$line_items[] = [
				'price_data' => [
					'currency' => 'usd',
					'product' => $prodFee,
					'unit_amount' => $fee * 100,
				],
				'quantity' => 1,
			];
		}

		// Setup Stripe API call here
		\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
		$checkout_session = \Stripe\Checkout\Session::create([
			'line_items'			=> [$line_items],
			'mode'						=> 'payment',
			'currency'				=> 'usd',
			'customer_email'	=> $request->email,
			'success_url'			=> route('thanks'),
			'cancel_url'			=> route('donate'),
			'billing_address_collection' => 'required',
			'submit_type'			=> 'donate',
			'automatic_tax'		=> [
				'enabled'		=> false,
			]
		]);

		return redirect($checkout_session->url);
	}
}
