<?php
include('Student.php');
session_start();
?>

<?php
$student = $_SESSION['student'];
echo "<h3>Course registration successful.</h3><br>";
echo "Username: " . $student->get_sid() . "<br>";
echo "Student Name: " . $student->get_fName(). " " . $student->get_lName() . "<br>";
echo "Major: " . $student->get_major() . "<br><br>";
echo "Courses currently registered for: <br>";
echo $student->get_class1() . "<br>";
echo $student->get_class2() . "<br>";
echo $student->get_class3() . "<br>";



session_destroy();












?>