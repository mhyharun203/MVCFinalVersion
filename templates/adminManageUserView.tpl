<h1> Manage User / Customer </h1>


<table border="3">
    <tr>

        <th>Name</th>
        <th>email</th>
        <th>password</th>
    </tr>
    {foreach key=id item=allUsers from=$userList}
        <tr>
            <td>
                <a href="index.php?page=AdminEditUserController&id={$allUsers->getId()}">{$allUsers->getName()}</a>
            </td>
            <td>{$allUsers->getEmail()}</td>
            <td>{$allUsers->getPassword()}</td>
        </tr>
    {/foreach}
</table>
<br>
<button><a href="index.php?page=AdminAddUserController">Add User</a></button>