var $cy_form_submit_once = 1;
var $cy_anchor_submit_once = 1;

window.addEventListener("load", function(){

    var cy_forms_submit_yro = document.querySelectorAll('.CY_SUBMIT_ONCE');

    cy_forms_submit_yro.forEach(function(form) {
        form.addEventListener("submit", function(event) {
            if ($cy_form_submit_once > 1) {
                return;
            } else {
                $cy_form_submit_once = 2; 
    
                var buttons = form.querySelectorAll('button');
                
                var submitInputs = form.querySelectorAll('input[type="submit"], input[type="button"]');
                
                buttons.forEach(function(button) {
                    button.disabled = true;
                });
                
                submitInputs.forEach(function(input) {
                    input.disabled = true;
                });
    
    
                setTimeout(function() {

                    buttons.forEach(function(button) {
                        button.disabled = false;
                    });
                    
                    submitInputs.forEach(function(input) {
                        input.disabled = false;
                    });
    
                    $cy_form_submit_once = 1;
                }, 2000);
            }
        });
    });



    var cy_anchored_submit_yro = document.querySelectorAll('.CY_CLICK_ONCE');
    cy_anchored_submit_yro.forEach(function(al) {
        al.addEventListener("click", function(event) {
            if($cy_anchor_submit_once > 1){

            }
            else{
                $cy_anchor_submit_once = 2;
                al.style.pointerEvents = 'none';
                al.disabled = true;

                setTimeout(function(){
                    al.style.pointerEvents = '';
                    al.disabled = false;
                    $cy_anchor_submit_once = 1;
                },2000);
            }
        });
    });

});