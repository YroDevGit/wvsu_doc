<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title><?= CY_STRING_VALUE($title) ?></title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?= ASSETS() ?>vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= ASSETS() ?>vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= ASSETS() ?>vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?= ASSETS() ?>vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="<?= ASSETS() ?>vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?= ASSETS() ?>src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?= ASSETS() ?>src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?= ASSETS() ?>vendors/styles/style.css">
	<?php ADD_ALL_SCRIPTS(["CDN", "REACT"]) ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>

	<div id="loading-effect" style="display:none;">
		<div class="loader"></div>
	</div>

<style>
	#loading-effect {
		position: fixed;
		height: 100%;
		width: 100%;
		left: 0;
		top: 0;
		z-index: 2000;
		background-color: rgba(0, 0, 0, 0.7);
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.loader {
	width: 60px;
	aspect-ratio: 2;
	--_g: no-repeat radial-gradient(circle closest-side,white 90%,#0000);
	background: 
		var(--_g) 0%   50%,
		var(--_g) 50%  50%,
		var(--_g) 100% 50%;
	background-size: calc(100%/3) 50%;
	animation: l3 1s infinite linear;
	}
	@keyframes l3 {
		20%{background-position:0%   0%, 50%  50%,100%  50%}
		40%{background-position:0% 100%, 50%   0%,100%  50%}
		60%{background-position:0%  50%, 50% 100%,100%   0%}
		80%{background-position:0%  50%, 50%  50%,100% 100%}
	}
</style>

<script src="<?=SRC('loading.js')?>"></script>
</head>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="<?= ASSETS() ?>img/wvsui.png" alt="" height="200" width="200"></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				<form>
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="Search Here">
						<div class="dropdown">
							<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
								<i class="ion-arrow-down-c"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">From</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">To</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Subject</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="text-right">
									<button class="btn btn-primary">Search</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<ul>
								<?php $count = 0; ?>
								<?php foreach($this->Notif_model->getNotif() as $col): $count +=1; ?>
								<?php
								$icon = "";
								$txt = "";
								$lnk = "";
								if($col['type']=="users"){$icon="icon-copy dw dw-add-user"; $txt = "Sent a registration request.";$lnk = "Users/PendingUsers";}
								if($col['type']=="files"){$icon="icon-copy dw dw-add-file1"; $txt = "Sent a file to our campus."; $lnk = "File";}
								if($col['type']=="downloads"){$icon="icon-copy dw dw-download"; $txt = "downloaded school document."; $lnk = "File/MyFiles";}
								?>
								<li>
									<a href="<?= CONTROLLER($lnk) ?>">
									<i class="<?= $icon ?>" style="width: 50px;
																				height: 50px;
																				position: absolute;
																				left: 10px;
																				top: 13px;
																				font-size: 30px;
																				border-radius: 10px;
																				text-align: center;
																				-webkit-box-shadow: 1px 2px 13px rgba(0, 0, 0, .2);
																				box-shadow: 1px 2px 13px rgba(0, 0, 0, .2);

																				display: flex;
																				align-items: center;
																				justify-content: center;"></i>
										<h3><?= $col['name'] ?></h3>
										<p><?= $txt ?></p>
										<p><small><?= $col['date'] ?></small></p>
									</a>
								</li>
								<?php if($count==10){break;} ?>
								<?php endforeach; ?>
							</ul>
							
						</div>
					</div>
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
						<span style="font-size: 52px;" class="icon-copy dw dw-user-12 text-dark"></span>
						</span>
						<span class="user-name"><?= CY_STRING_VALUE($this->EMPDATA['fullname'],"Unknown") ?></span>
						<!-- EMPDATA is inside the application/auto/controller_loader -->
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a style="cursor: pointer;display:none;" class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
						<a style="cursor: pointer;display:none;" class="dropdown-item" data-toggle="modal" data-target="#bd-example-modal-lg1222" style="display: none;"><i class="icon-copy fa fa-barcode"></i> Login Barcode</a>
						<a style="cursor: pointer;" class="dropdown-item" data-toggle="modal" id="changepassbtn" data-target="#bd-example-modal-lg12223"><i class="icon-copy fa fa-lock"></i> Change Password</a>
						<a style="cursor: pointer;display:none;" class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
						<a style="cursor: pointer;display:none;" class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
						<a class="dropdown-item" href="<?= CONTROLLER("Login/AuthLogout") ?>"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
			<div class="github-link">
				<a href="https://github.com/dropways/deskapp" target="_blank"><img src="<?= ASSETS() ?>vendors/images/github.svg" alt=""></a>
			</div>
		</div>
	</div>

<!-- START BARCODE -->
<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg1222" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Login barcode</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
			<div align="center" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; user-select: none;"><?=GET_LOGIN_DATA("username")?></div>
			<div id="qrcode111" align="center" style="padding: 20px;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- END BARCODE -->

<!-- START CHANGE PASS -->
<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg12223" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Change Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?=CONTROLLER()?>Users/changePass" method="post">
				<div class="modal-body" >
				<div align="center" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; user-select: none;"><?=GET_LOGIN_DATA("username")?></div>
				<div style="padding-top: 20px;">
					<div class="rw">
						<div>Current Password: <span class="text-danger"><?= $_SESSION['input_error']['cpassword'] ?? null ?></span></div>
						<input type="password" class="form-control" name="cpassword">
					</div>
					<div class="rw">
						<div>New Password: <span class="text-danger"><?= $_SESSION['input_error']['npassword'] ?? null ?></span></div>
						<input type="password" class="form-control" name="npassword">
					</div>
					<div class="rw">
						<div>Re-Enter Password: <span class="text-danger"><?= $_SESSION['input_error']['rpassword'] ?? null ?></span></div>
						<input type="password" class="form-control" name="rpassword">
					</div>
				</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</form>
        </div>
    </div>
</div>
<style> .rw{padding: 5px;}</style>
<!-- END CHANGE PASS -->



	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
				</div>
			</div>
		</div>
	</div>

	<div class="left-side-bar">
		<div class="" style="padding:15px 5px 0px 5px;">
			<a href="#">
				<img src="<?= ASSETS() ?>img/wvsui.png" alt="" style="height: 60px;" height="50" width="100%" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li>
						<div class="dropdown-divider"></div>
					</li>
					<li>
						<div align="center" class="text-white">
							<div>DEPARTMENT ADMIN</div>
							<div><small><?= $this->school_tbl->mySchool('full_name') ?></small></div>
							<div><small><?= $this->school_tbl->mySchool('campus').' '.$this->school_tbl->mySchool('department') ?></small></div>
						</div>
					</li>
					<li>
						<div class="dropdown-divider"></div>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-file-72"></span><span class="mtext">Documents</span>
						</a>
						<ul class="submenu">
							<li><a href="<?= CONTROLLER("File") ?>">Pending</a></li>
							<li><a href="<?= CONTROLLER("File/MyFiles") ?>">Received Documents</a></li>
							<li><a href="<?= CONTROLLER("File/sentFiles") ?>">Sent documents</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user-12"></span><span class="mtext">Users</span>
						</a>
						<ul class="submenu">
							<li><a href="<?= CONTROLLER("Users/PendingUsers") ?>">Pending Request</a></li>
							<li><a href="<?= CONTROLLER("Users/ActiveUsers") ?>">All Users</a></li>
						</ul>
					</li>
					<li>
						<a href="<?=CONTROLLER('File/myDocuments')?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-analytics-17"></span><span class="mtext">My Documents</span>
						</a>
					</li>
					<li>
						<a href="<?=CONTROLLER('File/PublicDocs')?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user-11"></span><span class="mtext">Public Documents</span>
						</a>
					</li>
					<li>
						<a href="<?=CONTROLLER('File/Registry')?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-analytics-17"></span><span class="mtext">Sent Files</span>
						</a>
					</li>
					<li>
						<div class="dropdown-divider"></div>
					</li>
			
					
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				
				
				<!-- Export Datatable start -->
				 <div>
					<?php CY_VIEW_CONTENT($content) ?>
				</div>
				<!-- Export Datatable End -->
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				West Visayas State University <a href="https://github.com/YroDevGit/CodeYro" target="_blank">CY framework</a>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="<?= ASSETS() ?>vendors/scripts/core.js"></script>
	<script src="<?= ASSETS() ?>vendors/scripts/script.min.js"></script>
	<script src="<?= ASSETS() ?>vendors/scripts/process.js"></script>
	<script src="<?= ASSETS() ?>vendors/scripts/layout-settings.js"></script>
	<script src="<?= ASSETS() ?>src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?= ASSETS() ?>src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?= ASSETS() ?>src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="<?= ASSETS() ?>src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="<?= ASSETS() ?>src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="<?= ASSETS() ?>src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="<?= ASSETS() ?>src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="<?= ASSETS() ?>src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="<?= ASSETS() ?>src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="<?= ASSETS() ?>src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="<?= ASSETS() ?>src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="<?= ASSETS() ?>vendors/scripts/datatable-setting.js"></script></body>
</html>

<script src="<?= SRC()?>qrcode.min.js"></script>
	<script>
        window.addEventListener("load", function(){
			var qrcode = new QRCode(document.getElementById("qrcode111"), {
            text: "<?=GET_LOGIN_DATA('code')?>",
            width: 350,
            height: 350,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
		})
    </script>

	<?php if(isset($_SESSION['changepass'])): ?>
		<?php if($_SESSION['changepass']==200): ?>
			<script>window.addEventListener("load", ()=>SuccessMessage("Password has been changed.!"));</script>
		<?php elseif($_SESSION['changepass']==2): ?>
			<script>window.addEventListener("load", function(){
				ErrorMessage("Password Not Matched");
				document.getElementById('changepassbtn').click();
			});</script>
		<?php elseif($_SESSION['changepass']==1): ?>
		<script>window.addEventListener("load", function(){
			document.getElementById('changepassbtn').click();
		});</script>
		<?php elseif($_SESSION['changepass']==3): ?>
		<script>window.addEventListener("load", function(){
			ErrorMessage("Incorrect Password");
			document.getElementById('changepassbtn').click();
		});</script>
		<?php endif; ?>
	<?php endif; ?>

	<?php if(isset($_SESSION['input_error'])){unset($_SESSION['input_error']);} ?>
	<?php if(isset($_SESSION['changepass'])){unset($_SESSION['changepass']);} ?>
