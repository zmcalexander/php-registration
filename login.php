<?php
session_start();
?>

<?php
include('Student.php');
echo '<html>';
echo '<head>';
echo '<title>Student Registration</title>';
echo '</head>';
echo '<body>';
echo '<h1>Student Login</h1>';
echo '<form action="" method="post">';
echo "Username: " . '<input type="text" name="username"><br><br>';
echo "Password: " . '<input type="password" name="password"><br><br>';
echo '<input type="submit" value="Submit"></form>';
echo '</body></html>';
$username = $_POST['username'];
$password = $_POST['password'];
$openedFile = fopen("login.txt", "a");
$loginTxtArray = file("login.txt");
$studentLogin = $username . '.' . $password;
$found = false;
foreach ($loginTxtArray as $login) {
	if ($login == $studentLogin) {
		$found = true;
	}
}

// find current time for log file
date_default_timezone_set('US/Eastern');
$currenttime = date('h:i:s:u');
list($hrs,$mins,$secs,$msecs) = explode(':',$currenttime);
$time = "$hrs:$mins:$secs\n";


if ($found == true) {
	// header('Location: registration.php');
	$openLogFile = fopen("log.txt", "a");
	// create variable for login time/username
	$login = $username . '.' . $time;
	fputs($openLogFile, $login);
	fclose($openLogFile);
	// create student object and store student information 
	$studentInfo = file_get_contents("students.txt");
	echo $studentInfo;
	$studentStart = strpos($studentInfo, $_POST['username']);
	if ($studentStart === false) {
	echo "This didn't work";
	} else {
		echo $studentStart;
	}


} 
   

echo "New user? " . '<a href="register.php">Click here to register.</a>';

?>

