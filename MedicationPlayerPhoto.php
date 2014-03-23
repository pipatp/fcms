<?php
	session_start();
	$sImgPth = $_SESSION['ArrResult'][0]['PlyPicPth'];	
?>
<table width="100%" border="0" cellspacing="2" cellpadding="2" align="center">
  <tr>
    <td align="center"><img src="<?php echo $sImgPth; ?>" width="100" height="120" /></td>
  </tr>
</table>
