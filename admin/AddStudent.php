<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="../bootstrap/bootstrap.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../style.css">

<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>



<title>添加学生</title>
</head>

<body>
<?php include("header.php"); ?>
<?php
session_start();
if(! isset($_SESSION["username"])){
	header("Location:..//login.php");
	exit();
	}else if($_SESSION["role"]<>"admin"){
		header("Location:..//login.php");
		exit();
		}
?>


<div class="contain-wrap">
  <div class="myForm">
    <form method="get" action="AddStudent1.php">
        <fieldset>
          <legend>请输入学生信息</legend>
          <div class="form-group">
          <label for="exampleSelect1" class="form-label mt-4">编号：</label>
            <?php
            include("../conn/db_conn.php");
            include("../conn/db_func.php");
            $adminNo=$_SESSION['username'];
            $ShowStudent_sql="select * from student order by StuNo desc";
            $ShowStudentResult=db_query($ShowStudent_sql);
            $row=db_fetch_array($ShowStudentResult);
            $StuNo=''. strval(intval($row['StuNo'])+1);
            ?>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder=""  name="StuNo"/>

          <label for="exampleSelect1" class="form-label mt-4">学生名字：</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="StuName"/>
          <label for="exampleSelect1" class="form-label mt-4">学生班级：</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="ClassNo"/>

         <label for="exampleSelect1" class="form-label mt-4">密码：</label>
         <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="Pwd">
		  	<label class="form-label mt-4"><font color="red">注意：密码为8位数字</font></label>
          <div class="form-group set-center">
            <button type="submit" name="B1" id="button" class="btn btn-primary set-padding">确定</button>
              <button type="reset" name="B2" id="button" class="btn btn-primary set-padding">重置</button>
          </div>
         </div>
        </fieldset>
    </form>
 </div>
</div>


</body>
</html>