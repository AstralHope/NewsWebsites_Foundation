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
  session_start ();
  if (isset ( $_SESSION ["code"] )) {//判断code存不存在，如果不存在，说明异常登录
      ?>
      欢迎登录<?php
      echo "${_SESSION["username"]}";//显示登录用户名
      ?><br>
      您的ip：<?php
      echo "${_SERVER['REMOTE_ADDR']}";//显示ip
      ?>
  <br>
      您的语言：
      <?php
      echo "${_SERVER['HTTP_ACCEPT_LANGUAGE']}";//使用的语言
      ?>
  <br>
      浏览器版本：
      <?php
      echo "${_SERVER['HTTP_USER_AGENT']}";//浏览器版本信息
      ?>
      <a href="exit.php">退出登录</a>
  <?php
  } else {//code不存在，调用exit.php 退出登录
  ?>
      <script type="text/javascript">
          alert("退出登录");
          window.location.href="exit.php";
      </script>
      <?php
  }
  ?>
  <br>
  <a href="alter_password.html">修改密码</a>

  <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/what-input/dist/what-input.js"></script>
    <script src="../node_modules/foundation-sites/dist/js/foundation.js"></script>
    <script src="../js/app.js"></script>
  </body>
</html>
