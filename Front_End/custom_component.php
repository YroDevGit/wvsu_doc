<?php
/**
 * CodeYro Custom component
 *  
 */

 //You can call this function as CY_INPUT_FIELD('username);
if(! function_exists("CY_INPUT_FIELD")){ 
    function CY_INPUT_FIELD($name, $id='', $class='', $type="text"){
        ?>
        <input type="<?= $type ?>" name="<?=$name?>" class="<?=$class?>" id="<?=$id?>">
        <?php
    }
}


if(! function_exists("SELECTED_ROLES_TAB")){
    function SELECTED_ROLES_TAB($tab){
        if($tab=="home"){
            ?>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link text-blue" id="tab_home" data-toggle="tab" href="#home" role="tab" aria-selected="true">School Tech (ICT)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-blue" id="tab_admin" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Admin</a>
                </li>
                <li class="nav-item" style="display:none;">
                    <a class="nav-link text-blue" data-toggle="tab" href="#contact" role="tab" aria-selected="false">Contact</a>
                </li>
            </ul>
            <script>PageLoaded(()=> Click("#tab_home"));</script>
            <?php
        }
        if($tab=="admin"){
            ?>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link text-blue" id="tab_home" data-toggle="tab" href="#home" role="tab" aria-selected="false">School Tech (ICT)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-blue" id="tab_admin" data-toggle="tab" href="#profile" role="tab" aria-selected="true">Admin</a>
                </li>
                <li class="nav-item" style="display:none;">
                    <a class="nav-link text-blue" data-toggle="tab" href="#contact" role="tab" aria-selected="false">Contact</a>
                </li>
            </ul>
            <script>PageLoaded(()=> Click("#tab_admin"));</script>
            <?php
        }
    }
}
//add custom component here, see reference above or you can copy, paste and modify it

?>