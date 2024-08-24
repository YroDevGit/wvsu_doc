document.getElementById('otpbtn').addEventListener("click", async function(event){
    event.preventDefault();
    showLoading();
    $email_field = document.getElementById("username").value;
    if($email_field==null || $email_field == ""){
        hideLoading();
        ErrorMessage("Please input email address");
        return;
    }

    $form_data = GetFormData("#sendotp");

    $res = await axios.post($baseURL+"Login/sendOTP", $form_data);
    $data = $res.data;
    if($data.code == -1){
        hideLoading();
        ErrorMessage("Email "+$email_field+" not registered.!");
    }
    else if($data.code == 101){
        hideLoading();
        ErrorMessage($data.message);
    }
    else if($data.code == -5){
        hideLoading();
        ErrorMessage($data.message);
    }
    else{
        hideLoading();
        document.getElementById('otpsent').setAttribute("otp", ENCRYPT("YES"));
        SuccessMessage("OTP sent.");
    }
});


document.getElementById("sendotp").addEventListener("submit", async function(event){
    event.preventDefault();
    $form_data = GetFormData("#sendotp");
    showLoading();
    $otp_sent = document.getElementById("otpsent").getAttribute("otp");
    if($otp_sent==null || DECODE($otp_sent) != "YES"){
        hideLoading();
        ErrorMessage("OTP is not yet sent, please send login OTP first.");
        return;
    }

    $res = await axios.post($baseURL+"Login/submitOTP", $form_data);
    $data = $res.data;
    if($data.code==200){
        hideLoading();
        SuccessMessage($data.message, "reload");
    }
    else if($data.code==101){
        hideLoading();
        ErrorMessage($data.message);
    }
    else if($data.code==-1){
        hideLoading();
        ErrorMessage($data.message);
    }
});

document.getElementById('otpsent').removeAttribute("otpsent");