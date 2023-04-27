<?php
// Antonio Hernandez
// INF 653
// Applying MVC Assignment
// 3 - 6 - 23
?>

<?php 
    require("model/database.php");
    require("model/item_db.php");
    require("model/category_db.php");


    $item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, 'title', FILTER_UNSAFE_RAW);
    $description = filter_input(INPUT_POST, 'description', FILTER_UNSAFE_RAW);
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $category_name = filter_input(INPUT_POST, 'category_name', FILTER_UNSAFE_RAW);

    $action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);

    if (!$action) {
        $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
        if (!$action) {
            $action = 'list_items';
        }
    }

    // Switch statement to determine which action to take
    switch ($action) {
        case "list_categories":
            $categories = get_categories();
            include('view/category_list.php');
            break;
        case "add_category":
            if ($category_name) {
                add_category($category_name);
                header("Location: .?action=list_categories");
                exit;
            }
            break;
        case "add_item":
            if ($category_id && $description && $title) {
                add_item($title, $description, $category_id);
                header("Location: `index.php?action=list_items&category_id=$category_id`");
            }
         
            break;
        case "delete_category":
            if ($category_id) {
                try {
                    delete_category($category_id);
                } catch (PDOException $e) {
                    $error = "You cannot delete a category if items exist for that category.";
                    include('view/error.php');
                    exit();
                }
            }
            header("Location: index.php?action=list_categories");
            break;
        case "delete_item":
            if ($item_id) {
                delete_item($item_id);
            } else {
                $error = "Missing or incorrect item id.";
                include('view/error.php');
                exit();
            }
            header("Location: index.php?action=list_items&category_id=$category_id");
            break;
        case "list_items":
        default:
            $categories = get_categories();
            $category_name = '';
            $items = get_items_by_category($category_id);
            if ($category_id) {
                $category_name = get_category_name($category_id);
            }
            include('view/item_list.php');
            break;
    }
?>

<!-- It did work until around step 11? I then changed the database item to title.
The add item was working without the category table until I add the foreign key?
I had everything implemented on the item_list and then moved the add item and category to 
their own files.  -->