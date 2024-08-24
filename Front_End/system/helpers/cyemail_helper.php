<?php


 if(! function_exists("CY_SEND_EMAIL")){
    function CY_SEND_EMAIL($sender_name, $to, $subject, $email_view="cy_email", $data = ["title" => "Welcome to CY mailer", "message" => "This is just a test codeyro mailer."]) {
        /** => Array
         * send email.
         * Return result array
         */
        if(! HAS_INTERNET_CONNECTION()){
            $ret = ["code"=>101, "message"=>"No Internet Connection", "message_array"=>["Email Not sent", "No Internet Connection", "You are not connected to the internet", "Please make sure you are connected to the internet"]];
            return $ret;
        }
        include_once SYSTEM_DATA."Email_config.php";
        $ret = [];
        $CY =& get_instance();
    
        $config = array(
            'protocol' => cy_protocol,
            'smtp_host' => cy_smtp_host,
            'smtp_port' => cy_smtp_port, 
            'smtp_user' => cy_smtp_user,
            'smtp_pass' => cy_smtp_pass,
            'mailtype'  => cy_mail_type, 
            'charset'   => cy_charset,
            'smtp_crypto' => 'tls',
            'wordwrap'  => TRUE,
            'smtp_timeout' => 30,
            'smtp_debug' => 2,
            'newline'   => "\r\n",
        );
    
        $CY->email->initialize($config);
    
        $CY->email->from(cy_smtp_user, $sender_name);
        $CY->email->to($to);
        $CY->email->subject($subject);
    
        $htmlContent = $CY->load->view('emails/'.$email_view, $data, TRUE);
    
        $CY->email->message($htmlContent);
    
        if ($CY->email->send()) {
            $ret = ["code"=>CY_SUCCESS, "message"=>"SUCCESS"];
        } else {
            $ret = ["CODE"=>-1, "message"=>$CY->email->print_debugger()];
            //echo $CY->email->print_debugger();
        }
        return $ret;
    }
 }


 if(! function_exists("CY_SEND_PLAIN_EMAIL")){
    function CY_SEND_PLAIN_EMAIL($sender_name, $to, $subject, $content) {
        /** => Array
         * send email.
         * Return result array
         */
        if(! HAS_INTERNET_CONNECTION()){
            $ret = ["code"=>101, "message"=>"No Internet Connection", "message_array"=>["Email Not sent", "No Internet Connection", "You are not connected to the internet", "Please make sure you are connected to the internet"]];
            return $ret;
        }
        include_once SYSTEM_DATA."Email_config.php";
        $ret = [];
        $CY =& get_instance();
    
        $config = array(
            'protocol' => cy_protocol,
            'smtp_host' => cy_smtp_host,
            'smtp_port' => cy_smtp_port, 
            'smtp_user' => cy_smtp_user,
            'smtp_pass' => cy_smtp_pass,
            'mailtype'  => cy_mail_type, 
            'charset'   => cy_charset,
            'smtp_crypto' => 'tls',
            'wordwrap'  => TRUE,
            'smtp_timeout' => 30,
            'smtp_debug' => 2,
            'newline'   => "\r\n",
        );
    
        $CY->email->initialize($config);
    
        $CY->email->from(cy_smtp_user, $sender_name);
        $CY->email->to($to);
        $CY->email->subject($subject);
    
        $htmlContent = $content;
    
        $CY->email->message($htmlContent);
    
        if ($CY->email->send()) {
            $ret = ["code"=>CY_SUCCESS, "message"=>"SUCCESS"];
        } else {
            $ret = ["CODE"=>-1, "message"=>$CY->email->print_debugger()];
            //echo $CY->email->print_debugger();
        }
        return $ret;
    }
 }

?>