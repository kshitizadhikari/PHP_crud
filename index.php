<?php 
    include('header.php');
    include('db.php'); 
?>

<div>
  <div class="d-flex justify-content-center p-5">
    <h1>HomePage</h1>
  </div>
  <div class="mb-3">
    <button class="btn border border-dark"> 
      <a href="create.php">Create User</a>
    </button>
  </div>
<div>
<table class="table table-success table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">FirstName</th>
        <th scope="col">LastName</th>
        <th scope="col">Age</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $query = "select * from users";
        $result = $conn->query($query);

        if($result->num_rows > 0)
        {
          while($row = $result->fetch_assoc()){
            ?>
            <tr>
              <td><?php echo $row["Id"]?></td>
              <td><?php echo $row["FirstName"]?></td>
              <td><?php echo $row["LastName"]?></td>
              <td><?php echo $row["Age"]?></td>
              <td><a class="btn btn-info" href="update.php?id=<?php echo $row['Id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['Id']; ?>">Delete</a></td>
            </tr>
          <?php
          }
        }
      ?>
    </tbody>
  </table>
</div>
