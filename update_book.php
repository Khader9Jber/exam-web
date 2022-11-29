<?php
$blocked_extensions = array('exe', 'msi', 'php', 'dll');
$allowed_mimes = array('image/jpeg', 'image/gif', 'image/png');
$bookId = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $bookId = $_GET["bookId"];
    $sql = "SELECT id, name, publish_date, author FROM books where id = $bookId";
    include "connection.php";
    $mysqli_result = mysqli_query($con, $sql);
    $row =  mysqli_fetch_assoc($mysqli_result);
    $bookName = $row['name'];
    $bookPublishedDate = $row['publish_date'];
    $author = $row['author'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookId = $_GET["bookId"];

    $book_new_name = $_POST["book_new_name"];
    $book_new_date = $_POST["book_new_date"];
    $book_new_mobile = $_POST["book_new_mobile"];
    echo $newImage["tmp_name"];
    var_dump($newImage);
    include "connection.php";
    // update the book data
    $sql = "UPDATE books SET name='$book_new_name', publish_date='$book_new_date', author='$book_new_mobile' WHERE id=$bookId";
    mysqli_query($con, $sql);
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
    <style>
    input {
        margin: 5px;
    }
    </style>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="book_name" placeholder="Enter the book name" value="<?php echo $bookName ?>">
        <br>
        <p> Published Date </p>
        <input type="date" name="publish_date" placeholder="Enter the book date"
            value="<?php echo $bookPublishedDate ?>">
        <br>
        <input type="text" name="book_author" placeholder="Enter the book author" value="<?php echo $author ?>">
        <br>
        <input type="submit" value="Submit">
    </form>

</body>

</html>