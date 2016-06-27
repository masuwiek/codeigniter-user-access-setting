<?php
	$username 	= $this->session->userdata('username');
	$firstname 	= $this->session->userdata('firstname');	
	$lastname 	= $this->session->userdata('lastname');	
?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 3.9.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?= $this->config->item('website_title'); ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?=theme(); ?>/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=theme(); ?>/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=theme(); ?>/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=theme(); ?>/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?=theme(); ?>/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?=theme(); ?>/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?=theme(); ?>/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN THEME STYLES -->
<link href="<?=theme(); ?>/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?=theme(); ?>/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?=theme(); ?>/assets/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="<?=theme(); ?>/assets/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
<link href="<?=theme(); ?>/assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content ">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
			<img src="<?= $this->config->item('app_logo') ?>" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="<?=theme(); ?>/assets/img/avatar3_small.jpg"/>
					<span class="username username-hide-on-mobile">
					<?= isset($firstname) ? $firstname : 'anonymous' ?> </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="extra_profile.html">
							<i class="icon-user"></i> My Profile </a>
						</li>						
						<li class="divider">
						</li>						
						<li>
							<a href="<?= base_url() ?>login/logout">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search " action="extra_search.html" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				
				<?php
					$menu = $this->acl->left_menu();
					if($menu->num_rows() > 0){
						foreach($menu->result() as $row){
							$menu_child = $this->acl->left_menu_child($row->menuid);
							$active = ($this->uri->segment(1)==$row->menulink)?'active':'';
							$open = ($this->uri->segment(1)==$row->menulink)?'open':'';
							
							$access = $this->acl->access('view', $row->menucode);
							
							if($access->menuview==1){
								if($menu_child->num_rows() > 0){
									echo "
										<li class = '".$active."'>
											<a href='javascript:;'>
												<i class='".$row->menuicon."'></i>
												<span class='title'>".$row->menuname."</span>
												<span class='selected'></span>
												<span class='arrow ".$open."'></span>
											</a>
									";
									
									echo "<ul class='sub-menu'>";
									
								
										if($menu_child->num_rows() > 0){
											foreach($menu_child->result() as $obj){
												$access_child = $this->acl->access('view', $obj->menucode);
												if($access_child->menuview==1){
													echo "
														<li>
															<a href='".base_url()."$obj->menulink'>
																<i class='fa fa-angle-double-right'></i>
																".$obj->menuname."
															</a>
														</li>
													";
												}													
											}
										}
									
									
									echo "</ul>";									
										
									echo "
										</li>
									";
								}else{
									echo "
										<li class = '".$active."'>
											<a href='".base_url()."$row->menulink'>
												<i class='".$row->menuicon."'></i>
												<span class='title'>".$row->menuname."</span>
												<span class='arrow'></span>
											</a>
										</li>
									";
								}
							}
						}
					}
				?>
				
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
				<?= (isset($title))?$title:''; ?>
				<small><?= (isset($subtitle))?$subtitle:''; ?></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?= base_url() ?>">Home</a>						
					</li>
					<?= (isset($breadcrumb))?$breadcrumb:''; ?>
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			
			<?php
				(isset($content))?$this->load->view($content):'';
			?>
			
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 <?= $this->config->item('footer_title'); ?>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?=theme(); ?>/global/plugins/respond.min.js"></script>
<script src="<?=theme(); ?>/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?=theme(); ?>/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=theme(); ?>/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?=theme(); ?>/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?=theme(); ?>/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=theme(); ?>/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?=theme(); ?>/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=theme(); ?>/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=theme(); ?>/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?=theme(); ?>/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?=theme(); ?>/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<script type="text/javascript" src="<?=theme(); ?>/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?=theme(); ?>/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=theme(); ?>/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="<?=theme(); ?>/global/plugins/jquery-growl/css/jquery.growl.css"/>

<script src="<?=theme(); ?>/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?=theme(); ?>/assets/scripts/layout.js" type="text/javascript"></script>
<script src="<?=theme(); ?>/assets/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?=theme(); ?>/assets/scripts/demo.js" type="text/javascript"></script>

<script src="<?=theme(); ?>/myjs/list-table.js"></script>

<script>

var baseurl = "<?= base_url() ?>";

jQuery(document).ready(function() {   
	// initiate layout and plugins
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	QuickSidebar.init(); // init quick sidebar
	Demo.init(); // init demo features
	ListTable.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>