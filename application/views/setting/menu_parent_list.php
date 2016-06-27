<div class="row">
	<div class="col-md-12">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-user"></i> Caption
				</div>
				<div class="actions">
					<a href="<?= base_url() ?>setting/menu/add_menu_parent" class="btn default btn-sm"><i class="fa fa-plus"></i> Create a New Parent Menu</a>
				</div>
			</div>
			<div class="portlet-body">
				
				<?= sortby_form($sort_setting,$sort_by); ?>				

				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th width='7%'><center>No.</center></th>
							<th>Menu Name</th>
							<th>Icon</th>
							<th>Menu Link</th>
							<th>Menu Code</th>
							<th>Available</th>
							<th width='15%'>Action</th>
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
										
										$id			= $obj->menuid;
										$edit_url 	= base_url()."setting/menu/edit_menu_parent/".$id;
										$del_url	= base_url()."setting/menu/delete_menu_parent/".$id;
										$del_form 	= "delete_menu_parent".$id;
										$item_name	= "Menu";
										$edit_btn 	= "<a href='".$edit_url."' class='btn default btn-xs green'><i class='fa fa-edit'></i> Edit </a>";			
										$del_btn 	= "<a href='#".$del_form."' data-toggle='modal' title='delete' class='btn btn-xs red'>Delete <i class='fa fa-trash'></i></a>";
										
										$menuname	= "<a href='".base_url()."setting/menu/menu_child/".$obj->menuid."'>".$obj->menuname."</a>";
										
										echo "
											<tr class='odd gradeX'>
												<td><center>$number</center></td>
												<td>".$menuname."</td>		
												<td>$obj->menuicon</td>
												<td>$obj->menulink</td>
												<td>$obj->menucode</td>
												<td>$obj->menuavail</td>
												<td>
													".$edit_btn."
													".$del_btn."
												</td>
											</tr>
											
											
											
										";
										echo delete_form($del_form, $item_name, $del_url);										
										$no++;
									}
								}else{
									echo "
										<tr class='odd gradeX'>
											<td colspan=7>No Data Found</td>
											
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


