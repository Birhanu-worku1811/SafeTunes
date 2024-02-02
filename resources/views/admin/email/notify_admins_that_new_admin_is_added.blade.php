<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Admin Added</title>
</head>
<body>
<p>
    Hello {{$admin->name}},
</p>

<p>
    This is to inform you that a new admin has been added to the system.
</p>

<p>
    <strong>New Admin Details:</strong><br>
    Name: {{ $user->name }}<br>
    Email: {{ $user->email }}
</p>

<p>
    Thank you.
</p>
</body>
</html>
