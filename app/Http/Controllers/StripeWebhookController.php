<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeWebhookController extends Controller {
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request) {
		$endpoint_secret = env('STRIPE_WHSEC');

		$payload = @file_get_contents('php://input');
		$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
		$event = null;

		try {
			$event = \Stripe\Webhook::constructEvent(
				$payload,
				$sig_header,
				$endpoint_secret
			);
		} catch (\UnexpectedValueException $e) {
			// Invalid payload
			http_response_code(400);
			exit();
		} catch (\Stripe\Exception\SignatureVerificationException $e) {
			// Invalid signature
			http_response_code(400);
			exit();
		}

		// Handle the event
		switch ($event->type) {
			case 'payment_intent.succeeded':
				$pi_id = $event->data->object->id;

				// $order = Order::with('items')->select('id')->where('stripe_pi_id', $pi_id)->first();
				// Order::where('id', $order->id)->update(['status' => 'success']);

				// Loop through line items an increment units_purchased
				// foreach ($order->items as $item) {
				// 	$item_id = $item->item_id;
				// 	$qty = $item->item_qty;
				// 	Registry::where('id', $item_id)->increment('units_purchased', $qty);
				// }
				break;
			case 'payment_intent.payment_failed':
				$pi_id = $event->data->object->id;

				// Order::where('stripe_pi_id', $pi_id)->update(['status' => 'failed']);
				break;
			case 'payment_intent.canceled':
				$pi_id = $event->data->object->id;

				// Order::where('stripe_pi_id', $pi_id)->update(['status' => 'canceled']);
				break;
			default:
				echo 'Received an unknown or uneeded event type ' . $event->type;
		}

		http_response_code(200);
	}

	/**
	 * Handle testing of the above webhook ep.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function test(Request $request) {
		$pi_id = 'pi_3LT4DpLpZwou0dPR1UMiaeLs';

		// $order = Order::with('items')->select('id')->where('stripe_pi_id', $pi_id)->first();

		// if ($order !== null) {
		// 	Order::where('id', $order->id)->update(['status' => 'success']);

		// 	// Loop through line items an increment units_purchased
		// 	foreach ($order->items as $item) {
		// 		$item_id = $item->item_id;
		// 		$qty = $item->item_qty;
		// 		Registry::where('id', $item_id)->increment('units_purchased', $qty);
		// 	}
		// }

		return view('webhook')->with('message', 'Testing');
	}
}
