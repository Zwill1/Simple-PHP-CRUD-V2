<?php include("header.php"); ?>
<?php include("dbcon.php"); ?>
    <div class="container">
        <h1 class="text-center">Hello, world!</h1>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Age</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            
            $query = "SELECT * FROM students";

            $result = mysqli_query($connection, $query);

            if(!$result) {
                die("Query failed" . mysqli_error($connection));
            }
            else {
                // print_r($result);
                while($row = mysqli_fetch_assoc($result)){
                    ?>

                    <tr>
                        <th scope="row"><?php echo $row['id']; ?></th>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                    </tr>
                    <?php
                }
            }
            
            ?>
        </tbody>
        </table>
    </div>
<?php include("footer.php"); ?>