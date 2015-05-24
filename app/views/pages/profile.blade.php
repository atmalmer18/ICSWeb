@extends('layouts.default')
@section('content')

    {{ HTML::style('css/profile.css'); }}
    <?php $filename=Session::get('username').".jpg"; ?>
	<div>
	<div class="container" id="body-wrapper">
		<div class="col-md-12" id="upper-panel">
			<div class="col-md-4" id="profile-upper-left-panel">
				<?php if(Session::has('avatar')) {?>
					<img src="{{URL::to('upload/'.$filename)}}"/>
				<?php }else{ ?>	
					<img src="{{URL::to('res/images/blue_contacts.png')}}"/>
				<?php } ?>
				<form action="upload_file" method="post" enctype="multipart/form-data">
					<input type="file" name="uploadfile" size="20" />
					<input type="submit" name="upload" value="upload" /> 
				</form>
				<div id="profile-basic-info">
					<h4 class="prof-info" id="prof-name"><?php echo Session::get('lastName'). ', '. Session::get('firstName') .' '. Session::get('middleName'); ?></h4>
					<h5 class="prof-info" id="prof-desig"><?php echo Session::get('academic'); ?></h5>
				</div>
			</div>
			<div class="col-md-8" id="profile-upper-right-panel">
				<div id="profile-info">
					<p id="room-assignment"><?php echo Session::get('room'); ?></p>
					<p id="consultation-hours">CONSULTATION HOURS <br><?php if(Session::get('consult')==null){ echo "No Consultation Hours Yet."; }else{echo Session::get('consult');} ?> </p>
					<p id="bio"><?php echo Session::has('avatar'); ?>
						<h5 class="prof-info" id="prof-bio/info">BIO/INFO<br><?php if(Session::get('consult')==null){ echo "No Bio/Info Yet."; }else{echo Session::get('bio');} ?></h5>
					</p>
				</div>
				<div id="profile-message-wrapper">
					<p><a href="#">Message <span class="fa fa-envelope-o" id="sample"></span></a></p>
				</div>
			</div>
		</div>
	</div>
	
	<!-- 
		The following div (for sending exers) will not be visible should the prof log in
		Not yet implemented
	-->

	<div class="container" id="body-wrapper">
		<div class="col-md-12" id="prof-bottom-panel">
			<div id="prof-bottom-panel-content">
				<div class="col-md-4" id="text-panel">
					<h4>Guide/Reminders</h4>
					<ul>
						<br><?php if(Session::get('guide')==null){ echo "No Guides/Reminders Yet."; }else{echo Session::get('guide');} ?>
					</ul>
				</div>
				<?php if(Session::get('type')=='student'){ ?><div class="col-md-8" id="send-exer-panel">
					<h5>{ SEND YOUR EXERCISE }</h5>
					<form id="profile-exer" action="#">
						<table>
							<tr>
								<td><p class="inputTitle">SUBJECT:</p></td>
								<td><input type="text" class="inputField" id="subject" required></td>
							</tr>
							<tr>
								<td><p class="inputTitle">SECTION:</p></td>
								<td><input type="text" class="inputField" id="section" required></td>
							</tr>
							<tr>
								<td><p class="inputTitle">NAME:</p></td>
								<td><input type="text" class="inputField" id="stdNAME" required></td>
							</tr>
							<tr>
								<td><p class="inputTitle">STD NO:</p></td>
								<td><input type="text" class="inputField" id="stdNo" required></td>
							</tr>
							<tr>
								<td><p class="inputTitle">EX NO/TITLE:</p></td>
								<td><input type="text" class="inputField" id="EXno/title" required></td>
							</tr>
							<tr>
								<td><p class="inputTitle">NOTE:</p></td>
								<td><input type="text" class="inputField" id="NOTE" required></td>
							</tr>
						</table>
						<br>
						<button type="button" class="btn btn-primary">UPLOAD FILE</button>

					</form>
				</div>	
				<?php }else{ ?>
					<h5>Dito na yung link nung groups kung sino man ang gagawa nun hehe</h5>
					<h5><a href="{{URL::to('pages/profile-edit')}}">Edit - This is for editing hehe</span></a></h5>
				<?php } ?>
			</div>
		
		</div>
		
	</div>
	</div>

@stop