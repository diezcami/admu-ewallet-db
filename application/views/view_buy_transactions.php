</br>
</br>
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading"><h4>View Buy Transactions for Terminal # 
      <?php
        echo $shop_terminal_id;
      ?>
      </h4></div>
      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>Buy Transaction ID</th>           
            <th>Timestamp</th>
            <th>ID Number</th>
            <!-- TODO: ITEM_ORDER -->
            <th style="text-align:center;"> </th>
          </tr>
        </thead>

  
        <?php
        if( $buy_transactions != null ){
          foreach( $buy_transactions as $buy_transaction ){
            echo "<tr>";
            echo "<td>".$buy_transaction->buy_transaction_id."</td>";
            echo "<td>".$buy_transaction->buy_transaction_ts."</td>";
            echo "<td>".$buy_transaction->id_number."</td>";
            echo"</tr>";
          }
        }else{
            echo "<tr>";
            echo "<td> No entries found. </td>";
            echo"</tr>";
          }
          
        ?>
      </table>
    </div>
  </div>
</div>