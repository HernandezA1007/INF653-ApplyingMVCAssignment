<?php include("view/header.php") ?>

<h1>Categories</h1>

<h2>Existing Categories</h2>
<?php if (count($categories) > 0): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php echo htmlspecialchars($category['categoryID']); ?></td>
                    <td><?php echo htmlspecialchars($category['categoryName']); ?></td>
                    <td>
                        <form action="index.php" method="post">
                            <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>">
                            <input type="hidden" name="action" value="delete_category">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No categories found.</p>
<?php endif; ?>


<h2>Add Category</h2>
<form action="index.php" method="post">
    <label for="categoryName">Category Name:</label> 
    <input type="text" name="categoryName" maxlength="50" placeholder="Category Name" required>
    <input type="hidden" name="action" value="add_category">
    <button type="submit">Add</button>
</form>

<?php include("view/footer.php") ?>