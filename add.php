<?php
require 'config.php';

if ($_POST) {
$title = $_POST['title'];
$desc =$_POST['description'];
$sql = "INSERT INTO todo (title,description) VALUES (:title,:description)";
$pdostatement = $pdo->prepare($sql);
$result = $pdostatement->execute(
array (
  ':title'=>$title,
  ':description'=>$desc
)
);
if ($result) {
echo "<script>alert ('new item is add');window.location.href='index.php';</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="card">
        <div class="card-body">
        <h2>Create a New Todo</h2>
        <form class="" action="add.php" method= "POST">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>

            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="SUBMIT">
                <a href="index.php" class="btn btn-warning" type="button">BACK</a>
            </div>
        
        </form>
        </div>
    </div>
</body>
</html>