<?php
require("sendgrid-php/sendgrid-php.php");
include("data.php");

$subject = $_POST['fname'];

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$city = $_POST['city'];

$sql = "INSERT INTO CUSTOMERS(name, mobile, email, city) VALUES ('$name',$mobile,'$email','$city')";


if ($con->query($sql) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
 
$con->close();

$message = '<html><body>';
$message .= '<table rules="all" style="border:1px solid #666;" cellpadding="10">';
$message .= "<tr><td style='border:1px solid #666;border-collapse:collapse;'><strong>Name </strong> </td><td style='border:1px solid #666;border-collapse:collapse;'>"  . trim($name) .  "</td></tr>";
$message .= "<tr><td style='border:1px solid #666;border-collapse:collapse;'><strong>Email Id </strong> </td><td style='border:1px solid #666;border-collapse:collapse;'>" . trim($email) . "</td></tr>";
$message .= "<tr><td style='border:1px solid #666;border-collapse:collapse;'><strong>Contact </strong> </td><td style='border:1px solid #666;border-collapse:collapse;'>" . trim($mobile) . "</td></tr>";
$message .= "<tr><td style='border:1px solid #666;border-collapse:collapse;'><strong>City </strong> </td><td style='border:1px solid #666;border-collapse:collapse;'>" . trim($city) . "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";

$body = $message;
//echo $body;
$email = new \SendGrid\Mail\Mail();
$email->setFrom("shuklap24@gmail.com", "Prakhar");
$email->setSubject("$subject");
$email->addTo("pg8079@srmist.edu.in");
$email->addContent("text/html", "$body");

$sendgrid = new \SendGrid('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');
try {
    echo '<script>
    window.location = "eum.php"
    </script>'; 
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'error';
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}  

?>