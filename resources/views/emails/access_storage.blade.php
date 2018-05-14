<html>

<head>

</head>
<body>

<h1>Access storage enquiry</h1>



<table>
    <tr>
        <td>Name</td><td>{{ $enquiry['firstname'] }}  {{ $enquiry['lastname'] }}</td>
    </tr>
    <tr>
        <td>Email</td><td>{{ $enquiry['email'] }}</td>
    </tr>
    <tr>
        <td>Phone</td><td>{{ $enquiry['phone'] }}</td>
    </tr>
    <tr>
        <td>Access date</td><td>{{ $enquiry['access_date'] }}</td>
    </tr>
    <tr>
        <td>Access time</td><td>{{ $enquiry['access_time'] }}</td>
    </tr>
    <tr>
        <td>Message</td><td>{{ $enquiry['message'] }}</td>
    </tr>
    <tr>
        <td>Acknowledge no-show fee</td><td>{{ $enquiry['acknowledge_noshow_fee'] }}</td>
    </tr>
    <tr>
        <td>Acknowledge security ID required</td><td>{{ $enquiry['acknowledge_security_id_required'] }}</td>
    </tr>
</table>

</body>
</html>