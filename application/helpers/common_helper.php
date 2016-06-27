<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('delete_form')){
    function delete_form($del_form='', $item_name='', $del_url=''){
		
		$form = "<div class='modal fade' id='".$del_form."' role='dialog'>
					<div class='modal-dialog'>
						<div class='modal-content'>
							<div class='modal-header'>
								<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
								<h4 class='modal-title'>Delete Confirmation</h4>
							</div>
							<div class='modal-body'>
								<h4>Are you sure to delete this item?<h4>
								( ".$item_name." )
							</div>
							<div class='modal-footer'>
								<button type='button' class='btn red' data-dismiss='modal'>Cancel</button>
								<a href='".$del_url."' type='button' class='btn green'>Confirm</a>
							</div>
						</div>
					</div>
				</div>		
		";
		
		return $form;
		
	}	
}

if (!function_exists('sortby_form')){
    function sortby_form($setting,$sort_by){
		
		$form 	 = "";
		$form 	.= "<form role='form' method='get' action=".$setting['form_action']."> ";
		$form	.= "<div class='row'>";
		$form	.= "<div class='col-md-1 form-group'>
						<select class='form-control input-xsmall' name='per_page'>";
							
								$sortcount = array('10','20','50','100');
								foreach($sortcount as $sortcnt => $sortcnt_val){
									$selected = (isset($_GET['per_page']) AND $_GET['per_page'] == $sortcnt_val)?"selected='selected'":"";
									$form .= "<option value='".$sortcnt_val."' ".$selected.">".$sortcnt_val."</option>";
								}
		$form	.= "	</select>
					</div>";
					
		$form	.= "<div class='col-md-3 form-group'>									
						<select class='form-control' name='sort_by'>
							<option value=''>Sort by:</option>";
								
								foreach($sort_by as $sortby => $value){
									$selected = (isset($_GET['sort_by']) AND $_GET['sort_by'] == $sortby)?"selected='selected'":"";										
									$form .= "
										<option value=".$sortby." ".$selected.">".$value."</option>
									";
								}
							
		$form	.= "		</select>								
					</div>";
					
		$form	.= "<div class='col-md-2 form-group'>
						<select class='form-control' name='order_by'>";
							$selected_asc 	= (isset($_GET['order_by']) AND $_GET['order_by'] == 'ASC')?"selected='selected'":"";
							$selected_desc 	= (isset($_GET['order_by']) AND $_GET['order_by'] == 'DESC')?"selected='selected'":"";
						
						
		$form	.= "		<option value='ASC' ".$selected_asc.">Ascending</option>
							<option value='DESC' ".$selected_desc.">Descending</option>
						</select>
					</div>";
					
					$keyword = (isset($_GET['keyword']))?$_GET['keyword']:'';
		$form	.= "<div class='col-md-3 form-group'>																	
							<input type='text' class='form-control input' placeholder='Search' name='keyword' 
							value=".$keyword.">								
					</div>";
					
		$form	.= "<div class='col-md-3 form-group'>																	
						<button type='submit' class='btn blue'>Apply</button> <a href=".$setting['menu_url']." class='btn red'>Reset</a>							
					</div>
					</div>
					</form>";
					
		return $form;
		
		
	}	
}

