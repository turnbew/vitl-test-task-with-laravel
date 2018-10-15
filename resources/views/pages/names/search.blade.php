<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>       
		@include('pages._page_parts.head-meta-tags')
		@include('pages._page_parts.head-css-files')
		@include('pages._page_parts.head-js-files')
		<script src="{{ url('/') }}/js/pages/names/search.js"></script>
		<title>Search names - VITL</title>
    </head>
    <body>

		<div class="content">		
			<h1>VITL - Search names (ajax)</h1>

			@include('pages._page_parts.nav-main')

			<div class="description">
				<h4>Description of this page</h4>
				
				<p>
					Searching names using AJAX. Names can be filtered by duplicate names and ordered by first name, last name or unique id.
				</p>			
			
				<div class="clear"></div>
				
				<h4>Search parameters</h4>
				
				<div class="col-md-4">
					<input class="form-control" type="text" name="search_value" placeholder="Type name part here" value="{{ old('search_value') }}" maxlength="40">	
				</div>
				<div class="col-md-4">
					<select class="form-control" name="duplicates">
						<option value="" selected> -- Filter duplicates -- </option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select>
				</div>
					
				<div class="clear"></div>
		
				<h4>Search result</h4>
			</div><!-- END .description -->
			
			<div class="hits-container"></div>		
		</div><!-- END .content -->

		@include('pages._page_parts.hidden-fields')
    </body>
</html>
