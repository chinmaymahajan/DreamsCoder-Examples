<html>
<head>

<meta charset="UTF-8">
<meta name="description" content="This is the demo of Integrating Google reCAPTCHA in your website with example">
<meta name="keywords" content="Google reCAPTCHA, Robot identification, Bot identification, Captcha, reCAPTCHA,  reCAPTCHA Live demo,
CAPTCHA demo, Google CAPTCHA, CAPTCHA LiveDemo, dreamscoder.com,dreamscoder">
<meta name="author" content="Chinmay Mahajan">
<title>Integrating Google reCAPTCHA Demo Dreamscoder </title>

<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<h1> Invisible reCAPTCHA Demo </h1>
<script src='https://www.google.com/recaptcha/api.js'></script>
<form action="" method="post">
Name : <input type="text" name="name"><br>
City : <input type="text" name="city"><br><br>
6Lft_GEUAAAAAKrzxlBk6uzOURlGqCWxaZiJ2a0T
<input type="submit" name="submit" value="submit">

</form>

<?php

if(isset($_POST['submit']))
{

function CheckCaptcha($userResponse) {
        $fields_string = '';
        $fields = array(
            'secret' => 6Ldi_mEUAAAAAN_Y2qpGDWLI4oVuF0llXOf6NzCr
            'response' => $userResponse
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $res = curl_exec($ch);
        curl_close($ch);

        return json_decode($res, true);
    }


    // Call the function CheckCaptcha
    $result = CheckCaptcha($_POST['g-recaptcha-response']);

    if ($result['success']) {
        //If the user has checked the Captcha box
        echo "Captcha verified Successfully";
	
    } else {
        // If the CAPTCHA box wasn't checked
       echo '<script>alert("Error Message");</script>';
    }
}
    ?>
    
    </body>
