<?php
require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php
    $pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
    $pdostatement->execute();
    $result = $pdostatement->fetchAll();
?>

    <div class="card">
        <div class="card-body">
            <h2>To Do Home Page</h2>
            <div>
                <a href="add.php" type = "button" class = "btn btn-success">Create A New Post</a> 
            </div><br>
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $i = 1;
                    if($result) {
                        foreach($result as $value){
                ?>

                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $value['title'] ?></td>
                    <td><?php echo $value['description'] ?> </td>
                    <td><?php echo date('Y-m-d',strtotime($value['created_at'])) ?></td>
                    <td>
                    <a href="edit.php?id=<?php echo $value['id']; ?>" class = "btn btn-info" type ="button">Edit</a>
                    <a href="delete.php?id=<?php echo $value['id'] ?>" class = "btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php   
                $i++;

                }
             }
            ?>
                   
            </tbody>
            </table>
        </div>
    </div>
</body>
</html>