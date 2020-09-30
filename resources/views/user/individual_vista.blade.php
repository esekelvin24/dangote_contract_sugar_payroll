<?php
use App\Http\Controllers\Utilities;
?>
<form id="edit_user" method="post"  enctype="multipart/form-data">
<div class="user-profile">
	<div class="up-head-w" style="background-image:url(<?php echo asset('_img/profile.png') ?>)">
		<!--<div class="up-social">
            <a href="#"><i class="os-icon os-icon-twitter"></i></a><a href="#"><i class="os-icon os-icon-facebook"></i></a>
        </div>-->
		<div class="up-main-info">
			<div class="user-avatar-w">
				<div class="user-avatar">
					<img alt="" src="<?php echo asset("_img/users/".$profile_collection[0]->pics )?>">
				</div>
			</div>
			<h1 class="up-header">
				<?php echo $profile_collection[0]->title_name.' '.$profile_collection[0]->firstname." ".$profile_collection[0]->middlename."".$profile_collection[0]->lastname  ?>
			</h1>
			<h5 class="up-sub-header">
				Mat No: <?php echo Utilities::get_matric_number($profile_collection[0]->user_id) ?>
			</h5>
		</div>
		<svg class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF"><path class="decor-path" d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z"></path></g></svg>
	</div>
	<div class="up-controls">
		<div class="row">
			<div class="col-lg-6">
				<div class="value-pair">
					<div class="label">
						Status:
					</div>
					<?php
					switch($profile_collection[0]->status){
						case 0:
							echo '<div class="value badge badge-pill badge-warning">Inactive</div>';
							break;
						case 1:
							echo '<div class="value badge badge-pill badge-success">Active</div>';
							break;
						case 2:
							echo '<div class="value badge badge-pill badge-primary">Graduated</div>';
							break;
						case 3:
							echo '<div class="value badge badge-pill badge-danger">Expelled</div>';
							break;
					}
					?>

				</div>
				<div class="value-pair">
					<div class="label">
						Gender :
					</div>
					<div class="value">
						<?php echo $profile_collection[0]->gender==1?"Male":"Female" ?>
					</div>
				</div>
				<div class="value-pair">
					<div class="label">
						Registered Since:
					</div>
					<div class="value">
						<?php echo date('d F, Y h:m:s A',strtotime($profile_collection[0]->created_at)) ?>
					</div>
				</div>
			</div>
			<!--<div class="col-lg-6 text-right">
                <a class="btn btn-primary btn-sm" href=""><i class="os-icon os-icon-link-3"></i><span>Add to Friends</span></a><a class="btn btn-secondary btn-sm" href=""><i class="os-icon os-icon-email-forward"></i><span>Send Message</span></a>
            </div>-->
		</div>
	</div>
	<div class="up-contents">
		<h5 class="element-header">
			Personal Details
		</h5>

		<div class="row">

			<div class="col-sm-3">
				<div class="form-group">
					<label for="title_id">Title</label>
					<input readonly name="title" value="<?php echo $profile_collection[0]->title_name ?>" class="form-control" type="text">
				</div>
			</div>

			<div class="col-sm-3">
				<div class="form-group">
					<label for=""> Firstname</label><input readonly name="firstname" value="<?php echo $profile_collection[0]->firstname ?>" class="form-control" type="text">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for=""> Middlename</label><input readonly name="middlename" value="<?php echo $profile_collection[0]->middlename ?>" class="form-control" type="text">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for=""> Lastname </label><input readonly name="lastname" value="<?php echo $profile_collection[0]->lastname?>" class="form-control" type="text">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label for=""> Email</label><input readonly value="<?php echo $profile_collection[0]->email ?>" class="form-control" type="text">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="">Phone No. </label><input readonly value="{{$profile_collection[0]->phone}}" class="form-control" type="text">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="gender">Gender</label>
					<input readonly value="{{$profile_collection[0]->gender==1?'Male':'Female'}}" class="form-control" type="text">
				</div>
			</div>
		</div>
			<h5 class="element-header">
				Programme Information
			</h5>
			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						<label for="">Programme Type </label><input readonly value="{{$profile_collection[0]->program_type_name}}" class="form-control" type="text">
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label for="">Programme</label><input readonly value="{{$profile_collection[0]->degree_short_name.' , '.$profile_collection[0]->name}}" class="form-control" type="text">
					</div>
				</div>
				@if($profile_collection[0]->university!="")
				<div class="col-sm-3">
					<div class="form-group">
						<label for="">University</label><input readonly value="{{$profile_collection[0]->university}}" class="form-control" type="text">
					</div>
				</div>
				@endif
				<div class="col-sm-3">
					<div class="form-group">
						<label for="">Duration</label><input readonly value="{{$profile_collection[0]->duration}}" class="form-control" type="text">
					</div>
				</div>
			</div>
		    <div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label for="">Faculty </label><input readonly value="{{$profile_collection[0]->faculty_name}}" class="form-control" type="text">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="">Department</label><input readonly value="{{$profile_collection[0]->department_name}}" class="form-control" type="text">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="">Entry Type</label><input readonly value="{{$profile_collection[0]->entry_type==1?"Regular":"Direct"}}" class="form-control" type="text">
				</div>
			</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label for="">Applied Session</label><input readonly value="{{$profile_collection[0]->session_name}}" class="form-control" type="text">
					</div>
				</div>
		</div>

	</div>
</div>
</form>