<!DOCTYPE html>
<html lang="en">
    <head>

    </head>

    <body>
<?Php
    if(isset($_POST['pdf_btn']))
    {
        $uid=$_POST['uid'];
        $sid=$_POST['sid'];
        $bid=$_POST['bid'];
        $uname=$_POST['uname'];
        $email=$_POST['email'];
        $mname=$_POST['mname'];
        $std=$_POST['tdt'];
        $nos=$_POST['nos'];
        $am=$_POST['am'];
        $sname=$_POST['tname'];
    
        ob_start();
        $cn= new mysqli("localhost","root","","vijaya_theater");
        require("pdf/fpdf.php");
        $pdf =new FPDF('P','mm','A4');
        $pdf-> AddPage();
        $pdf->SetFont('Arial','B',18);
        $pdf->SetFillColor(0,128,128);
        $pdf->SetTextColor(0,0,0);
        $pdf-> Cell(180,30,'Vijaya Theatre',0,1,'C',true);
        $pdf->SetTextColor(24,15,10);

        $txt1="Name : $uname";
        $txt2="Email : $email";
        $txt3="Movie Name : $mname";
        $txt4="Show Time And Date : $std";
        $txt5="Seat Name : $sname";
        $txt6="No Of Seat : $nos";
        $txt7="Amount : $am";
        $txt8="Booking ID : $bid";
        
        $pdf-> Cell(60,15,'',0,1);
        $pdf-> Cell(60,15,$txt1,0,1); 
        $pdf-> Cell(60,15,$txt2,0,1);
        $pdf-> Cell(60,15,'',0,1); 
        $pdf->SetTextColor(32,178,170);
        $pdf-> Cell(60,15,$txt8,0,1);
        $pdf-> Cell(60,15,$txt3,0,1);
        $pdf-> Cell(60,15,$txt4,0,1);
        $pdf-> Cell(60,15,$txt5,0,1);
        $pdf->Cell(60,15,$txt6,0,1);
        $pdf->Cell(60,15,$txt7,0,1);
        
        $pdf->Output();
        ob_end_flush();
    }
?>

    </body>

</html>