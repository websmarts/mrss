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

    @if($enquiry['service'] =='storage')
        <tr><td>Interest in PrePaying:</td><td>{{ $enquiry['prepayment_interest'] > 0 ? 'Yes' : 'No' }}</td></tr>
    @endif

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
            <td>{{ number_format($p['price'],2) }}</td>
            <td>{{ number_format($p['ext_price'],2) }}</td>
        </tr> 
@endforeach
</table>

@if($enquiry['service'] =='storage')
    <p style="font-weight: bold; font-size:14pt">Costs summary</p>
    <table>
        <tr><td>Weekly($):</td><td>{{ number_format($enquiry['costs']['weekly'],2) }}</td></tr>
        <tr><td>Fixed($):</td><td>{{ number_format($enquiry['costs']['fixed'],2) }}</td></tr>
    </table>
@endif
@if($enquiry['service'] =='removal')
    <p style="font-weight: bold; font-size:14pt">Costs summary</p>
    <table>
        <tr><td>DIY Removal Fee($):</td><td>{{  number_format($enquiry['removal_fee'],2) }}</td></tr>
        <tr><td>Fixed($):</td><td>{{ number_format($enquiry['costs']['fixed'],2) }}</td></tr>
    </table>
@endif



<p style="font-weight: bold; font-size:14pt">Service locations</p>
<table>
        <tr><td>Pickup location:</td><td>{{ $enquiry['pickup_location']->suburb }} </td></tr>
        <tr><td>Return location:</td><td>{{ $enquiry['return_location']->suburb }} </td></tr>
        @if($enquiry['service'] =='storage')
            <tr><td>Pickup($):</td><td>{{ number_format($enquiry['premiums']['pickup'],2) }}</td></tr>
            <tr><td>Return($):</td><td>{{ number_formayt($enquiry['premiums']['return'],2) }}</td></tr>
        @endif
</table>

@if(0 && $enquiry['service'] =='removal')
<p style="font-weight: bold; font-size:14pt">Removal extras</p>
<table>   
    <tr><td>DIY Removal fee($):</td><td>{{ number_format($enquiry['removal_fee'],2) }}</td></tr> 
</table>
@endif

</body>
</html>