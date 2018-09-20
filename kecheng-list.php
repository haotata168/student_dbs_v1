<?php include("head.php"); ?>
<?php 
include("conn.php");

//执行SQL语句
$sql = "select 课程编号,课程名,时间 from kecheng";
$result = mysqli_query($conn, $sql);

//关闭数据连接
mysqli_close( $conn );
?>
		<div class="sui-layout">
		  <div class="sidebar">
			<!--左菜单-->
			<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">课程列表</p>
			<table class="sui-table table-primary">
				<tr><th>课程编号</th><th>课程名</th><th>时间</th><th>操作</th></tr>
<?php 
//输出数据
if( mysqli_num_rows($result) > 0 ){
	while ( $row = mysqli_fetch_assoc($result) ) {
		echo "<tr>
		<td>{$row['课程编号']}</td>
		<td>{$row['课程名']}</td>
		<td>{$row['时间']}</td>
		<td>
<a class='sui-btn btn-small btn-warning' href='kecheng-update.php?kid={$row['课程编号']}'>修改</a>&nbsp;&nbsp;
<a class='sui-btn btn-small btn-danger' href='kecheng-del.php?kid={$row['课程编号']}'>删除</a></td>
		</tr>";
	}
}else{
	echo "没有记录";
}
?>
			</table>	
		  </div>
		</div>		
<?php include("foot.php"); ?>