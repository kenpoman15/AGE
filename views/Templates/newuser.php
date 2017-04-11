    <div id="mainContent" style="margin-left: 20%;">
        <form id="newrecord" action="<?php echo site_url('users/sendUser')?>" method="post">
            <fieldset id="usercontainer">
            <table>
            <tbody>
                <tr>
                  <td><label>First Name:</label></td>
                  <td><input class="textfield" type="text" name="fn" required></td>
               </tr>
               <tr>
                  <td><label>Last Name:</label></td>
                  <td><input class="textfield" type="text" name="ln" required></td>
               </tr>
               <tr>
                  <td><label>Username:</label></td>
                  <td><input class="textfield" type="text" name="un" required></td>
               </tr>   
               <tr>
                  <td><label>Password:</label></td>
                  <td><input class="textfield" type="text" name="pw" required></td>
               </tr>
               <tr>
                  <td><label>Email:</label></td>
                  <td><input class="textfield" type="text" name="em" required></td>
               </tr>
               <tr>
                  <td><label>Privilege:</label></td>
                  <td><select style="float: right; width: 15%;" name="priv">
                        <option value=1>Level 1</option>
                        <option value=2>Level 2</option>
                        <option value=3 selected='selected'>Level 3</option>
                  </select></td>
               </tr>
               <tr>
                    <td></td>
                    <td><input style="float: right;" type="submit"  value="Submit"></td>
               </tr>
            </tbody>
            </table>
            </fieldset>
        </form>
    </div>