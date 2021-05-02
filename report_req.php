<!DOCTYPE html>
<html>
<body>
<h3>Report</h3>
<form method = "post" action= redirect.php>
                  <table width = "400" border =" 0" cellspacing = "1"
                     cellpadding = "2">


                     <tr>
                        <td width = "100">Start Date</td>
                        <td><input name = "startdate" type = "Date"
                           id = "startdate"></td>
                     </tr>

                     <tr>
                        <td width = "100">End Date</td>
                        <td><input name = "enddate" type = "Date"
                           id = "enddate"></td>
                     </tr>
                Report Type :
               <tr>
                <td><select name ="report_type" width = "100"  >
                  <option value="Select">Select</option>
                  <option value="report_export_import">Export/Import Report</option>
                  <option value="report_tariff">Tariff Report</option>
                </select></td>
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
