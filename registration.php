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
	list($courseNumber, $courseName, $studentsEnrolled) = explode('.', $course);
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

if (!empty($_GET['course1']) && !empty($_GET['course2']) && !empty($_GET['course3'])) {
$class1 = $_GET['course1'];
$class2 = $_GET['course2'];
$class3 = $_GET['course3'];

$_SESSION['student']->set_class1($class1);
$_SESSION['student']->set_class2($class2);
$_SESSION['student']->set_class3($class3);

header('Location: display.php');

}















?>