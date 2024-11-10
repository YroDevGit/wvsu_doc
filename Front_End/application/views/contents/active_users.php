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
    <?php $schoolname = $this->school_tbl->mySchool('school'); $campusname = $this->school_tbl->mySchool('campus'); ?>
        <h4 class="text-blue h4"><?= $schoolname." ".$campusname ?> Active Users</h4>
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
                <?php foreach($this->users_tbl->showActiveUsers() as $col): ?>
                    <tr>
                        <td></td>
                        <td>
                            <a onclick="return confirm('are you sure to deactivate selected user?')" href="<?=CONTROLLER('Users/disableUser?id='.ENCRYPT($col['user_id']))?>"><button class="btn btn-danger">DISABLE</button></a>
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
   

</script>

<body>

<?php if(GET_FLASHDATA("disable")): ?>
    <script>PageLoaded(()=>SuccessMessage("User account has been deactivated."));</script>
<?php endif; ?>
    