<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundation for Sites</title>
    <link rel="stylesheet" href="../css/app.css">
  </head>
  <body>
  <?php
  session_start();
  $username=$_REQUEST["username"];
  $password=$_REQUEST["password"];

  $con=mysql_connect("localhost","root","root");
  if (!$con) {
      die('数据库连接失败'.$mysql_error());
  }
  mysql_select_db("whunews",$con);
  $dbusername=null;
  $dbpassword=null;
  $result=mysql_query("select * from user_info where username ='{$username}' and isdelete =0;");
  while ($row=mysql_fetch_array($result)) {
      $dbusername=$row["username"];
      $dbpassword=$row["password"];
  }
  if(!is_null($dbusername)){
      ?>
      <script type="text/javascript">
          alert("用户已存在");
          window.location.href="register.html";
      </script>
      <?php
  }
  mysql_query("insert into user_info (username,password) values('{$username}','{$password}')") or die("存入数据库失败".mysql_error()) ;
  mysql_close($con);
  ?>
  <script type="text/javascript">
      alert("注册成功");
      window.location.href="index.html";
  </script>

  <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/what-input/dist/what-input.js"></script>
    <script src="../node_modules/foundation-sites/dist/js/foundation.js"></script>
    <script src="../js/app.js"></script>
  </body>
</html>
