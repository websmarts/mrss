<html>

<head>

</head>
<body>

<h1>Message-us enquiry</h1>


<p>Add enquiry details</p>
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
        <td>Message</td><td>{{ $enquiry['message'] }}</td>
    </tr>
</table>

</body>
</html>