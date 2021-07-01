<?php
include("connection.php");
date_default_timezone_set("asia/calcutta");
$date = date("Y-m-d h:i:s");

if(isset($_POST['send_message']))
{   
 $subject= mysqli_real_escape_string($con,$_POST['subject']) ;
 $name= mysqli_real_escape_string($con,$_POST['name']);
 $email= mysqli_real_escape_string($con,$_POST['email']);
 $phone= mysqli_real_escape_string($con,$_POST['phone']);
 $mesg= mysqli_real_escape_string($con,$_POST['message']);
 
 $message= "<html>
                <head>
                 <style>
    

    p.two {
background:#CAAA29;
width:400px;
height: 45px;
border:none;
padding-left:50px;
margin:0px 63px 0px 0px;
  
}

</style>
                </head>
                <body>

                    <div style='width:100%;' align='center'>

                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                            <tr>
                                <td align='center' valign='top' style='background-color:#F0F0F0;' bgcolor='#53636e;'><br><br>
                                    <table width='583' border='0' cellspacing='0' cellpadding='0'>
                                    
                                    <tr>
                                        <td align='left' valign='top' bgcolor='#FFFFFF' style='background-color:#FFFFFF;'>
                                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                <tr>
                                                    <td width='35' align='left' valign='top'>&nbsp;</td>
                                                    <td align='left' valign='top'>
                                                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                            <tr>
                                                                <td align='center' valign='top'>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td align='left' valign='top'>
                                                                    <br>
                                                                    <div style='color:#E8A20C; font-family:Arial, Helvetica, sans-serif;font-size:22px;padding-bottom:10px;'> For Enquiries
                                                                    </div>
                                                                        </div> 
                                                                       Person Name :- $name;<br>
                                                                      
                                                                      Email ID:- $email;<br>
                                                                      Mobile Number:-$phone;<br>
                                                                      Subject:- $subject;<br>
                                                                      Message:- $mesg;<br>
                                                                       
                                                                        </div>
                                                                    <br>  
                                                                
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align='left' valign='top' style='font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#525252;'>&nbsp;</td>
                                                            </tr>
                                                        </table>
                        
                                                    </td>
                        
                                                    <td width='35' align='left' valign='top'>&nbsp;</td>
                                                </tr>
                                            </table>
                        
                                        </td>
                                    </tr>                            
                                    </table>
                                    
                                    <br><br>
                                </td>
                            </tr>
                        </table>
                    </div>
                </body>
            </html> ";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // Additional headers
                $headers .= 'From: artdecals <info@artdecals.com>' . "\r\n";
                $email = 'Kharats002@gmail.com';
              
            mail($email, $subject, $message, $headers, '-faaa@abc.com');

            $insert = "INSERT INTO `contact_us`(`name`, `email`, `phone`, `subject`, `message`, `created_date`) VALUES ('$name','$email','$phone','$subject','$mesg','$date')";
            
            $query = mysqli_query($con, $insert);
            
            if($query)
            {
                echo "<script>alert('$name, Thank you for your query, we will get back soon..');window.location = 'contact.php';</script>;";
            
            }
            
            
            else{
                echo "<script>alert('failed, try again..!'); window.location = 'contact.php';</script>;</script>";
            }

}
?>