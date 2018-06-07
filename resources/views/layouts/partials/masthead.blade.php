 <div class="header" style="display: flex; color: #3a5f95">
 	<div style="flex:1"><a href="{{ route('home') }}"><img class="responsive" style="border:0" src="{{ asset('images/masthead_logo.png') }}" /></a></div>
 	<div id="phonebox" style="flex:1.6"><a href="tel:{{spacetodash(chunk('phone_number',$chunks))}}">{{chunk('phone_number',$chunks)}}</a></div>
 </div>
