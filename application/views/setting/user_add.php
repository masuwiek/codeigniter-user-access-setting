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
				
				<form class="form-horizontal" method="post" role="form" action="<?= base_url() ?>setting/user/add_user">							
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Username</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="username" placeholder="Enter text" value="<?= (set_value('username'))?set_value('username'):''; ?>">								
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Email</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="email" placeholder="Enter text" value="<?= (set_value('email'))?set_value('email'):''; ?>">								
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Firstname</label>
							<div class="col-md-5">
								<input type="text" class="form-control" name="firstname" placeholder="Enter text" value="<?= (set_value('firstname'))?set_value('firstname'):''; ?>">								
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Lastname</label>
							<div class="col-md-5">
								<input type="text" class="form-control" name="lastname" placeholder="Enter text" value="<?= (set_value('lastname'))?set_value('lastname'):''; ?>">								
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Phone</label>
							<div class="col-md-5">
								<input type="text" class="form-control" name="phone" placeholder="Enter text" value="<?= (set_value('phone'))?set_value('phone'):''; ?>">								
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Group</label>
							<div class="col-md-4">
								<select name="groupid" class="form-control">
									<option value=''>-- Select group --</option>
									<?php
										if(is_array($group)){
											foreach($group as $obj){
												echo "
													<option value='$obj->groupid' ".set_select('groupid', $obj->groupid).">$obj->groupname</option>
												";
											}
										}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Password</label>
							<div class="col-md-4">
								<input type="password" class="form-control" name="password" placeholder="Enter text">								
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Confirm Password</label>
							<div class="col-md-4">
								<input type="password" class="form-control" name="c_password" placeholder="Enter text">								
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
	</div>				
</div>