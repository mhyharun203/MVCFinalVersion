<h2>{$product->getName()}</h2>


<form action="index.php?page=AdminEditProductController&id={$product->getProductId()}" method="post">
    <label for="fname">Product Name</label><br>
    <input type="text"  name="name"  value={$product->getName()}><br>
    <label for="lname">Product Price:</label><br>
    <input type="text" " name="price" value="price"><br>
    <label for="lname">Product Description:</label><br>
    <input type="text"  name="description" value="description"><br><br>

    <input type="submit" name="updateProduct" value="Update Product">
</form>



