<!DOCTYPE html>
<html>
<body>
<h3>New Request</h3>
<form method = "post" action = "database.php">
                  <table width = "400" border =" 0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">From</td>
                        <td><input name = "from" type = "text" 
                           id = "from"></td>
                     </tr>

                     <tr>
                        <td width = "100">To</td>
                        <td><input name = "to" type = "text" 
                           id = "to"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Ship No.</td>
                        <td><input name = "shipno" type = "number" 
                           id = "shipno"></td>
                     </tr>

                     <tr>
                        <td width = "100">Arrival Date</td>
                        <td><input name = "arrdate" type = "Date" 
                           id = "arrdate"></td>
                     </tr>

                     <tr>
                        <td width = "100">Departure Date</td>
                        <td><input name = "depdate" type = "Date" 
                           id = "depdate"></td>
                     </tr>

                     <tr>
                        <td width = "100"><label for="trade">Trade Type</label></td>
                        <td><select id="trade" name="trade">
                           <option value="import">Import</option>
                           <option value="export">Export</option>
                           <option value="both">Both</option>
                        </select></td>
                     </tr>

                     <tr>
                        <td width = "100">Export Code</td>
                        <td><input name = "expcode" type = "text" 
                           id = "expcode"></td>
                     </tr>

                     <tr>
                        <td width = "100">Import Code</td>
                        <td><input name = "impcode" type = "text" 
                           id = "impcode"></td>
                     </tr>

                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "submit" type = "submit" 
                              id = "submit" value = "Submit">
                        </td>
                     </tr>
                  
                  </table>
               </form>

</body>
</html>