<div class="row">
	<div class="col-md-12">
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
				<div class="form-body">
					<p>
						<b><h4><?= $groupname->groupname; ?> Privileges</h4></b>
					</p>
					<form action="<?= base_url() ?>setting/privilege/configuration/<?= $groupid; ?>" method="post">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th width='7%'><center>No.</center></th>
								<th>Menu Name</th>
								<th>Menu Parent</th>
								<th width='5%'>View</th>							
								<th width='5%'>Add</th>
								<th width='5%'>Edit</th>
								<th width='5%'>Del</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								foreach($privilege as $row){
									$view_pos	= strpos($row->menuavail, "iew");
									$view 		= ($row->view == 1 and $view_pos != 0)?'checked=checked':'';
									$viewavail 	= ($view_pos != 0)?'':'disabled=disabled';
									
									$add_pos	= strpos($row->menuavail, "dd");
									$add 		= ($row->add == 1 and $add_pos != 0)?'checked=checked':'';
									$addavail 	= ($add_pos != 0)?'':'disabled=disabled';
									
									$edit_pos	= strpos($row->menuavail, "dit");
									$edit 		= ($row->edit == 1 and $edit_pos != 0)?'checked=checked':'';
									$editavail 	= ($edit_pos != 0)?'':'disabled=disabled';
									
									$del_pos	= strpos($row->menuavail, "el");
									$del 		= ($row->del == 1 and $del_pos != 0)?'checked=checked':'';
									$delavail 	= ($del_pos != 0)?'':'disabled=disabled';
									
									echo "
										<tr class='odd gradeX'>
											<input type='hidden' name='menuid[]' value=$row->menus />
											<td><center>$no</center></td>
											<td>$row->menuname</td>		
											<td>$row->menuparent</td>
											<td class='center'><input type='checkbox' value='1' name='view[$row->menus]' $view $viewavail /></td>
											<td class='center'><input type='checkbox' value='1' name='add[$row->menus]' $add $addavail /></td>
											<td class='center'><input type='checkbox' value='1' name='edit[$row->menus]' $edit $editavail /></td>
											<td class='center'><input type='checkbox' value='1' name='del[$row->menus]' $del $delavail /></td>
										</tr>
									";
									$no++;
									
								}
							?>
										
											
						</tbody>
						
					</table>
				
					
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

<script src="<?=theme(); ?>/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="http://localhost/mycrm/public/themes/global/plugins/jquery-growl/js/jquery.growl.js" type="text/javascript"></script>

<script type="text/javascript">	
	<?php		
		$message = $this->session->flashdata('message');
				
		if($message!=null){
			echo "
				$.growl({ title: 'Message', message: '$message' });
			";			
		}
	?>	
	
</script>



