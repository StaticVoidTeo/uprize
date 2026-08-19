<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New contact message</title>
</head>
<body>
    <h1>New contact message</h1>
    <p><strong>Name:</strong> {{ $contact['firstname'] }} {{ $contact['lastname'] }}</p>
    <p><strong>Email:</strong> {{ $contact['email'] }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $contact['message'] }}</p>
</body>
</html>
