<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title><?= CY_STRING_VALUE($title, "Register") ?></title>

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
	<link rel="stylesheet" type="text/css" href="<?= ASSETS() ?>src/plugins/jquery-steps/jquery.steps.css">
	<link rel="stylesheet" type="text/css" href="<?= ASSETS() ?>vendors/styles/style.css">
    <?php ADD_ALL_SCRIPTS([]) ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>

<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<img src="<?= ASSETS() ?>img/wvsui.png" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="<?= CONTROLLER("Login") ?>">Login</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="<?= ASSETS() ?>vendors/images/register-page-img.png" alt="">
				</div>
				<div class="col-md-12 col-lg-5">
					<div class=" bg-white box-shadow border-radius-10">
                    <div class="pd-20 card-box">
							<h5 class="h4 text-blue mb-20">Register here...</h5>
							<div class="tab">
								<?php SELECTED_ROLES_TAB($tab) ?>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="home" role="tabpanel">
										<div class="pd-20">
                                            <div class="login-title pb-20">
                                                <h6 class="text-center text-primary">User</h6>
                                            </div>
                                            <form  enctype="multipart/form-data" action="<?= CONTROLLER('Register/addUser?r='.ENCRYPT('ICT')) ?>" method="post">
                                                <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-name"></i> Fullname: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("fullname")?></span></label></div>
                                                <div class="input-group1 custom">
                                                    <input type="text" class="form-control form-control-sm" placeholder="Fullname" name="fullname" value="<?= INPUT_OLD_VALUE("fullname") ?>">
                                                    <div class="input-group-append custom">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                </div>

                                                <label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-building1"></i> School: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("school")?></span></label>
                                                <div class="input-group1 custom">
                                                        <select class="selectpicker form-control" id="schoolSelect" data-live-search="true" name="school">
                                                            <option value="">SELECT SCHOOL/OFFICE</option>
                                                            <?php $SCHOOLS =  $this->school_tbl->getAll(); ?>
                                                            <?php foreach($SCHOOLS as $col): ?>
                                                                <option value="<?=ENCRYPT($col['id'])?>" data-subtext="<?= $col['campus'].' '.$col['department'] ?>"><?= $col['school'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                </div>

												<div class=""><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-email-1"></i> School ID: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("idcard")?></span></label></div>
												<div class="file-input-container input-group1 form-control" style="display:block;">
													<input type="file" class="imageInput" accept="image/*" name="idcard">
													<div style="float: right;"><button class="previewButton" type="button" style="height: 100%;">👁️</button></div>
												</div>

                                                <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-email-1"></i> Email: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("email")?></span></label></div>
                                                <div class="input-group1 custom">
                                                    <input type="email" class="form-control form-control-sm" type="text" placeholder="Email address" name="email" value="<?= INPUT_OLD_VALUE("email") ?>">
                                                    <div class="input-group-append custom">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="input-group1 pt-15 mb-0">
                                                            <button class="btn btn-primary btn-lg btn-block" type="submit">Register</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
										</div>
									</div>
									<div class="tab-pane fade" id="profile" role="tabpanel">
										<div class="pd-20">
                                            <div class="login-title pb-20">
                                                <h6 class="text-center text-success">Department</h6>
                                            </div>
                                            <form enctype="multipart/form-data" action="<?= CONTROLLER('Register/addUser?r='.ENCRYPT('ADMIN')) ?>" method="post">
                                                <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-name"></i> Fullname: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("fullname")?></span></label></div>
                                                <div class="input-group1 custom">
                                                    <input type="text" class="form-control form-control-sm" placeholder="Fullname" name="fullname" value="<?= INPUT_OLD_VALUE("fullname") ?>">
                                                    <div class="input-group-append custom">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                </div>

                                                <label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-building1"></i> School: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("school")?></span></label>
                                                <div class="input-group1 custom">
                                                        <select class="selectpicker form-control" id="schoolSelect" data-live-search="true" name="school">
                                                            <option value="">SELECT SCHOOL/OFFICE</option>
                                                            <?php $SCHOOLS =  $this->school_tbl->getAll(); ?>
                                                            <?php foreach($SCHOOLS as $col): ?>
                                                                <option value="<?=ENCRYPT($col['id'])?>" data-subtext="<?= $col['campus'].' '.$col['department'] ?>"><?= $col['school'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                </div>

												<div class=""><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-email-1"></i> School ID: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("idcard")?></span></label></div>
												<div class="file-input-container input-group1 form-control" style="display:block;">
													<input type="file" class="imageInput" accept="image/*" name="idcard">
													<div style="float: right;"><button class="previewButton" type="button" style="height: 100%;">👁️</button></div>
												</div>

                                                <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-email-1"></i> Email: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("email")?></span></label></div>
                                                <div class="input-group1 custom">
                                                    <input type="email" class="form-control form-control-sm" type="text" placeholder="Email address" name="email" value="<?= INPUT_OLD_VALUE("email") ?>">
                                                    <div class="input-group-append custom">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="input-group1 pt-15 mb-0">
                                                            <button class="btn btn-success btn-lg btn-block" type="submit">Register</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
										</div>
									</div>
									<div class="tab-pane fade" id="contact" role="tabpanel">
										<div class="pd-20">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- success Popup html Start -->
	<button type="button" id="success-modal-btn" hidden data-toggle="modal" data-target="#success-modal" data-backdrop="static">Launch modal</button>
	<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered max-width-400" role="document">
			<div class="modal-content">
				<div class="modal-body text-center font-18">
					<h3 class="mb-20">Form Submitted!</h3>
					<div class="mb-30 text-center"><img src="<?= ASSETS() ?>vendors/images/success.png"></div>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				</div>
				<div class="modal-footer justify-content-center">
					<a href="login.html" class="btn btn-primary">Done</a>
				</div>
			</div>
		</div>
	</div>
	<!-- success Popup html End -->
	<!-- js -->
	<script src="<?= ASSETS() ?>vendors/scripts/core.js"></script>
	<script src="<?= ASSETS() ?>vendors/scripts/script.min.js"></script>
	<script src="<?= ASSETS() ?>vendors/scripts/process.js"></script>
	<script src="<?= ASSETS() ?>vendors/scripts/layout-settings.js"></script>
	<script src="<?= ASSETS() ?>src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="<?= ASSETS() ?>vendors/scripts/steps-setting.js"></script>
</body>

</html>
<style>.input-group1{padding-bottom: 10px;} .brand-logo a span{color:#1502bd;} .bootstrap-select .dropdown-toggle{height:38px;font-size: .875rem;}</style>

<?php if(GET_FLASHDATA("register_status")): ?>

    <?php if(GET_FLASHDATA("register_status")=="SUCCESS"): ?>

    <script>PageLoaded(()=>SuccessMessage("Registration request sent."));</script>

	<?php elseif(GET_FLASHDATA("register_status")=="DUPLICATE"): ?>
		<script>PageLoaded(()=> ErrorMessage("Email address already exist.!"))</script>
    <?php else: ?>
        <script>PageLoaded(()=> ErrorMessage("<?= GET_FLASHDATA("register_status") ?>"))</script>
    <?php endif; ?>

<?php endif; ?>

<div id="imageModal" class="cy-file-popup">
	<span id="closeModal" class="close">&times;</span>
	<img id="imagePreview" src="#" alt="Image Preview">
</div>

<link rel="stylesheet" href="<?= SRC('fileview.css') ?>">
<script src="<?= SRC('fileview.js')?>"></script>