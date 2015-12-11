</br>
</br>
<div class="container">
  <?php
    if($update){
      echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">";
      echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times</span></button>";
      echo "<strong>Success!</strong> Entry was updated.";

      echo "</div>";
    }
  ?>
  <div class="row">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading"><h4>View Stocks for Item # 
      <?php
        echo $item_id;
      ?>
      </h4></div>
      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>Shop Terminal ID</th>           
            <th>Item Quantity</th>
            <th style="text-align:center;">Edit</th>
            <!-- TODO: Add Item Name -->
          </tr>
        </thead>

  
        <?php
          //var_dump($stocks);
        if( $stocks != null ){
        //var_dump($stocks);
          foreach( $stocks as $stock ){
            echo "<tr>";
            echo "<td>".$stock->shop_terminal_id."</td>";
            echo "<td>".$stock->quantity."</td>";
            echo "<td class='details'><a class='btn btn-default btn-sm' type='button' href='".site_url("site/edit_item_stock/".$stock->item_id."/".$stock->shop_terminal_id)."'><span class='glyphicon glyphicon-list-alt'></span></a></td>";
            // href: edit_stock/$item->item_id/
            echo"</tr>";
          }
        }else{
            echo "<tr>";
            echo "<td> No entries found. </td>";
            echo"</tr>";
          }
          

          // ADD FORM
            echo "<form action=\"".site_url("site/item_stocks/".$item_id."/1/")."\" method=\"post\"><tr>";
            echo "<td><b>Add Stock</b></td>";
            echo "<td><input type='text' class='form-control' name='shop_terminal_id' value='Shop Terminal ID'></td>";
            echo "<td><input type='text' class='form-control' name='quantity' value='Quantity'></td>";
            echo "<td><input type=\"submit\" class=\"btn btn-default\"></td>";
            echo"</tr></form>";
        ?>
      </table>
    </div>
  </div>
</div>