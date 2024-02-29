<?php include("dbcon.php"); ?>
<?php 

if(isset($_POST["add_students"])){
    // echo "pressed";
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $age = $_POST["age"];

    if($fname == "" || empty($fname)){
        header("location:index.php?message=You need fill in the first name");
    }
    if($lname == "" || empty($lname)){
        header("location:index.php?message=You need fill in the last name");
    }
    if($age == "" || empty($age)){
        header("location:index.php?message=You need fill in the age");
    } 
    else {
        $query = "insert into `students` (`firstname`,`lastname`,`age`) values ('$fname', '$lname', '$age')";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query Failed".mysqli_error($connection));
        }else{
            header("location:index.php?insert_msg=Your data has been added to the database.");
        }
    }

}

?>