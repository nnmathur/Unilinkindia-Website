<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable {
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public $sub;
	public $mssg;

	public function __construct($subject, $msg) {
		$this->sub = $subject;
		$this->mssg = $msg;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		$e_subject = $this->sub;
		$e_message = $this->mssg;

		return $this->view('mail.mailnotify', compact("e_message"))->subject($e_subject);
	}
}
