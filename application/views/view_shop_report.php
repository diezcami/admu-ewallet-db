</br>
</br>
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading"><h4>Generate Monthly/Daily Report1</h4></div>
      <table class="table">
        <thead>
          <tr>
            <th>Item</th>           
            <th>Price</th>
            <th>Quantity</th>
            <th>Cost</th>
            <!-- TODO: ITEM_ORDER -->
          </tr>
        </thead>
        <?php
          //var_dump($entries);
        $total = 0;
        foreach( $entries as $entry ){
            $cost = $entry['item_price']*$entry['quantity'];
            $total += $cost;
            echo "<tr>";
            echo "<td>".$entry['item_name']."</td>";
            echo "<td>".$entry['item_price']."</td>";
            echo "<td>".$entry['quantity']."</td>";
            echo "<td>".$cost."</td>";
            echo"</tr>";
          }
        ?>
        <tr>
          <td><b>Total Revenue:</b></td>
          <td></td>
          <td></td>
          <td><b><?php echo $total ?></b></td>
        </tr>
      </table>

      </table>
    </div>
  </div>
</div>