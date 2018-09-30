<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
		@include('pages._page_parts.head-meta-tags')
		@include('pages._page_parts.head-css-files')
        <title>Searching names - in VITL Test task</title>
    </head>
    <body>
		<div class="content">
			<h1>VITL - Test task - Searching names</h1>
			
			@include('pages._page_parts.nav-main')
			
			<div class="description">
				<h4>Description of the task</h4>
				<p>
					A <a href="http://turnbew.com/ftp/tests/vitl/_downloads/vitl_names_csv.zip" title="Names CSV file">CSV file</a> containing a long list of user names. The requirement is to build a web page that allows a user to search for a given name in the list and display the results. The output should be ordered alphabetically by the users last name and first name.
					<br><br>
					The front end should communicate with a back end PHP API via AJAX using a query parameter "terms" which contains the search value. A second optional boolean parameter "dupes" should be added to filter out duplicate entries.  Data should be stored and queried using MySQL and you can use any framework you like for the back end and front end.
					<br><br>
					Please provide the exported SQL and any additional installation requirements via a readme file. The finished application should be returned either as a zip file or uploaded to a GIT repository e.g. GitHub / Bitbucket.
				</p>
			</div>
		</div>
    </body>
</html>
