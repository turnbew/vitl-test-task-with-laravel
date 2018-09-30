<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
		@include('includes.head-meta-tags')
		@include('includes.head-css-files')
        <title>Test task - ToucanTech</title>
    </head>
    <body>
		<div class="content">
			<div class="title m-b-md">
				ToucanTech - Test task
			</div>
			
			
			@include('includes.body-content-nav')
			
			<div class="description">
				<h4>Description of the task</h4>
				<p>
					The ToucanTech database stores information about its members. Each member can be associated with 1 or more school. 
					You should build a demo that allows someone to add a new member with the fields “Name”, “Email Address” and "School" (selected from a list). The demo should display all members for a selected school.   
					The primary language we use is PHP and we use an MVC framework so please use this in your coding test.
					We will want to run and connect to your code on our own machines so if there are any unusual pre-requisites please document them.
				</p>
			</div>
		</div>
    </body>
</html>
