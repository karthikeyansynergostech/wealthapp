<?php
/*Template Name: Form Data */

require('config.php');
global $wp_query;
$secretKey = "6LfDspYmAAAAAFvVSBPnDfgYMT95QUVqwBqNqx2X";
$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
$formtype =array('contact-form','subscribe');

if(isset($_GET['type']) && in_array($_GET['type'],$formtype)){
	if(!empty($_POST)){
		if($_GET['type']=='contact-form'){
			if(isset($_POST['bf-recaptcha'])){
				$recaptcha_response = $_POST['bf-recaptcha'];
				$form_type ="footer form";
			}elseif(isset($_POST['pf-recaptcha'])){
				$recaptcha_response = $_POST['pf-recaptcha'];
				$form_type ="popup form";
			};
		    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $secretKey . '&response=' . $recaptcha_response);
		    $recaptcha = json_decode($recaptcha);
		    if ($recaptcha->success ==true && $recaptcha->score >= 0.5) {
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
		        	$sql = "INSERT INTO `wp_contactform` (`name`,`email`,  `phonenumber`, `message`,`form_type` ) VALUES ('".$_POST['fullname']."', '".$_POST['email']."', '".$_POST['phonenumber']."', '".$_POST['message']."','".$form_type."')";
		        	if($wpdb->query($sql)){
		               		$response = array('status'=>'success');
		               		$_SESSION['thankyou']='true';
		               		$_SESSION['thankyou_type']='contact-form';
		               		$_SESSION['data']=array('email'=>$_POST['email'],'name'=>$_POST['fullname']);
		               		wp_redirect(get_site_url().'/thank-you');
		            }else{
		            	$error_msg = "Unable to insert data";
		            	$response = array('status'=>'error','message'=>$error_msg);
		            }
		        }else{
		        	$response = array('status'=>'error','message'=>$error_msg);
		        }
		    }else{
		    	$response = array('status'=>'error','message'=>"The reCAPTCHA verification failed, please try again.");
		    }
        	echo json_encode($response);
		}elseif($_GET['type']=='subscribe'){
			$error_status = false;
			$recaptcha_response = $_POST['sf-recaptcha'];
			$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $secretKey . '&response=' . $recaptcha_response);
		    $recaptcha = json_decode($recaptcha);
		    if ($recaptcha->success ==true && $recaptcha->score >= 0.5) {
				if(!isset($_POST['email'])|| (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))){
		            $error_msg = "invalid email id";
		            $error_status = true;
		        }

		        if($error_status==false){
		        	$sql = "INSERT INTO `wp_subscriber` (`email`,  `subscribe_status` ) VALUES ('".$_POST['email']."', 1)";
		        	if($wpdb->query($sql)){
		                $inserid = $wpdb->insert_id;
	               		$response = array('status'=>'success');
	               		$_SESSION['thankyou']='true';
	               		$_SESSION['thankyou_type']='subscribe';
	               		$_SESSION['data']=array('email'=>$_POST['email']);
	               		wp_redirect(get_site_url().'/thank-you');
		            }else{
		            	$error_msg = "Unable to insert data";
		            	$response = array('status'=>'error','message'=>$error_msg);
		            }
		        }else{
		        	$response = array('status'=>'error','message'=>$error_msg);
		        }
	        	echo json_encode($response);
	        }else{
	        	$response = array('status'=>'error','message'=>"The reCAPTCHA verification failed, please try again.");
	        }
		}
	}else{
		$response = array('status'=>'error','message'=>"invalid data");
		echo json_encode($response);
	}
}else{
	$response = array('status'=>'error','message'=>"invalid data");
	echo json_encode($response);
}
?>