<?php include("header.php"); ?>
<?php include("dbcon.php"); ?>
    <div class="container">
        <div>
            <h1 class="text-center">All Students</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Student</button>
        </div>
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

        <?php 
        
        if(isset($_GET['message'])){
            echo "<h6 class='text-center'>".$_GET['message']."</h6>";
        }
        
        ?>

        <?php 
        
        if(isset($_GET['insert_msg'])){
            echo "<h6 class='text-center'>".$_GET['insert_msg']."</h6>";
        }
        
        ?>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="insert_data.php" method="POST">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <!-- <form> -->
                <div class="form-group">
                    <label for="exampleInputFistName">First Name</label>
                    <input type="text" class="form-control" id="exampleInputFistName" name="fname" aria-describedby="First Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputLastName">Last Name</label>
                    <input type="text" class="form-control" id="exampleInputLastName" name="lname">
                </div>
                <div class="form-group">
                    <label for="exampleInputAge">Age</label>
                    <input type="text" class="form-control" id="exampleInputAge" name="age">
                </div>
            <!-- </form> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-success" name="add_students" value="Add" />
            </div>
            </div>
            </form>

        </div>
        </div>
    </div>
<?php include("footer.php"); ?>