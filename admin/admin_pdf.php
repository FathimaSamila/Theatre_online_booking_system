<!DOCTYPE html>
<html lang="en">
    <head>

    </head>

    <body>

<?php
// if (isset($_POST['g-report'])) 
// {
//     if ($_POST['date1'] !== '' and $_POST['date2'] !== '') 
//     {
//         $date1 = $_POST['date1'];
//         $date2 = $_POST['date2'];
                
//         ob_start();
//         $cn= new mysqli("localhost","root","","vijaya_theater");
//         require("pdf/fpdf.php");
//         $pdf = new FPDF('L', 'mm', 'A3');
//         $pdf->SetFont('Arial', 'B', 15);
//         $pdf->AddPage();

//         $query = "SELECT booking_id FROM booking where booked_date BETWEEN '$date1' AND '$date2' ";
//         $rel=$cn->query($query);
//         $row = $rel->num_rows;
//         echo $row;

//         $query2 = "SELECT show_id FROM show_table where add_date BETWEEN '$date1' AND '$date2' ";
//         $query2_run=mysqli_query($connection,$query2);
//         $row2 = mysqli_num_rows($query2_run);

//         $query3 = "SELECT pay_id FROM payment where add_date BETWEEN '$date1' AND '$date2' ";
//         $query3_run=mysqli_query($connection,$query3);
//         $row3 = mysqli_num_rows($query3_run);

//         $query4 = "SELECT user_id FROM registration where add_date BETWEEN '$date1' AND '$date2' ";
//         $query4_run=mysqli_query($connection,$query4);
//         $row4 = mysqli_num_rows($query4_run);

//         $query5 = "SELECT movie_id FROM movie where add_date BETWEEN '$date1' AND '$date2' ";
//         $query5_run=mysqli_query($connection,$query5);
//         $row5 = mysqli_num_rows($query5_run);

//         $pdf->SetTextColor(255, 255, 255);
//         $pdf->SetFillColor(215, 11, 10);
//         $pdf->Cell(400, 30, 'Vijaya Theatre', 0, 1, 'C', true);
//         $pdf->Cell(600, 20, 'monthly Report', 0, 1);
//         $pdf->SetTextColor(255,255,255);
//         $pdf->SetFillColor(215,11,10);
//         $pdf->Cell(20,10,'Book',1,0,'C',true);
//         $pdf->Cell(20,10,'User',1,0,'C',true);
//         $pdf->Cell(20,10,'Show',1,0,'C',true);
//         $pdf->Cell(100,10,'Movie Name',1,0,'C',true);
//         $pdf->Cell(60,10,'Show Date',1,0,'C',true);
//         $pdf->Cell(100,10,'Ticket',1,0,'C',true);
//         $pdf->Cell(20,10,'Seat',1,0,'C',true);
//         $pdf->Cell(30,10,'Amount',1,0,'C',true);
//         $pdf->Cell(30,10,'Booked Date',1,1,'C',true);
//         $pdf->SetTextColor(0,0,0);
//     }
//     else{
//         $_SESSION['message']="Select Date";
//         header('Location : home.php');
//     }
// }
?>

<?php

