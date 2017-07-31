<? include('meta_admin.php');
require_once("../model/m_user.php");
$m_user = new M_user;

$user_dat=$m_user->get_user_admin($_SESSION['username']);
if (isset($user_dat['username'])) {
  $_SESSION['username']=$user_dat['username'];
}else{
  ?>
        <script type="text/javascript">
            window.open("<?echo site_url('../logout.php');?>","_self");            
        </script>
    <?
}
$admin_db = $m_user->get_all_admin();

?>


    <tr>
      <td align="center" valign="top"><a href="<?=site_url()?>Admin/adminlogin.php"><img src="/project2/Image/icon left bar/Back.png" width="32" height="32" alt=""/></a></td>
    </tr>
    <tr>
      
        
      <td width="657" rowspan="9" align="center" valign="top">
   
        
        
<?

?>
          </p>
          <p>&nbsp; </p>
        <div id="tarang"  align="center">  
  <form  name="frm" method="post" action="<?=$_SERVER["PHP_SELF"];?>">
<input type="hidden" name="hdnCmd" value="">
      
        <table width="100%" border="1" cellspacing="3">
      <tbody>
        <tr align="center" bgcolor="#25B1E1" style="color: #FFFFFF; font-size: 14px;">
          <td width="29" height="25"><strong>ลำดับที่</strong></td>
          <td><strong>username</strong></td>
          
          <td><strong>password</strong></td>
          <td><strong>name</strong></td>
          <td><strong>lastname</strong></td>
          <td><strong>phone</strong></td>
          <td><strong>email</strong></td>
          <td><strong>position</strong></td>
          <td><strong>Edit Delete</strong></td>
       
         
        </tr>
        </tbody>
<?
foreach ($admin_db->result as $key => $objResult)
{
?>
  <tr bgcolor="#FFFFFF">
          <td width="63"><? echo $objResult["admin_id"];?></td>  
          
          <td width="63"><? echo $objResult["username"];?></td>  
          <td width="94"><? echo $objResult["password"];?></td>
          <td width="105"><? echo $objResult["name"];?></td>
          <td width="120"><? echo $objResult["lastname"];?></td>
          <td width="130"><? echo $objResult["phone"];?></td>
          <td width="89"><? echo $objResult["email"];?></td>
      	 <td width="89"><select name="position" >
            <option>1</option>
            <option>2</option>
            
          </select></td>
          
          
          
          
    <td align="center"><a href="">Edit</a></td>
 <td align="center"><a href="">Delete</a></td>
  </tr>
  <?
 }
  ?>
  <tr>
    <td><div align="center"><input type="text" name="admin_id" size="5"></div></td>
    <td><input type="text" name="username" ></td>
    <td><input type="text" name="password" size="20"></td>
    <td align="right"><input type="text" name="name" ></td>
    <td align="right"><input type="text" name="lastname" ></td>
    
    <td align="right"><input type="text" name="phone" ></td>
     <td align="right"><input type="text" name="email" ></td>
       <td align="center"><select name="position" >
         <option>1</option>
         <option>2</option>
       
       </select></td>
     
     
     
    <td colspan="2" align="right"><div align="center">
      <input name="btnAdd" type="button" id="btnAdd" value="Add" OnClick="frm.hdnCmd.value='Add';frm.submit();">
    </div></td>
  </tr>
</table>
</form>   
     
   
</div></td></tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
