<!DOCTYPE html>
<html>

<head>
    <title>Event Registration Confirmation</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6;">

    <h2 style="color: #2c3e50;">Thank you for registering!</h2>

    <p>Hi {{ auth()->user()->name ?? "" }},</p>

    <p>You have successfully registered for the following event:</p>

    <table style="border-collapse: collapse; width: 100%; margin-top: 10px;">
        <tr>
            <td style="padding: 8px;"><strong>Title:</strong></td>
            <td style="padding: 8px;">{{ $event->title }}</td>
        </tr>
        <tr>
            <td style="padding: 8px;"><strong>Location:</strong></td>
            <td style="padding: 8px;">{{ $event->location }}</td>
        </tr>
        <tr>
            <td style="padding: 8px;"><strong>Start Date:</strong></td>
            <td style="padding: 8px;">{{ $event->start_date }}</td>
        </tr>
        <tr>
            <td style="padding: 8px;"><strong>End Date:</strong></td>
            <td style="padding: 8px;">{{ $event->end_date }}</td>
        </tr>
    </table>

    @if ($event->banner_image)
        <p style="margin-top: 20px;"><strong>Event Banner:</strong></p>
        <img src="{{ asset('storage/' . $event->banner_image) }}" alt="Event Banner" style="max-width: 300px;">
    @endif

    <p style="margin-top: 20px;">We look forward to seeing you at the event!</p>

    <p style="color: #7f8c8d;">Regards,<br>Event Management Team</p>

</body>

</html>
