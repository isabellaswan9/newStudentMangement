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


<title>结果 -查询学生 -超级管理员</title>
</head>

<body>
<?php include("header.php"); ?>
<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("Location:../login.php");
	exit();
}
$keyWord=$_GET['keyWord'];
$ColumnName=$_GET['ColumnName'];
$keyWord=trim($keyWord);
include("../conn/db_conn.php");
include("../conn/db_func.php");
switch($ColumnName)
{
	case "StuNo";
		$sql="select * from student where StuNo LIKE \"%".$keyWord."%\"";
		break;
	case "StuName";
		$sql="select * from student where StuName LIKE \"%".$keyWord."%\"";
		break;
	case "ClassNo";
		$sql="select * from student where ClassNo LIKE \"%".$keyWord."%\"";
		break;
}
$result=db_query($sql);
?>


<table width="650"  align="center" >
  <tr  bgcolor="#0066CC">
    <td width="80"><font color="#FFFFFF">学生ID</font></td>
    <td width="220" align="center"><font color="#FFFFFF">学生名字</font></td>
    <td width="80"><font color="#FFFFFF">班级编号</font></td>
  </tr>
<?php
if(db_num_rows($result)>0){
	$number=db_num_rows($result);
for($i=0;$i<$number;$i++)
	{
		$row=db_fetch_array($result);
		
		if($i%2==0)
			echo "<tr bgcolor='#dddddd'>";
		else
			echo "<tr>";
		echo "<td width='80'>".$row['StuNo']."</td>";
?>

 <td width="220" align="center"><?php echo $row['StuName'] ?></td>
    <td width="80"><?php echo $row['ClassNo']  ?></td>
    </tr>
  
  <?php
	}
}?>
</table>
<?php include("../footer.php"); ?>   
</body>
</html>