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
	<link rel="stylesheet" type="text/css" href="<?= ASSETS() ?>vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<?php ADD_ALL_SCRIPTS(["react"]) ?>
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
				<a href="">
					<img src="<?= ASSETS() ?>img/wvsu.png" alt="" height="70" width="70">
                    <span>West Visayas State University</span>
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="<?= CONTROLLER('Register') ?>">Register</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex  flex-wrap justify-content-center">
		<div class="container">
			<div class="row ">
				<div class="col-md-6 col-lg-7">
					<div class="bg-white box-shadow border-radius-10 col-md-10 pd-30">
                        <div class="login-title pb-20">
							<h5 class="text-center text-primary">Submit Document (For Guest)</h5>
						</div>
                        <form class="CY_SUBMIT_ONCE" action="<?=CONTROLLER("File/addFile")?>" method="post" enctype="multipart/form-data">

                            <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-user1"></i> From: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("from")?></span></label></div>
                            <div class="input-group1 custom">
								<input type="text" class="form-control form-control-sm" placeholder="From" name="from">
								<div class="input-group-append custom">
									<span class="input-group-text"></i></span>
								</div>
							</div>

                            <label style="color:gray;" for=""><i class="icon-copy dw dw-building1"></i> Office: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("office")?></span></label>
                            <div class="input-group1 custom">
									<select class="selectpicker form-control" id="schoolSelect" data-live-search="true" name="office">
										<option value="">SELECT SCHOOL/OFFICE</option>
										<?php $SCHOOLS =  $this->school_tbl->getAll(); ?>
										<?php foreach($SCHOOLS as $col): ?>
											<option value="<?=ENCRYPT($col['id'])?>" data-subtext="<?= $col['campus'] ?>"><?= $col['school'] ?></option>
										<?php endforeach; ?>
									</select>
							</div>

							<div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-file"></i> Title/Caption: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("caption")?></span></label></div>
                            <div class="input-group1 custom">
								<input type="text" class="form-control form-control-sm" placeholder="Title" name="caption">
								<div class="input-group-append custom">
									<span class="input-group-text"></i></span>
								</div>
							</div>

                            <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-file"></i> Document type: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("doctype")?></span></label></div>
                            <div class="input-group1 custom">
								<input type="text" class="form-control form-control-sm" placeholder="Document type" name="doctype">
								<div class="input-group-append custom">
									<span class="input-group-text"></i></span>
								</div>
							</div>

                            <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-file-72"></i> Details: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("details")?></span></label></div>
                            <div class="input-group1 custom">
								<input type="text" class="form-control form-control-sm" placeholder="Details" name="details">
								<div class="input-group-append custom">
									<span class="input-group-text"></span>
								</div>
							</div>

                            <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-user-3"></i> Purpose of submission: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("purpose")?></span></label></div>
                            <div class="input-group1 custom">
								<input type="text" class="form-control form-control-sm" placeholder="Purpose of submission" name="purpose">
								<div class="input-group-append custom">
									<span class="input-group-text"></span>
								</div>
							</div>

                            <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-attachment"></i> Attach file: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("attfile")?></span></label></div>
                            <div class="input-group1 custom">
								<input type="file" class="form-control form-control-sm" placeholder="Attach file" name="attfile">
								<div class="input-group-append custom">
									<span class="input-group-text"></span>
								</div>
							</div>

							<div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-email"></i> Sender email (Optional: when you want update about file you sent.): </label></div>
							<div><span class="text-danger" style="color:gray;font-size:14px;"><?=VALIDATION_INPUT_ERROR("myemail")?></span></div>
                            <div class="input-group1 custom">
								<input type="text" class="form-control form-control-sm" placeholder="Sender email" name="myemail">
								<div class="input-group-append custom">
									<span class="input-group-text"></span>
								</div>
							</div>

							<div class="row">
								<div class="input-group mb-0 pd-10">
									<button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
								</div>
							</div>
                            
                        </form>
                    </div>
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="bg-white box-shadow border-radius-10 col-md-15 pd-30">
						<div class="login-title pb-20">
							<h5 class="text-center text-primary">Login To WVSU</h5>
						</div>
						<form method="post" action="<?= CONTROLLER("Login/Auth") ?>">
						<div><label for="" style="color:gray;"><span class="text-danger"><?= VALIDATION_INPUT_ERROR("options") ?></span></label></div>
							<div class="select-role">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn">
										<input type="radio" name="options" value="<?=ENCRYPT("ADMIN")?>" id="admin">
										<div class="icon"><img src="<?= ASSETS() ?>vendors/images/briefcase.svg" class="svg" alt=""></div>
										<span>I'm</span>
										Admin
									</label>
									<label class="btn">
										<input type="radio" name="options" id="superadmin" value="<?=ENCRYPT("SUPERADMIN")?>">
										<div class="icon"><i class="icon-copy dw dw-user-2" style="font-size:27px;color:white; background:#1b00ff;padding:1px 2px 1px 1px;border-radius:5px;"></i></div>
										<span>I'm</span>
										Web admin
									</label>
									<label class="btn" style="margin-top: 10px;">
										<input type="radio" name="options" id="user" value="<?=ENCRYPT("ICT")?>">
										<div class="icon"><img src="<?= ASSETS() ?>vendors/images/person.svg" class="svg" alt=""></div>
										<span>I'm</span>
										Dept. Tech.
									</label>
								</div>
							</div>
							<div><label for="" style="color:gray;">Username/Email: <span class="text-danger"><?= VALIDATION_INPUT_ERROR("username") ?></span></label></div>
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Username" name="username" value="<?= CY_INPUT_OLD_VALUE('username') ?>">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div><label for="" style="color:gray;">Password: <span class="text-danger"><?= VALIDATION_INPUT_ERROR("password") ?></span></label></div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="**********" name="password">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Remember</label>
									</div>
								</div>
								<div class="col-6">
									<div class="forgot-password"><a href="forgot-password.html">Forgot Password</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
										<button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</a>
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" data-toggle="modal" data-target="#bd-example-modal-lg010101" id="startScanner">SCAN BARCODE</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg010101" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Login barcode</h4>
                <button type="button" class="close" id="closemodax" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
				<div align="center"><video id="videoscanner" width="350" height="350" style="border: 1px solid black"></video></div>
            </div>

        </div>
    </div>
