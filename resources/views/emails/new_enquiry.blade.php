<html>

<head>

</head>
<body>

<h1>New Enquiry Received</h1>


<p>CONTACT DATA</p>
<table>
    @php
    foreach($enquiry['contact_data'] as $k =>$v){
        echo '<tr><td>'.$k.'</td><td>'.$v.'</td></tr>';
    }
    @endphp
</table>

<p>CART DATA</p>
<table>      
@php
foreach($enquiry['cart'] as $k =>$v){
    if(is_array($v) && count($v) > 0){
        echo '<tr><td>Products</td><td></td></tr>';
        foreach($v as $pk =>$pf){
            if(is_array($pf) && count($pf) >0 ){
                foreach($pf as $kk=>$vv)
                echo '<tr><td>'.$kk.'</td><td>'.$vv.'</td></tr>';
            }
            
        }
    } elseif (! is_array($v)) {
        echo '<tr><td>'.$k.'</td><td>'.$v.'</td></tr>';
    }
    
}
@endphp
</table>


<p>COSTS DATA</p>
<table>
@php
foreach($enquiry['cost'] as $k =>$v){
    echo '<tr><td>'.$k.'</td><td>'.$v.'</td></tr>';
}
@endphp
</table>


<p>PREMIUMS DATA</p>
<table>
@php
foreach($enquiry['premiums'] as $k =>$v){
    echo '<tr><td>'.$k.'</td><td>'.$v.'</td></tr>';
}
@endphp
</table>

<p>MISC DATA</p>
<table>
    <tr><td>Service:</td><td>{{ $enquiry['service'] }}</td></tr>
    <tr><td>Removal fee:</td><td>{{ $enquiry['removal_fee'] }}</td></tr>
    <tr><td>Interest in PrePaying:</td><td>{{ $enquiry['prepayment_interest'] }}</td></tr>
</table>



</body>
</html>

