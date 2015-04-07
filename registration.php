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
echo "Welcome, " . $studentInfo->get_fName() . '!';
$coursesTextArray = file("classes.txt", FILE_IGNORE_NEW_LINES);
echo "<br><br>List of available courses: <br>";
foreach ($coursesTextArray as $course) {
	list($courseNumber, $courseName, $studentsEnrolled) = explode('.', $course);
	if ($studentsEnrolled < 20) {
	echo $courseNumber . " | " . $courseName;
	echo "<br>";
	}
}

echo '<form action="" method="get">';
echo "<br>Register for up to three courses by entering their course numbers below.<br><br>";
echo "1. " . '<input type="text" name="course1"><br>';
echo "2. " . '<input type="text" name="course2"><br>';
echo "3. " . '<input type="text" name="course3"><br><br>';
echo '<input type="submit" value="Submit"></form>';
echo '</body></html>';

$array = file("classes.txt");
	for($i = 0; $i < count($array); $i++){  
	if (isset($_GET['course1'])) {
     if(stristr($array[$i], $_GET['course1'])){ 
          $course1Info = $array[$i];
		  list($courseName, $courseNumber, $numberRegistered) = explode('.', $course1Info);
		  $course1Info = $courseName . '.' . $courseNumber . '.' . ($numberRegistered + 1);
		  
			$path = ('classes.txt');
			$content = file($path);

			foreach ($content as $line_num => $line) {
			if (false === (strpos($line, $_GET['course1']))) continue;

			$content[$line_num] = $course1Info . "\n";
			}

			file_put_contents($path, implode($content));
		  
	 }
     }
	 if (isset($_GET['course2'])) {
	 if(stristr($array[$i], $_GET['course2'])){ 
          $course2Info = $array[$i];
		  list($courseName, $courseNumber, $numberRegistered) = explode('.', $course2Info);
		  $course2Info = $courseName . '.' . $courseNumber . '.' . ($numberRegistered + 1);
		  
			$path = ('classes.txt');
			$content = file($path);

			foreach ($content as $line_num => $line) {
			if (false === (strpos($line, $_GET['course2']))) continue;

			$content[$line_num] = $course2Info . "\n";
			}

			file_put_contents($path, implode($content));
		  
	 }  
     }
	 
	 if (isset($_GET['course3'])) {
	 if(stristr($array[$i], $_GET['course3'])){ 
          $course3Info = $array[$i];
		  list($courseName, $courseNumber, $numberRegistered) = explode('.', $course3Info);
		  $course3Info = $courseName . '.' . $courseNumber . '.' . ($numberRegistered + 1);
		  
			$path = ('classes.txt');
			$content = file($path);

			foreach ($content as $line_num => $line) {
			if (false === (strpos($line, $_GET['course3']))) continue;

			$content[$line_num] = $course3Info . "\n";
			}

			file_put_contents($path, implode($content));
		  
		  
     }
	 }
	 
	}





if (!empty($_GET['course1']) && !empty($_GET['course2']) && !empty($_GET['course3'])) {
			$course1 = $_GET['course1'];
			$course2 = $_GET['course2'];
			$course3 = $_GET['course3'];
			
			$class1 = $course1;
			$class2 = $course2; 
			$class3 = $course3;
			
			
			$_SESSION['student']->set_class1($course1);
			$_SESSION['student']->set_class2($course2);
			$_SESSION['student']->set_class3($course3);
			
			$path = ('students.txt');
			$content = file($path);

			foreach ($content as $line_num => $line) {
			if (false === (strpos($line, $_SESSION['student']->get_sid()))) continue;

			$content[$line_num] = $_SESSION['student']->get_sid() . '.' . $_SESSION['student']->get_fName() . '.' .$_SESSION['student']->get_lName() . '.' .$_SESSION['student']->get_major() . '.' .$_SESSION['student']->get_class1() . '.' .$_SESSION['student']->get_class2() . '.' . $_SESSION['student']->get_class3() . "\n";
			}

			file_put_contents($path, implode($content));
			
			/**
			$path = ('classes.txt');
			$content = file($path);

			foreach ($content as $line_num => $line) {
			if (false === (strpos($line, $_SESSION['student']->get_sid()))) continue;

			$content[$line_num] = $_SESSION['student']->get_sid() . '.' . $_SESSION['student']->get_fName() . '.' .$_SESSION['student']->get_lName() . '.' .$_SESSION['student']->get_major() . '.' .$_SESSION['student']->get_class1() . '.' .$_SESSION['student']->get_class2() . '.' . $_SESSION['student']->get_class3() . "\n";
			}

			file_put_contents($path, implode($content));
			*/
			
			
			header('Location: display.php');

}









?>