<? include('meta_admin.php');?>

    <tr>
      <td width="248">
  
<? include("sidebar_admin.php");?>
        </td>
        
      <td width="657" rowspan="9" align="center" valign="top">
      <form id="Admin" name="addAdmin" method="post" action="/project2/addAdmin.php">
        <fieldset>
          <legend> <h3><span style="color:#2288BB">แอดมิน,ช่าง</span></h3></legend>
          <table width="476" height="270" border="0" align="center" id="regis"  >
            <tbody>
              <tr>
                <th height="49" scope="col" align="left">position</th>
                <th scope="col" align="left"><select name="selectposition" id="select">
                  <option>1</option>
                  <option>2</option>
                  </select></th>
                </tr>
              <tr>
                <th width="216" height="49" scope="col" align="left"><label>Username</label>
                  &nbsp;</th>
                <th width="250" scope="col" align="left"><label for="textfield"></label>
                  <input type="text" name="username" id="username"  ></th>
                </tr>
              <tr>
                <td height="19"><label><strong>Password</strong></label>
                  <strong>&nbsp;</strong></td>
                <td ><input type="password" name="password" id="password" ></td>
                </tr>
              <tr>
                <td height="34"><strong>ชื่อ </strong></td>
                <td><input type="text" name="firstname" id="firstname" ></td>
                </tr>
              <tr>
                <td height="34">นามสกุล</td>
                <td><input type="text" name="lastname" id="lastname" ></td>
                </tr>
              <tr>
                <td><label><strong>เบอร์โทรศัพท์</strong></label>
                  <strong>&nbsp;</strong></td>
                <td><input type="tel" name="tel" id="tel"></td>
                </tr>
              <tr>
                <td><label><strong>E-mail</strong></label>
                  <strong>&nbsp;</strong></td>
                <td><input type="email" name="email" id="email"></td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td><p>
                  <input type="submit" name="button" id="button" value="Submit">
                </p>
                  &nbsp;
                  <p>
                    <input type="reset" name="reset" id="reset" value="Reset">
                  </p></td>
                </tr>
              </tbody>
          </table>
        </fieldset>
      </form></td>
    </tr>
    
   
   
      
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    
    
    <tr>
      <td height="19" colspan="2">&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
