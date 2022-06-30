<ul>

        {foreach key=id item=product from=$categoryProducts}
                <li><a href="index.php?page=DetailController&id={$product->getProductId()}">{$product->getName()}</a></li>
        {/foreach}</ul>

