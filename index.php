<?php
// Antonio Hernandez
// INF 653
// ToDo List Application
// 2 - 22 - 23
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List Application</title>
</head>

<body>
    <h1>ToDo List Application</h1>
    <?php
    require_once ('database.php');

    /*
    $db = mysql_connect('localhost', 'root', '', 'todolist');

    if (mysql_connect_error()) {
        echo "Failed to connect to MySQL: " . mysql_connect_error();
    }
    */

    $sql = "SELECT * FROM todoitems";
    $statement = $conn->prepare($sql);
    $statement->execute();
    //$result = mysql_query($db, $sql);
    if ($statement->rowCount() == 0) {
        echo "No todo list items exist yet.";
    } else {
        echo "<table border='1'>
                <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Remove</th>
            </tr>";
        while ($row = $statement->fetch()) {
            echo "<tr>
                    <td>".$row['Title']."</td>
                    <td>".$row['Description']."</td>
                    <td><a href='remove.php?id=".$row['ItemNum']."'>X</a></td>
                </tr>";
        }
        echo "</table>";
    }
    ?>
    <br>
    <a href="add.php">Add Item</a>

    <?php
    /*
    if (mysql_num_rows($result) > 0) {
        echo "No to do list items exist yet.";
    } else {
        echo "<table border='1'> 
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Remove</th>
            </tr>";
        while ($row = mysql_fetch_assoc($result)) {
            echo "<tr>
                    <td>".$row['title']."</td>
                    <td>".$row['description']."</td>
                    <td><a href='remove.php?id=".$row['ItemNum']."'>X</a></td>
                </tr>";
        }
        echo "</table>";
    }

    mysql_close($db);
    ?>
    <br>
    <a href="add.php">Add Item</a>

    */
    ?>

</body>

</html>