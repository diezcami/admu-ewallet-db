</br>
</br>

<div class="container">
  <?php
    $this->load->helper('url');
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
          </tr>
        </thead>
        
        <?php
          foreach( $shop_terminals as $shop_terminal ){
            echo "<form action=\"".site_url("site/shop_terminals/2/".$shop_terminal->shop_terminal_id)."\" method=\"post\"><tr>";
            echo "<td>".$shop_terminal->shop_terminal_id."</td>";
            echo "<td><input type='text' class='form-control' name='balance' value='".$shop_terminal->balance."'></td>";
            echo "<td><input type='text' class='form-control' name='pin' value='".$shop_terminal->pin."'></td>";
            echo "<td><input type=\"submit\" class=\"btn btn-default\"></td>";
            echo"</tr></form>";
          }
        ?>
      </table>
    </div>
  </div>
</div>