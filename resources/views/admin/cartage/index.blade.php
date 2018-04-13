@extends('layouts.admin')

@section('content')

@if($cartageType == 'diy_removal')
	<h1>Base DIY Removal Fee</h1>
	<form method="post" action="{{ route('admin.cartage.removal.update') }}">
@else
	<h1>Base Return Fee</h1>
	<form method="post" action="{{ route('admin.cartage.return.update') }}">
@endif

	{{ csrf_field() }}
<table>
	<thead>
		<tr>
			<th>Number of Modules</th>
			<th>Base return per module($)</th>
			

		</tr>
	</thead>
	<tbody>
		<tr><td colspan="2" align="center"><i>New entry</i></td></tr>
		<tr>
			<td>
				<input name="cartage[0][module_count]" value=""/>
			</td>



			<td>
				<input name="cartage[0][cost_per_module]" value=""/>
			</td>

			
		</tr>
		<tr><td colspan="2">&nbsp;</td></tr>
		<tr><td colspan="2" align="center"><i>Current entries</i><br /><i>Clear the module number and save to delete an entry</i></td></tr>
	@foreach($options as $opt)
		<tr>
			<td>
				<input name="cartage[{{$opt->id}}][module_count]" value="{{$opt->module_count}}"/>
			</td>

			<td>
				<input name="cartage[{{$opt->id}}][cost_per_module]" value="{{$opt->cost_per_module}}"/>
			</td>

			


		</tr>

	@endforeach
</tbody>
</table>

<button class="btn btn-primary" type="submit" style="margin-top:40px">Save</button>
</form>

@if($cartageType == 'diy_removal')
<p><strong>Note</strong></p>
<p>The DIY Removal Fee per module is calculated as follows:<br />
	(Base DIY Removal fee + delivery suburb premium + return suburb premium)
</p>
<p>EG -DIY Removal fee (per module) for the following:<br />
		1 Module moved from Warragul to Frankston. (220+30+40=$290)<br />
		3 Modules moved from Warragul to Frankston. (140+30+40=$210) per module = $630 in total<br />
</p>

@else
<p><strong>Note</strong></p>
<p>The Return Fee per module (at the end of storage) is calculated as follows:<br />
	(Base return fee + delivery suburb premium + return suburb premium)
</p>
<p>EG -Return fee (per module) for the following:<br />
		1 storage module picked up in Warragul and returned to Frankston. (98+30+40=$168)<br />
		3 storage modules picked up in Warragul and returned to Frankston. (69+30+40=$139) per module<br />
</p>
	
@endif

@endsection
