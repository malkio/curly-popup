<?php

function getEmailMessage($firstname, $lastname, $email, $phone,  $hotel, $city) {
 	$str = '<!DOCTYPE html>
			<html>
			<head>
			    <title>TheHotelBuyingOffice</title> 
			</head>
			<body>
			    <table class="email-table" style="margin:auto; padding:20px; padding-bottom:40px;">
			        <tr>
			            <td>
			                 <small>TheHotelBuyingOffice</small>
			                <h3>SUBSCRIBER INFORMATION</h3> 
			            </td>
			        </tr>

			        <tr>
			            <td>Full Name :</td>
			            <td>'.$firstname .' '$lastname.'</td> 
			        </tr>
			          <tr>
			            <td>Email Address :</td>
			            <td>'.$email.'</td> 
			        </tr>
			          <tr>
			            <td>Phone Number :</td>
			            <td>'.$phone.'</td> 
			        </tr>
			          <tr>
			            <td>Hotel :</td>
			            <td>'.$hotel.'</td> 
			        </tr>
			          <tr>
			            <td>City :</td>
			            <td>'.$city.'/td> 
			        </tr>

			        <tr>
			            <td>
			                <br><br> 
			                <small><i>Email: admin@thehotelbuyingoffice.com.au</i></small> <br>
			                <small><i>Site: <a href="http://thehotelbuyingoffice.com.au/">http://thehotelbuyingoffice.com.au</a></i></small>
			            </td>
			        </tr>
			    </table>
			</body>
			</html>';
			return $str;

}

function Redirect($url, $permanent = false) {
    if (headers_sent() === false)
    {
    	header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}  
 
$params = array();
parse_str( $_POST['data'], $params);

 

$firstname 	= (isset($params['pop-firstname'])) 	? $params['pop-firstname'] 	: "none";
$lastname 	= (isset($params['pop-lastname']))		? $params['pop-lastname']	: "none";
$email 		= (isset($params['pop-email'])) 		? $params['pop-email'] 		: "none";
$phone 		= (isset($params['pop-phone']))			? $params['pop-phone']		: "none";
$hotel 		= (isset($params['pop-hotel']))			? $params['pop-hotel']		: "none";
$city 		= (isset($params['pop-city']))			? $params['pop-city']		: "none";


if(isset($params['pop-email'] )) {
    // Email Subscriber Email to admin
    $to      = "krispymallows@gmail.com";
    $subject = 'POPUP - Subscriber Data';
    $message = getEmailMessage($firstname, $lastname, $email, $phone, $hotel, $city);
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
    
    $headers = 'From: admin@thehotelbuyingoffice.com.au' . "\r\n" .
    'Reply-To: admin@thehotelbuyingoffice.com.au' . "\r\n" .
    'X-Mailer: PHP/' . phpversion(); 
    
    if(mail($to, $subject, $message, $headers, "-f $to" )){      
		echo "alert";
    } 
     
}

?>