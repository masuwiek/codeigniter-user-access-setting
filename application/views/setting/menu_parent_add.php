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
					<a href="<?= base_url() ?>setting/menu" class="btn default btn-sm"><i class="fa fa-list-alt"></i> Back to Menu Parent List</a>
				</div>
			</div>
			<div class="portlet-body form">	
				
				<form class="form-horizontal" method="post" role="form" action="<?= base_url() ?>setting/menu/add_menu_parent">							
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Menu Name</label>
							<div class="col-md-5">
								<input type="text" class="form-control" name="menuname" placeholder="Menu Name" value="<?= (set_value('menuname'))?set_value('menuname'):''; ?>">								
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-md-3 control-label">Icon</label>
							<div class="col-md-3">
								<input type="text" name="menuicon" class="form-control" placeholder="Icon" 
								 value="<?= (set_value('menuicon'))?set_value('menuicon'):''; ?>">
							</div>
							<div class="col-md-1">
								<a href='<?= base_url() ?>setting/menu/icon' target="_blank" class='btn default btn-sm green'><i class='fa fa-edit'></i> Icon List </a>
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-md-3 control-label">Link</label>
							<div class="col-md-3">
								<input type="text" name="menulink" class="form-control" placeholder="Link" 
								 value="<?= (set_value('menulink'))?set_value('menulink'):''; ?>">
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-md-3 control-label">Menu Code</label>
							<div class="col-md-3">
								<input type="text" name="menucode" class="form-control" placeholder="Menu Code" 
								 value="<?= (set_value('menucode'))?set_value('menucode'):''; ?>">
							</div>
						</div>
						
						<div class="form-group control-group">
							<label  class="col-md-3 control-label">Menu Available</label>
							<div class="col-xs-3">
								<input type='checkbox' name='menuavail[]' value="view" <?= set_checkbox('menuavail[]', 'view'); ?>/> View<br>
								<input type='checkbox' name='menuavail[]' value="add" <?= set_checkbox('menuavail[]', 'add'); ?>/> Add<br>
								<input type='checkbox' name='menuavail[]' value="edit" <?= set_checkbox('menuavail[]', "edit"); ?>/> Edit<br>
								<input type='checkbox' name='menuavail[]' value="del" <?= set_checkbox('menuavail[]', "del"); ?>/> Delete<br>										
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-md-3 control-label">Menu Sort</label>
							<div class="col-md-1">
								<input type="text" name="menusort" class="form-control number" placeholder="0" 
								 value="<?= (set_value('menusort'))?set_value('menusort'):''; ?>">
							</div>
						</div>
						
					</div>							
					
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn green">Submit</button>
								<a href="<?= base_url() ?>setting/menu" type="button" class="btn red">Cancel</a>
							</div>
						</div>
					</div>
				</form>

						
			</div>
		</div>
	</div>				
</div>