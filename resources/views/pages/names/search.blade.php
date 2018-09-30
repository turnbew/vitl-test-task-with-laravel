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
					Searching names using AJAX. Names can be filtered by duplicate names and ordered by first name, last name or unique id.<br><br>
				</p>
				
				
				
				<div class="search-container">
					
					
					<div class="search-fields col-md-4">
						<h4>Search parameters</h4>
						
						<div class="search col-md-12" style="margin-bottom: 20px;">
							<input class="form-control" type="text" name="search_value" placeholder="Type name part here" value="{{ old('search_value') }}" maxlength="40">	
						</div>
						<div class="filter col-md-12 form-group">
							<select class="form-control" name="duplicates">
								<option value="" selected> -- Filter duplicates -- </option>
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select>
						</div>
					</div>
					
					<div class="hits-outer-container col-md-8">
						<h4>Search result</h4>
						
						<div class="hits-container" style="max-height: 300px; overflow-y: auto;"></div>
					</div>
				</div>
			</div>

			
			
		</div>

		@include('pages._page_parts.hidden-fields')
    </body>
</html>
