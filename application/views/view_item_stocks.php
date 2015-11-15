</br>
</br>
<div class="container">
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

          foreach( $stocks as $stock ){
            echo "<tr>";
            echo "<td>".$stock->shop_terminal_id."</td>";
            echo "<td>".$stock->quantity."</td>";
            echo "<td class='details'><a class='btn btn-default btn-sm' type='button' href=''><span class='glyphicon glyphicon-list-alt'></span></a></td>";
            // href: edit_stock/$item->item_id/
            echo"</tr>";
          }
        ?>
      </table>
    </div>
  </div>
</div>