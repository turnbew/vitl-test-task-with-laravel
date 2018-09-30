<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>       
		@include('includes.head-meta-tags')
		@include('includes.head-css-files')
		<link href="{{ url('/') }}/css/docs.css" rel="stylesheet" type="text/css">
		<title>Specification - ToucanTech</title>
    </head>
    <body>

		<div class="content">
			<div class="title m-b-md">
				Specification
			</div>

			@include('includes.body-content-nav')
			
			<div class="details">
				<h4>Used stuffs</h4>
				<ul>
					<li>MVC (php) - Laravel MVC framework</li>
					<li>DataBase - MySql - <a href="{{ url('../') }}/_downloads/ttech_tables.zip">download tables (.sql)</a></li>
					<li>CSS - Bootstrap and own</li>
				</ul>
				<h4>Versions of used softwares/applications</h4>
				<ul>
					<li>used Laravel version: 5.5.*</li>
					<li>used PHP version: 7.1.9</li>
					<li>used MySql version: 5.6.16</li>
					<li>used Bootstrap version: v4-alpha</li>
					<li>used Apache: 2.4.9</li>
					<li>Requests handling - post and get (no ajax/js)</li>
					<li>developed on windows, XAMPP version 1.8.3<li>	
				</ul>
				<h4>List of modified files</h4>
				<ul>
					<li>.env</li>
					<li>../public/.htaccess</li>
					<li>../config/database.php</li>
					<li>../database/seeds/DatabaseSeeder.php</li>
					<li>../routes/web.php</li>
				</ul>
				<h4>List of newly created files/folders</h4>
				<ul>
					<li>../app/Http/Controllers/MembersController.php</li>
					<li>../app/Http/Controllers/DocsController.php</li>
					<li>../app/Http/Requests/FormValidatorMembersPost.php</li>
					<li>../database/migrations/2017_09_27_092207_create_schools_table.php</li>
					<li>../database/migrations/2017_09_27_092231_create_members_table.php</li>
					<li>../resources/views/includes/body-content-nav.blade.php</li>
					<li>../resources/views/includes/head-css-files.blade.php</li>
					<li>../resources/views/includes/head-meta-tags.blade.php</li>
					<li>../resources/views/pages/home.blade.php</li>
					<li>../resources/views/pages/members/insert.blade.php</li>
					<li>../resources/views/pages/members/select.blade.php</li>
					<li>../resources/views/pages/docs/specification.blade.php</li>
					<li>../resources/views/pages/docs/stepbystep.blade.php</li>
					<li>../public/css/common.css</li>
					<li>_download (folder)</li>
				</ul>
			</div>

		</div>

    </body>
</html>
