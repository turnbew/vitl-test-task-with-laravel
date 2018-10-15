<!-- Display details -->
<div class="hit_details">
	@php
		if ( $data['pagination']['all_records']  > 0 ) { 
			$shownMin = (($data['pagination']['page'] - 1) * $data['pagination']['limit'] + 1);
			$shownMax = $data['pagination']['page'] * $data['pagination']['limit'];
			if ($shownMax > $data['pagination']['all_records']) $shownMax = $data['pagination']['all_records'];
		}
		else {
			$shownMin = $shownMax = 0;
		}
	@endphp
	<p>All hits: {{ $data['pagination']['all_records'] }} records</p>				
	<p>Shown: {{ $shownMin }} - {{ $shownMax }}</p>
</div>

<!-- Pagination -->
@include('pages._page_parts.pagination', ['pagination' => $data['pagination']])

<!-- Display result -->
<div class="hitlist col-md-6 col-md-offset-3">					
@if ($data['pagination']['all_records'] > 0)					
	<table class="table table-responsive table-striped text-left">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Counter</th>
				<th scope="col">First name</th>
				<th scope="col">Last name</th>
				<th scope="col">Unique ID</th>
			</tr>	
		</thead>
		<tbody>
		@php 
			$counter = $data['pagination']['offset'];
		@endphp	
		@foreach($data['names'] as $name)
		@php 
			$counter++;
		@endphp				
			<tr>
				<td> {{ $counter }}</td>
				<td> {{ $name->first_name }}</td>
				<td> {{ $name->last_name }}</td>
				<td> {{ $name->id }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@else 
	<p style="text-align: center">No hits found! Please, try with different search parameters!</p>
@endif 
					</div>