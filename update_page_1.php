<?php include("header.php"); ?>
<?php include("dbcon.php"); ?>

<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
            
        $query = "SELECT * FROM `students` where `id` = '$id'";

        $result = mysqli_query($connection, $query);

        if(!$result) {
            die("Query failed" . mysqli_error($connection));
        }
        else {

            $row = mysqli_fetch_assoc($result);

            // print_r($row);

    }
}


?>

<?php
    if(isset($_POST['update_students'])){

        // if(isset($_GET['id_new'])){
        //     $idnew = $_GET['id_new'];
        // }

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];

        $query = "update `students` set `firstname` = '$fname', `lastname` = '$lname', `age` = '$age' where `id` = '$id'";
      
        $result = mysqli_query($connection, $query);

        if(!$result) {
            die("Query failed" . mysqli_error($connection));
        } 
        else {
            header("location: index.php?update_msg=You have update this row data");
        }
    }


?>

<div class="container">

<form accept="update_page_1.php?id=<?php echo $id; ?>" method="POST">
    <div class="form-group">
        <label for="exampleInputFistName">First Name</label>
        <input type="text" class="form-control" id="exampleInputFistName" name="fname" aria-describedby="First Name" value="<?php echo $row['firstname']?>">
    </div>
    <div class="form-group">
        <label for="exampleInputLastName">Last Name</label>
        <input type="text" class="form-control" id="exampleInputLastName" name="lname" value="<?php echo $row['lastname']?>">
    </div>
    <div class="form-group">
        <label for="exampleInputAge">Age</label>
        <input type="text" class="form-control" id="exampleInputAge" name="age" value="<?php echo $row['age']?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_students" value="Update" />
</form>

</div>

<?php include("footer.php"); ?>