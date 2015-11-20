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
      <div class="panel-heading"><h4>Load Terminals</h4></div>
      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>Load Terminal ID</th>           
            <th>PIN</th>
            <th style="text-align:center;">Edit</th>
            <th style="text-align:center;">View Transactions</th>
          </tr>
        </thead>
        
        <?php
          foreach( $load_terminals as $load_terminal ){
            echo "<tr>";
            echo "<td>".$load_terminal->load_terminal_id."</td>";
            echo "<td>".$load_terminal->pin."</td>";
            echo "<td class='details'><a class='btn btn-default btn-sm' type='button' href='edit_load_terminal/$load_terminal->load_terminal_id'><span class='glyphicon glyphicon-list-alt'></span></a></td>";
            echo "<td class='details'><a class='btn btn-default btn-sm' type='button' href='load_transactions/$load_terminal->load_terminal_id'><span class='glyphicon glyphicon-list-alt'></span></a></td>";
            echo"</tr>";
          }

          // ADD FORM
            echo "<form action=\"".site_url("site/load_terminals/1/")."\" method=\"post\"><tr>";
            echo "<td><b>Add Load Terminal</b></td>";
            echo "<td><input type='text' class='form-control' name='pin' value='Pin Number'></td>";
            echo "<td><input type=\"submit\" class=\"btn btn-default\"></td>";
            echo"</tr></form>";
        ?>
      </table>
    </div>
  </div>
</div>