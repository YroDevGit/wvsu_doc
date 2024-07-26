<?php CY_ASSIGNED_ROLES(["ADMIN"]) ?>
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4><?= CY_STRING_VALUE($title) ?></h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= CY_STRING_VALUE($title) ?></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
            
        </div>
    </div>
</div>
<div class="card-box mb-30">
    <div class="pd-20">
       <?php $schoolname = $this->school_tbl->mySchool('school'); $campusname = $this->school_tbl->mySchool('campus'); ?>
        <h4 class="text-blue h4"><?= $schoolname." ".$campusname ?> Pending registration</h4>
    </div>
    <div class="pb-20">
        <table class="table hover data-table-export nowrap" export="Files">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort"></th>
                    <th class="table-plus datatable-nosort">Action</th>
                    <th>Fullname</th>   
                    <th>School</th>
                    <th>Email</th>
                    <th>ID card</th>
                    <th>Request date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($this->users_tbl->showPendingUsers() as $col): ?>
                    <tr>
                        <td></td>
                        <td>
                            <button class="btn btn-success" style="border-radius: 50%;height:28px; width:28px;text-align:center;padding:0px;font-size:0px;" onclick="acceptUser('<?= ENCRYPT($col['id']) ?>', '<?= $col['fullname'] ?>', '<?= ENCRYPT($col['username']) ?>')" data="" title="Accept file"><span class="icon-copy ti-check-box text-white" style="font-size:16px;"></span></button>
                            <button class="btn btn-danger" style="border-radius: 50%;height:28px; width:28px;text-align:center;padding:0px;font-size:0px;" onclick="ignoreUser('<?= ENCRYPT($col['id']) ?>','<?= $col['fullname'] ?>', '<?= ENCRYPT($col['id_card']) ?>', '<?= ENCRYPT($col['username']) ?>')" data="" filename="" title="Ignore file"><span class="icon-copy dw dw-delete-3 text-white" style="font-size:16px;"></span></button>
                        </td>
                        <td><?= $col['fullname'] ?></td>
                        <td><?= $col['school']." ".$col['campus'] ?></td>
                        <td><?= $col['username'] ?></td>
                        <td><a onclick="showFile('<?= STORAGE().$col['id_card'] ?>', 'School ID', false)"><button class="btn" title="ID CARD"><i class="icon-copy dw dw-eye text-primary" style="font-size: 22px;" aria-hidden="true"></i></button></a></td>
                        <td><?= DATE_TRANSLATE($col['date_requested']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>



<script>
    function dl_file($file){
        ConfirmationMessage("Are you sure to download file: "+$file+"?", ()=>window.location.href = "<?= CONTROLLER() ?>FIle/download?downloadfile="+$file);
    }

    async function ReceiveDoc(elem) {
    ConfirmationMessage("Are you sure to accept this document?", async function(){
        try {
        var id = elem.getAttribute("data");
        var param = { "id": id };
        var result = await axios.post("<?= CONTROLLER() ?>File/acceptFile", param);
        var data = result.data;
        console.log(data.code);
        if (data.code == 200) {
            SuccessMessage("Document accepted", "reload");
        } else {
            ErrorMessage(data.message);
        }
        } catch (error) {
            console.error("Error receiving document:", error);
            ErrorMessage("An error occurred while processing your request.");
        } 
    });
    }

    async function acceptUser($userid, $fullname, $username){
        ConfirmationMessage("Are you sure to accept user "+$fullname+"?", async function(){
        showLoading();
        $param  = {"id" : $userid, "email" : $username};
        $result = await axios.post("<?= CONTROLLER() ?>Users/acceptUser", $param);
        $data = $result.data;
        if($data.code == 200){
            hideLoading();
            SuccessMessage("User activated", "reload");
        }
        else{
            hideLoading();
            ErrorMessage($data.message);
        }   
        });
    }

    async function ignoreUser($userid, $fullname, $file, $email){
        ConfirmationMessage("Are you sure to remove user "+$fullname+" request?", async function(){
        showLoading();
        $param  = {"id" : $userid, "file" : $file, "email":$email};
        $result = await axios.post("<?= CONTROLLER() ?>Users/ignoreUser", $param);
        $data = $result.data;
        if($data.code == 200){
            hideLoading();
            SuccessMessage("User removed", "reload");
        }
        else{
            hideLoading();
            ErrorMessage($data.message);
        }   
        }, "warning");
    }

</script>

<body>
    