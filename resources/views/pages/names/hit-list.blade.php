				@if( $data['pagination']['all_records'] > 0 )	
					<!-- Display details -->
					<p style="clear: both; width: 100%; text-aling: center;">Hits ({{ $data['pagination']['all_records'] }})</p>				
					
					<!-- Pagination -->
					@include('pages._page_parts.pagination', ['pagination' => $data['pagination']])

					<!-- Display result -->
					@php 
						$class_name = '';
						$counter = $data['pagination']['offset'];
					@endphp	
					<div class="records">			
						<table class="table table-responsive table-striped">
							<thead class="thead-dark">
								<tr>
									<th scope="col">Counter</th>
									<th scope="col">First name</th>
									<th scope="col">Last name</th>
									<th scope="col">Unique ID</th>
								</tr>	
							</thead>
							<tbody>
							@foreach($data['names'] as $name)
							@php 
								$counter++;
								$class_name = ($class_name == 'not-active') ? 'table-active' : 'not-active';
							@endphp				
								<tr class="{{ $class_name }}">
									<td> {{ $counter }}</td>
									<td> {{ $name->first_name }}</td>
									<td> {{ $name->last_name }}</td>
									<td> {{ $name->id }}</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				@endif