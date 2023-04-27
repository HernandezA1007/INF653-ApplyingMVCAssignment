<?php include("view/header.php") ?>

<h1>ToDo List</h1>

<h2>Add Item</h2>
<form action="index.php" method="post">
    <label for="title">Title:</label>
    <input type="text" name="title" id="title"><br>
    <label for="description">Description:</label>
    <input type="text" name="description" id="description"><br>
    <label for="category_id">Category:</label>
    <select name="category_id" id="category_id">
        <option value="">Please select</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['categoryID']; ?>">
                <?php echo htmlspecialchars($category['categoryName']); ?>
            </option>
        <?php endforeach; ?>
        </select><br>
    <input type="hidden" name="action" value="add_item">
    <button type="submit" name="submit" value="submit">Add</button>
</form>

<a href="item_list.php">Back to Item List</a>

<?php include("view/footer.php") ?>