<div class="row">
	<div class="col-md-12">	
		
		<?php 
			if(validation_errors()){
				echo "
					<div class='alert alert-warning alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
					";
				echo validation_errors();
				echo "
					</div>
				";
			}				
			
		?>
		
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-user"></i> Caption
				</div>
				<div class="actions">
					<a href="<?= base_url() ?>setting/user" class="btn default btn-sm"><i class="fa fa-list-alt"></i> Back to User List</a>
				</div>
			</div>
			<div class="portlet-body form">	
				
				<form class="form-horizontal" method="post" role="form" action="<?= base_url() ?>setting/user/edit_user/<?= $user->userid ?>">							
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Username</label>
							<div class="col-md-4">
								<input type="hidden" name="id" value="<?= $user->userid; ?>">
								<input type="text" class="form-control" name="username" disabled='disabled' placeholder="Enter text" value="<?= $user->username; ?>">								
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Email</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="email" placeholder="Enter text" value="<?= $user->email; ?>">								
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Firstname</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="firstname" placeholder="Enter text" value="<?= $user->firstname; ?>">								
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Lastname</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="lastname" placeholder="Enter text" value="<?= $user->lastname; ?>">								
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Phone</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="phone" placeholder="Enter text" value="<?= $user->phone; ?>">								
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Group</label>							
							<div class="col-md-4">
								<select name="groupid" class="form-control">
									<option value=''>-- Select group --</option>
									<?php
										if(is_array($group)){
											foreach($group as $row){
												$selected = ($user->groupid == $row->groupid)?'selected':'';
												echo "
													<option value='$row->groupid' ".$selected.">$row->groupname</option>
												";
											}
										}										
									?>	
								</select>					
															
							</div>							
						</div>
					</div>							
					
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn green">Submit</button>
								<a href="<?= base_url() ?>setting/user" type="button" class="btn red">Cancel</a>
							</div>
						</div>
					</div>
				</form>

						
			</div>
		</div>
		
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-pencil-square-o"></i> Change Password
				</div>
				<div class="actions">
					
				</div>
			</div>
			<div class="portlet-body form">	
				
				<form class="form-horizontal" method="post" role="form" action="<?= base_url() ?>setting/user/change_password/<?= $user->userid ?>">							
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Password</label>
							<div class="col-md-5">
								<input type="hidden" name="id" value="<?= $user->userid; ?>">
								<input type="password" class="form-control" name="password" placeholder="Password" >								
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Confirm Password</label>
							<div class="col-md-5">
								<input type="password" class="form-control" name="c_password" placeholder="Confirm Password">								
							</div>							
						</div>						
					</div>							
					
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn green">Change Password</button>
								<a href="<?= base_url() ?>setting/user" type="button" class="btn red">Cancel</a>
							</div>
						</div>
					</div>
				</form>

						
			</div>
		</div>
		
	</div>				
</div>