if(isset($_POST['b_report_btn']))
{
    if($_POST['startDate']!=='' AND $_POST['endDate']!=='' )
    {
        $date1=$_POST['startDate'];
        $date2=$_POST['endDate'];
        ob_start();
        $cn= new mysqli("localhost","root","","vijaya_theater");
        require("pdf/fpdf.php");
        $pdf =new FPDF('L','mm','A3');
        $pdf->SetFont('Arial','B',15);
        $pdf-> AddPage();

        $sql="SELECT * FROM booking where booked_date BETWEEN '$date1' AND '$date2' ";
        $rel=$cn->query($sql);
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(215,11,10);
        $pdf-> Cell(400,30,'Vijaya Theatre',0,1,'C',true);
        $pdf->Cell(600,20,'',0,1);

        
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(215,11,10);
        $pdf->Cell(20,10,'Book',1,0,'C',true);
        $pdf->Cell(20,10,'User',1,0,'C',true);
        $pdf->Cell(20,10,'Show',1,0,'C',true);
        $pdf->Cell(100,10,'Movie Name',1,0,'C',true);
        $pdf->Cell(60,10,'Show Date',1,0,'C',true);
        $pdf->Cell(100,10,'Ticket',1,0,'C',true);
        $pdf->Cell(20,10,'Seat',1,0,'C',true);
        $pdf->Cell(30,10,'Amount',1,0,'C',true);
        $pdf->Cell(30,10,'Booked Date',1,1,'C',true);
        $pdf->SetTextColor(0,0,0);
        if($rel->num_rows>0)
        {
            $i=0;
            $amount=0;
            $total=0;
            $total_ticket=0;
            while($row=$rel->fetch_assoc())
            {
            
                $pdf->Cell(20,10,$row["booking_id"],1,0);
                $pdf->Cell(20,10,$row["user_id"],1,0);
                $pdf->Cell(20,10,$row["show_id"],1,0);
                $pdf->Cell(100,10,$row["movie"],1,0);
                $pdf->Cell(60,10,$row["ticket_date_time"],1,0);
                $pdf->Cell(100,10,$row["ticket_name"],1,0);
                $pdf->Cell(20,10,$row["no_of_seat"],1,0);
                $pdf->Cell(30,10,$row["amount"],1,0);
                $pdf->Cell(30,10,$row["booked_date"],1,1);
                $amount=$row["amount"];
                $total += $amount;
                $tic=$row["no_of_seat"];
                $total_ticket+= $tic;           
            }
            $pdf->Cell(600,20,'',0,1);
            $pdf->SetFont('Arial','B',25);
            $pdf->Cell(80,10,"Total Amount = " .$total,0,1);  
            $pdf->Cell(80,10,"Total Tickets = " .$total_ticket,0,1);   
            
        }
        $pdf->Output();
        ob_end_flush();
    }
    else
    {
        $date1=$_POST['startDate'];
        $date2=$_POST['endDate'];
        ob_start();
        $cn= new mysqli("localhost","root","","vijaya_theater");
        require("pdf/fpdf.php");
        $pdf =new FPDF('L','mm','A3');
        $pdf->SetFont('Arial','B',15);
        $pdf-> AddPage();

        $sql="SELECT * FROM booking";
        $rel=$cn->query($sql);
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(215,11,10);
        $pdf-> Cell(400,30,'Vijaya Theatre',0,1,'C',true);
        $pdf->Cell(600,20,'',0,1);

        
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(215,11,10);
        $pdf->Cell(20,10,'Book',1,0,'C',true);
        $pdf->Cell(20,10,'User',1,0,'C',true);
        $pdf->Cell(20,10,'Show',1,0,'C',true);
        $pdf->Cell(100,10,'Movie Name',1,0,'C',true);
        $pdf->Cell(60,10,'Show Date',1,0,'C',true);
        $pdf->Cell(100,10,'Ticket',1,0,'C',true);
        $pdf->Cell(20,10,'Seat',1,0,'C',true);
        $pdf->Cell(30,10,'Amount',1,0,'C',true);
        $pdf->Cell(30,10,'Date',1,1,'C',true);
        $pdf->SetTextColor(0,0,0);
        if($rel->num_rows>0)
        {
            $i=0;
            $amount=0;
            $total=0;
            $total_ticket=0;
            while($row=$rel->fetch_assoc())
            {
                $i++;
                $pdf->Cell(20,10,$row["booking_id"],1,0);
                $pdf->Cell(20,10,$row["user_id"],1,0);
                $pdf->Cell(20,10,$row["show_id"],1,0);
                $pdf->Cell(100,10,$row["movie"],1,0);
                $pdf->Cell(60,10,$row["ticket_date_time"],1,0);
                $pdf->Cell(100,10,$row["ticket_name"],1,0);
                $pdf->Cell(20,10,$row["no_of_seat"],1,0);
                $pdf->Cell(30,10,$row["amount"],1,0);
                $pdf->Cell(30,10,$row["booked_date"],1,1);
                $amount=$row["amount"];
                $total += $amount;
                $tic=$row["no_of_seat"];
                $total_ticket+= $tic;           
            }
            $pdf->Cell(600,20,'',0,1);
            $pdf->SetFont('Arial','B',25);
            $pdf->Cell(80,10,"Total Amount = " .$total,0,1);  
            $pdf->Cell(80,10,"Total Tickets = " .$total_ticket,0,1);    
        }
        $pdf->Output();
        ob_end_flush();
    }
}
?>


<?php

