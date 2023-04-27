<?php include("view/header.php") ?>

<h1>ToDo List</h1>

<form action="index.php" method="post">
    <label for="categoryName">Category Name:</label>
    <input type="text" name="categoryName" id="categoryName"><br>
    <input type="hidden" name="action" value="add_category">
    <button type="submit">Add</button>
</form>

<a href="item_list.php">Back to Item List</a>

<?php include("view/footer.php") ?>