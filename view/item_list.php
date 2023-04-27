<?php include("view/header.php") ?>

<h1>ToDo List</h1>

<form action="index.php" method="get">
    <label for="category_id">Category:</label>
    <select name="category_id" id="category_id">
        <option value="">View All Categories</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['categoryID']; ?>">
                <?php echo htmlspecialchars($category['categoryName']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Filter">
</form>

<?php if (count($items) > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?php echo htmlspecialchars($item['title']); ?></td>
                <td><?php echo htmlspecialchars($item['description']); ?></td>
                <td><?php echo htmlspecialchars($item['categoryName']); ?></td>
                <td>
                    <form action="index.php" method="post">
                        <input type="hidden" name="item_id" value="<?php echo $item['itemNum']; ?>">
                        <input type="hidden" name="action" value="delete_item">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No items found.</p>
<?php endif; ?>

<a href="add_item_form.php">Add Item</a>

<p><a href="add_category_form.php">View/Edit Categories</a></p>

<?php include("view/footer.php") ?>


<?php /* if (count($items) > 0): ?>
    <ul>
        <?php foreach ($items as $item): ?>
            <li>
                <strong><?php echo htmlspecialchars($item['title']); ?></strong><br>
                <?php echo htmlspecialchars($item['description']); ?><br>
                Category: <?php echo htmlspecialchars($item['categoryName']); ?>
                <form action="index.php" method="post">
                    <input type="hidden" name="item_id" value="<?php echo $item['itemNum']; ?>">
                    <input type="hidden" name="action" value="delete_item">
                    <button type="submit">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No items found.</p>
<?php endif; */ ?>