@extends('layouts.admin')

@section('content')

@if($cartageType == 'diy_removal')
	<h1>Cartage DIY Removal Fee Manager</h1>
	<form method="post" action="{{ route('admin.cartage.removal.update') }}">
@else
	<h1>Cartage Storage Return Fee Manager</h1>
	<form method="post" action="{{ route('admin.cartage.return.update') }}">
@endif

	{{ csrf_field() }}
<table>
	<thead>
		<tr>
			<th>Number of Modules</th>
			<th>Cost per module($)</th>


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
@endsection
