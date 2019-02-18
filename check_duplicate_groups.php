<!DOCTYPE html>
<html>
<head>
	<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.1/css/mdb.min.css" rel="stylesheet">
<style type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" ></style>
<style type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" ></style>
	<title></title>
</head>
<body>
<?php
require 'vendor/autoload.php';
use Goutte\Client;

require 'db.php';

//get the country id and link from db
$sql = 'SELECT * FROM `competition_seasons` WHERE cs_group !="NO_GROUP" ORDER BY cs_id ASC';
$matches = $conn->query($sql);

?>
<div class="container">
<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">

        <thead>
        	<tr><td>SN </td>
        		<td>Season </td>
        		<td>Comp Id </td>
        		<td>Group Name</td>
        		<td>Group Link </td>
        	</tr>
        </thead>
        <tbody>;

<?php
 $i=1;
while($row = $matches->fetch_assoc()) { 
  echo "<tr> 
  <td>".$i."</td>
  <td>".$row['cs_name']." </td>
  <td>".$row['cs_com_id']." </td>
  <td>".$row['cs_group']."</td>
  <td><a href='".$row['cs_standings_link']."' target='_blank'>".$row['cs_standings_link']." </a> </td>
  </tr>";

  $i++;
            }//end while round
   echo "</tbody>
  </table>";
$conn = null;
echo 'bingo /<br />';
?>
</div>
</body>
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.1/js/mdb.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
 $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>


</html>
