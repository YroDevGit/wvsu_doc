<?php
// Set auto load here...
//Code here automatically runs when navigation to any controllers.


if(IS_LOGGED_IN() && GET_LOGIN_DATA("emp_id")){
    if(GET_SESSION("userdata")){
        $this->EMPDATA = GET_SESSION("userdata");
    }
    else{
        $emp_id = GET_LOGIN_DATA("emp_id");
        $emp_info = $this->emp_tbl->getMyInfo($emp_id);
        SET_SESSION("userdata", $emp_info);
        $this->EMPDATA = GET_SESSION("userdata");
    }
}
















?>