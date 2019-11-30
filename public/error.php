<html>
<head>
<title>Oops! System Encountered some error(s)</title>
<style type="text/css">
* {
	margin: 0;
	padding: 0;
}
.wrapper {
	padding: 0;
	margin: 0 auto;
	width: 600px;

	border-radius: 5px;
	margin-top: 15%;
	padding: 10px;
	text-shadow: 1px 1px 1px rgba(78, 78, 80, 1);
	-webkit-box-shadow: 2px 5px 7px rgba(50, 50, 50, 0.75);
	-moz-box-shadow: 2px 5px 7px rgba(50, 50, 50, 0.75);
	box-shadow: 2px 5px 7px rgba(50, 50, 50, 0.75);
	font-family: Consolas, "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", Monaco, "Courier New", monospace;
	background: rgb(217, 217, 219);
background: -moz-linear-gradient(89deg, rgb(217, 217, 219) 30%, rgb(152, 161, 163) 100%);
background: -webkit-linear-gradient(89deg, rgb(217, 217, 219) 30%, rgb(152, 161, 163) 100%);
background: -o-linear-gradient(89deg, rgb(217, 217, 219) 30%, rgb(152, 161, 163) 100%);
background: -ms-linear-gradient(89deg, rgb(217, 217, 219) 30%, rgb(152, 161, 163) 100%);
background: linear-gradient(179deg, rgb(217, 217, 219) 30%, rgb(152, 161, 163) 100%);

}
.header {
	text-align: center;
	font-weight: bold;
	border-bottom: 2px solid #575757;
	padding-top: 10px;
}
.desc{
	border:2px dashed #575757 ;
	margin-top:10px;
	padding:5px;
	color:red;
	text-align:justify;
}
</style>
</head>
<body class="login">
<?php
$header='<div class="header">Error #'.@$_GET['error'].' </div>';
if(@$_GET['error']=='2002')
{
	echo '<div class="wrapper">'.$header.'
  <div class="desc">System is unable to interect with SQL server. Please Check SQL Server.</div>
</div>';
	
}
elseif(@$_GET['error']=='1001')
{
	echo '<div class="wrapper">'.$header.'
  <div class="desc">System is unable to interect with SQL server. Please Check SQL Server.</div>
</div>';
	
}
elseif(@$_GET['error']=='1001')
{
	echo '<div class="wrapper">'.$header.'
  <div class="desc">System is unable to interect with Database server. Please Check Database.</div>
</div>';
}
elseif(@$_GET['error']=='10101010')
{
	echo '<div class="wrapper">
  <div class="desc">You have reach maximum login attemp. Your System block for 24 hrs.</div>
</div>';
}
?>

</body>
</html>