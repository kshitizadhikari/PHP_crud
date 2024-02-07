<?php 
    include('header.php');
    include('db.php'); 
?>

<div class="d-flex align-items-center justify-content-center p-5">
    <div class="border border-dark p-5">
        <div>
            <h2 class="p-3 mb-5">Create Record</h2>
        </div>
        <div>
        <form action="create.php" method="POST">
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control border border-dark" name="fname" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control border border-dark" name="lname" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="text" class="form-control border border-dark" name="age" required>
            </div>

            <div class="d-flex justify-content-center mt-5">
                <button type="submit" name="submit">Create</button>
            </div>
        </form>
        </div>
    </div>
</div>

<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if (isset($_POST["submit"])) {
            $fname = $_POST['fname']; 
            $lname = $_POST['lname'];
            $age = $_POST['age'];
    
            $sql = "INSERT INTO Users (FirstName, LastName, Age) VALUES ('$fname', '$lname', '$age')";
            if($conn->query($sql) === TRUE) {

                header("Location: index.php");
            } else {
                echo "Creation unsuccessful";
            }
        }
    }
    
    
?>