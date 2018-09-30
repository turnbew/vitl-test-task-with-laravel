<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>       
		@include('includes.head-meta-tags')
		@include('includes.head-css-files')
		<title>Insert a new member using PHP - ToucanTech</title>
    </head>
    <body>

		<div class="content">
			<div class="title m-b-md">
				Insert a new member using PHP
			</div>

			@include('includes.body-content-nav')

			
			<form action="" method="post" id="insert_member">
				{{ csrf_field() }}
				<div class="form_container">
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
						<label for="name" class="col-2 col-form-label">Name</label>
						<div class="col-10">
							<input class="form-control" type="text" name="name" placeholder="Name" value="{{ old('name') }}" maxlength="80">
						</div>
					</div>
					<div class="form-group row required">
						<label for="email" class="col-2 col-form-label">E-mail</label>
						<div class="col-10">
							<input class="form-control" type="text" name="email" placeholder="E-mail" value="{{ old('email') }}" maxlength="100">
						</div>
					</div>
					<div class="form-group row required">
						<label for="school" class="col-2 col-form-label">School</label>
						<div class="col-10">
							<select name="school" class="form-control">
								<option value="not_selected">-- Select a school --</option>
								@foreach($all['schools'] as $school)
									<option value="{{ $school->id }}" {{ ($school->id == session()->get('schools_id')) ? "selected" : ($school->id == old('school') ? "selected" : "") }}>{{ $school->name }}</option>
								@endforeach
							</select>
						</div>
					</div>		
					<button type="submit" class="btn btn-primary" form="insert_member">Submit</button>	
					 <a class="btn btn-default btn-close" href="{{ url('/') }}/members/insert">Cancel</a>
				</div>	
			</form>
		</div>

    </body>
</html>
