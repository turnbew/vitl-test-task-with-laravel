<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>       
		@include('pages._page_parts.head-meta-tags')
		@include('pages._page_parts.head-css-files')
		<title>Listing all names - VITL</title>
    </head>
    <body>
       
		<div class="content">
		
			<h1>VITL - Listing all names (php)</h1>

			@include('pages._page_parts.nav-main')

			<div class="description">
				<h4>Description of this page</h4>
				<p>
					Paginating names with PHP on backend. Nice url contains two parameters, first is the number of the page, second is the limit of the records (records/page). 
				</p>
			</div>
				
			<!-- Beginning of listing hits -->
			
			<div class="clear"></div>
			
			<div class="hits-container">
				{!! $hit_list !!}
			</div>
			
		</div><!-- content -->		
    </body>
</html>
