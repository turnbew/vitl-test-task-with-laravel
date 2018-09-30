<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>       
		@include('pages._page_parts.head-meta-tags')
		@include('pages._page_parts.head-css-files')
		<title>Adding new name - VITL</title>
    </head>
    <body>

		<div class="content">
		
			<h1>VITL - Adding new name (php)</h1>

			@include('pages._page_parts.nav-main')
	
			<form action="" method="post" id="add_name">
				{{ csrf_field() }}
				<div class="form-container">
					@if(session()->has('warning_msg'))
						<div class="alert alert-warning">
							{{ session()->get('warning_msg') }}
						</div>
					@endif
					@if ($errors->any())					
						@foreach ($errors->all() as $error)
							<p class="alert alert-danger">{{ $error }}</p>
						@endforeach
					@endif	
					@if(session()->has('success_members'))
						<div class="alert alert-success">
							{{ session()->get('success_members') }}
						</div>
					@endif
					<div class="form-group row required">
						<label for="first_name" class="col-2 col-form-label">First Name</label>
						<div class="col-10">
							<input class="form-control" type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" maxlength="40">
						</div>
					</div>
					<div class="form-group row required">
						<label for="last_name" class="col-2 col-form-label">Last Name</label>
						<div class="col-10">
							<input class="form-control" type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" maxlength="40">
						</div>
					</div>	
					<button type="submit" class="btn btn-primary" form="add_name">Submit</button>	
					 <a class="btn btn-default btn-close" href="{{ url('/') }}/names/add">Cancel</a>
				</div>	
			</form>
		</div>

    </body>
</html>
