<h1>{{$user->getName() }}</h1>
<form action="index.php?page=AdminEditUserController&id={$user->getId()}" method="post">
    <label for="fname">User Name</label><br>
    <input type="text"  name="userName"  value=><br>
    <label for="lname">password:</label><br>
    <input type="text" name="password" value="*******"><br>
    <label for="lname">Email:</label><br>
    <input type="text"  name="email" value="@"><br><br>

    <input type="submit" name="updateUser" value="Update User">
</form>


<form action="index.php?page=AdminDeleteUserController&id={$user->getid()}" method="post">
    <input type="submit" name="deleteProduct" value="Delete User">
</form>