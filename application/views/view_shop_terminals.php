</br>
</br>
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading"><h4>Shop Terminals</h4></div>
      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>Shop Terminal ID</th>           
            <th>Balance</th>
            <th>PIN</th>
            <th style="text-align:center;">Details</th>
          </tr>
        </thead>
        
        <?php
          foreach( $shop_terminals as $shop_terminal ){
            echo "<tr>";
            echo "<td>".$shop_terminal->shop_terminal_id."</td>";
            echo "<td>".$shop_terminal->balance."</td>";
            echo "<td>".$shop_terminal->pin."</td>";
            echo "<td class='details'><a class='btn btn-default btn-sm' type='button' href='edit_shop_terminal/$shop_terminal->shop_terminal_id'><span class='glyphicon glyphicon-list-alt'></span></a></td>";
            echo"</tr>";
          }
        ?>
      </table>
    </div>
  </div>
</div>