<?php
include_once('ipinfo.php');

$data_msg = "";

$ipaddress = $_SERVER["REMOTE_ADDR"];

if(isset($_POST['submit'])){
	$ipaddr = addslashes(trim($_POST['ipaddr']));
	$ipinfo = new ipinfo($ipaddr);
	
	$data_msg = '
	<div>
		<img src="https://maps.googleapis.com/maps/api/staticmap?center='.$ipinfo->fetch()->loc.'&zoom=9&size=640x200&sensor=false" alt="'.$ipinfo->fetch()->city.', '.$ipinfo->fetch()->region.', '.$ipinfo->fetch()->country.' Map" title="'.$ipinfo->fetch()->city.', '.$ipinfo->fetch()->region.', '.$ipinfo->fetch()->country.' Map" />
	</div>

	<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>IP Address : </td>
			<td>'.$ipinfo->fetch()->ip.'</td>
		</tr>
		<tr>
			<td>Hostname : </td>
			<td>'.$ipinfo->fetch()->hostname.'</td>
		</tr>
		<tr>
			<td>City : </td>
			<td>'.$ipinfo->fetch()->city.'</td>
		</tr>
		<tr>
			<td>Region : </td>
			<td>'.$ipinfo->fetch()->region.'</td>
		</tr>
		<tr>
			<td>Country : </td>
			<td>'.$ipinfo->fetch()->country.'</td>
		</tr>
		<tr>
			<td>Location : </td>
			<td>'.$ipinfo->fetch()->loc.'</td>
		</tr>
		<tr>
			<td>Org : </td>
			<td>'.$ipinfo->fetch()->org.'</td>
		</tr>
		<tr>
			<td>Postal : </td>
			<td>'.$ipinfo->fetch()->postal.'</td>
		</tr>
	</table>
	';
}
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>IP Information ( webservice : ipinfo.io )</title>
</head>

<body>
	<form method="post" action="">
		<input type="text" name="ipaddr" value="<?php echo $ipaddress; ?>" />
		<input type="submit" name="submit" value="Test" />
	</form>

	<?php print_r($data_msg); ?>


</body>
</html>
