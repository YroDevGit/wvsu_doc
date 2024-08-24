<?php CY_ASSIGNED_ROLES(["ADMIN"]) ?>
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4><?= CY_STRING_VALUE($title) ?></h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a >Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= CY_STRING_VALUE($title) ?></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
            <!-- <button>ADD</button> -->
        </div>
    </div>
</div>
<div class="card-box mb-30">
    <div class="pd-20">
       
        <h4 class="text-blue h4">Pending Documents</h4>
    </div>
    <div class="pb-20">
        <table class="table hover data-table-export nowrap" export="Files">
            <thead>
                <tr>
                    <th></th>
                    <th class="table-plus datatable-nosort">Action</th>
                    <th class="">From</th>
                    <th>Title</th>
                    <th>File</th>
                    <th>Document Type</th>
                    <th>Details</th>
                    <th>Purpose</th>
                    
                    <th>Date</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach($this->files_tbl->getMyPendigFiles() as $col): ?>
                    <?php $school = $col['school']; $efullname =$this->emp_tbl->getEmployeeById($col['emp_id'], 'fullname'); ?>
                    <tr>
                        <td></td>
                        <td>
                        <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="#" onclick="ReceiveDoc(this)" data="<?= ENCRYPT($col['id']) ?>" title="Accept file"><i class="dw dw-check"></i> Accept</a>
                                    <a class="dropdown-item" href="#" onclick="IgnoreDoc(this)" data="<?= ENCRYPT($col['id']) ?>" filename="<?= $col['file'] ?>" title="Ignore file"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        <!--
                        <button class="btn btn-success" style="border-radius: 50%;height:28px; width:28px;text-align:center;padding:0px;font-size:0px;" onclick="ReceiveDoc(this)" data="<?= ENCRYPT($col['id']) ?>" title="Accept file"><span class="icon-copy ti-check-box text-white" style="font-size:16px;"></span></button>
                        <button class="btn btn-danger" style="border-radius: 50%;height:28px; width:28px;text-align:center;padding:0px;font-size:0px;" onclick="IgnoreDoc(this)" data="<?= ENCRYPT($col['id']) ?>" filename="<?= $col['file'] ?>" title="Ignore file"><span class="icon-copy dw dw-delete-3 text-white" style="font-size:16px;"></span></button>
                        -->
                        </td>
                        <td><?=($col['emp_id']==0)? "<i class='icon-copy dw dw-user1' title='public user'></i> " : "<i class='icon-copy dw dw-building' title='$efullname'></i> "?><?= ($col['emp_id'] == 0) ? $col['from'] : $school ?></td>
                        <td><?= $col['caption'] ?></td>
                        <td><a onclick="showFile('<?= STORAGE().$col['file'] ?>', '<?= $col['caption'] ?>', false)"><button class="btn" title="<?= $col['file'] ?>"><i class="icon-copy dw dw-eye text-primary" style="font-size: 22px;" aria-hidden="true"></i></button></a></td>
                        <td><?= $col['doctype'] ?></td>
                        <td><button type="button" class="btn  margin-5" data-container="body" data-toggle="popover" data-placement="top" data-content="<?= $col['details'] ?>" title="Details">👁️</button></td>
                        <td><button type="button" class="btn  margin-5" data-container="body" data-toggle="popover" data-placement="top" data-content="<?= $col['purpose'] ?>" title="Purpose">👁️</button></td>
                        <td><?= $col['date_created'] ?></td>
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
        showLoading();
        try {
        var id = elem.getAttribute("data");
        var param = { "id": id };
        var result = await axios.post("<?= CONTROLLER() ?>File/acceptFile", param);
        var data = result.data;
        console.log(data.code);
        if (data.code == 200) {
            SuccessMessage("Document accepted", "reload");
            hideLoading();
        } else {
            ErrorMessage("Failed");
            hideLoading();
        }
        } catch (error) {
            console.error("Error receiving document:", error);
            ErrorMessage("An error occurred while processing your request.");
            hideLoading();
        } 
    });
    }

    async function IgnoreDoc(elem) {
    ConfirmationMessage("Are you sure to ignore this document?", async function(){
        showLoading();
        try {
        var id = elem.getAttribute("data");
        var filename = elem.getAttribute("filename");
        var param = { "id": id, "filename": filename };
        var result = await axios.post("<?= CONTROLLER() ?>File/ignoreFile", param);
        var data = result.data;
        console.log(data.code);
        if (data.code == 200) {
            SuccessMessage("Document rejected.", "reload");
            hideLoading();
        } else {
            ErrorMessage("Failed");
            hideLoading();
        }
        } catch (error) {
            console.error("Error:", error);
            ErrorMessage("An error occurred while processing your request.");
            hideLoading();
        } 
    }, "warning");
    }

</script>




