<?php
// session_start();

$db_server = 'localhost';
$db_name = 'wealthapp';
$db_user = 'dotncube_wp1';
$db_pwd  = 'V.ZJXMWm0PmQiynx48y71';


$SENDER_NAME = 'karthikeyan';
$SENDER_MAIL = 'karthib05mtp@gmail.com';
$SENDER_PASSWORD = 'BKAR@1432';


$ADMIN_MAILID = 'karthikeyan@synergostech.com';




$db = new  mysqli($db_server,$db_user,$db_pwd,$db_name);

if ($db->connect_errno) {
  echo "Failed to connect to MySQL: " . $db->connect_errno;
  exit();
}

$base_url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'; 

function send_mail($to,$subject,$htmlmessage,$file = false){

    $to = $to; 
    
    $from = $SENDER_MAIL; 
    $fromName = $SENDER_NAME; 
     
    $subject = $subject;  
    
    $htmlContent = $htmlmessage; 
    
    $headers = "From: $fromName"." <".$from.">"; 
    

    
    if(!empty($file) > 0 and $file !=false){ 
        if(is_file($file)){ 
            $semi_rand = md5(time());      
            $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";       
            $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
            "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
            $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
            $message .= "--{$mime_boundary}\n"; 
            $fp =    @fopen($file,"rb"); 
            $data =  @fread($fp,filesize($file)); 
     
            @fclose($fp); 
            $data = chunk_split(base64_encode($data)); 
            $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
            "Content-Description: ".basename($file)."\n" . 
            "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
            $message .= "--{$mime_boundary}--"; 
            $returnpath = "-f" . $from; 
        } 
    }else{
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    }
    
    if(isset($returnpath)){
        $mail = @mail($to, $subject, $message, $headers, $returnpath); 
    }else{
        $mail = @mail($to, $subject, $message, $headers); 
    }

    // if(@mail($to, $subject, $message, $headers, $returnpath)){
    //     return 1;
    // }else{
    //     return 0 ;
    // }
    return $mail;
}
?>

 
