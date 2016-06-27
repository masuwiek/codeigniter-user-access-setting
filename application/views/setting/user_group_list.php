<div class="row">
	<div class="col-md-12">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-user"></i> Caption
				</div>
				<div class="actions">
					<a href="<?= base_url() ?>setting/user_group/add_user_group" class="btn default btn-sm"><i class="fa fa-plus"></i> Create a New User Group</a>
				</div>
			</div>
			<div class="portlet-body">
				
				<?= sortby_form($sort_setting,$sort_by); ?>				

				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th width='7%'><center>No.</center></th>
							<th>Group Name</th>
							<th>Description</th>
							<th>User in this Group</th>							
							<th width='25%'>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(is_array($tablelist)){								
								$no = 1;
								$page 		= ($this->uri->segment('4') == '')?1:$this->uri->segment('4');
								$pagecount 	= ($page-1) * $per_page; 
								
								if($datacount > 0){
									foreach($tablelist as $obj){
										$number 	= $no + $pagecount;
										
										$id			= $obj->groupid;
										$edit_url 	= base_url()."setting/user_group/edit_user_group/".$id;
										$priv_url 	= base_url()."setting/privilege/configuration/".$id;
										$del_url	= base_url()."setting/user_group/delete_user_group/".$id;
										$del_form 	= "delete_user_group".$id;
										$item_name	= "Group Name";
										$edit_btn 	= "<a href='".$edit_url."' class='btn default btn-xs green'><i class='fa fa-edit'></i> Edit </a>";			
										$del_btn 	= "<a href='#".$del_form."' data-toggle='modal' title='delete' class='btn btn-xs red'><i class='fa fa-trash'></i> Delete</a>";
										$priv_btn 	= "<a href='".$priv_url."' class='btn btn-xs purple'><i class='fa fa-wrench'></i> Privilege</a>";
										
										echo "
											<tr class='odd gradeX'>
												<td><center>$number</center></td>
												<td>$obj->groupname</td>		
												<td>$obj->description</td>
												<td>$obj->countgroup</td>
												<td>
											";
											
											if($obj->groupid != 1){
												echo "
													".$edit_btn."
													".$del_btn."
													".$priv_btn."
												";
											}										
												
										
										echo "
												</td>
											</tr>
											
											
											
										";
										echo delete_form($del_form, $item_name, $del_url);										
										$no++;
									}
								}else{
									echo "
										<tr class='odd gradeX'>
											<td colspan=5>No Data Found</td>
											
										</tr>
									";
								}
								
									
							}
						?>
										
					</tbody>
					
				</table>

					
				<?= $paging ?>

				
				
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


