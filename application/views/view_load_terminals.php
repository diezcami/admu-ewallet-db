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
            <th style="text-align:center;">Details</th>
          </tr>
        </thead>
        
        <?php
          foreach( $load_terminals as $load_terminal ){
            echo "<tr>";
            echo "<td>".$load_terminal->load_terminal_id."</td>";
            echo "<td>".$load_terminal->pin."</td>";
            echo "<td class='details'><a class='btn btn-default btn-sm' type='button' href='edit_load_terminal/$load_terminal->load_terminal_id'><span class='glyphicon glyphicon-list-alt'></span></a></td>";
            echo"</tr>";
          }
        ?>
      </table>
    </div>
  </div>
</div>