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
$member_db = $m_user->get_all_user();

?>
    <tr>
      <td>      
      <td width="657" rowspan="11" align="left" valign="top"><div class="tarang" id="">
        <a href="<?=site_url()?>Admin/adminlogin.php"><p><img src="<?=site_url()?>Image/icon left bar/Back.png" width="32" height="32" alt=""/></p></a>
        <p>
          
		  
<?php

?>
        </p>
        <div id="tarang">
          <form name="frmMain" method="post" action="<?php $_SERVER["PHP_SELF"];?>">
            <input type="hidden" name="hdnCmd" value="">
            <table width="891" border="1">
              <tr>
                <th width="75">member_id</th>
                <th width="75"> <div align="center">username </div></th>
                <th width="100"> <div align="center">password</div></th>
                <th width="100"> <div align="center">name</div></th>
                <th width="58"> <div align="center">lastname</div></th>
                <th width="39"> <div align="center">phone</div></th>
                <th width="89">email</th>
                <th width="86">address</th>
                <th width="84"> <div align="center">position</div></th>
                <th width="42"> <div align="center">Edit </div></th>
                <th width="73"> <div align="center">Delete </div></th>
              </tr>
              <?
foreach ($member_db->result as $key => $objResult)
{
?>
              
             
              <tr>
                <td><div align="center"><?php echo $objResult["member_id"];?></td>
                <td><div align="center"><?php echo $objResult["username"];?></div></td>
                <td><?php echo $objResult["password"];?></td>
                <td><?php echo $objResult["name"];?></td>
                <td><div align="center"><?php echo $objResult["lastname"];?></div></td>
                <td align="right"><?php echo $objResult["phone"];?></td>
                <td align="right"><?php echo $objResult["email"];?></td>
                <td align="right"><?php echo $objResult["address"];?></td>
                <td align="right"><?php echo $objResult["sector"];?></td>
                
                <<td align="center"><a href="">Edit</a></td>
                <td align="center"><a href="">Delete</a></td>
              </tr>
              <?php
}
?>
              <tr>
                <td><div align="center"><input type="text" name="member_id" size="5"></div></td>
                <td><input type="text" name="username" size="5"></td>
                <td><input type="text" name="password" size="20"></td>
                <td><input type="text" name="name" size="20"></td>
                <td><div align="center"><input type="text" name="lastname" size="2"></div></td>
                <td align="right"><input type="text" name="phone" size="5"></td>
                <td align="right"><input type="text" name="email" size="5"></td>
                <td align="right"><input type="text" name="address" size="5"></td>
                <td align="right"><input type="text" name="sector" size="5"></td>
                <td colspan="2" align="right"><div align="center">
                  <input name="btnAdd" type="button" id="btnAdd" value="Add" OnClick="frmMain.hdnCmd.value='Add';frmMain.submit();">
                </div></td>
              </tr>
            </table>
          </form>
 
      </div></td>
    </tr>
  </tbody>
</table>

</body>
</html>
