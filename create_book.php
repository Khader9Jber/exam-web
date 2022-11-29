<?php
$blocked_extensions = array('exe', 'msi', 'php', 'dll');
$allowed_mimes = array('image/jpeg', 'image/gif', 'image/png');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_name = $_POST["book_name"];
    $publish_date = $_POST["publish_date"];
    $book_author = $_POST["book_author"];
    $image_file = $_FILES["book_image"];
    // var_dump($image_file);
    $image_name = $image_file["name"];
    $image_tmp = $image_file["tmp_name"];
    $image_size = $image_file["size"];

    $mimetype = mime_content_type($image_tmp);
    $splitted_name = explode(".", $image_name);
    $image_extension = strtolower(end($splitted_name));
    // echo exec('whoami');
    if (!in_array($image_extension, $blocked_extensions) && in_array($mimetype, $allowed_mimes)) {
        $new_image_name = rand(1000000, 9000000) . '.' . $image_extension;
        // exit;
        $target = "upload/book/" . $new_image_name;
        include "connection.php";

        // validate the date is in the past
        $date = DateTime::createFromFormat('Y-m-d', $publish_date);
        if ($date && $date->format('Y-m-d') < date('Y-m-d')) {
            if (move_uploaded_file($image_tmp, $target)) {
                $sql = "INSERT INTO `books` (`name`, `publish_date`, `author`, `image`) VALUES ('$book_name', '$publish_date', '$book_author', '$new_image_name')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    echo "Book Added Successfully";
                } else {
                    echo "Failed to add book";
                }
            } else {
                echo "Failed to upload image because the date in not in the past";
            }
        } else {
            echo "Invalid date";
        }

        move_uploaded_file($image_tmp, $target);


        header("Location:index.php");
    } else {
        die("Failed To Upload!!");
    }
    // exit;
    // move_uploaded_file();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <style>
    input {
        margin: 5px;
    }
    </style>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="book_name" placeholder="Enter the book name">
        <br>
        <p> Published Date </p>
        <input type="date" name="publish_date" placeholder="Enter the book date">
        <br>
        <input type="text" name="book_author" placeholder="Enter the book author">
        <br>
        <input type="file" name="book_image">
        <br>
        <input type="submit" value="Submit">
    </form>

</body>

</html>