<?php 
//创建连接
$conn = mysqli_connect("localhost","root","" );

include("conn.php");

//执行SQL语句
$sql = "delete from kecheng where 课程编号={$_GET['kid']}";
$result = mysqli_query($conn, $sql);

if( $result ){
	echo "<script>alert('数据删除成功');</script>";
	//Refresh: 暂停时间
	header("Refresh:1;url=kecheng-list.php");
}else{
	echo "数据删除失败".mysqli_error($conn);
}
//关闭数据连接
mysqli_close( $conn );
?>