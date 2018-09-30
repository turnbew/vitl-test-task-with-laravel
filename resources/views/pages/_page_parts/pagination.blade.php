@php 
	$hits = $pagination['all_records'];
	$pages = $pagination['pages'];
	$page = $pagination['page'];
	$offset = $pagination['offset'];
	$limit = $pagination['limit'];
	$page_url = $pagination['page_url'];
	$is_ajax_paging = $pagination['type'] == 'ajax' ? true : false;
	$first = ( $page > 2 ) ? $page - 2 : 1;
	$last = ( $first + 5 > $pages ) ? $pages : $first + 5;	
@endphp

@if ($pages > 0)
	<div aria-label="Page navigation example">
		<ul class="pagination justify-content-center">
			@if ($page == 1)
				<li class="page-item disabled">
					<span class="page-link" title="">&laquo; First</span>
				</li>
				<li class="page-item disabled">
					<span class="page-link" title="">&lsaquo; Previous</a>
				</li>
			@else 
				@if ( $is_ajax_paging ) 
					<li class="page-item">
						<span class="page-link" data-page="1" title="@php echo "1 - " . $limit; @endphp">&laquo; First</span>
					</li>
					<li class="page-item">
						<span class="page-link" data-page="{{ $page - 1 }}" title="@php echo ($offset - $limit + 1) . " - " . ($offset); @endphp">&lsaquo; Previous</span>
					</li>
				@else
					<li class="page-item">
						<a class="page-link" href="{{ url('/') }}/{{ $page_url }}/1/{{ $limit }}" title="@php echo "1 - " . $limit; @endphp">&laquo; First</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="{{ url('/') }}/{{ $page_url }}/{{ $page - 1 }}/{{ $limit }}" title="@php echo ($offset - $limit + 1) . " - " . ($offset); @endphp">&lsaquo; Previous</a>
					</li>
					
				@endif
			@endif	
			@if ( $is_ajax_paging ) 
				@for ($i = $first; $i <= $last; $i++)
					<li class="page-item{{ $page == $i ? ' active' : '' }}">
						<span class="page-link" data-page="{{ $i }}" title="@php echo (($i - 1) * $limit + 1) . " - " . ($i * $limit); @endphp">{{ $i }}</span>
					</li>
				@endfor
			@else
				@for ($i = $first; $i <= $last; $i++)
					<li class="page-item{{ $page == $i ? ' active' : '' }}">
						<a class="page-link" href="{{ url('/') }}/{{ $page_url }}/{{ $i }}/{{ $limit }}" title="@php echo (($i - 1) * $limit + 1) . " - " . ($i * $limit); @endphp">{{ $i }}</a>
					</li>
				@endfor
			@endif
			@if ($page == $pages)
				<li class="page-item disabled">
					<span class="page-link" title="">Next &rsaquo;</span>
				</li>
				<li class="page-item disabled">
					<span class="page-link" title="">Last &raquo;</span>
				</li>
			@else 
				@if ( $is_ajax_paging ) 
					<li class="page-item">
						<span class="page-link" data-page="{{ $page + 1 }}" title="@php echo ($offset + $limit + 1) . " - " . ($offset + 2 * $limit); @endphp">Next &rsaquo;</span>
					</li>
					<li class="page-item">
						<span class="page-link" data-page="{{ $pages }}" title="@php echo ($hits - $limit + 1) . " - "  . $hits; @endphp">Last &raquo;</span>
					</li>
				@else
					<li class="page-item">
						<a class="page-link" href="{{ url('/') }}/{{ $page_url }}/{{ $page + 1 }}/{{ $limit }}" title="@php echo ($offset + $limit + 1) . " - " . ($offset + 2 * $limit); @endphp">Next &rsaquo;</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="{{ url('/') }}/{{ $page_url }}/{{ $pages }}/{{ $limit }}" title="@php echo ($hits - $limit + 1) . " - "  . $hits; @endphp">Last &raquo;</a>
					</li>
				@endif
			@endif	
			
		</ul>
	</div>	
@endif