<?php 

include("db/conection.php");


if(isset($_REQUEST['btn_save'])){
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];
    $turn = $_POST['turn'];

    $sql = "INSERT INTO students (name,last_name,age,grade,turn) values('$name','$last_name','$age','$grade','$turn')";

    $execute = mysqli_query($conn,$sql);

    if(!$execute) {
        die("Connection Error");
    }

    header("Location:index.php");
}


if(isset($_REQUEST['btn_update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];
    $turn = $_POST['turn'];

    $sql = "UPDATE students set name='$name',last_name='$last_name',age='$age',grade='$grade',turn='$turn' WHERE id = $id";

    $execute = mysqli_query($conn,$sql);

    if(!$execute) {
        die("Connection Error");
    }

    header("Location:index.php");
}

if(isset($_REQUEST['btn_delete'])){
    $id = $_POST['id'];


    $sql = "DELETE FROM students WHERE id = $id";
    $execute = mysqli_query($conn,$sql);

    if(!$execute) {
        die("The student  could not be removed.");
    }

    header("Location:index.php");

}


?>
<!-- BASIC CRUD BY GrumpyDev -->