<?php
echo '<html>';
echo '<head>';
echo '<title>Student Registration</title>';
echo '</head>';
echo '<body>';
echo '<h1>New Student Registration</h1>';
echo '<form action="" method="post">';
echo "Username: " . '<input type="text" name="username"><br><br>';
echo "Password: " . '<input type="password" name="password"><br><br>';
echo "First Name: " . '<input type="text" name="firstName"><br><br>';
echo "Last Name: " . '<input type="text" name="lastName"><br><br>';
echo "Major: " . '<input type="text" name="major"><br><br>';
echo '<input type="submit" value="Submit"></form>';
echo '</body></html>';
if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['major'])) {
$username = $_POST['username'];
$password = $_POST['password'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$major = $_POST['major'];
$openedFile = fopen("students.txt", "a");
$newStudentInformation = $username . '.' . $firstName . '.' . $lastName . '.' . $major . PHP_EOL;
fputs($openedFile, $newStudentInformation);
fclose($openedFile);
$openedLoginFile = fopen("login.txt", "a");
$studentLoginInformation = $username . '.' . $password . PHP_EOL;
fputs($openedLoginFile, $studentLoginInformation);
fclose($openedLoginFile);
header('Location: login.php');
}
?>