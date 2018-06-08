@extends('layouts.admin')

@section('content')
<h1>Locations Manager</h1>



<form method="post" action="">
	{{ csrf_field() }}
	<button class="btn btn-primary" type="submit" style="margin-top:40px">Save</button>
<table>
	<thead>
		<tr>
			<th>Suburb</th>
			<th>Postcode</th>
			<th>Premium ($)</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<input name="locations[0][suburb]" value=""/>
			</td>

			<td>
				<input name="locations[0][postcode]" value=""/>
			</td>

			<td>
				<input name="locations[0][service_premium]" value=""/>
			</td>
		</tr>
	@foreach($locations as $loc)
		<tr>
			<td>
				<input name="locations[{{$loc->id}}][suburb]" value="{{$loc->suburb}}"/>
			</td>

			<td>
				<input name="locations[{{$loc->id}}][postcode]" value="{{$loc->postcode}}"/>
			</td>

			<td>
				<input name="locations[{{$loc->id}}][service_premium]" value="{{$loc->service_premium}}"/>
			</td>
		</tr>

	@endforeach
</tbody>
</table>

<button class="btn btn-primary" type="submit" style="margin-top:40px">Save</button>
</form>
@endsection
