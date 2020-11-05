<?php
require_once('database.php');

// Get the product data
$category_name = filter_input(INPUT_POST, 'category_name');
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Validate inputs
if ($category_name == null || $category_name == false || $category_id == null || $category_id == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = 'INSERT INTO categories
                 (categoryName, categoryID)
              VALUES
                 (:category_name, :category_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':category_name', $category_name);
  
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('category_list.php');
}
?>