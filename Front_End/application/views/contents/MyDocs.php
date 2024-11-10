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
       <?php $auth = "5773552"; ?>
        <h4 class="text-blue h4">Receieved Documents <form method="post" action="<?=CY_CONTROLLER('File/MyFiles?arg=1?id='.ENCRYPT($auth))?>"><input type="month" class="dfilter" name="dfilter" style="width: 200px;" value="<?=$param ?? null?>"><button class="dsubmit" type="submit">SEARCH</button></form></h4>
    </div>
    <div class="pb-20">
        <table class="table hover data-table-export nowrap" export="Files">
            <thead>
                <tr>
                    <th></th>
                    <th class="table-plus datatable-nosort">Action</th>
                    <th>Title</th>   
                    <th>File</th>
                    <th>Details</th>
                    <th>Purpose</th>
                    <th class="">From</th>
                    <th>Date</th> 
                    <th>Document Type</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $alldata = null;
                if(isset($_GET['arg'])){
                    $alldata = $this->files_tbl->getMyFilesByDate($param);
                }else{
                    $alldata = $this->files_tbl->getMyFiles();
                }
                ?>
                <?php foreach($alldata as $col): ?>
                    <?php if($col['emp_id']=="0"||$col['emp_id']==0): ?>
                        <?php $efullname = $col['from'] ?>
                    <?php else: ?>
                        <?php $efullname = $col['from']; ?>
                    <?php endif; ?>
                    <tr>
                        <td></td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#bd-example-modal-lg1" onclick="showViews('<?=ENCRYPT($col['id'])?>','<?=$col['file']?>','<?=$col['caption']?>')"><i class="dw dw-eye"></i> View History</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#bd-example-modal-lg" onclick="showDownloads('<?=ENCRYPT($col['id'])?>','<?=$col['file']?>','<?=$col['caption']?>')"><i class="dw dw-download"></i> Download History</a>
                                    <a class="dropdown-item" href="#" onclick="hideFile('<?=ENCRYPT($col['id'])?>')"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                        <td><?= $col['caption'] ?></td>
                        <td><a onclick="showFile('<?= STORAGE().$col['file'] ?>', '<?= $col['caption'] ?>', true, '<?=ENCRYPT($col['id'])?>'); trackViewer('<?=ENCRYPT($col['id'])?>')"><button class="btn" title="<?= $col['file'] ?>"><i class="icon-copy dw dw-eye text-primary" style="font-size: 22px;" aria-hidden="true"></i></button></a></td>
                        <td><button type="button" class="btn  margin-5" data-container="body" data-toggle="popover" data-placement="top" data-content="<?= $col['details'] ?>" title="Details">👁️</button></td>
                        <td><button type="button" class="btn  margin-5" data-container="body" data-toggle="popover" data-placement="top" data-content="<?= $col['purpose'] ?>" title="Purpose">👁️</button></td>
                        <td><button type="button" class="btn  margin-5" data-container="body" data-toggle="popover" data-placement="top" data-content="<?=$efullname?>" title="Sender name"><?= $this->school_tbl->getMySchool("school")." ".$this->school_tbl->getMySchool("campus")." ".$this->school_tbl->getMySchool("department") ?> 👁️</button></td>
                        <td><?= $col['date_created'] ?></td>
                        <td><?= $col['doctype'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Downloads</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div style="padding:5px 10px 5px 10px;">
                <span id="caption"></span>
            </div>
            <div style="padding:5px 10px 5px 10px;">
                <span id="modaltitle"></span>
            </div>
            <div class="modal-body">
                <table class="table hover data-table-export nowrap" id="downloadstable" export="DownloadFiles">
                    <thead>
                        <th>Name</th>
                        <th>Download count</th>
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

<style>
    .dfilter{
        border-color:#dedede;
        border-radius: 3px;
    }
    .dsubmit{
        border-color:#dedede;
    }
</style>
    