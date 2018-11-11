<?php
include('includes/metaheader.php');
?>
</head>
<body>

<?php

$site_email="tutor@hardstuffez.com";
$subject = 'User Activation';

// To send HTML mail, the Content-type header must be set
            $crnl="\r\n";
        	$subject = 'User Activation';
            $headers  = 'MIME-Version: 1.0' . $crnl;
            $headers .= 'Content-type: text/html; charset=iso-8859-1'. $crnl;
            $headers .='From: '.$site_email.$crnl;
            $parameter='-f'.$site_email;

$message ='Please confirm your email to continue using <a href="http://'.$domain.'/activate.php?username='.$username.'">'.$domain.'</a>. If the link does not work for you, please copy and paste this following URL into your browser:<br>http://'.$domain.'/activate.php?username='.$username;

$message = wordwrap($message, 70);

$sent=mail($email, $subject, $message, $headers, $parameter);

if($sent)
$msg="Please check your  <b>".$email." </b> email.";
else
$msg="Error, the confirmation email was not sent!";

header("Location:sign_in.php?msg=".$msg);
?>
</body>
</html>