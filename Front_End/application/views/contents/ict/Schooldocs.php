<?php CY_ASSIGNED_ROLES(["ICT"]) ?>
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
    <?php $schoolname = $this->school_tbl->mySchool('school'); $campusname = $this->school_tbl->mySchool('campus'); ?>
    <h4 class="text-blue h4"><?= $schoolname." ".$campusname ?> Shared Documents</h4>
    </div>
    <div class="pb-20">
        <table class="table hover data-table-export nowrap" export="Files">
            <thead>
                <tr>
                    <th></th>
                    <th class="table-plus datatable-nosort">Action</th>
                    <th>Title</th>   
                    <th>Details</th>
                    <th>Purpose</th>
                    <th>File</th>
                    <th class="">From</th>
                    <th>Date</th> 
                    <th>Document Type</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($this->files_tbl->getMyFiles() as $col): ?>
                    <tr>
                        <td></td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                        <td><?= $col['caption'] ?></td>
                        <td><button type="button" class="btn  margin-5" data-container="body" data-toggle="popover" data-placement="top" data-content="<?= $col['details'] ?>" title="Details">👁️</button></td>
                        <td><button type="button" class="btn  margin-5" data-container="body" data-toggle="popover" data-placement="top" data-content="<?= $col['purpose'] ?>" title="Purpose">👁️</button></td>
                        <td><a onclick="showFile('<?= STORAGE().$col['file'] ?>', '<?= $col['caption'] ?>', true, '<?=ENCRYPT($col['id'])?>'); trackViewer('<?=ENCRYPT($col['id'])?>')"><button class="btn" title="<?= $col['file'] ?>"><i class="icon-copy dw dw-eye text-primary" style="font-size: 22px;" aria-hidden="true"></i></button></a></td>
                        <td><?= ($col['emp_id'] == 0) ? $col['from'] : $col['fullname'] ?></td>
                        <td><?= $col['date_created'] ?></td>
                        <td><?= $col['doctype'] ?></td>
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
   

   document.getElementById("download-button-cy-preview").addEventListener("click", async function(){
        $id = document.getElementById("download-button-cy-preview").getAttribute("filenumber");
        $param = {"id": $id};
        $result = await axios.post("<?=CONTROLLER()?>File/download_doc", $param);
        $data = $result.data;
        if($data.code == 200){
            SuccessMessage("File Downloaded");
        }
   });

   async function trackViewer($id){
        $param = {"file_id":$id};
        $result = await axios.post("<?= CONTROLLER() ?>File/trackView", $param);
        $status = $result.data;
        if($status.code == 200){
            console.log("abcd");
        }
   }

    

</script>

<body>
    