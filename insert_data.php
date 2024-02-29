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

}

?>