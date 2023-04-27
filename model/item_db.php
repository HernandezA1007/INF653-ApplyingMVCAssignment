<?php
    function get_items_by_category($category_id) {
        global $db;
        if ($category_id) {
            $query = "SELECT todoitems.*, categories.categoryName
                        FROM todoitems
                        JOIN categories ON todoitems.categoryID = categories.categoryID
                        WHERE categoryID = :category_id 
                        ORDER BY itemNum";
        } else {
            $query = "SELECT todoitems.*, categories.categoryName
                        FROM todoitems
                        JOIN categories ON todoitems.categoryID = categories.categoryID
                        ORDER BY itemNum";
        }

        $statement = $db->prepare($query);
        if ($category_id) {
            $statement->bindValue(":category_id", $category_id);
        }
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();
        return $items;
    }

    function get_category($categoryName) {
        global $db;
        $query = "SELECT categoryName FROM categories
                  WHERE categoryID = :category_id";
        $statement = $db->prepare($query);
        $statement->bindValue(":category_id", $category_id);
        $statement->execute();
        $category = $statement->fetch();
        $statement->closeCursor();
        return $category["categoryName"];
    }

    function delete_item($item_num) {
        global $db;
        $query = "DELETE FROM todoitems 
                    WHERE itemNum = :item_num";
        $statement = $db->prepare($query);
        $statement->bindValue(":item_num", $item_num);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_item($title, $description, $category_id) {
        global $db;
        try {
            $query = 'INSERT INTO todoitems (title, description, categoryID)
                    VALUES (:title, :description, :category_id)';
            $statement = $db->prepare($query);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':category_id', $category_id);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            echo "Error adding item: " . $e->getMessage();
        }
    }
?>