<html>
<head>
<title></title>
</head>
<body>
<?
include("connect.php");
$strSQL = "SELECT * FROM admin_db";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<script>
function createButton()
{
window.location = 'create_album.php';
}


</script>
<input type="button" name="btnConfirm" value="Create Album" OnClick="createButton()">

<table width="499" border="1">
<tr>
<th width="32"> <div align="center">No.</div></th>
<th width="117"> <div align="center">Album Shot </div></th>
<th width="104"> <div align="center">Album Name</div></th>
<th width="60"> <div align="center">View</div></th>
<th width="60"> <div align="center">Edit</div></th>
<th width="84"> <div align="center">Gallery</div></th>
<th width="62"> <div align="center">Delete</div></th>
</tr>
<?
$i=1;
while($objResult = mysql_fetch_array($objQuery))
{
?>

<tr>
<td><div align="center"><?=$i;?></div></td>
<td><center><a href="AlbumShot/<?=$objResult["AlbumShot"];?>" target="_blank"><img src="AlbumShot/<?=$objResult["AlbumShot"];?>" width="100"
height="100"></a></center></td>
<td aglign="left"><?=$objResult["AlbumName"];?></td>

<td><center><input type="button" name="btnConfirm" value="View" 
OnClick="JavaScript:window.location = 'show_gallery.php?AlbumID=<?=$objResult["AlbumID"];?>';"></center></td><!-- View Button View all gallery in Album -->

<td><center><input type="button" name="btnConfirm" value="Edit" 
OnClick="JavaScript:window.location = 'edit_album.php?AlbumID=<?=$objResult["AlbumID"];?>';"></center></td><!-- Edit Button Edit Album-->

<td><center><input type="button" name="btnConfirm" value="Upload" 
OnClick="JavaScript:window.location = 'upload_gallery.php?AlbumID=<?=$objResult["AlbumID"];?>';"></center></td><!-- Upload Button Upload Gallery in Album -->

<td><center><input type="button" name="btnConfirm" value="Delete" 
OnClick="JavaScript:if(confirm('Do you want to Delete?')==true)
{
window.location = 'delete_album.php?AlbumID=<?=$objResult["AlbumID"];?>';
}"></center></td></tr> <!-- Delete Button Delete Album-->
<?
$i++;
}
?>
</table>
<?
mysql_close($objConnect);
?>

</body>
</html>