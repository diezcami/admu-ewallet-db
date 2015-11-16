</br>
</br>
<div class="container">
  <?php
    $this->load->helper('url');
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

          </tr>
        </thead>
        
        <?php
          foreach( $items as $item ){
            echo "<form action=\"".site_url("site/items/2/".$item->item_id)."\" method=\"post\"><tr>";
            echo "<td>".$item->item_id."</td>";
            echo "<td><input type='text' class='form-control' name='name' value='".$item->item_name."'></td>";
            echo "<td><input type='text' class='form-control' name='price' value='".$item->item_price."'></td>";
            echo "<td><input type=\"submit\" class=\"btn btn-default\"></td>";
            echo"</tr></form>";
          }     
        ?>

      </table>
    </div>
  </div>
</div>