</div>
	<!-- js -->
	<script src="<?= ASSETS() ?>vendors/scripts/core.js"></script>
	<script src="<?= ASSETS() ?>vendors/scripts/script.min.js"></script>
	<script src="<?= ASSETS() ?>vendors/scripts/process.js"></script>
	<script src="<?= ASSETS() ?>vendors/scripts/layout-settings.js"></script>
	<script src="<?=SRC()?>barcodescanner.js"></script>
</body>
</html>
<style>.input-group1{padding-bottom: 10px;} .brand-logo a span{color:#1502bd;} .bootstrap-select .dropdown-toggle{height:38px;font-size: .875rem;}</style>

<?php if($fl = GET_FLASHDATA("status")): ?>
	<?php if($fl == "SUCCESS"): ?>
		<script>PageLoaded(()=> SuccessMessage("Login success."));</script>
	<?php elseif($fl == "INACTIVE"): ?>
		<script>PageLoaded(()=> ErrorMessage("Account not active.!"));</script>
	<?php else: ?>
		<script>PageLoaded(()=> ErrorMessage("<?=$fl?>"));</script>
	<?php endif; ?>
<?php endif; ?>



<?php if(GET_FLASHDATA("file_status") == "SUCCESS"): ?>
	<script>
		PageLoaded(()=> SuccessMessage("Document submitted",'<?= CONTROLLER("Login") ?>'));
	</script>
<?php elseif(GET_FLASHDATA("file_status") == "FAILED"): ?>
	<script>
		PageLoaded(()=> ErrorMessage("Failed to submit document"));
	</script>
<?php endif; ?>


<script>
	window.addEventListener("load", function(){
		const codeReader = new ZXing.BrowserMultiFormatReader();
        const video = document.getElementById('videoscanner');
        const result = document.getElementById('result');
        const startScannerButton = document.getElementById('startScanner');
        const stopScannerButton = document.getElementById('closemodax');

        let scanning = false;

		function scanBarcode() {
            return new Promise((resolve, reject) => {
                if (scanning) return; 

                scanning = true;
              

                codeReader
                    .listVideoInputDevices()
                    .then((videoInputDevices) => {
                        const firstDeviceId = videoInputDevices[0].deviceId;
                        codeReader.decodeOnceFromVideoDevice(firstDeviceId, 'videoscanner')
                            .then((scanResult) => {
                                scanning = false; 
                                resolve(scanResult.text);
								
                            })
                            .catch((err) => {
                                console.error(err);
                                scanning = false; 
                                reject(err);
                            });
                    })
                    .catch((err) => {
                        console.error(err);
                        scanning = false; 
                        reject(err);
                    });
            });
        }

		function stopScanner() {
            if (!scanning) return; 

            codeReader.reset();
            video.srcObject.getTracks().forEach(track => track.stop());
            scanning = false;
        }

		stopScannerButton.addEventListener('click', stopScanner);

        document.getElementById('startScanner').addEventListener('click', () => {
            scanBarcode()
                .then(barcodeText => {
					video.srcObject.getTracks().forEach(track => track.stop());
					stopScannerButton.click();
					LoginBarcode(barcodeText);
                })
                .catch(err => {
                    console.error('Scanning failed:', err);
					video.srcObject.getTracks().forEach(track => track.stop());
					stopScannerButton.click();
                });
				
        });

		async function LoginBarcode($code){
			$param = {"code":ENCRYPT($code)};
			$result = await axios.post("<?=CONTROLLER()?>Login/scann", $param);
			$status = $result.data;
			if($status.code == 200){
				SuccessMessage("Login success", "reload");
			}
			else{
				ErrorMessage("Login Failed", "reload");
			}
		}
	});
</script>

	


