<?php

// database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quipanes_crud";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection Failed:". $conn->connect_error);
}

// create record
if (isset($_POST['create'])) {
    $school_id = $_POST['school_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $MI = $_POST['MI'];
    $Date_of_birth = $_POST['Date_of_birth'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $year_lvl = $_POST['yearl_lvl'];

    $sql = "INSERT INTO schooltbl (school_id, fname, lname, MI, Date_of_birth, gender, course, yearl_lvl) VALUES ('$school_id', '$fname', '$lname', '$MI', '$Date_of_birth', '$gender', '$course', '$yearl_lvl')";
    $conn->query($sql);
}

// update record
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $school_id = $_POST['school_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $MI = $_POST['MI'];
    $Date_of_birth = $_POST['Date_of_birth'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $year_lvl = $_POST['yearl_lvl'];

    $sql = "UPDATE schooltbl SET school_id = '$school_id', fname = '$fname', lname = '$lname', MI = '$MI', Date_of_birth = '$Date_of_birth', gender = '$gender', course = '$course', year_lvl = '$yearl_lvl' WHERE id = $id";
    $conn->query($sql);
}

// Delete record
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM schooltbl WHERE id=$id";
    $conn->query($sql);
}

// Search records
if (isset($_POST['search'])) {
    $search = $_POST['search'];


    $sql = "SELECT FROM schooltbl WHERE school_id LIKE '%$search%' OR fname LIKE '%$search%' OR lname LIKE '%$search%' OR MI LIKE '%$search%' OR Date_of_birth LIKE '%$search%' OR gender LIKE '%$search%' OR course LIKE '%$search%' OR year_lvl LIKE '%$search%' ";
    $result = $conn->query($sql);

} else {
    //fetch all
    $sql = "SELECT * FROM schooltbl";
    $result = $conn->query($sql);

}

// Display all records
if ($result->num_rows > 0 ) {
    while ($row = $result ->fetch_assoc()) {
        echo "school_id: " . $row['school_id'] . " First Name: ". $row['fname'] .' Last Name: '. $row['lname'] . ' Mid. Initial: '. $row['MI'] .' Date_of_birth: '. $row['Date_of_birth'] . ' gender: '. $row['gender'] .' course: '. $row['course'] . ' Year Level: '. $row['year_lvl'] . "<br>";

    }
}
else {
    echo "No records found";
}

$conn->close();


?>