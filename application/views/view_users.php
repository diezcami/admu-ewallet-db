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
            echo "<td class='details'><a class='btn btn-default btn-sm' type='button' href='".site_url("site/edit_user/$user->id_number")."'><span class='glyphicon glyphicon-list-alt'></span></a></td>";
            echo"</tr>";
          }
        ?>
      </table>
    </div>
  </div>
</div>