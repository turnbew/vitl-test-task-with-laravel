<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>       
		@include('pages._page_parts.head-meta-tags')
		@include('pages._page_parts.head-css-files')
		<link href="{{ url('/') }}/css/docs.css" rel="stylesheet" type="text/css">
		<title>Specification - VITL</title>
    </head>
    <body>

		<div class="content">
			<h1>VITL - Specification</h1>

			@include('pages._page_parts.nav-main')
			
			<div class="description">
				<h4>Technical details</h4>
				<ul>
					<li>MVC (php) - Laravel MVC framework 5.7.6</li>
					<li>MySQL DataBase - PhpMyAdmin 4.8.3  - <a href="{{ url('../') }}/_downloads/vitl_names.zip">download table(s) (.sql file)</a></li>
					<li>CSS - Bootstrap 3.3.7 and own created</li>
					<li>PHP 7.2.9</li>
					<li>Apache: 2.4.34</li>
					<li>Developing environment: WAMP - XAMPP version 1.8.3</li>	
					<li><a href="" title="VITL - search names - GitHUB repository">GitHUB repository</a></li>	
				</ul>
				<h4>List of modified files</h4>
				<ul>
					<li>.env</li>
					<li>../config/database.php</li>
					<li>../database/seeds/DatabaseSeeder.php</li>
					<li>../routes/web.php</li>
				</ul>
				<h4>List of newly created files/folders</h4>
				<ul>
					<li>/app/Http/Controllers/NamesController.php</li>
					<li>/app/Http/Controllers/Validator/NamesValidator.php</li>
					<li>/app/Http/Controllers/Query/_InterfaceQuery.php</li>
					<li>/app/Http/Controllers/Query/NamesQuery.php</li>
					<li>/resources/views/pages/_page_parts/pagination.blade.php</li>
					<li>/resources/views/pages/_page_parts/nav-main.blade.php</li>
					<li>/resources/views/pages/_page_parts/head-meta-tags.blade.php</li>
					<li>/resources/views/pages/_page_parts/head-css-files.blade.php</li>
					<li>/resources/views/pages/home.blade.php</li>
					<li>/resources/views/pages/names/add.blade.php</li>
					<li>/resources/views/pages/names/all.blade.php</li>
					<li>/resources/views/pages/names/search.blade.php</li>
					<li>/resources/views/pages/docs/step-by-step.blade.php</li>
					<li>/resources/views/pages/docs/specification.blade.php</li>
					<li>/public/css/common.css</li>
					<li>/public/css/bootstrap.min.3.3.7.css</li>
					<li>/public/js/pages/names/search.js</li>
					<li>/public/js/common_ajax.js</li>
					<li>/public/js/jquery.min.3.3.1.js</li>
					<li>/_downloads</li>
				</ul>
			</div>

		</div>

    </body>
</html>
