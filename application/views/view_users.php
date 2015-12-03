</br>
</br>
<div class="container">
  <?php
  $this->load->helper('url');
    if($update){
      echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">";
      echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times</span></button>";
      echo "<strong>Success!</strong> Entry was updated.";

      echo "</div>";
    }//var_dump($users);
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
            <th style="text-align:center;">Edit</th>
          </tr>
        </thead>
        

        <?php
        if( $users != '300' ){
          var_dump($users);
          foreach( $users as $user ){
            echo "<tr>";
            echo "<td>".$user->id_number."</td>";
            echo "<td>".$user->first_name." ".$user->last_name."</td>";
            echo "<td>".$user->pin."</td>";
            echo "<td>".$user->balance."</td>";
            echo "<td class='details'><a class='btn btn-default btn-sm' type='button' href='".site_url("site/edit_user/$user->id_number")."'><span class='glyphicon glyphicon-list-alt'></span></a></td>";
            echo"</tr>";
          }
        }else{
            echo "<tr>";
            echo "<td> No entries found. </td>";
            echo"</tr>";
          }
          

          // ADD FORM
            echo "<form action=\"".site_url("site/users/1/")."\" method=\"post\"><tr>";
            echo "<td><b>Add User</b></td>";
            echo "<td><input type='text' class='form-control' name='id_number' value='ID Number'></td>";
            echo "<td><input type='text' class='form-control' name='first_name' value='First Name'></td>";
            echo "<td><input type='text' class='form-control' name='last_name' value='Last Name'></td>";
            echo "<td><input type='text' class='form-control' name='pin' value='Pin'></td>";
            echo "<td><input type=\"submit\" class=\"btn btn-default\"></td>";
            echo"</tr></form>";
        ?>
      </table>
    </div>
  </div>
</div>