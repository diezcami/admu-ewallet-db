</br>
</br>
<div class="container">
  <?php 
    //var_dump($users);
  ?>
  <div class="row">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading"><h4>Edit User</h4></div>
      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>ID Number</th>           
            <th>Name</th>
            <th>PIN</th>
            <th>Balance</th>
            <th style="text-align:center;"> </th>
          </tr>

        </thead>
        <!--<tr>
          <td>
            <input type="text" class="form-control" value="Jane Doe">
          </td>
          <td>
            <input type="text" class="form-control" value="Jane Doe">
          </td>
          <td>
            <input type="text" class="form-control" value="Jane Doe">
          </td>
          <td>
            <input type="text" class="form-control" value="Jane Doe">
          </td>
        </tr>-->
  
        <?php

          foreach( $users as $user ){
            echo "<form action=\"../users/true\" method=\"post\"><tr>";
            echo "<td>".$user->id_number."</td>";
            echo "<td><input type='text' class='form-control' name='name' value='".$user->first_name." ".$user->last_name."'></td>";
            echo "<td><input type='text' class='form-control' name='pin' value='".$user->pin."'></td>";
            echo "<td><input type='text' class='form-control' name='balance' alue='".$user->balance."'></td>";
            echo "<td><button type=\"submit\" class=\"btn btn-default\">Submit</button></td>";
            echo"</tr></form>";
          }
        ?>
      </table>
    </div>
  </div>
</div>