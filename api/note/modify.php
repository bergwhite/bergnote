<?php 

include '../../conn.php';  // 引入数据库连接页面
include '../user/login_check.php';  // 引入登陆检查页面，未登录不执行sql语句

$cookie_userId = (int)$_COOKIE["userId"];  // 获取用户ID

// echo gettype($cookie_userId);

/* 文章信息

$tag = $_POST["tag"];
$title = $_POST["title"];
$content = $_POST["content"];
$date = $_POST["date"];
$noteId = $_POST["noteId"];

 */

/* 前端界面未完成，暂时使用模拟信息*/

$tag = "qqqqqqqqqqqqqqqqq";
$title = "zzzzzzzzzzz";
$content = "通sdgsdgds后台添加进来的";
date_default_timezone_set("UTC");
$date = date("Y-m-d");
$noteId = 6;

/* 执行添加语句 */

$sql = "update note SET note_tag = '$tag',note_title = '$title',note_content = '$content',note_date = '$date' where user_id = $cookie_userId and note_id = $noteId";
$result = mysql_query($sql);

/* 返回JSON状态*/

if(mysql_affected_rows()){
	$resultJSON = array("modifyState"=>"yes");
}
else {
	$resultJSON = array("modifyState"=>"no");
}
echo json_encode($resultJSON);

mysql_close($conn);  // 断开数据库连接

 ?>