if(isset($_POST['m_report_btn']))
{
    if($_POST['startDate']!=='' AND $_POST['endDate']!=='' )
    {
        $date1=$_POST['startDate'];
        $date2=$_POST['endDate'];
        ob_start();
        $cn= new mysqli("localhost","root","","vijaya_theater");
        require("pdf/fpdf.php");
        $pdf =new FPDF('L','mm','A3');
        $pdf->SetFont('Arial','B',15);
        $pdf-> AddPage();

        $sql="SELECT * FROM movie where add_date BETWEEN '$date1' AND '$date2' ";
        $rel=$cn->query($sql);
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(215,11,10);
        $pdf-> Cell(400,30,'Vijaya Theatre',0,1,'C',true);
        $pdf->Cell(600,20,'',0,1);

        
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(215,11,10);
        $pdf->Cell(20,10,'ID',1,0,'C',true);
        $pdf->Cell(100,10,'Title',1,0,'C',true);
        $pdf->Cell(50,10,'Categorie',1,0,'C',true);
        $pdf->Cell(60,10,'Gender',1,0,'C',true);
        $pdf->Cell(40,10,'Run Time',1,0,'C',true);
        $pdf->Cell(130,10,'Trailer',1,1,'C',true);
        $pdf->SetTextColor(0,0,0);
        if($rel->num_rows>0)
        {
            $i=0;
            $total=$rel->num_rows;
            while($row=$rel->fetch_assoc())
            {
            
                $i++;
                $pdf->Cell(20,10,$row["movie_id"],1,0);
                $pdf->Cell(100,10,$row["movie_name"],1,0);
                $pdf->Cell(50,10,$row["categorie"],1,0);
                $pdf->Cell(60,10,$row["gender"],1,0);
                $pdf->Cell(40,10,$row["runtime"],1,0);
                $pdf->Cell(130,10,$row["video_url"],1,1);;        
            }
            $pdf->Cell(600,20,'',0,1);
            $pdf->SetFont('Arial','B',25);
            $pdf->Cell(80,10,"Total Movie = " .$total,0,1);   
            
        }
        $pdf->Output();
        ob_end_flush();
    }
    else
    {
        $date1=$_POST['startDate'];
        $date2=$_POST['endDate'];
        ob_start();
        $cn= new mysqli("localhost","root","","vijaya_theater");
        require("pdf/fpdf.php");
        $pdf =new FPDF('L','mm','A3');
        $pdf->SetFont('Arial','B',15);
        $pdf-> AddPage();

        $sql="SELECT * FROM movie";
        $rel=$cn->query($sql);
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(215,11,10);
        $pdf-> Cell(400,30,'Vijaya Theatre',0,1,'C',true);
        $pdf->Cell(600,20,'',0,1);

        
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(215,11,10);
        $pdf->Cell(20,10,'ID',1,0,'C',true);
        $pdf->Cell(100,10,'Title',1,0,'C',true);
        $pdf->Cell(50,10,'Categorie',1,0,'C',true);
        $pdf->Cell(60,10,'Gender',1,0,'C',true);
        $pdf->Cell(40,10,'Run Time',1,0,'C',true);
        $pdf->Cell(130,10,'Trailer',1,1,'C',true);
        $pdf->SetTextColor(0,0,0);
        if($rel->num_rows>0)
        {
            $i=0;
            $total=$rel->num_rows;
            while($row=$rel->fetch_assoc())
            {
            
                $i++;
                $pdf->Cell(20,10,$row["movie_id"],1,0);
                $pdf->Cell(100,10,$row["movie_name"],1,0);
                $pdf->Cell(50,10,$row["categorie"],1,0);
                $pdf->Cell(60,10,$row["gender"],1,0);
                $pdf->Cell(40,10,$row["runtime"],1,0);
                $pdf->Cell(130,10,$row["video_url"],1,1);;        
            }
            $pdf->Cell(600,20,'',0,1);
            $pdf->SetFont('Arial','B',25);
            $pdf->Cell(80,10,"Total Movie = " .$total,0,1);      
        }
        $pdf->Output();
        ob_end_flush();
    }
}
?>

<?php

