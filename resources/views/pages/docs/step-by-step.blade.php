<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>       
		@include('pages._page_parts.head-meta-tags')
		@include('pages._page_parts.head-css-files')
		<link href="{{ url('/') }}/css/docs.css" rel="stylesheet" type="text/css">
		<title>Step by step - VITL</title>
    </head>
    <body>

		<div class="content">
			<h1>VITL - Step by step</h1>
			
			@include('pages._page_parts.nav-main')
			
			<div class="description">
				<h4>As the application was built</h4>
				<ol>
					<li>Installing Laravel framework on Windows</li>
					<li>Creating database in MySQL</li>
					<li>Configurating Laravel (.env, ../config/database.php, ../public/.htaccess)</li>
					<li>Creating migration files</li>
					<li>Specifying tables, fields, types</li>
					<li>Routing (web.php)</li>
					<li>Creating views</li>
					<li>Creating members controller</li>
					<li>Creating form validator</li>
					<li>Creating views</li>
					<li>General developing</li>
					<li>Manual testing on localhost</li>
					<li>Uploading on own public folder (TurnBEW), live example <a href="http://turnbew.com/vitl/tests/toucantech/public/" target="_blank" title="VITL - search names - live on TurnBEW">here</a></li>
					<li>Problem solving</li>
					<li>Documentation</li>
					<li>Uploading GitHub</li>
				</ol>
			</div>

		</div>

    </body>
</html>
