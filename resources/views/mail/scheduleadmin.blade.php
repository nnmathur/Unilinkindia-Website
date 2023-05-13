<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Unilink India</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .flex-center .content{
            width:100%;
            border: 1px solid #e7e7e7;
            background: #e7e7e7; 
        }

    </style>
</head>
<body>

<body style="margin: 0px;">
    <img src="https://unilinkindia.co.in/unilink/public/front1/images/logo.png" style="width: 157px;height: 73px;padding-left: 50px;">
    <p style="margin: 10px;padding-left: 40px;">Dear Admin,</p>
    <p style="margin: 10px 10px 20px;padding-left: 40px;">New Appointment.</p>
    <p style="margin: 10px;padding-left: 40px;">User with following details has shown interest.</p>

<table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin: 15px 10px 10px 50px;width: 60%;">  

 <tbody> 
 

<tr>  

 <td width="105" height="22" align="left" valign="top" bgcolor="#3939a7" style="padding-left:10px;font-size:14px;color:#fff;padding-top:3px;padding-bottom:3px">First Name :</td>  

 <td width="3" height="22" align="left" valign="top"></td>  

 <td height="22" align="left" valign="top" bgcolor="#CCCCCC" style="font-size:14px;color:#333;padding:3px 10px 5px 10px">{{ $first_name }}</td>  

 </tr>  

 <tr bgcolor="#FFFFFF" align="left" valign="top">  

 <td colspan="3" align="left"><img src="http://i.imgur.com/dgsBwxL.gif" alt="" width="1" height="3" border="0"></td>  

 </tr>
 
 <tr>  

 <td width="105" height="22" align="left" valign="top" bgcolor="#3939a7" style="padding-left:10px;font-size:14px;color:#fff;padding-top:3px;padding-bottom:3px">Last Name :</td>  

 <td width="3" height="22" align="left" valign="top"></td>  

 <td height="22" align="left" valign="top" bgcolor="#CCCCCC" style="font-size:14px;color:#333;padding:3px 10px 5px 10px">{{ $last_name }}</td>  

 </tr>  

 <tr bgcolor="#FFFFFF" align="left" valign="top">  

 <td colspan="3" align="left"><img src="http://i.imgur.com/dgsBwxL.gif" alt="" width="1" height="3" border="0"></td>  

 </tr>

 <tr>  

 <td width="105" height="22" align="left" valign="top" bgcolor="#3939a7" style="padding-left:10px;font-size:14px;color:#fff;padding-top:3px;padding-bottom:3px">Email :</td>  

 <td width="3" height="22" align="left" valign="top"></td>  

 <td height="22" align="left" valign="top" bgcolor="#CCCCCC" style="font-size:14px;color:#333;padding:3px 10px 5px 10px">{{ $email }}</td>  

 </tr>  

 <tr bgcolor="#FFFFFF" align="left" valign="top">  

 <td colspan="3" align="left"><img src="http://i.imgur.com/dgsBwxL.gif" alt="" width="1" height="3" border="0"></td>  

 </tr> 

 <tr>  

 <td width="105" height="22" align="left" valign="top" bgcolor="#3939a7" style="padding-left:10px;font-size:14px;color:#fff;padding-top:3px;padding-bottom:3px">Contact No. :</td>  

 <td width="3" height="22" align="left" valign="top"></td>  

 <td height="22" align="left" valign="top" bgcolor="#CCCCCC" style="font-size:14px;color:#333;padding:3px 10px 5px 10px">{{ $phone }}</td>  

 </tr>  
 
 <tr>  

 <td width="105" height="22" align="left" valign="top" bgcolor="#3939a7" style="padding-left:10px;font-size:14px;color:#fff;padding-top:3px;padding-bottom:3px">Job Title :</td>  

 <td width="3" height="22" align="left" valign="top"></td>  

 <td height="22" align="left" valign="top" bgcolor="#CCCCCC" style="font-size:14px;color:#333;padding:3px 10px 5px 10px">{{ $jobtitle }}</td>  

 </tr>  

 <tr bgcolor="#FFFFFF" align="left" valign="top">  

 <td colspan="3" align="left"><img src="http://i.imgur.com/dgsBwxL.gif" alt="" width="1" height="3" border="0"></td>  

 </tr>
 
 <tr>  

 <td width="105" height="22" align="left" valign="top" bgcolor="#3939a7" style="padding-left:10px;font-size:14px;color:#fff;padding-top:3px;padding-bottom:3px">Company :</td>  

 <td width="3" height="22" align="left" valign="top"></td>  

 <td height="22" align="left" valign="top" bgcolor="#CCCCCC" style="font-size:14px;color:#333;padding:3px 10px 5px 10px">{{ $company }}</td>  

 </tr>  

 <tr bgcolor="#FFFFFF" align="left" valign="top">  

 <td colspan="3" align="left"><img src="http://i.imgur.com/dgsBwxL.gif" alt="" width="1" height="3" border="0"></td>  

 </tr>
 
  <tr>  

 <td width="105" height="22" align="left" valign="top" bgcolor="#3939a7" style="padding-left:10px;font-size:14px;color:#fff;padding-top:3px;padding-bottom:3px">Employee :</td>  

 <td width="3" height="22" align="left" valign="top"></td>  

 <td height="22" align="left" valign="top" bgcolor="#CCCCCC" style="font-size:14px;color:#333;padding:3px 10px 5px 10px">{{ $employee }}</td>  

 </tr>  

 <tr bgcolor="#FFFFFF" align="left" valign="top">  

 <td colspan="3" align="left"><img src="http://i.imgur.com/dgsBwxL.gif" alt="" width="1" height="3" border="0"></td>  

 </tr>
 
   <tr>  

 <td width="105" height="22" align="left" valign="top" bgcolor="#3939a7" style="padding-left:10px;font-size:14px;color:#fff;padding-top:3px;padding-bottom:3px">Product :</td>  

 <td width="3" height="22" align="left" valign="top"></td>  

 <td height="22" align="left" valign="top" bgcolor="#CCCCCC" style="font-size:14px;color:#333;padding:3px 10px 5px 10px">{{ $product }}</td>  

 </tr>  

 <tr bgcolor="#FFFFFF" align="left" valign="top">  

 <td colspan="3" align="left"><img src="http://i.imgur.com/dgsBwxL.gif" alt="" width="1" height="3" border="0"></td>  

 </tr>
 
  <tr>  

 <td width="105" height="50" align="left" valign="top" bgcolor="#3939a7" style="padding-left:10px;font-size:14px;color:#fff;padding-top:3px;padding-bottom:3px">Message :</td>  

 <td width="3" height="22" align="left" valign="top"></td>  

 <td height="50" align="left" valign="top" bgcolor="#CCCCCC" style="font-size:14px;color:#333;padding:3px 10px 5px 10px">{{ $message_new }}</td>  

 </tr> 

 <tr bgcolor="#FFFFFF" align="left" valign="top">  

 <td colspan="3" align="left"><img src="http://i.imgur.com/dgsBwxL.gif" alt="" width="1" height="3" border="0"></td>  

 </tr>

 </tbody>  

 </table>  
    

    <p style="margin: 0px 10px 10px 10px;padding-left: 40px;">Regards,</p>
    <p style="margin: 10px;padding-left: 40px;">Web Admin</p>
    <p style="margin: 10px;padding-left: 40px;">Unilink India</p>
</body>
</html>