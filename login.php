<?php
include('Student.php');
session_start();

?>

<?php
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
if (!empty($_POST['username']) && !empty($_POST['password'])) {
$username = $_POST['username'];
$password = $_POST['password'];
$openedFile = fopen("login.txt", "a");
$loginTxtArray = file("login.txt", FILE_IGNORE_NEW_LINES);
$studentLogin = $username . '.' . $password;
$found = false;
foreach ($loginTxtArray as $login) {
	if ($studentLogin === $login) {
		$found = true;
	}
}

// find current time for log file
date_default_timezone_set('US/Eastern');
$currenttime = date('h:i:s:u');
list($hrs,$mins,$secs,$msecs) = explode(':',$currenttime);
$time = "$hrs:$mins:$secs\n";

if ($found == true) {		
	$openLogFile = fopen("log.txt", "a");
	// create variable for login time/username
	$login = $username . '.' . $time;
	fputs($openLogFile, $login);
	fclose($openLogFile);
	// create student object and store student information 
	$array = file("students.txt");
	for($i = 0; $i < count($array); $i++){    //while $i is less than or equal to the number of elements in the array the loop runs.
     if(stristr($array[$i], $_POST['username'])){    //same as other example
          $student_info = $array[$i];
		  list($userName, $firstName, $lastName, $major, $class1, $class2, $class3) = explode('.', $student_info);
		  $student = new Student($userName, $firstName, $lastName, $major, $class1, $class2, $class3);
		  $_SESSION['student'] = $student;
     }
	}
	 header('Location: registration.php');
} 
}
echo "New user? " . '<a href="register.php">Click here to register.</a>';

?>