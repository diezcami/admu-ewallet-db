</br>
</br>
<div class="container">
  <?php 
    //var_dump($users);
  $this->load->helper('url');
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
            <th>First Name</th>
            <th>Last Name</th>
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
            echo "<form action=\"".site_url("site/users/2/".$user->id_number)."\" method=\"post\"><tr>";
            echo "<td><input type='text' class='form-control' name='id' value='".$user->id_number."'></td>";
            echo "<td><input type='text' class='form-control' name='firstname' value='".$user->first_name."'></td>";
            echo "<td><input type='text' class='form-control' name='lastname' value='".$user->last_name."'></td>";
            echo "<td><input type='text' class='form-control' name='pin' value='".$user->pin."'></td>";
            echo "<td><input type='text' class='form-control' name='balance' value='".$user->balance."'></td>";
            echo "<td><input type=\"submit\" class=\"btn btn-default\"></td>";
            echo"</tr></form>";
          }
        ?>
      </table>
    </div>
  </div>
</div>