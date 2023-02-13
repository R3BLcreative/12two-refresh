<?php

namespace App\Mail;

use Illuminate\Support\Facades\Lang;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use App\Models\User;

class AdminPasswordReset extends Mailable implements ShouldQueue {
	use Queueable, SerializesModels;

	protected $url;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($url) {
		$this->afterCommit();
		$this->url = $url;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return (new MailMessage)
			->subject(Lang::get('Reset Password Notification'))
			->line(Lang::get('You are receiving this email because we received a password reset request for your account.'))
			->action(Lang::get('Reset Password'), $this->url)
			->line(Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]))
			->line(Lang::get('If you did not request a password reset, no further action is required.'));
	}
}
