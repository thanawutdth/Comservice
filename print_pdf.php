<?php 
require_once('./fpdf17/fpdf.php');
class Fpdf_print extends FPDF
{
// Page header
/*public function Header()
{
    // Logo
    $thaiMon = array( "01" => "มกราคม", "02" => "กุมภาพันธ์", "03" => "มีนาคม", "04" => "เมษายน",
                  "05" => "พฤษภาคม","06" => "มิถุนายน", "07" => "กรกฎาคม", "08" => "สิงหาคม",
                  "09" => "กันยายน", "10" => "ตุลาคม", "11" => "พฤศจิกายน", "12" => "ธันวาคม");
	
	// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
	$this->AddFont('angsana','','angsa.php');
	 
	// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
	$this->AddFont('angsana','B','angsab.php');
	 
	// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
	$this->AddFont('angsana','I','angsai.php');
	 
	// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
	$this->AddFont('angsana','BI','angsaz.php');
    //$this->Image('images/logo.jpg',10,6,30);
    // Arial bold 15
    $this->SetFont('angsana','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,iconv( 'UTF-8','cp874' , "นัดหมายประจำ"." วันที่ "),0,0,'C');
    // Line break
    $this->Ln(20);
}*/

// Page footer
public function Footer()
{
    // Position at 1.5 cm from bottom
    // เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
	$this->AddFont('angsana','','angsa.php');
	 
	// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
	$this->AddFont('angsana','B','angsab.php');
	 
	// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
	$this->AddFont('angsana','I','angsai.php');
	 
	// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
	$this->AddFont('angsana','BI','angsaz.php');
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('angsana','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
public function set_bold_font(){
		$this->SetFont('angsana','B',18);
	}
	public function set_normal_font(){
		$this->SetFont('angsana','',18);
	}
	public function date_543($date_string){
		$string_array=explode("/", $date_string);
		$true_date=$string_array[0]." / ".$string_array[1]." / ".((int)$string_array[2]+543);
		return $true_date;
	}

}
require_once("./model/m_fix.php");
$m_fix = new M_fix;
$fix_db = $m_fix->get_fix_by_id($_GET['id']);
$fpdf=new Fpdf_print;
		

		// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
		$fpdf->AddFont('angsana','','angsa.php');
		 
		// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
		$fpdf->AddFont('angsana','B','angsab.php');
		 
		// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
		$fpdf->AddFont('angsana','I','angsai.php');
		 
		// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
		$fpdf->AddFont('angsana','BI','angsaz.php');
		$fpdf->AliasNbPages();
		$fpdf->AddPage();
		$fpdf->SetFont('angsana','B',20);


		// header
		$fpdf->Cell(0,15,iconv( 'UTF-8','cp874' , 'รายการบันทึกแจ้งซ่อม'),0,1,'C');

		$fpdf->Cell(0,10,iconv( 'UTF-8','cp874' , ''),0,1,'C');// space
		$fpdf->set_bold_font();
		$fpdf->Cell(0,10,iconv( 'UTF-8','cp874' , 'ชื่อ  '.$fix_db['name'].'  นามสกุล  '.$fix_db['lastname'].''),0,1);
		$fpdf->Cell(0,10,iconv( 'UTF-8','cp874' , 'หน่วยงาน/องค์กร  '.$fix_db['sector'].''),0,1);
		$fpdf->Cell(0,10,iconv( 'UTF-8','cp874' , 'เบอร์โทรศัพท์  '.$fix_db['phone'].''),0,1);
		$fpdf->Cell(0,10,iconv( 'UTF-8','cp874' , 'อุปกรณ์ที่แจ้ง  '.$fix_db['type'].''),0,1);
		$fpdf->Cell(0,10,iconv( 'UTF-8','cp874' , 'ปัญหา  '.$fix_db['detail'].''),0,1);
		$fpdf->Cell(0,10,iconv( 'UTF-8','cp874' , ''),0,1,'C');// space
		$fpdf->Cell(0,15,iconv( 'UTF-8','cp874' , 'ผู้ดำเนินการ'),0,1,'C');
		$fpdf->Cell(0,10,iconv( 'UTF-8','cp874' , ''),0,1,'C');// space
		$fpdf->Cell(0,10,iconv( 'UTF-8','cp874' , 'ชื่อผู้ดำเนินการซ่อม  '.$fix_db['technician'].''),0,1);
		$fpdf->Cell(0,10,iconv( 'UTF-8','cp874' , 'ปัญหาที่พบ  '.$fix_db['fixuser'].''),0,1);

		$fpdf->set_bold_font();
		$fpdf->Cell(10,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->Cell(35,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->set_normal_font();		
		$fpdf->Cell(30,7,iconv( 'UTF-8','cp874' , ''),0,1);

		$fpdf->set_bold_font();
		$fpdf->Cell(10,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->Cell(35,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->set_normal_font();		
		$fpdf->Cell(90,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->set_bold_font();
		$fpdf->Cell(15,7,iconv( 'UTF-8','cp874' , 'ลงชื่อผู้ดำเนินการ'),0,1);

		$fpdf->set_bold_font();
		$fpdf->Cell(10,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->Cell(35,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->set_normal_font();		
		$fpdf->Cell(30,7,iconv( 'UTF-8','cp874' , ''),0,1);

		$fpdf->set_bold_font();
		$fpdf->Cell(10,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->Cell(35,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->set_normal_font();		
		$fpdf->Cell(82,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->set_bold_font();
		$fpdf->Cell(15,7,iconv( 'UTF-8','cp874' , '(.................................................)'),0,1);

		$fpdf->Cell(10,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->Cell(35,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->set_normal_font();		
		$fpdf->Cell(82,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->set_bold_font();
		$fpdf->Cell(15,7,iconv( 'UTF-8','cp874' , 'ตำแหน่ง....................................'),0,1);

		$fpdf->set_bold_font();
		$fpdf->Cell(10,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->Cell(35,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->set_normal_font();		
		$fpdf->Cell(30,7,iconv( 'UTF-8','cp874' , ''),0,1);

		$fpdf->set_bold_font();
		$fpdf->Cell(10,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->Cell(35,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->set_normal_font();		
		$fpdf->Cell(90,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->set_bold_font();
		$fpdf->Cell(15,7,iconv( 'UTF-8','cp874' , 'ลงชื่อผู้แจ้งซ่อม'),0,1);

		$fpdf->set_bold_font();
		$fpdf->Cell(10,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->Cell(35,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->set_normal_font();		
		$fpdf->Cell(30,7,iconv( 'UTF-8','cp874' , ''),0,1);

		$fpdf->set_bold_font();
		$fpdf->Cell(10,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->Cell(35,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->set_normal_font();		
		$fpdf->Cell(82,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->set_bold_font();
		$fpdf->Cell(15,7,iconv( 'UTF-8','cp874' , '(.................................................)'),0,1);

		$fpdf->Cell(10,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->Cell(35,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->set_normal_font();		
		$fpdf->Cell(82,7,iconv( 'UTF-8','cp874' , ''),0,0);
		$fpdf->set_bold_font();
		$fpdf->Cell(15,7,iconv( 'UTF-8','cp874' , 'ตำแหน่ง....................................'),0,1);
		

		$fpdf->Output();