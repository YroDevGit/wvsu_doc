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
            <button type="button" class="btn btn-primary" id="addbtn" data-toggle="modal" data-target="#bd-example-modal-lg05">ADD NEW FILE</button>
        </div>
    </div>
</div>
<div class="card-box mb-30">
    <div class="pd-20">
       
        <h4 class="text-blue h4">Registry sheet</h4>
    </div>
    <div class="pb-20">
        <table class="table hover data-table-export nowrap" export="Files">
            <thead>
                <tr>
                    <th></th>
                    <th class="table-plus datatable-nosort">Action</th>
                    <th>Controll #</th>   
                    <th>Date Recieved</th>
                    <th>Source/Address</th>
                    <th>Date of Communication</th> 
                    <th>Subject Matter</th>
                    <th>Address/Person Concerned</th>
                    <th>Office code</th>
                    <th>Date released</th>
                    <th>Received by</th>
                    <th>Remarks </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($this->files_tbl->getRegistry(1) as $col): ?>
                    <tr>
                        <td></td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <!--<a class="dropdown-item"  ><i class="icon-copy dw dw-right-arrow"></i>Forward</a>-->
                                    <a class="dropdown-item" onclick="return confirm('are you sure to delete selected record?')" href="<?=CONTROLLER('File/deleteRegistry?id='.$col['id'])?>"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                               
                            </div>
                        </td>
                        <td><?=$col['control_number']?></td>
                        <td><?=$col['date_received']?></td>
                        <td><?=$col['source']?></td>
                        <td><?=$col['date_comminication']?></td>
                        <td><?=$col['subject_matter']?></td>
                        <td><?=$col['address']?></td>
                        <td><?=$col['office_code']?></td>
                        <td><?=$col['date_released']?></td>
                        <td><?=$col['received_by']?></td>
                        <td><?=$col['remarks']?></td>
                        
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg05" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal modal-dialog-centered">
        <div class="modal-content" style="
    max-height: 95%;
    overflow-y: scroll;
">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Add record</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?=CONTROLLER()?>File/addRegistry" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <?php INPUT_FIELD("Controll number", "control_number", "Controll number") ?>
                    <?php DATE_FIELD("Date Recieved", "date_received") ?>
                    <?php INPUT_FIELD("Source/Address", "source", "Source/Address", "icon-copy dw dw-tag") ?>
                    
                    <?php DATE_FIELD("Date of commmunication", "date_comminication",  "icon-copy dw dw-tag") ?>

                    <?php INPUT_FIELD("Subject matter", "subject_matter", "subject_matter",  "icon-copy dw dw-tag") ?>
                    <?php INPUT_FIELD("Address/Person concerned", "address","Address/Person concerned",  "icon-copy dw dw-tag") ?>
                    <?php INPUT_FIELD("Office Code", "office_code",  "Office Code" ) ?>
                    <?php DATE_FIELD("Date released", "date_released",  "icon-copy dw dw-tag") ?>
                    <?php INPUT_FIELD("Recived by", "received_by", "Recived by") ?>
                    <?php INPUT_FIELD("Remarks", "remarks",  "icon-copy dw dw-tag") ?>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" >Save</button>
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

<?php if(HAS_VALIDATION_ERRORS()): ?>
    <script>PageLoaded(()=> Click("#addbtn"))</script>
<?php endif; ?>

<?php if(GET_FLASHDATA("status")): ?>
    <?php if(GET_FLASHDATA("status")=="SUCCESS"): ?>
        <script>PageLoaded(()=>SuccessMessage("Document added"));</script>
    <?php endif; ?>
    <?php if(GET_FLASHDATA("status")=="FAILED"): ?>
        <script>PageLoaded(()=>ErrorMessage("Failed"));</script>
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

    async function deleteDocu($id, $name){
        ConfirmationMessage("Are you sure to delete file: "+$name+"?", async function(){
            $param = {"id": $id, "name":$name};
            $result = await axios.post("<?= CONTROLLER() ?>File/deleteMyFile", $param);
            $status = $result.data;
            if($status.code == 200){
                SuccessMessage("Document deleted", "reload");
            }
            else{
                ErrorMessage("Failed to delete document", "reload");
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

async function hideFile($file_id){
    $param = {"file_id":$file_id};
    $result =await axios.post("<?= CONTROLLER() ?>File/hideFile", $param);
    $status = $result.data;
    if($status.code == 200){
        SuccessMessage("File Removed", "reload");
    }
    else{
        ErrorMessage("Failed");
    }
}




   async function trackViewer($id){
        $param = {"file_id":$id};
        $result = await axios.post("<?= CONTROLLER() ?>File/trackView", $param);
        $status = $result.data;
        if($status.code == 200){
            console.log("abcd");
        }
   }
</script>
    