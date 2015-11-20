</br>
</br>
<div class="container">
  <?php
  ?>
  <div class="row">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading"><h4>Edit Stock
      </h4></div>
      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>Shop Terminal ID</th>           
            <th>Item Quantity</th>
            <!-- TODO: Add Item Name -->
          </tr>
        </thead>

  
        <?php
          foreach( $stocks as $stock ){
            echo "<form action=\"".site_url("site/item_stocks/".$stock->item_id."/2/".$stock->shop_terminal_id)."\" method=\"post\"><tr>";
            echo "<td>".$stock->item_id."</td>";
            echo "<td><input type='text' class='form-control' name='quantity' value='".$stock->quantity."'></td>";
            echo "<td><input type=\"submit\" class=\"btn btn-default\"></td>";
            echo"</tr></form>";
          }
        ?>
      </table>
    </div>
  </div>
</div>