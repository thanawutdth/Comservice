<?
include('../meta.php');
?> 

    <tr align="left" valign="top">
      <td height="253" align="left"><div id="login">
<a href="/project2/Member/firstpage_member.php"><h1>Computer Service</h1> </a>  
 

      <a href="/project2/Member/Edit_member.php"> <input type="button" name="button2" id="button2" value="แก้ไขข้อมูลส่วนตัว" ></a>
      <a href="/project2/Member/ToFix.php"> <input type="button" name="button1" id="button1" value="แจ้งซ่อมออนไลน์" ></a>
      <a href="/project2/Member/listrepair.php"><input type="button" name="button5" id="button5" value="รายการแจ้งซ่อม"></a>
      <a href="/project2/Member/Webboard.php"><input type="button" name="button6" id="button6" value="กระทู้ ถาม-ตอบ"> </a>
      <a href="/project2/Member/stat.php"><input type="button" name="button8" id="button8" value="สถิติการแจ้งซ่อม"></a>
	  <a href="/project2/Member/download.php"><input type="button" name="button9" id="button9" value="ดาวน์โหลด"></a>
      <a href="/project2/Member/Evaluation.php"><input type="button" name="button3" id="button3" value="ประเมิน"></a>
      <a href="/project2/Member/contact.php"><input type="button" name="button4" id="button4" value="ติดต่อเรา"> </a>
      </div></td>
      <td width="655" align="center" valign="top">  
	  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['คอมพิวเตอร์',     11],
          ['หน้าจอ',      2],
          ['เครื่องปริ้น',  2],
          ['เครื่องสแกนเนอร์', 2],
          ['อินเทอร์เน็ต',    7]
        ]);

        var options = {
          title: 'สถิติการแจ้งซ่อมออนไลน์ประจำปี 2560',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script><div id="donutchart" style="width: 100%; height: 500px;"></div></td>
    </tr>
    
    <div class="banner">
        <tr>
          
        </tr>
    </div>
    
    
    <tr>
      <td height="19" colspan="2">&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<script src="../js/jquery-1.11.2.min.js" type="text/javascript"></script>
<!-- <script src="js/bootstrap.js" type="text/javascript"></script> -->
<script src="../js/bootstrap-3.3.4.js" type="text/javascript"></script>

</body>
</html>
