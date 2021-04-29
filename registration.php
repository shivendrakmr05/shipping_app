<!DOCTYPE html>
<html>
<body>
<h3>New User</h3>
<form method = "post" action = "database.php">
                  <table width = "400" border =" 0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">User_ID</td>
                        <td><input name = "user_id" type = "number" 
                           id = "user_id"></td>
                     </tr>

                     <tr>
                        <td width = "100">Name</td>
                        <td><input name = "name" type = "text" 
                           id = "name"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Email</td>
                        <td><input name = "email" type = "text" 
                           id = "email"></td>
                     </tr>

                     <tr>
                        <td width = "100">Password</td>
                        <td><input name = "password" type = "password" 
                           id = "password"></td>
                     </tr>

                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "update" type = "submit" 
                              id = "update" value = "Update">
                        </td>
                     </tr>
                  
                  </table>
               </form>

</body>
</html>