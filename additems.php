<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Items</title>
</head>

<body>
    <h1>Add Items</h1>
    <form method="post" action="insert.php">
        <label>Title:</label>
        <input type="text" name="title" required>
        <br>
        <label>Description:</label>
        <input type="text" name="description" required>
        <br>
        <input type="submit" value="Add Item">
    </form>
    <br>
    <a href="index.php">Back to List</a>

</body>

</html>