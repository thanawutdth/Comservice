<div id="login">
      <h1>LOG IN</h1>
      <form  method="post" action="<?=site_url()?>checklogin.php" name="form1" onSubmit="JavaScript:return fncSubmit();" >
        
          <input  type="Text" placeholder="username" id="txtUsername" name="txtUsername"/>
          <input type="password" placeholder="Password"  id="txtPassword" name="txtPassword"/>
          <input type="submit" value="Submit"  />        
        <p>&nbsp;
        <div id="border">
         <a href=""> <input onClick="myFunction()" type="button" name="button1" id="button1" value="แจ้งซ่อมออนไลน์"  ></a>
         <script>
				function myFunction() {
					alert("สำหรับสมาชิกเท่านั้น กรุณา login ");
				}
			</script>
     <a href="<?=site_url()?>Listrepairing/list_repair.php"><input type="button" name="button6" id="button6" value="รายการแจ้งซ่อม"></a>
     <a href="<?=site_url()?>Webboard/Webboard.php"><input type="button" name="button7" id="button7" value="กระทู้-ถามตอบ">
                </a>
         
          <a href="<?=site_url()?>contact.php"> <input type="button" name="button2" id="button2" value="ติดต่อเรา"></a>
        </div>
        </p>
      </form>
    </div>