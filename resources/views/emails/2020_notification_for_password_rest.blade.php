<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Daily Attendance Management System</title>
  <style type="text/css">
    body {margin: 0; padding: 0; min-width: 100%!important;}
    img {height: auto;}
    .content {width: 100%; max-width: 600px;}
    .header {padding: 40px 30px 20px 30px;}
    .innerpadding {padding: 30px 30px 30px 30px;}
    .borderbottom {border-bottom: 1px solid #f2eeed;}
    .subhead {font-size: 15px; color: #ffffff; font-family: sans-serif; letter-spacing: 10px;}
    .h1, .h2, .bodycopy {color: #153643; font-family: sans-serif;}
    .h1 {font-size: 33px; line-height: 38px; font-weight: bold;}
    .h2 {padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;}
    .bodycopy {font-size: 16px; line-height: 22px;}
    .button {text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
    .button a {color: #ffffff; text-decoration: none;}
    .footer {padding: 20px 30px 15px 30px;}
    .footercopy {font-family: sans-serif; font-size: 14px; color: #ffffff;}
    .footercopy a {color: #ffffff; text-decoration: underline;}

    @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
      body[yahoo] .hide {display: none!important;}
      body[yahoo] .buttonwrapper {background-color: transparent!important;}
      body[yahoo] .button {padding: 0px!important;}
      body[yahoo] .button a {background-color: #98b834; padding: 15px 15px 13px!important;}
      body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}
    }

    /*@media only screen and (min-device-width: 601px) {
      .content {width: 600px !important;}
      .col425 {width: 425px!important;}
      .col380 {width: 380px!important;}
      }*/

  </style>
</head>

<body yahoo bgcolor="#f6f8f1">
<table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
      <!--[if (gte mso 9)|(IE)]>
      <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td>
      <![endif]-->
      <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td bgcolor="#1f1d5e" class="header">
            <table width="70" align="left" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="70" style="padding: 0 20px 20px 0;">
                  <img class="fix" src="https://prodapp-ref02.dangote-group.com/das/asset-adminlte-v-2-4-0/dist/img/logolg.png" width="120" height="120" border="0" alt="" />
                </td>
              </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            <table width="425" align="left" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td>
            <![endif]-->
            <table class="col425" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 400px;">
              <tr>
                <td height="70">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="subhead" style="padding: 0 0 0 3px;">
                        
                      </td>
                    </tr>
                    <tr>
                      <td class="h2" style="padding: 5px 0 0 0; color: white">
                        D.A.S Password Reset
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
          </td>
        </tr>
        <tr>
          <td class="innerpadding borderbottom">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="h2">
                  Dear <strong>{{$full_name}}</strong>,
                </td>
              </tr>
              <tr>
                <td class="bodycopy">
                  Your email has been profiled on the new Daily Attendance System (DAS).<br/>
                  The Daily Attendance System will allow you access your daily clock in and clock out times. <br/> <br/>
                  kindly click on the button below to configure your attendance access. <br/><br/>Please, Ignore this if you have already carried out this process <br/>
                  <br/>
                </td>
              </tr>
              <tr>
                
                <td>
                  <table class="buttonwrapper" bgcolor="#1c2e78" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="button" height="45">
                        <a target="_blank" href="{{url('/password/reset')}}">Activate</a>
                      </td>
                    </tr>
                  </table>
                    
                </td>
              </tr>

              <tr>
                <td class="bodycopy">
                  <br/>
                  Best Regards,<br/>
                  Management.
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td class="innerpadding borderbottom">

            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
          </td>
        </tr>

        <tr>
          <td class="innerpadding bodycopy">

          </td>
        </tr>
        <tr>
          <td class="footer" bgcolor="#44525f">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" class="footercopy">
                  &reg; Copyright 2019 - {{date('Y')}} Daily Attendance Management System.
                  All rights reserved<br/>
                </td>
              </tr>
              {{-- <tr>
                 <td align="center" style="padding: 20px 0 0 0;">
                   <table border="0" cellspacing="0" cellpadding="0">
                     <tr>
                       <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                         <a target="_blank" href="https://facebook.com/iauoeph/">
                           <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/facebook.png" width="37" height="37" alt="Facebook" border="0" />
                         </a>
                       </td>
                       <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                         <a target="_blank" href="https://twitter.com/iauephc/">
                           <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/twitter.png" width="37" height="37" alt="Twitter" border="0" />
                         </a>
                       </td>
                     </tr>
                   </table>
                 </td>
               </tr>--}}
            </table>
          </td>
        </tr>
      </table>
      <!--[if (gte mso 9)|(IE)]>
      </td>
      </tr>
      </table>
      <![endif]-->
    </td>
  </tr>
</table>
</body>
</html>
