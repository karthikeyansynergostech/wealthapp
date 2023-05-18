<?php
/* Template Name: mail */

require('config.php');

echo send_mail('karthikeyan@synergostech.com','test tt mail','hi test mail');


// $to = 'karthikeyan@synergostech.com'; 

// $from = $SENDER_MAIL; 
// $fromName = $SENDER_NAME; 
 
// $subject = 'test mail';  

// $htmlContent = 'hi test mail'; 

// $headers = "From: $fromName"." <".$from.">"; 

// $semi_rand = md5(time());  
// $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  

// // $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

// $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
// "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  


// // if(!empty($file) > 0 and $file !=false){ 
// //     if(is_file($file)){ 
// //         $message .= "--{$mime_boundary}\n"; 
// //         $fp =    @fopen($file,"rb"); 
// //         $data =  @fread($fp,filesize($file)); 
 
// //         @fclose($fp); 
// //         $data = chunk_split(base64_encode($data)); 
// //         $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
// //         "Content-Description: ".basename($file)."\n" . 
// //         "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
// //         "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
// //     } 
// // } 
// // $message .= "--{$mime_boundary}--"; 
// // $returnpath = "-f" . $from; 

// echo 'htmlmail:'.mail($to, $subject, $message, $headers); 
// print_r(error_get_last());

// echo 'mail:'.mail('karthikeyan@synergostech.com', 'test mail', 'hi test mail');
?>