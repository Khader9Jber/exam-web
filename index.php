<?php
include "connection.php";
$sql = "SELECT id, name, publish_date, author, image FROM books";
$mysqli_result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Books</title>
    <style>
    table,
    th,
    td {
        border: 1px solid black;
        margin: 5px;
        padding: 5px;
    }
    </style>
</head>

<body>
    <button><a href="./create_book.php">Add book</a></button>
    <br>
    <table>
        <thead>
            <tr>
                <th>Book ID</th>
                <th>Book Name</th>
                <th>Published At</th>
                <th>Author</th>
                <th>Book Image</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($mysqli_result)) {
                echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['publish_date']}</td>
                <td>{$row['author']}</td>
                <td><img width=\"50px\" src=\"upload/book/{$row['image']}\" alt=\"\"></td>
                <td>
                <button>
                <a href=\"delete_book.php?bookId={$row['id']}\">
                Delete
                </a> 
                </button>
                <button>
                <a href=\"update_book.php?bookId={$row['id']}\">
                Update
                </a> 
                </button>
                </td>
                </tr>";
            }

            ?>
        </tbody>
    </table>
</body>

</html>