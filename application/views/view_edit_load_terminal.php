</br>
</br>
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading"><h4>Load Terminals</h4></div>
      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>Load Terminal ID</th>           
            <th>PIN</th>
            <th> </th>
          </tr>
        </thead>
        
        <?php
          foreach( $load_terminals as $load_terminal ){
            echo "<form action=\"".site_url("site/load_terminals/2/".$load_terminal->load_terminal_id)."\" method=\"post\"><tr>";
            echo "<td>".$load_terminal->load_terminal_id."</td>";
            echo "<td><input type='text' class='form-control' name='pin' value='".$load_terminal->pin."'></td>";
            echo "<td><input type=\"submit\" class=\"btn btn-default\"></td>";
            echo"</tr></form>";
          }
        ?>
      </table>
    </div>
  </div>
</div>