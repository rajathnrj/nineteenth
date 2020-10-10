<?php 
require_once("config.php");
if((isset($_POST['first_name'])&& $_POST['first_name'] !='') && (isset($_POST['last_name'])&& $_POST['last_name'] !='') && (isset($_POST['email'])&& $_POST['email'] !=''))
{

	$firstname = $_POST['first_name'];
	$lastname = $_POST['last_name'];
	$emailID =$_POST['email'];
	
	$sql = "INSERT INTO contacts (firstname, lastname, email) VALUES (:firstname, :lastname, :emailID)";
	
	//Prepare the statement.
	$statement = $pdo->prepare($sql);
	
	//Bind values to our parameters.
	$statement->bindValue(':firstname', $firstname);
	$statement->bindValue(':lastname', $lastname);
	$statement->bindValue(':emailID', $emailID);
	
	//Execute the statement and insert values.
	$inserted = $statement->execute();
	
	if(!$inserted){
		die('There was an error running the query [' . $pdo->errorInfo(). ']');
	}

}

$toEmail = "support@cliquenext.com.au";
$subject = "Contact Request";
$txt =  "The Person: " . $_POST["first_name"]." ".$_POST["last_name"] . " with email ID: ". $_POST["email"] ." has requested to contact you\r\n";
$mailHeaders = "From: The Nineteenth" . "<". $_POST["email"] .">\r\n";

if(mail($toEmail,$subject,$txt, $mailHeaders)) {
echo"Thank you for the enquiry.";
} else {
echo"Problem in Sending Mail.";
}
?>