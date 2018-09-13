<?php
$mailto = $email;
$mailSub = "Notification For New Comment";
$message="
<table border='0' width='100%' cellpadding='0' cellspacing='0' bgcolor='ffffff'>

    <tr>
        <td align='center'>
            <table border='0' align='center' width='590' cellpadding='0' cellspacing='0' class='container590'>

                <tr>
                    <td height='25' style='font-size: 25px; line-height: 25px;'>&nbsp;</td>
                </tr>

                <tr>
                    <td align='center'>

                        <table border='0' align='center' width='590' cellpadding='0' cellspacing='0' class='container590'>

                            <tr>
                                <td align='center' height='70' style='height:70px;'>
                                    <a href='' style='display: block; border-style: none !important; border: 0 !important;'><img width='100' border='0' style='display: block; width: 100px;' src='http://ideabookuog.000webhostapp.com/image/ib.png' alt='' /></a>
                                </td>
                            </tr>

                            
                        </table>
                    </td>
                </tr>

                <tr>
                    <td height='25' style='font-size: 25px; line-height: 25px;'>&nbsp;</td>
                </tr>

            </table>
        </td>
    </tr>
</table>
<!-- end header -->

<!-- big image section -->

<table border='0' width='100%' cellpadding='0' cellspacing='0' bgcolor='ffffff' class='bg_color'>

    <tr>
        <td align='center'>
            <table border='0' align='center' width='590' cellpadding='0' cellspacing='0' class='container590'>

                <tr>
                    <td align='center' style='color: #343434; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;'
                        class='main-header'>
                        <!-- section text ======-->

                        <div style='line-height: 35px'>

                            Notification from  <span style='color: #5caad2;'>ideaBook</span>

                        </div>
                    </td>
                </tr>

                <tr>
                    <td height='10' style='font-size: 10px; line-height: 10px;'>&nbsp;</td>
                </tr>

                <tr>
                    <td align='center'>
                        <table border='0' width='40' align='center' cellpadding='0' cellspacing='0' bgcolor='eeeeee'>
                            <tr>
                                <td height='2' style='font-size: 2px; line-height: 2px;'>&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td height='20' style='font-size: 20px; line-height: 20px;'>&nbsp;</td>
                </tr>

                <tr>
                    <td align='left'>
                        <table border='0' width='590' align='center' cellpadding='0' cellspacing='0' class='container590'>
                            <tr>
                                <td align='left' style='color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;'>
                                    <!-- section text ======-->
									 <p style='line-height: 24px; margin-bottom:20px;'>
                                        One New Comment Posted in Your Idea.
                                    </p>

                                    <p style='line-height: 24px; margin-bottom:15px;'>

                                        <b>Identity :</b>".$anonymous.",

                                    </p>
									<b>Comment Body :</b>
                                    <p style='line-height: 24px;margin-bottom:15px;'>
                                        ".$comment.".
                                    </p>
                                   
                                    <table border='0' align='center' width='180' cellpadding='0' cellspacing='0' bgcolor='5caad2' style='margin-bottom:20px;'>

                                        <tr>
                                            <td height='10' style='font-size: 10px; line-height: 10px;'>&nbsp;</td>
                                        </tr>

                                        <tr>
                                            <td align='center' style='color: #ffffff; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 22px; letter-spacing: 2px;'>
                                                <!-- main section button -->

                                                <div style='line-height: 22px;'>
                                                    <a href='localhost/ideabook/std_main/index.php' style='color: #ffffff; text-decoration: none;'>MY ACCOUNT</a>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td height='10' style='font-size: 10px; line-height: 10px;'>&nbsp;</td>
                                        </tr>

                                    </table>
                                    

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>





            </table>

        </td>
    </tr>

    <tr>
        <td height='40' style='font-size: 40px; line-height: 40px;'>&nbsp;</td>
    </tr>

</table>"

;
$mailMsg = $message;







require 'PHPMailer-master/PHPMailerAutoload.php';

$email = new PHPMailer();

$email->SMTPOptions = array(
'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
)
);
$email ->IsSmtp();
$email ->SMTPDebug = 0;
$email ->SMTPAuth = true;
$email ->SMTPSecure = 'ssl';
$email ->Host = "smtp.gmail.com";
// $mail ->Port = 465; // or 587
$email ->Port = 465; // or 587
$email ->IsHTML(true);
$email ->Username = "foysal35@diit.info";
$email ->Password = "foysal30159";
$email->setFrom('foysal35@diit.info', 'ideaBook');
//$mail->addReplyTo('lunchforyou48@gmail.com', 'Lunch4U');
$email ->Subject = $mailSub;
$email ->Body = $mailMsg;
$email ->AddAddress($mailto);

if(!$email->Send())
{
  //echo "Mail Not Sent";
}
else
{
   //echo "Mail Sent";
}







