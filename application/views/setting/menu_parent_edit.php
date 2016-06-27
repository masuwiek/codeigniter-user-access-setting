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
					<a href="<?= base_url() ?>setting/menu" class="btn default btn-sm"><i class="fa fa-list-alt"></i> Back to Menu List</a>
				</div>
			</div>
			<div class="portlet-body form">	
				
				<form class="form-horizontal" method="post" role="form" action="<?= base_url() ?>setting/menu/edit_menu_parent/<?= $menu->menuid ?>">	
				
					<div class="form-body">
						<div class="form-group">
							<label  class="col-md-3 control-label">Menu Name</label>
							<div class="col-md-6">
								<input type="text" name="menuname" class="form-control" placeholder="Menu Name" 
								 value="<?= $menu->menuname; ?>">
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-md-3 control-label">Icon</label>
							<div class="col-md-3">
								<input type="text" name="menuicon" class="form-control" placeholder="Icon" 
								 value="<?= $menu->menuicon; ?>">
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-md-3 control-label">Link</label>
							<div class="col-md-3">
								<input type="text" name="menulink" class="form-control" placeholder="Link" 
								 value="<?= $menu->menulink; ?>">
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-md-3 control-label">Menu Code</label>
							<div class="col-md-3">
								<input type="text" name="menucode" class="form-control" placeholder="Menu Code" 
								 value="<?= $menu->menucode; ?>">
							</div>
						</div>
						
						<div class="form-group control-group">
							<label  class="col-md-3 control-label">Menu Available</label>
							<div class="col-xs-3">
								<?php $avail = explode(",", $menu->menuavail); ?>
								
								<input type='checkbox' name='menuavail[]' value="view" <?php foreach($avail as $obj => $value){ echo ('view'==$value)?'checked':''; } ?> /> View<br>
								<input type='checkbox' name='menuavail[]' value="add" <?php foreach($avail as $obj => $value){ echo ('add'==$value)?'checked':''; } ?> /> Add<br>
								<input type='checkbox' name='menuavail[]' value="edit" <?php foreach($avail as $obj => $value){ echo ('edit'==$value)?'checked':''; } ?> /> Edit<br>
								<input type='checkbox' name='menuavail[]' value="del" <?php foreach($avail as $obj => $value){ echo ('del'==$value)?'checked':''; } ?> /> Delete<br>										
							</div>
						</div>
						
						<div class="form-group">
							<label  class="col-md-3 control-label">Menu Sort</label>
							<div class="col-md-1">
								<input type="text" name="menusort" class="form-control number" placeholder="0" 
								 value="<?= $menu->menusort; ?>">
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