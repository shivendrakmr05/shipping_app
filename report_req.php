<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<title></title>
	<style>
		.centered {
  position: fixed;
  top: 50%;
  left: 50%;
  margin-top: -50px;
  margin-left: -100px;
}
.hero-image {
  background-image: url("/images/shipping.jpeg");
  background-color: #cccccc;
  height: 300px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}
	</style>
</head>

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