if(isset($_POST['s_report_btn']))
{
    if($_POST['startDate']!=='' AND $_POST['endDate']!=='' )
    {
        $date1=$_POST['startDate'];
        $date2=$_POST['endDate'];
        ob_start();
        $cn= new mysqli("localhost","root","","vijaya_theater");
        require("pdf/fpdf.php");
        $pdf =new FPDF('L','mm','A3');
        $pdf->SetFont('Arial','B',15);
        $pdf-> AddPage();

        $sql="SELECT * FROM show_table where add_date BETWEEN '$date1' AND '$date2' ";
        $rel=$cn->query($sql);
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(215,11,10);
        $pdf-> Cell(400,30,'Vijaya Theatre',0,1,'C',true);
        $pdf->Cell(600,20,'',0,1);

        
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(215,11,10);
        $pdf->Cell(20,10,'ID',1,0,'C',true);
        $pdf->Cell(80,10,'Categorie',1,0,'C',true);
        $pdf->Cell(200,10,'Title',1,0,'C',true);
        $pdf->Cell(100,10,'Show Date Time',1,1,'C',true);    
        $pdf->SetTextColor(0,0,0);
        if($rel->num_rows>0)
        {
            $i=0;
            $total=$rel->num_rows;
            while($row=$rel->fetch_assoc())
            {
            
                $i++;
                $pdf->Cell(20,10,$row["show_id"],1,0);
                $pdf->Cell(80,10,$row["categorie"],1,0);
                $pdf->Cell(200,10,$row["movie_name"],1,0);
                $pdf->Cell(100,10,$row["show_date_time"],1,1);        
            }
            $pdf->Cell(600,20,'',0,1);
            $pdf->SetFont('Arial','B',25);
            $pdf->Cell(80,10,"Total Show = " .$total,0,1);   
            
        }
        $pdf->Output();
        ob_end_flush();
    }
    else
    {
        $date1=$_POST['startDate'];
        $date2=$_POST['endDate'];
        ob_start();
        $cn= new mysqli("localhost","root","","vijaya_theater");
        require("pdf/fpdf.php");
        $pdf =new FPDF('L','mm','A3');
        $pdf->SetFont('Arial','B',15);
        $pdf-> AddPage();

        $sql="SELECT * FROM show_table";
        $rel=$cn->query($sql);
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(215,11,10);
        $pdf-> Cell(400,30,'Vijaya Theatre',0,1,'C',true);
        $pdf->Cell(600,20,'',0,1);

        
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(215,11,10);
        $pdf->Cell(20,10,'ID',1,0,'C',true);
        $pdf->Cell(80,10,'Categorie',1,0,'C',true);
        $pdf->Cell(200,10,'Title',1,0,'C',true);
        $pdf->Cell(100,10,'Show Date Time',1,1,'C',true);
        $pdf->SetTextColor(0,0,0);
        if($rel->num_rows>0)
        {
            $i=0;
            $total=$rel->num_rows;
            while($row=$rel->fetch_assoc())
            {
            
                $i++;
                $pdf->Cell(20,10,$row["show_id"],1,0);
                $pdf->Cell(80,10,$row["categorie"],1,0);
                $pdf->Cell(200,10,$row["movie_name"],1,0);
                $pdf->Cell(100,10,$row["show_date_time"],1,1);      
            }
            $pdf->Cell(600,20,'',0,1);
            $pdf->SetFont('Arial','B',25);
            $pdf->Cell(80,10,"Total Show = " .$total,0,1);       
        }
        $pdf->Output();
        ob_end_flush();
    }
}
?>
<?php

