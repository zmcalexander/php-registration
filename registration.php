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
echo '</body></html>';
$studentInfo = $_SESSION["student"];
echo "Welcome, " . $studentInfo->get_fName();
$coursesTextArray = file("classes.txt", FILE_IGNORE_NEW_LINES);
echo "<br><br>List of available courses: <br>";
foreach ($coursesTextArray as $course) {
	list($courseNumber, $courseName) = explode('.', $course);
	echo $courseNumber . " | " . $courseName;
	echo "<br>";
}

echo '<form action="" method="get">';
echo "<br>Register for up to three courses by entering their course numbers below.<br><br>";
echo "1. " . '<input type="text" name="course1"><br>';
echo "2. " . '<input type="text" name="course2"><br>';
echo "3. " . '<input type="text" name="course3"><br><br>';
echo '<input type="submit" value="Submit"></form>';
echo '</body></html>';














?>