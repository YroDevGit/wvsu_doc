<?php CY_ASSIGNED_ROLES(["SUPERADMIN"]) ?>
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
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#bd-example-modal09">ADD SCHOOL</button>
        </div>
    </div>
</div>
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Schools And Campuses </h4>
    </div>
    <div class="pb-20">
        <table class="table hover data-table-export nowrap" export="Files">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort"></th>
                    <th class="table-plus datatable-nosort">Action</th>
                    <th>School</th>   
                    <th>Campus</th>
                    <th>Department</th>
                    <th>School name</th>
                    <th>School number</th>
                    <th>Facebook link</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($this->school_tbl->getAllSchools() as $col): ?>
                    <tr>
                        <td></td>
                        <td>
                        <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#" onclick="deleteSchool('<?=ENCRYPT($col['id'])?>')"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                        <td><?=$col['school']?></td>
                        <td><?=$col['campus']?></td>
                        <td><?=$col['department']?></td>
                        <td><?=$col['full_name']?></td>
                        <td><?=$col['school_code']?></td>
                        <td><?=$col['fb_link']?></td>
                        <td><?=$col['address']?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="bd-example-modal09" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Add school</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?=CONTROLLER('Schools/add')?>" method="post">
                <div class="modal-body">

                <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-file"></i> School name: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("school")?></span></label></div>
                <div class="input-group1 custom">
                    <input type="text" class="form-control form-control-sm" placeholder="School" name="school">
                    <div class="input-group-append custom">
                        <span class="input-group-text"></i></span>
                    </div>
                </div>

                <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-file"></i> Campus: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("campus")?></span></label></div>
                <div class="input-group1 custom">
                    <input type="text" class="form-control form-control-sm" placeholder="Campus" name="campus">
                    <div class="input-group-append custom">
                        <span class="input-group-text"></i></span>
                    </div>
                </div>

                <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-file"></i> Department: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("department")?></span></label></div>
                <div class="input-group1 custom">
                    <input type="text" class="form-control form-control-sm" placeholder="Department" name="department">
                    <div class="input-group-append custom">
                        <span class="input-group-text"></i></span>
                    </div>
                </div>

                <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-file"></i> Complete name: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("full_name")?></span></label></div>
                <div class="input-group1 custom">
                    <input type="text" class="form-control form-control-sm" placeholder="Complete name" name="full_name">
                    <div class="input-group-append custom">
                        <span class="input-group-text"></i></span>
                    </div>
                </div>

                <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-file"></i> Address: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("address")?></span></label></div>
                <div class="input-group1 custom">
                    <input type="text" class="form-control form-control-sm" placeholder="Address" name="address">
                    <div class="input-group-append custom">
                        <span class="input-group-text"></i></span>
                    </div>
                </div>

                <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-file"></i> School number: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("school_code")?></span></label></div>
                <div class="input-group1 custom">
                    <input type="text" class="form-control form-control-sm" placeholder="School number" name="school_code">
                    <div class="input-group-append custom">
                        <span class="input-group-text"></i></span>
                    </div>
                </div>

                <div><label style="color:gray;font-size:14px;" for=""><i class="icon-copy dw dw-file"></i> Facebook link: <span class="text-danger"><?=VALIDATION_INPUT_ERROR("fb_link")?></span></label></div>
                <div class="input-group1 custom">
                    <input type="text" class="form-control form-control-sm" placeholder="Facebook link" name="fb_link">
                    <div class="input-group-append custom">
                        <span class="input-group-text"></i></span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<body>

<?php if(CY_REDIRECT_DATA("status")): ?>
    <?php if(CY_REDIRECT_DATA("status")=="SUCCESS"): ?>
        <script>PageLoaded(()=>SuccessMessage("School added", "reload"))</script>
    <?php endif; ?>
    <?php if(CY_REDIRECT_DATA("status")=="FAILED"): ?>
        <script>PageLoaded(()=>SuccessMessage("Failed", "reload"))</script>
    <?php endif; ?>
<?php endif; ?>


<script>
    async function deleteSchool($id){
        ConfirmationMessage("Are you sure to proceed removing selected school?", async()=>{
            $param = {"id": $id};
            $res = await axios.post("<?= CONTROLLER() ?>Schools/remove", $param);
            $result = $res.data;
            if($result.code==200 || $result.code=="200"){
                SuccessMessage($result.message, "reload");
            }
            else{
                ErrorMessage($result.message);
            }
        });

    }
</script>
    