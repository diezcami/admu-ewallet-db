</br>
</br>
<div class="container">
  <?php 
    //var_dump($users);
  ?>
  <div class="row">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading"><h4>Users</h4></div>
      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>ID Number</th>           
            <th>Name</th>
            <th>PIN</th>
            <th>Balance</th>
            <th style="text-align:center;">Details</th>
          </tr>
        </thead>
        <?php
          foreach( $users as $user ){
            echo "<tr>";
            echo "<td>".$user->id_number."</td>";
            echo "<td>".$user->first_name." ".$user->last_name."</td>";
            echo "<td>".$user->pin."</td>";
            echo "<td>".$user->balance."</td>";
            echo "<td class='details'><a class='btn btn-default btn-sm' type='button' href='edit_user/$user->id_number'><span class='glyphicon glyphicon-list-alt'></span></a></td>";
            echo"</tr>";
          }
        ?>
        <!--<tr>
          <td>Heights</td>
          <td>Mark Aldecimo</td>
          <td>17 JUN 2014 / 23 JUL 2014</td>
          <td><a href="http://heights.compsat.org">heights.compsat.org</a></td>
          <td>3/5</td>
          <td style="text-align:center;"><a type="button" class="btn btn-default btn-sm" href="#"><span class="glyphicon glyphicon-list-alt"></span></a></td>
        </tr>
        <tr>
          <td>CompSAt</td>
          <td>Basil Begonia</td>
          <td>N/A</td>
          <td>N/A</td>
          <td>4/5</td>
          <td style="text-align:center;"><a type="button" class="btn btn-default btn-sm" href="#"><span class="glyphicon glyphicon-list-alt"></span></a></td>
        </tr>
        -->
      </table>
    </div>
  </div>
</div>