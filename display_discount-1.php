<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Product Discount Calculator</h1>

        <label>Product Description:</label>
        <span><?php $product = filter_input(INPUT_POST, 'product_description' );
         echo "$product"; ?></span><br>

        <label>List Price:</label>
        <span><?php $list = filter_input(INPUT_POST, 'list_price', FILTER_VALIDATE_FLOAT);
         echo "$list"; ?></span><br>

        <label>Standard Discount:</label>
        <span><?php $stdDiscount = filter_input(INPUT_POST, 'discount_percent', FILTER_VALIDATE_INT);
        echo "$stdDiscount"; ?></span><br>

        <label>Discount Amount:</label>
        <span><?php  echo ($list * $stdDiscount *.01 ); ?></span><br>

        <label>Discount Price:</label>
        <span><?php  echo ($list - $list * $stdDiscount *.01 ); ?></span><br>
    </main>
</body>
</html>