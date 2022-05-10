

   <table border="1">
      <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Description</th>
         <th>Price</th>
      </tr>
      {foreach key=id item=products from=$product}
         <tr>
            <td>{$products->getProductId()}</td>
            <td><a href="index.php?page=AdminEditProductController&id={$products->getProductId()}">{$products->getName()}</a></td>
            <td>{$products->getDescription()}</td>
            <td>{$products->getPrice()}</td>
         </tr>
      {/foreach}
   </table>


