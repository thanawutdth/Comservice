<?
include('meta.php');
require_once("model/m_user.php");
$m_user = new M_user;
$user_dat=$m_user->login_user($_POST['txtUsername'],$_POST['txtPassword']);
print_r($_POST);
if (isset($user_dat['username'])) {
	$_SESSION['username']=$user_dat['username'];
	$_SESSION['position']=$user_dat['position'];
	if($user_dat["position"] == 1)// 1 = Admin
	   	    {
			    echo "<meta http-equiv='refresh' content='0;url=Admin/adminlogin.php'>";
			}
		   if($user_dat["position"] == 2)// 2 = Technic
		   	{
				echo "<meta http-equiv='refresh' content='0;url=Technic/techniclogin'>";
				//header("location:staff/index.php");
			}
			if($user_dat["position"] == 3)// 2 = member
		   	{
				echo "<meta http-equiv='refresh' content='0;url=Member/firstpage_member.php'>";
				//header("location:staff/index.php");
			}
}else{
	?>
        <script type="text/javascript">
        		alert('username and password incorrect');
        		//window.open("<?echo site_url('logout.php');?>","_self");	        	
        </script>
		<?
}
?>
