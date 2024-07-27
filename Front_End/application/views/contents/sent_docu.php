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
             <button data-toggle="modal" data-target="#bd-example-modal-lg" type="button" id="sendfile" class="btn btn-primary">SEND FILE</button>
        </div>
    </div>
</div>
<div class="card-box mb-30">
    <div class="pd-20">
       
        <h4 class="text-blue h4">Sent Documents </h4>
    </div>
    <div class="pb-20">
        <table class="table hover data-table-export nowrap" export="Files">
            <thead>
                <tr>
                    <th></th>
                    <th class="table-plus datatable-nosort">Action</th> 
                    <th>Status</th>
                    <th>Caption</th>
                    <th>To</th>
                    <th>File</th>
                    <th>Details</th>
                    <th>Purpose</th>
                    <th>Date</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach($this->files_tbl->myFilesSent() as $col): ?>
                    <?php
                     $recieved = $col['received_by'];
                     $color = "";
                     $label = "";
                     if($recieved==0){
                        $color = "black";
                        $label = "Pending request";
                     }
                     else{
                        $color = "green";
                        $label = "File received";
                     }
                    ?>
                    <tr>
                        <td></td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                        <td><div style="cursor:pointer;height: 20px; width: 20px; background-color: <?=$color?>;border-radius:50%;" data-container="body" data-toggle="popover" data-placement="top" data-content="<?= $label ?>" title="Status"></div></td>
                        <td><?= $col['caption'] ?></td>
                        <td><?= $col['school']." ".$col['campus'] ?></td>
                        <td><a onclick="showFile('<?= STORAGE().$col['file'] ?>', '<?= $col['caption'] ?>', true, '<?=ENCRYPT($col['id'])?>'); trackViewer('<?=ENCRYPT($col['id'])?>')"><button class="btn" title="<?= $col['file'] ?>"><i class="icon-copy dw dw-eye text-primary" style="font-size: 22px;" aria-hidden="true"></i></button></a></td>
                        <td><button type="button" class="btn  margin-5" data-container="body" data-toggle="popover" data-placement="top" data-content="<?= $col['details'] ?>" title="Details">👁️</button></td>
                        <td><button type="button" class="btn  margin-5" data-container="body" data-toggle="popover" data-placement="top" data-content="<?= $col['purpose'] ?>" title="Purpose">👁️</button></td>
                        <td><?= $col['date_created'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade bs-example-modal" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Send files</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?=CONTROLLER("File/sendFile")?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <label style="color:gray;" for=""><i class="icon-copy dw dw-building1"></i> School/Office: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("office")?></span></label>
                <div class="input-group1 custom">
                    <select class="selectpicker form-control" id="schoolSelect" data-live-search="true" name="office">
                        <option value="">SELECT SCHOOL/OFFICE</option>
                        <?php $SCHOOLS =  $this->school_tbl->getAll(false); ?>
                        <?php foreach($SCHOOLS as $col): ?>
                            <option value="<?=ENCRYPT($col['id'])?>" data-subtext="<?= $col['campus'] ?>"><?= $col['school'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-attachment"></i> Attach file: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("attfile")?></span></label></div>
                <div class="input-group1 custom">
                    <input type="file" class="form-control form-control-sm" placeholder="Attach file" name="attfile">
                    <div class="input-group-append custom">
                        <span class="input-group-text"></span>
                    </div>
                </div>

                <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-file"></i> Title/Caption: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("caption")?></span></label></div>
                <div class="input-group1 custom">
                    <input type="text" class="form-control form-control-sm" placeholder="Title" name="caption">
                    <div class="input-group-append custom">
                        <span class="input-group-text"></i></span>
                    </div>
                </div>

                <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-file"></i> Document type: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("caption")?></span></label></div>
                <div class="input-group1 custom">
                    <input type="text" class="form-control form-control-sm" placeholder="Document type" name="doctype">
                    <div class="input-group-append custom">
                        <span class="input-group-text"></i></span>
                    </div>
                </div>

                <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-file"></i> Details: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("caption")?></span></label></div>
                <div class="input-group1 custom">
                    <input type="text" class="form-control form-control-sm" placeholder="Details" name="details">
                    <div class="input-group-append custom">
                        <span class="input-group-text"></i></span>
                    </div>
                </div>

                <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-file"></i> Purpose: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("caption")?></span></label></div>
                <div class="input-group1 custom">
                    <input type="text" class="form-control form-control-sm" placeholder="Purpose" name="purpose">
                    <div class="input-group-append custom">
                        <span class="input-group-text"></i></span>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Send</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Views History</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div style="padding:5px 10px 5px 10px;">
                <span id="caption1"></span>
            </div>
            <div style="padding:5px 10px 5px 10px;">
                <span id="modaltitle1"></span>
            </div>
            <div class="modal-body">
                <table class="table hover data-table-export nowrap" id="viewstable" export="DownloadFiles">
                    <thead>
                        <th>Name</th>
                        <th>Device</th>
                        <th>Date</th>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php if(VALIDATION_HAS_ERRORS()): ?>
    <script>PageLoaded(()=> Click("#sendfile"))</script>
<?php endif; ?>

<?php if(CY_REDIRECT_DATA("send_status")): ?>
    <?php if(CY_REDIRECT_DATA("send_status")=="success"): ?>
        <script>PageLoaded(()=>SuccessMessage("File sent successfully"));</script>
    <?php endif; ?>
    <?php if(CY_REDIRECT_DATA("send_status")=="failed"): ?>
        <script>PageLoaded(()=>ErrorMessage("File Not Sent"));</script>
    <?php endif; ?>
<?php endif; ?>


<style>.input-group1{padding-bottom: 10px;} .brand-logo a span{color:#1502bd;} .bootstrap-select .dropdown-toggle{height:38px;font-size: .875rem;}</style>
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
            ErrorMessage("Failed");
        }
        } catch (error) {
            console.error("Error receiving document:", error);
            ErrorMessage("An error occurred while processing your request.");
        } 
    });
    }

</script>

<body>

<script>

const cleanDeviceString = (device) => {
    return device.replace(/\r/g, '').replace(/\s{2,}/g, ' ').trim();
}

async function showDownloads($file_id, $filename, $captionlabel){
    document.getElementById("modaltitle").innerHTML = $filename;
    document.getElementById("caption").innerHTML = $captionlabel;
    $param = {"file_id": $file_id};
    $result = await axios.post("<?=CONTROLLER()?>File/getDownloads", $param);
    $status = $result.data;
    if($status.code == 200){
        var table = $('#downloadstable').DataTable();
        table.clear().draw();
        $data =$status.data;
        $data.map(col => 
        table.row.add([
            col.fullname,
            col.download_times,
            col.date
        ]).draw(false)
        );
    }
}

async function showViews($file_id, $filename, $captionlabel){
    document.getElementById("modaltitle1").innerHTML = $filename;
    document.getElementById("caption1").innerHTML = $captionlabel;
    $param = {"file_id": $file_id};
    $result = await axios.post("<?=CONTROLLER()?>File/getViews", $param);
    $status = $result.data;
    if($status.code == 200){
        var table = $('#viewstable').DataTable();
        table.clear().draw();
        $data =$status.data;
        $data.map(col => 
        table.row.add([
            col.fullname,
            "<span class='text-wrap'>"+col.device+"</span>",
            col.date
        ]).draw(false)
        );
    }
}


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
    