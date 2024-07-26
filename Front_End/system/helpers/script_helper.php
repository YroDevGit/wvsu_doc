<?php
/** 
 * CodeYRO scripts
 */
if(! function_exists("ADD_REACT_SCRIPTS")){
    function ADD_REACT_SCRIPTS(){
        /** ==> Void
         * ReactJS
         * [React-dom, babel, Axios]
         */
        ?>
        <script src="<?= RESOURCES('react/react.js') ?>"></script>
        <script src="<?= RESOURCES('react/react-dom.js') ?>"></script>
        <script src="<?= RESOURCES('react/babel.js') ?>"></script>
        <script src="<?= RESOURCES('react/axios.js') ?>"></script>
        <script src="<?= RESOURCES('react/reactCustom.js')?>"></script>
        <?php
    }
}

if(! function_exists("ADD_CY_TABLE")){
    function ADD_CY_TABLE(){
        /** ==> Void
         * Required jQuery to be effective
         */
        ?>
            <link rel="stylesheet" type="text/css" href="<?= RESOURCES('jQuery/cytable/cytablecss/jquery.dataTables.css') ?>">
            <link rel="stylesheet" type="text/css" href="<?= RESOURCES('jQuery/cytable/cytablecss/responsive.dataTables.min.css') ?>">
            <link rel="stylesheet" type="text/css" href="<?= RESOURCES('jQuery/cytable/cytablecss/buttons.dataTables.min.css') ?>">
            <link rel="stylesheet" href="<?= RESOURCES('jQuery/cytable/cytablecss/all.min.css') ?>">
            <link rel="stylesheet" type="text/css" href="<?= RESOURCES('jQuery/cytable/cytablecss/cytable.css') ?>">
  
            <script src="<?= RESOURCES('jQuery/cytable/cytblejs/jquery.dataTables.min.js') ?>"></script>         
            <script src="<?= RESOURCES('jQuery/cytable/cytblejs/dataTables.responsive.min.js') ?>"></script>
            <script src="<?= RESOURCES('jQuery/cytable/cytblejs/dataTables.buttons.min.js') ?>"></script>      
            <script src="<?= RESOURCES('jQuery/cytable/cytblejs/jszip.min.js') ?>"></script>
            <script src="<?= RESOURCES('jQuery/cytable/cytblejs/buttons.html5.min.js') ?>"></script>
            <script src="<?= RESOURCES('jQuery/cytable/cytblejs/buttons.print.min.js') ?>"></script>
            <script src="<?= RESOURCES('jQuery/cytable/cytblejs/cytable.js') ?>"></script>

        <?php
    }
}


if(! function_exists("ADD_JQUERY_SCRIPTS")){
    function ADD_JQUERY_SCRIPTS($arr = ["JQUERY"=>"TRUE"]){
        /** ==> Void
         * 
         */
        ?>
        
        <link rel="stylesheet" href="<?= RESOURCES('jQuery/sweetalert2.min.css') ?>">

        <?php if(isset($arr["JQUERY"])): ?>
            <?php if($arr["JQUERY"]=="TRUE"): ?>
                <script src="<?= RESOURCES('jQuery/jquery.js') ?>"></script>
            <?php endif; ?>
        <?php endif; ?>
        <script src="<?= RESOURCES('jQuery/swal.js') ?>"></script>
        <script src="<?= RESOURCES('jQuery/sweetalert.js') ?>"></script>
        <?php
    }
}


if(! function_exists("ADD_ENCRYPTION")){
    function ADD_ENCRYPTION(){
        /** ==> Void
         * 
         */
        ?>
        <script src="<?= SECURITY() ?>"></script>
        <?php
    }
}


if(! function_exists("ADD_CUSTOMS")){
    function ADD_CY_SCRIPTS(){
        /** ==> Void
         * 
         */
        ?>
        <script src="<?= RESOURCES('customs/customjs.js') ?>"></script>
        <?php
    }
}


if(! function_exists("ADD_ALL_SCRIPTS")){
    function ADD_ALL_SCRIPTS($arr){
        /** ==> Void
         *  Load all CY js scripts
         * [REACT, JQUERY, ENCRYPTION, CY_TABLE, CDN]
         */
        ?>
        <?php if(in_array("REACT", $arr) || in_array("react", $arr)): ?>
            <!-- CodeYRO reactjs -->
                <script src="<?= RESOURCES('react/react.js') ?>"></script>
                <script src="<?= RESOURCES('react/react-dom.js') ?>"></script>
                <script src="<?= RESOURCES('react/babel.js') ?>"></script>
                <script src="<?= RESOURCES('react/axios.js') ?>"></script>
                <script src="<?= RESOURCES('react/reactCustom.js') ?>"></script>
        <?php endif; ?>
        <?php if(in_array("CDN", $arr) || in_array("cdn", $arr)): ?>
            <!-- CodeYRO cdn preview file -->
            <div id="cy-preview-modal" align="center">
                <div id="cy-preview-modal-content">
                    <div align="center" style="padding-bottom:15px;">
                    <span class="cy-download"><small style="font-size:14px;display: none;" id="download-button-cy-preview">download</small> <small style="font-size:14px; color:black;" id="cy-preview-title"></small></span>
                    </div>
                    <span class="cy-close">&times;</span>
                    <div id="previewcy">Loading...</div>
                </div>
            </div>
                <link rel="stylesheet" href="<?= RESOURCES('cdn/cy_preview.css') ?>">
                <script src="<?= RESOURCES('cdn/mammoth.browser.min.js') ?>"></script>
                <script src="<?= RESOURCES('cdn/papaparse.min.js') ?>"></script>
                <script src="<?= RESOURCES('cdn/xlsx.full.min.js') ?>"></script>
                <script src="<?= RESOURCES('cdn/cy_preview.js') ?>"></script>
        <?php endif; ?>

        <?php ADD_JQUERY_SCRIPTS($arr); ?>

        <script src="<?= SECURITY() ?>"></script>
        <script src="<?= RESOURCES('customs/advance.js') ?>"></script>
        <script src="<?= RESOURCES('customs/customjs.js') ?>"></script>
        <?php
        if(in_array("CY_TABLE", $arr) || in_array("cy_table", $arr)){
                ADD_CY_TABLE();
        }
    }
}

?>