@extends('backEnd.admin.layout.main')

@section('panel-title')
User Profile
@endsection

@section('content')

<div class="row">
	<div class="col-lg-9">
		<div class="tabbable">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="settings">
					<!-- Profile info -->						
						<div class="panel-body">
							<form action="{{ route('admin.updateProfile') }}" method="post">
							    @csrf

								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<label>Name</label>
											<input type="text" name="name" value="{{$username}}" class="form-control">
										</div>
										<div class="col-md-6">
											<label>Sur name</label>
											<input type="text" name="surname" value="{{$userInfo->surname}}" class="form-control">
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<label>Designation</label>
											<input type="text" name="designation" value="{{$userInfo->designation}}" class="form-control">
										</div>
										<div class="col-md-6">
											<label>Address</label>
											<input type="text" name="address" value="{{$userInfo->address}}" class="form-control">
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label>Mobile</label>
											<input type="text" id="mobile" name="mobile" value="{{$userInfo->mobile}}" class="form-control">
										</div>
										<div class="col-md-4">
											<label>Office Phone</label>
											<input type="text" id="office_phone" name="office_phone" value="{{$userInfo->office_phone}}" class="form-control">
										</div>
										<div class="col-md-4">
											<label>Fax</label>
											<input type="text" id="fax" name="fax" value="{{$userInfo->fax}}" class="form-control">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label>Date Of Birth</label>
											<input type="date" value="{{$userInfo->dob}}" name="dob" class="form-control">
										</div>
										<div class="col-md-4">
											<label>Gender</label>
											<select class="form-control" name="gender" id="gender">
										      <option value="1" @if($userInfo->gender ==1){{'selected'}} @endif>Male</option>
										      <option value="2"@if($userInfo->gender ==2){{'selected'}} @endif>Female</option>
										    </select>
										</div>
										{{-- <div class="col-md-4">
											<label>Fax</label>
											<input type="text" value="1031" class="form-control">
										</div> --}}
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-12">
											<label>About</label>
											<textarea name="about" class="form-control" id="about" rows="3">{{$userInfo->about}}</textarea>

										</div>
									</div>
								</div>

		                        <div class="text-right">
		                        	<button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
		                        </div>
							</form>
						</div>
					
					<!-- /profile info -->

				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3">

		<!-- User thumbnail -->
		<div class="thumbnail">
			<div class="thumb thumb-rounded thumb-slide">
				@if($userInfo->image)         
      				<img src="{{asset('/backEnd/admin')}}/assets/uploads/user/{{$userInfo->image}}" alt="">       
				@else
					<img src="{{asset('/backEnd/admin')}}/assets/images/user/demo.jpg" alt="">
				@endif
				
				<div class="caption">
					<span>
						<a href="{{route('admin.userImage')}}" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i>Change</a>
					</span>
				</div>
			</div>
		
	    	<div class="caption text-center">
	    		<h6 class="text-semibold no-margin">{{$username}} <small class="display-block">{{$userInfo->designation}}</small></h6>
    			<ul class="icons-list mt-15">
                	<li><a href="#" data-popup="tooltip" title="Google Drive"><i class="icon-google-drive"></i></a></li>
                	<li><a href="#" data-popup="tooltip" title="Twitter"><i class="icon-twitter"></i></a></li>
                	<li><a href="#" data-popup="tooltip" title="Github"><i class="icon-github"></i></a></li>
            	</ul>
	    	</div>
    	</div>
    	<!-- /user thumbnail -->
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	$('#mobile,#fax,#office_phone').keypress(function (event) {
		var keycode = event.which;
		if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || (keycode >= 48 && keycode <= 57)))) {
		event.preventDefault();
		}
		});

	});
</script>
@endsection
