</br>
</br>
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading"><h4>Generate Monthly/Daily Report</h4></div>
      <!-- Default panel contents -->
      <?php echo "<form action=\"".site_url("site/shopreport/")."\" method=\"post\">"; ?>
      <select name="shop_terminal">
            <?php
              echo "<option value=\"none\"> none </option>";
              foreach($shop_terminals as $shop_terminal){
                echo "<option value=".$shop_terminal->shop_terminal_id.">".$shop_terminal->shop_terminal_id."</option>";
              }
            ?>
        </select>
        <select name="month">
            <?php
              $months= array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
              //echo "<option value=\"none\"> none </option>";
              for($i = 1; $i <= 12; $i++ ){
                echo "<option value=".$i.">".$months[$i-1]."</option>";
              }
            ?>
        </select>
        <select name="day">
            <?php
              //$months= array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
              echo "<option value=\"-\"> - </option>";
              
              for($j = 1; $j <= 31; $j++ ){
                echo "<option value=".$j.">".$j."</option>";
              }
            ?>
        </select>
        <input type="submit">
      </form>


      </table>
    </div>
  </div>
</div>