<html>

<head>

</head>
<body>

<h1>Return storage enquiry</h1>



<table>
    <tr>
        <td>Return option</td><td>{{ $enquiry['return_option'] }}</td>
    </tr>
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
        <td>Preferred date</td><td>{{ date('d-m-Y',strotime($enquiry['return_date'])) }}</td>
    </tr>

    <tr>
        <td>Address</td><td>{{ $enquiry['address'] }}</td>
    </tr>
    <tr>
        <td>Message</td><td>{{ $enquiry['message'] }}</td>
    </tr>
    
</table>

</body>
</html>