<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>       
		@include('includes.head-meta-tags')
		@include('includes.head-css-files')
		<title>Select members using PHP - ToucanTech</title>
    </head>
    <body>
       
		<div class="content">
			<div class="title m-b-md">
				Listing members by school
			</div>

			@include('includes.body-content-nav')

			
			<form action="{{ url('/') }}/members/select" method="post" id="select_members">
				{{ csrf_field() }}
				<div class="form_container form-inline">
					<select name="school" class="form-control mb-2 mr-sm-2 mb-sm-0" style="min-width: 400px;">
						<option value="not_selected">-- Select a school --</option>
						@php
							$schools_id = isset($all['data']['schools_id']) ? $all['data']['schools_id'] : 0; 
						@endphp
						@if( ! empty($all['schools']))
							@foreach($all['schools'] as $school)
								<option value="{{ $school->id }}" {{ ($school->id ==  $schools_id ? "selected" : "") }}>{{ $school->name }}</option>
							@endforeach
						@endif
					</select>	
					<button type="submit" class="btn btn-primary" form="select_members">Submit</button>
				</div>			
			</form>
		
		
		<!-- Beginning of listing hits -->
		@if( isset($all['data']['members']) && count($all['data']['members']) > 0)
			@php 
				$members = $all['data']['members'];
				$hits = $all['data']['hits'];
				$pages = $all['data']['pages'];
				$current = $all['data']['current'];
				$offset = $all['data']['offset'];
			@endphp
			
			<div class="hits_container">
				
				<!-- Display details -->
				<p>Hits ({{ $hits }})</p>
				
				
				
				
				<!-- Pagination -->
			@if ($pages > 0)
				<div aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item{{ $current == 1 ? ' disabled' : '' }}">
							<a class="page-link" href="{{ url('/') }}/members/select/{{ $schools_id }}/{{ $current - 1 }}" tabindex="-1">Previous</a>
						</li>
						@for ($i = 1; $i <= $pages; $i++)
							<li class="page-item{{ $current == $i ? ' active' : '' }}">
								<a class="page-link" href="{{ url('/') }}/members/select/{{ $schools_id }}/{{ $i }}">{{ $i }}</a>
							</li>
						@endfor
						<li class="page-item{{ $current == $pages ? ' disabled' : '' }}">
							<a class="page-link" href="{{ url('/') }}/members/select/{{ $schools_id }}/{{ $current + 1 }}">Next</a>
						</li>
					</ul>
				</div>	
			@endif

			
			
				<!-- Display result -->
				@php 
					$classname = '';
					$counter = 0 + $offset;
				@endphp	
				<div class="records">			
					<table class="table table-responsive">
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>E-mail address</th>
						</tr>			
					@foreach($members as $member)
					@php 
						$counter++;
						$classname = ($classname == 'not-active') ? 'table-active' : 'not-active';
					@endphp				
						<tr class="{{ $classname }}">
							<td> {{ $counter }}</td>
							<td> {{ $member->name}}</td>
							<td> {{ $member->email}}</td>
						</tr>
					@endforeach
					</table>
				</div>
			</div>
		@endif			

    </body>
</html>
