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
					<a href="<?= base_url() ?>setting/user_group" class="btn default btn-sm"><i class="fa fa-list-alt"></i> Back to User Group List</a>
				</div>
			</div>
			<div class="portlet-body form">	
				
				<form class="form-horizontal" method="post" role="form" action="<?= base_url() ?>setting/user_group/edit_user_group/<?= $group->groupid ?>">							
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Group Name</label>
							<div class="col-md-5">
								<input type="text" class="form-control" name="groupname" placeholder="Enter text" value="<?= $group->groupname; ?>">								
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Description</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="description" placeholder="Enter text" value="<?= $group->description; ?>">								
							</div>
						</div>
					</div>							
					
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn green">Submit</button>
								<a href="<?= base_url() ?>setting/user_group" type="button" class="btn red">Cancel</a>
							</div>
						</div>
					</div>
				</form>

						
			</div>
		</div>
	</div>				
</div>