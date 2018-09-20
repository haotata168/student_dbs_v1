<?php include("head.php"); ?>
<?php 
$kid = empty( $_GET["kid"] )?"null":$_GET["kid"];
if($kid == "null"){
	die("请选择要修改的记录");
}else{

	include("conn.php");
	//执行SQL语句
	$sql = "select 课程编号,课程名,时间 from kecheng where 课程编号={$kid}";
	$result = mysqli_query($conn, $sql);

	//输出数据
	if( mysqli_num_rows($result) > 0 ){
		//将查询结果转换成数组
		$row = mysqli_fetch_assoc($result);
	}else{
		echo "找不到这条记录";
	}

	//关闭数据连接
	mysqli_close( $conn );	
}

?>
		<div class="sui-layout">
		  <div class="sidebar">
			<!--左菜单-->
			<?php include("leftmenu.php"); ?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">课程修改</p>
			<form id="form1" action="kecheng-save.php" method="post" class="sui-form form-horizontal sui-validate">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">课程名：</label>
			    <div class="controls">
			   <!--增加一个隐藏的input，用来区分是新增数据还是修改数据-->
			    <input type="hidden" name="action" value="update">	
			     <!--增加一个隐藏的input，保存课程编号-->
			    <input type="hidden" name="kid" value="<?php echo $row['课程编号'] ?>">
			      <input type="text" value="<?php echo $row['课程名'] ?>" id="kcName" name="kcName" class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">课程时间：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['时间'] ?>"  id="kcTime" name="kcTime" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入课程时间">
			    </div>
			  </div>	
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>	  
			</form>
		  </div>
		</div>		
<?php include("foot.php"); ?>