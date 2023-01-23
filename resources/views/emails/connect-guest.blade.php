<!DOCTYPE html>
<html>

<head>
	<title>Contact Form User Notification Email</title>
</head>

<body>
	<p>Hey {{ $msg->name }},</p>

	<p>Thanks for reaching out! This message is simply a courtesy message to let you know that we have received your contact form submission. One of our admins will be reaching out to you regarding your message within 24-48 hours. Feel free to reply to this message if you have any further questions, or would like to contact us directly in the future.</p>

	<p>The details you submitted on the form are listed below for your reference.</p>

	<ul>
		<li><strong>Name:</strong> {{ $msg->name }}</li>
		<li><strong>Email:</strong> {{ $msg->email }}</li>
		<li><strong>Subject:</strong> {{ $msg->topic }}</li>
	</ul>

	<p>Your submission was received at <strong>{{ date('h:i A', strtotime('now')); }} on {{ date('F d, Y', strtotime('now')) }}</strong>.</p>

	<p>In His grace,<br>
		12Two Missions</p>