if(isset($_POST['u_report_btn']))
{
    if($_POST['startDate']!=='' AND $_POST['endDate']!=='' )
    {
        $date1=$_POST['startDate'];
        $date2=$_POST['endDate'];
        ob_start();
        $cn= new mysqli("localhost","root","","vijaya_theater");
        require("pdf/fpdf.php");
        $pdf =new FPDF('L','mm','A3');
        $pdf->SetFont('Arial','B',15);
        $pdf-> AddPage();

        $sql="SELECT * FROM registration where add_date BETWEEN '$date1' AND '$date2' ";
        $rel=$cn->query($sql);
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(215,11,10);
        $pdf-> Cell(400,30,'Vijaya Theatre',0,1,'C',true);
        $pdf->Cell(600,20,'',0,1);

        
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(215,11,10);
        $pdf->Cell(40,10,'ID',1,0,'C',true);
        $pdf->Cell(100,10,'Username',1,0,'C',true);
        $pdf->Cell(150,10,'Email',1,0,'C',true);
        $pdf->Cell(60,10,'Password',1,0,'C',true);
        $pdf->Cell(40,10,'User Type',1,1,'C',true);  
        $pdf->SetTextColor(0,0,0);
        if($rel->num_rows>0)
        {
            $i=0;
            $total=$rel->num_rows;
            while($row=$rel->fetch_assoc())
            {
            
                $i++;
                $pdf->Cell(40,10,$row["user_id"],1,0);
                $pdf->Cell(100,10,$row["username"],1,0);
                $pdf->Cell(150,10,$row["email"],1,0);
                $pdf->Cell(60,10,$row["password"],1,0);
                $pdf->Cell(40,10,$row["user_type"],1,1);          
            }
            $pdf->Cell(600,20,'',0,1);
            $pdf->SetFont('Arial','B',25);
            $pdf->Cell(80,10,"Total Show = " .$total,0,1);   
            
        }
        $pdf->Output();
        ob_end_flush();
    }
    else
    {
        $date1=$_POST['startDate'];
        $date2=$_POST['endDate'];
        ob_start();
        $cn= new mysqli("localhost","root","","vijaya_theater");
        require("pdf/fpdf.php");
        $pdf =new FPDF('L','mm','A3');
        $pdf->SetFont('Arial','B',15);
        $pdf-> AddPage();

        $sql="SELECT * FROM registration";
        $rel=$cn->query($sql);
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(215,11,10);
        $pdf-> Cell(400,30,'Vijaya Theatre',0,1,'C',true);
        $pdf->Cell(600,20,'',0,1);

        
        $pdf->SetTextColor(255,255,255);
        $pdf->SetFillColor(215,11,10);
        $pdf->Cell(40,10,'ID',1,0,'C',true);
        $pdf->Cell(100,10,'Username',1,0,'C',true);
        $pdf->Cell(150,10,'Email',1,0,'C',true);
        $pdf->Cell(60,10,'Password',1,0,'C',true);
        $pdf->Cell(40,10,'User Type',1,1,'C',true);
        $pdf->SetTextColor(0,0,0);
        if($rel->num_rows>0)
        {
            $i=0;
            $total=$rel->num_rows;
            while($row=$rel->fetch_assoc())
            {
            
                $i++;
                $pdf->Cell(40,10,$row["user_id"],1,0);
                $pdf->Cell(100,10,$row["username"],1,0);
                $pdf->Cell(150,10,$row["email"],1,0);
                $pdf->Cell(60,10,$row["password"],1,0);
                $pdf->Cell(40,10,$row["user_type"],1,1);         
            }
            $pdf->Cell(600,20,'',0,1);
            $pdf->SetFont('Arial','B',25);
            $pdf->Cell(80,10,"Total User = " .$total,0,1);       
        }
        $pdf->Output();
        ob_end_flush();
    }
}
?>
<?php
// if(isset($_POST['u_report_btn']))
// {

//     ob_start();
//     $cn= new mysqli("localhost","root","","vijaya_theater");
//     require("pdf/fpdf.php");
//     $pdf =new FPDF('L','mm','A3');
//     $pdf->SetFont('Arial','B',18);
//     $pdf-> AddPage();

//     $sql="SELECT * FROM registration";
//     $rel=$cn->query($sql);
//     $pdf->SetTextColor(255,255,255);
//     $pdf->SetFillColor(215,11,10);
//     $pdf-> Cell(400,30,'Vijaya Theatre',0,1,'C',true);
//     $pdf->Cell(600,20,'',0,1);

    
//     $pdf->SetTextColor(255,255,255);
//     $pdf->SetFillColor(215,11,10);
//     $pdf->Cell(40,10,'ID',1,0,'C',true);
//     $pdf->Cell(100,10,'Username',1,0,'C',true);
//     $pdf->Cell(150,10,'Email',1,0,'C',true);
//     $pdf->Cell(60,10,'Password',1,0,'C',true);
//     $pdf->Cell(40,10,'User Type',1,1,'C',true);

//     $pdf->SetTextColor(0,0,0);
//     if($rel->num_rows>0)
//     {
//         $i=0;
//         while($row=$rel->fetch_assoc())
//         {
//             $i++;
//             $pdf->Cell(40,10,$row["user_id"],1,0);
//             $pdf->Cell(100,10,$row["username"],1,0);
//             $pdf->Cell(150,10,$row["email"],1,0);
//             $pdf->Cell(60,10,$row["password"],1,0);
//             $pdf->Cell(40,10,$row["user_type"],1,1);

            
//         }
//     }
    

//     $pdf->Output();
//     ob_end_flush();

// }
?>




    </body>
</html>