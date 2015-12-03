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
      <div class="panel-heading"><h4>Shop Terminals</h4></div>
      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>Shop Terminal ID</th>           
            <th>Balance</th>
            <th>PIN</th>
            <th style="text-align:center;">Edit</th>
            <th style="text-align:center;">View Transactions</th>
            <th style="text-align:center;">View Stock</th>
          </tr>
        </thead>
        
        <?php
          if( $shop_terminals != '300' ){
            foreach( $shop_terminals as $shop_terminal ){
              echo "<tr>";
              echo "<td>".$shop_terminal->shop_terminal_id."</td>";
              echo "<td>".$shop_terminal->balance."</td>";
              echo "<td>".$shop_terminal->pin."</td>";
              echo "<td class='details'><a class='btn btn-default btn-sm' type='button' href='edit_shop_terminal/$shop_terminal->shop_terminal_id'><span class='glyphicon glyphicon-list-alt'></span></a></td>";
              echo "<td class='details'><a class='btn btn-default btn-sm' type='button' href='buy_transactions/$shop_terminal->shop_terminal_id'><span class='glyphicon glyphicon-list-alt'></span></a></td>";
              echo "<td class='details'><a class='btn btn-default btn-sm' type='button' href='shop_terminal_stocks/$shop_terminal->shop_terminal_id'><span class='glyphicon glyphicon-list-alt'></span></a></td>";            
              echo"</tr>";
            }
          }else{
            echo "<tr>";
            echo "<td> No entries found. </td>";
            echo"</tr>";
          }
          

          // ADD FORM
            echo "<form action=\"".site_url("site/shop_terminals/1/")."\" method=\"post\"><tr>";
            echo "<td><b>Add Shop Terminal</b></td>";
            echo "<td><input type='text' class='form-control' name='pin' value='Pin Number'></td>";
            echo "<td><input type=\"submit\" class=\"btn btn-default\"></td>";
            echo"</tr></form>";
        ?>
      </table>
    </div>
  </div>
</div>