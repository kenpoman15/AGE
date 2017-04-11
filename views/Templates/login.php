<?php echo validation_errors(); ?>
<div id="mainContent" style="margin-left: 20%;">
      <div id="logBox">
      <?php echo form_open('Users/Login'); ?>
      <table>
      <td align="center">
            <table>
            <tr>
                  <td>
                        <label for="username">Username:</label>
                  </td><td>
                        <input type="input" name="username" />
                  </td>
            </tr>
            <tr>
                  <td>
                        <label for="password" style="padding-right: 4px;">Password:</label>
                   </td><td>
                        <input type="password" name="password">
                   </td>
                  </tr>

            </table>
            <input type="submit" name="submit" onclick="validate();"value="Log In" />
            </form>
      </td>
      </table>
      </div>
</div>
