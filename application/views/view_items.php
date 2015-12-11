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
          if( $items != '300' ){
            //var_dump($items);
            foreach( $items as $item ){
              echo "<tr>";
              echo "<td>".$item->item_id."</td>";
              echo "<td>".$item->item_name."</td>";
              echo "<td>".$item->item_price."</td>";
              echo "<td class='details'><a class='btn btn-default btn-sm' type='button' href='".site_url("site/edit_item/".$item->item_id)."'><span class='glyphicon glyphicon-list-alt'></span></a></td>";
              echo "<td class='details'><a class='btn btn-default btn-sm' type='button' href='item_stocks/$item->item_id'><span class='glyphicon glyphicon-list-alt'></span></a></td>";
              echo"</tr>";
            } 
          }else{
            echo "<tr>";
            echo "<td> No entries found. </td>";
            echo"</tr>";
          }
          

          // ADD FORM
            echo "<form action=\"".site_url("site/items/1/")."\" method=\"post\"><tr>";
            echo "<td><b>Add Item</b></td>";
            echo "<td><input type='text' class='form-control' name='item_name' value='Item Name'></td>";
            echo "<td><input type='text' class='form-control' name='item_price' value='Price'></td>";
            echo "<td><input type=\"submit\" class=\"btn btn-default\"></td>";
            echo"</tr></form>";      
        ?>

      </table>
    </div>
  </div>
</div>