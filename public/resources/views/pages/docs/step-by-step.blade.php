<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>       
		@include('includes.head-meta-tags')
		@include('includes.head-css-files')
		<link href="{{ url('/') }}/css/docs.css" rel="stylesheet" type="text/css">
		<title>Step by step - ToucanTech</title>
    </head>
    <body>

		<div class="content">
			<div class="title m-b-md">
				Step by step
			</div>

			@include('includes.body-content-nav')
			
			<div class="details">
				<h4>As the application was built</h4>
				<ol>
					<li>Installing Laravel framework on Windows</li>
					<li>Creating database in MySQL</li>
					<li>Configurating Laravel (.env, ../config/database.php, ../public/.htaccess)</li>
					<li>Creating migration files</li>
					<li>Specifying tables, fields, types</li>
					<li>Creating test details using DatabaseSeeds.php</li>
					<li>Routing (web.php)</li>
					<li>Creating views</li>
					<li>Creating members controller</li>
					<li>Creating form validator</li>
					<li>Creating views</li>
					<li>General developing</li>
					<li>Manual testing on localhost</li>
					<li>Uploading into a public folder on linux server</li>
					<li>Problem solving</li>
					<li>Documentation</li>
					<li>Uploading GitHub</li>
				</ol>
			</div>

		</div>

    </body>
</html>
