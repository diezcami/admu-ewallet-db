</br>
</br>
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading"><h4>Items</h4></div>
      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>Item Number</th>           
            <th>Name</th>
            <th>Price</th>
            <th style="text-align:center;">Edit</th>
            <th style="text-align:center;">View Stocks</th>

          </tr>
        </thead>
        
        <?php
          foreach( $items as $item ){
            echo "<tr>";
            echo "<td>".$item->item_id."</td>";
            echo "<td>".$item->item_name."</td>";
            echo "<td>".$item->item_price."</td>";
            echo "<td class='details'><a class='btn btn-default btn-sm' type='button' href='edit_item/$item->item_id'><span class='glyphicon glyphicon-list-alt'></span></a></td>";
            echo "<td class='details'><a class='btn btn-default btn-sm' type='button' href='item_stocks/$item->item_id'><span class='glyphicon glyphicon-list-alt'></span></a></td>";
            echo"</tr>";
          }       
        ?>

        <tr>
        <td><b>Add Item:</b></td>
        <td><input type='text' class='form-control' id="item_name" value='Item Name'></td>
        <td><input type='text' class='form-control' id="item_price" value='Item Price'></td>

        <?php
            $item_name = $_POST["item_name"];
            $item_price = $_POST["item_price"];

            echo "<td class='details'><a class='btn btn-default btn-sm' type='button' href='add_item/$item_name/$item_price'><span class='glyphicon glyphicon-list-alt'></span></a></td>";
        ?>
        </tr>

      </table>
    </div>
  </div>
</div>