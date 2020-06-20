<?php
include("db/conection.php");
date_default_timezone_set("America/Caracas");
$actual_date = date("d-m-Y H:i:s");

@$id_student = $_GET['id'];
$consult = "SELECT * FROM students WHERE id='$id_student'";
$execute_id = mysqli_query($conn,$consult);

while($row=mysqli_fetch_array($execute_id)){

    $id=$row['id'];
    $date=$row['date'];
    $name=$row['name'];
    $age=$row['age'];
    $last_name=$row['last_name'];
    $grade=$row['grade'];
    $turn=$row['turn'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libraries/materialize/css/materialize.min.css">
    <title>PHP CRUD</title>

   
   
</head>

<body>

<input type="hidden" name="id" id="id_student" value="<?php echo $id_student ?>">
    <div class="row">

    <!-- REGISTER FORM -->
        <div class="col l4" style="position:absolute; top:15%;" id="register_form">
            <h5 class="blue-text"> STUDENT REGISTER</h5>

            <form action="control.php" method="POST" accept-charset="utf-8">

                <div class="input-field col l5">
                    <input type="text" name="date" value="<?php echo $actual_date ?>">
                    <label for="fecha">Date</label>
                </div>

                <div class="input-field col l12">
                    <input type="text" name="name" value="">
                    <label for="nombre">Name</label>
                </div>

                <div class="input-field col l12">
                    <input type="text" name="last_name" value="">
                    <label for="apellidos">Last Name</label>
                </div>

                <div class="input-field col l4">
                    <input type="text" name="age" value="">
                    <label for="edad">Age</label>
                </div>

                <div class="input-field col l4">
                    <input type="text" name="grade" value="">
                    <label for="grado">Grade</label>
                </div>

                <div class="input-field col l4">
                    <input type="text" name="turn" value="">
                    <label for="turno">Turn</label>
                </div>

                <div class="input-field col l12">
                    <button type="submit" value="" class="blue btn-small" name="btn_save">Save</button>
                </div>

                
            </form>

        </div>



        <div class="col l7 offset-l5" style="position:absolute; top:15%;">

            <table>
                <h5 class="blue-text">List of Alumns</h5>
                <thead>
                    <tr>
                        <th>Register Date</th>
                        <th>First Name</th>
                        <th>Last name</th>
                        <th>Age</th>
                        <th>Grade</th>
                        <th>Turn</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <?php 
                    $sql = "SELECT * FROM students";
                    $execute = mysqli_query($conn,$sql);

                    while($file = mysqli_fetch_array($execute)){

                    
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $file['date'] ?></td>
                        <td><?php echo $file['name'] ?></td>
                        <td><?php echo $file['last_name'] ?></td>
                        <td><?php echo $file['age'] ?></td>
                        <td><?php echo $file['grade'] ?></td>
                        <td><?php echo $file['turn'] ?></td>
                        
                        <td><a href="index.php?id=<?php echo $file['id'] ?>" class="blue btn-small">Edit</a></td>
                    </tr>
                </tbody>

                <?php }; ?>
            </table>


        </div>

        <!-- EDIT FORM -->
        <div class="col l4" style="position:absolute; top:15%;" id="update_form">
            <h5 class="blue-text"> INFO EDIT</h5>

            <form action="control.php" method="POST" accept-charset="utf-8">

                <div class="input-field col l5">
                    <input type="text" name="date" value="<?php echo $date;  ?>">
                    <label for="fecha">Date</label>
                </div>
                <div class="input-field col l5">
                    <input type="text" name="id" value="<?php echo $id;  ?>">
                    <label for="id">id</label>
                </div>

                <div class="input-field col l12">
                    <input type="text" name="name" value="<?php echo $name;  ?>">
                    <label for="nombre">Name</label>
                </div>

                <div class="input-field col l12">
                    <input type="text" name="last_name" value="<?php echo $last_name ?>">
                    <label for="apellidos">Last Name</label>
                </div>

                <div class="input-field col l4">
                    <input type="text" name="age" value="<?php echo $age  ?>">
                    <label for="edad">Age</label>
                </div>

                <div class="input-field col l4">
                    <input type="text" name="grade" value="<?php echo $grade  ?>">
                    <label for="grado">Grade</label>
                </div>

                <div class="input-field col l4">
                    <input type="text" name="turn" value="<?php echo $turn  ?>">
                    <label for="turno">Turn</label>
                </div>

                <div class="input-field col l4">
                    <button type="submit" value="" class="red accent-darken-4 btn-small" name="btn_delete">Delete</button>
                </div>
                

                <div class="input-field col l4">
                    <button type="submit" value="" class="blue btn-small" name="btn_update">update</button>
                </div>

                <div class="input-field col l4">
                    <a href="index.php" class="blue btn-small" name="btn_return">Return</a>
                </div>

                
            </form>

        </div>
    </div>
    




    <script src="libraries/jquery-3.4.1.min.js"></script>
    <script src="libraries/myquery.js"></script>
    <script>
        $(document).ready(function() {
         id = $("#id_student").val();

         if(id > 0){
             $("#register_form").hide();
         }
         if (id==""){
             $("#update_form").hide();
         }
         });
        
    </script>
   

   
    <script src="libraries/materialize/js/materialize.min.js"></script>

    

    
 

</body>

</html>






























































<!-- BASIC CRUD BY GrumpyDev -->
