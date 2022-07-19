<h1>{{$baum}}</h1>

<br>
<form action="index.php?page=AdminAddProductController" method="post">
    <label for="productName">Product Name:</label><br>
    <input type="text" id="productName" name="productName" value="exmpl: Shoes"><br><br>
    <label for="productId">Product ID:</label><br>
    <input type="text" id="productId" name="productId" value="exmpl: 1"><br><br>
    <label for="categoryName">Category Name:</label><br>
    <input type="text" id="categoryName" name="categoryName" value="exmpl: socks"><br><br>
    <label for="categoryId">CategoryId:</label><br>
    <input type="text" id="categoryId" name="categoryId" value="exmpl: 1"><br><br>
    <label for="price">Price:</label><br>
    <input type="text" id="productPrice" name="productPrice" value="exmpl: 30 €"><br><br>
    <label for="description">Description:</label><br>
    <input type="text" id="description" name="productDescription" value="exmpl: Das ist ein Hose Kurwa"><br><br>
    <input type="submit" name="addProduct" value="Submit">
</form>



