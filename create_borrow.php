<?php
$bookId = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $bookId = $_GET["bookId"];

    include "connection.php";
    // insert into borrow table
    $sql = "INSERT INTO borrow (book_id, user_id, borrow_date) VALUES ($bookId, 1, NOW())";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookId = $_POST["bookId"];
    $returnDate = $_POST["returnDate"];

    include "connection.php";
    // insert into borrow table
    $sql = "INSERT INTO borrow (book_id, user_id, borrow_date) VALUES ($bookId, 1, NOW())";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Borrow</title>
</head>

<body>

</body>

</html>