</br>
</br>
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading"><h4>View Load Transactions for Terminal # 
      <?php
        echo $load_terminal_id;
      ?>
      </h4></div>
      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>Load Transaction ID</th>           
            <th>Amount Loaded</th>
            <th>ID Number</th>
          </tr>
        </thead>

  
        <?php

          foreach( $load_transactions as $load_transaction ){
            echo "<tr>";
            echo "<td>".$load_transaction->load_transaction_id."</td>";
            echo "<td>".$load_transaction->amount_loaded."</td>";
            echo "<td>".$load_transaction->id_number."</td>";
            echo"</tr>";
          }
        ?>
      </table>
    </div>
  </div>
</div>