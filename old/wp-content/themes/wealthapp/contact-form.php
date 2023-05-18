<?php
/*Template Name: Form Data */
require('config.php');
$formtype =array('contact-form','subscribe');

if(isset($_GET['type']) && in_array($_GET['type'],$formtype)){
	if(!empty($_POST)){
		if($_GET['type']=='contact-form'){
			$error_status = false;
			if(isset($_POST['fullname']) && (empty($_POST['fullname']) || strlen($_POST['fullname'])<3 )){
	            $error_msg = "invalid full name";
	            $error_status = true;
	        }elseif(!isset($_POST['phonenumber']) || (empty($_POST['phonenumber']) || strlen($_POST['phonenumber']) != 10) || !is_numeric($_POST['phonenumber'])){
	            $error_msg = "invalid phone number ";
	            $error_status = true;
	        }elseif(!isset($_POST['email'])|| (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))){
	            $error_msg = "invalid email id";
	            $error_status = true;
	        }elseif(!isset($_POST['message'])|| (empty($_POST['message']))){
	            $error_msg = "invalid message ";
	            $error_status = true;
	        }

	        if($error_status==false){
	        	$sql = "INSERT INTO `wp_contactform` (`name`,`email`,  `phonenumber`, `message` ) VALUES ('".$_POST['fullname']."', '".$_POST['email']."', '".$_POST['phonenumber']."', '".$_POST['message']."')";
	        	if($wpdb->query($sql)){
	                $inserid = $wpdb->insert_id;
	                $customermail_to = $_POST['email'];
		        	$customermail_subject = "WealthApp - Thank you For Contacting Us";
		        	$customermail_htmlmessage= "";


		        	$adminmail_to = $ADMIN_MAILID;
		        	$adminmail_subject = "We Received a message from contact form";
		        	$adminmail_htmlmessage= "";


		        	$customermail_status = send_mail($customermail_to,$customermail_subject,$customermail_htmlmessage);
		        	$adminmail_status = send_mail($customermail_to,$customermail_subject,$customermail_htmlmessage);

		        	$update_sql = "UPDATE `wp_contactform` SET `customermail_status` = ".$customermail_status.",`adminmail_status` = ".$adminmail_status." WHERE `wp_contactform`.`id` = ".$inserid;

		        	if($wpdb->query($update_sql)){
	               		$response = array('status'=>'success');
	               		// $_SESSION['thankyou']='true';
	               		// $_SESSION['thankyou_type']='contact-form';
	               		// $_SESSION['data']=array('email'=>$_POST['email'],'name'=>$_POST['fullname']);
	               		wp_redirect(get_site_url().'/thank-you/');
	               	}else{
	               		$error_msg = "Unable to update data";
	            		$response = array('status'=>'error','message'=>$error_msg);
	               	}
	            }else{
	            	$error_msg = "Unable to insert data";
	            	$response = array('status'=>'error','message'=>$error_msg);
	            }
	        }else{
	        	$response = array('status'=>'error','message'=>$error_msg);
	        }
        	echo json_encode($response);
		}elseif($_GET['type']=='subscribe'){
			$error_status = false;
			if(!isset($_POST['email'])|| (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))){
	            $error_msg = "invalid email id";
	            $error_status = true;
	        }

	        if($error_status==false){
	        	$sql = "INSERT INTO `wp_subscriber` (`email`,  `subscribe_status` ) VALUES ('".$_POST['email']."', 1)";
	        	if($wpdb->query($sql)){
	                $inserid = $wpdb->insert_id;
	                // $customermail_to = $_POST['email'];
		        	// $customermail_subject = "WealthApp - Thank you For Subscribing Us";
		        	// $customermail_htmlmessage= "";


		        	// $adminmail_to = $ADMIN_MAILID;
		        	// $adminmail_subject = "We Received a New Subscriber";
		        	// $adminmail_htmlmessage= "";


		        	// $customermail_status = send_mail($customermail_to,$customermail_subject,$customermail_htmlmessage);
		        	// $adminmail_status = send_mail($customermail_to,$customermail_subject,$customermail_htmlmessage);

		        	// $sql = "UPDATE `wp_contactform` SET `customermail_status` = '".$customermail_status."',`adminmail_status` = '".$adminmail_status."' WHERE `wp_contactform`.`id` = ".$inserid;

	               	// if($wpdb->query($sql)){
               		$response = array('status'=>'success');
               		// $_SESSION['thankyou']='true';
               		// $_SESSION['thankyou_type']='subscribe';
               		// $_SESSION['data']=array('email'=>$_POST['email']);
               		wp_redirect(get_site_url().'/thank-you-for-subscribe/');

	               	// }else{
	               	// 	$error_msg = "Unable to update data";
	            	// 	$response = array('status'=>'error','message'=>$error_msg);
	               	// }
	            }else{
	            	$error_msg = "Unable to insert data";
	            	$response = array('status'=>'error','message'=>$error_msg);
	            }
	        }else{
	        	$response = array('status'=>'error','message'=>$error_msg);
	        }
        	echo json_encode($response);
		}
	}else{
		global $wp_query;
		$wp_query->set_404();
		status_header( 404 );
		get_template_part( 404 );
		exit();	
	}
}else{
	global $wp_query;
	$wp_query->set_404();
	status_header( 404 );
	get_template_part( 404 ); //exit();
}

?>