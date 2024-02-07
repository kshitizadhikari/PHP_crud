<?php 
    include('header.php');
    include('db.php'); 

    $id = (int)$_GET['id'];
    $query = "SELECT * FROM users WHERE Id=$id";
    $result = $conn->query($query);
    if (!$result) {
        die("Query failed");
    }

    $row = $result->fetch_assoc();
?>

<div class="d-flex align-items-center justify-content-center p-5">
    <div class="border border-dark p-5">
        <div>
            <h2 class="p-3 mb-5">Update Record</h2>
        </div>
        <div>
            <form action="update.php?id=<?php echo $id;?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <div class="mb-3">
                    <label class="form-label">Enter New First Name</label>
                    <input type="text" class="form-control border border-dark" name="newFName" value="<?php echo $row['FirstName']?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Enter New Last Name</label>
                    <input type="text" class="form-control border border-dark" name="newLName" value="<?php echo $row['LastName']?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Enter New Age</label>
                    <input type="text" class="form-control border border-dark" name="newAge" value="<?php echo $row['Age']?>" required>
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button type="submit" name="updateSubmit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateSubmit'])) {
        $fname = $_POST['newFName']; 
        $lname = $_POST['newLName'];
        $age = $_POST['newAge'];
        $sql = "UPDATE `users` SET `FirstName`='$fname',`LastName`='$lname',`Age`='$age' WHERE `Id`='$id'"; 
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit(); // Make sure to exit after redirection
        } else {
            echo "Update unsuccessful";
        }
    }
?>
