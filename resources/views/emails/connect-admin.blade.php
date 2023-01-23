<!DOCTYPE html>
<html>

<head>
	<title>Contact Form Admin Notification Email</title>
</head>

<body>
	<p>Hey 12Two Admin,</p>

	<p>This is an automated message sent from the 12TwoMissions.com. A new contact form submission has been submitted at <strong>{{ date('h:i A', strtotime('now')); }} on {{ date('F d, Y', strtotime('now')) }}</strong>.</p>

	<p>The details of their submission are listed below for your reference. Please be sure to respond to them within 24-48 hours. <strong>Simply reply to this email to send them a response.</strong></p>

	<ul>
		<li><strong>Name:</strong> {{ $msg->name }}</li>
		<li><strong>Email:</strong> <a href="mailto:{{ $msg->email }}?subject=Regarding your 12Two Missions contact form submission">{{ $msg->email }}</a></li>
		<li><strong>Topic:</strong> {{ $msg->topic }}</li>
	</ul>
</body>

</html>