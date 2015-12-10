</br>
</br>
<div class="container">
  <div class="row">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <?php echo "<form action=\"".site_url("site/reports/")."\" method=\"post\">"; ?>
      <select name="shop_terminal">
            <?php
              echo "<option value=\"none\"> none </option>";
              foreach($shop_terminals as $shop_terminal){
                echo "<option value=/".$shop_terminal->shop_terminal_id.">".$shop_terminal->shop_terminal_id."</option>";
              }
            ?>
        </select>
        <select name="shop_terminal">
            <?php
              echo "<option value=\"none\"> none </option>";
              foreach($load_terminals as $load_terminal){
                echo "<option value=/".$shop_terminal->shop_terminal_id.">".$shop_terminal->shop_terminal_id."</option>";
              }
            ?>
        </select>
        <select name="month">
            <?php
              //echo "<option value=\"none\"> none </option>";
              foreach($load_terminals as $load_terminal){
                echo "<option value=/".$shop_terminal->shop_terminal_id.">".$shop_terminal->shop_terminal_id."</option>";
              }
            ?>
        </select>
      </form>
<input type="submit">

      </table>
    </div>
  </div>
</div>