<html>

<head>

</head>
<body>

<h1>New ({{ $enquiry['service'] }}) enquiry </h1>


<p style="font-weight: bold; font-size:14pt">Contact details</p>
<table>
   <tr><td>Firstname:</td><td>{{ $enquiry['contact_data']['firstname']}}</td></tr>
   <tr><td>Lastname:</td><td>{{ $enquiry['contact_data']['lastname']}}</td></tr>
   <tr><td>Address:</td><td>{{ $enquiry['contact_data']['address']}}</td></tr>
   <tr><td>Suburb:</td><td>{{ $enquiry['contact_data']['suburb']}}</td></tr>
   <tr><td>Postcode:</td><td>{{ $enquiry['contact_data']['postcode']}}</td></tr>
   <tr><td>State:</td><td>{{ $enquiry['contact_data']['state']}}</td></tr>
   <tr><td>Email:</td><td>{{ $enquiry['contact_data']['email']}}</td></tr>
   <tr><td>Phone:</td><td>{{ $enquiry['contact_data']['phone']}}</td></tr>
</table>

<table>
    <tr><td>Preferred date:</td><td>{{ date('d-m-Y', strtotime($enquiry['contact_data']['module_delivery_date']))}}</td></tr>
    <tr><td>How did you hear about us:</td><td>{{ $enquiry['contact_data']['howhear']}}</td></tr>
    <tr><td>Interest in PrePaying:</td><td>{{ $enquiry['prepayment_interest'] > 0 ? 'Yes' : 'No' }}</td></tr>
    <tr><td>Comments:</td><td>{{ $enquiry['contact_data']['comments']}}</td></tr>
</table>

<p style="font-weight: bold; font-size:14pt">Products</p>
<table width="600"> 
    <tr>
        <th width="40">Qty</th>
        <th>Name / Description</th>
        <th width="90" align="left">Price</th>
        <th width="90" align="left">Ext price ($)</th>
    </tr>     
@foreach($enquiry['products'] as $p)  
        <tr>
            <td>{{ $p['qty_ordered'] }}</td>
            <td>{{ $p['name'] }} / {{ $p['description'] }}</td>
            <td>{{ $p['price'] }}</td>
            <td>{{ $p['ext_price'] }}</td>
        </tr> 
@endforeach
</table>


<p style="font-weight: bold; font-size:14pt">Costs summary</p>
<table>
    <tr><td>Weekly($):</td><td>{{ $enquiry['costs']['weekly']}}</td></tr>
    <tr><td>Fixed($):</td><td>{{ $enquiry['costs']['fixed']}}</td></tr>
</table>


<p style="font-weight: bold; font-size:14pt">Service locations and premiums</p>
<table>
        <tr><td>Pickup location:</td><td>{{ $enquiry['pickup_location']->suburb }} </td></tr>
        <tr><td>Return location:</td><td>{{ $enquiry['return_location']->suburb }} </td></tr>
        <tr><td>Pickup($):</td><td>{{ $enquiry['premiums']['pickup']}}</td></tr>
        <tr><td>Return($):</td><td>{{ $enquiry['premiums']['return']}}</td></tr>
</table>

@if($enquiry['service'] =='removal')
<p style="font-weight: bold; font-size:14pt">Removal extras</p>
<table>   
    <tr><td>DIY Removal fee($):</td><td>{{ $enquiry['removal_fee'] }}</td></tr> 
</table>
@endif

</body>
</html>