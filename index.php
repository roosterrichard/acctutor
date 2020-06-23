<!DOCTYPE HTML>  
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php 
		echo "<h2>Welcom to the favorites PHP page</h2>";
		echo "<h3>", date('D-M'), "</h3>";
		
		$nameErr = $platformErr = $dateErr = $timeErr = $courseErr = $hoursErr = $minutesErr = "";
		$name = $platform = $date = $time = $course = $hours = $minutes = $comment = "";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$comment = $_POST["comment"];
		  if (empty($_POST["Name"])) {
			$nameErr = "Name is required";
		  } else {
			  $name = validate_input($_POST["name"]);
			  $name = crypt_it($name)
		  }
		  
		  if (empty($_POST["platform"])) {
			$platformErr = "platform is required";
		  } else {
			  $platform = validate_input($_POST["platform"]);
			  $platform = crypt_it($platform)
		  }
			
		  if (empty($_POST["date"])) {
			$dateErr = "date is required";
		  } else {
			  $date = validate_input($_POST["date"]);
			  $date = crypt_it($date)
		  }

		  if (empty($_POST["time"])) {
			$timeErr = "time is required";
		  } else {
			  $time = validate_input($_POST["time"]);
			  $time = crypt_it($time)
		  }
		  if (empty($_POST["course"])) {
			$courseErr = "course is required";
		  } else {
			  $course = validate_input($_POST["course"]);
			  $course = crypt_it($course)
		  }
		  if (empty($_POST["hours"])) {
			$hours = "0";
			$hours = crypt_it($hours)
		  } else {
			  $hours = validate_input($_POST["hours"]);
			  $hours = crypt_it($hours)
		  }
		  if (empty($_POST["minutes"])) {
			$minutes = "0";
			$minutes = crypt_it($minutes)
		  } else {
			  $minutes = validate_input($_POST["minutes"]);
			  $minutes = crypt_it($minutes)
		  }
		  $name = $platform = $date = $time = $course = $hours = $minutes = $comment
		$fp = fopen('tutorLog.txt', 'a');//opens file in append mode  
		fwrite($fp, $name + "\t");  
		fwrite($fp, $platform + "\t"); 
		fwrite($fp, $date + "\t"); 
		fwrite($fp, $time + "\t"); 
		fwrite($fp, $course + "\t"); 
		fwrite($fp, $hours + "\t"); 
		fwrite($fp, $minutes + "\t"); 
		fwrite($fp, $comment + "\t"); 		
		fclose($fp);
		  
		}

		function validate_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
		
		function crypt_it($data){
			$ciphering = "AES-128-CTR"; 
  
			// Use OpenSSl Encryption method 
			$iv_length = openssl_cipher_iv_length($ciphering); 
			$options = 0; 
			  
			// Non-NULL Initialization Vector for encryption 
			$encryption_iv = '0129559946928006'; 
			  
			// Store the encryption key 
			$encryption_key = "TheQuickBrownFoxJumpsOverTheLazyDog"; 
			  
			// Use openssl_encrypt() function to encrypt the data 
			$encryption = openssl_encrypt($data, $ciphering, 
						$encryption_key, $options, $encryption_iv); 
			return $data;
		}
		echo "Thank you for filling this out";
		echo "File appended successfully";  

		



	?>
		<div>
			<h3> Go back to log page?</h3>
			<a href="tutorLog.html">tutorLog.html</a><br>
        </div>

</body>
</html>
