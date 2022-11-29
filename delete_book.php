<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $bookId = $_GET["bookId"];
    include "connection.php";
    $sql = "DELETE FROM books WHERE id=$bookId";
    mysqli_query($con, $sql);
    header("Location:index.php");
    // die("Deleted Successfully");
}