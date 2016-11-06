<html>
<head>
<link rel="stylesheet" href="public/bootstrap.min.css?v=3">
<link rel="stylesheet" href="public/style.css?v=3">
<script src="public/jquery.min.js"></script>
	<script type="text/javascript">
	function onloadediframe()
	{
		$("#iframe1").contents().find("#gotoiframepage").remove();
	}
	</script>
<title>Sinusbot | Myinstants</title>
</head>
<body>
<a class="btn btn-default" href="?" style="height: 32px;position: absolute;left: calc(50% - 20px);top: 1px;color: white;background-color: rgba(80, 80, 80, 0.7);height: 34px;padding-top: 7px;"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></a>
<iframe id="iframe1" onload="onloadediframe()" class="" scrolling="yes" allowfullscreen="no" frameborder="0" width="50%" src="?" style="
    float: left;
    height: 100%;
"></iframe>
<iframe id="iframe2" class="" scrolling="yes" allowfullscreen="no" frameborder="0" width="50%" src="<?php echo $link_to_sinusbot_panel; ?>" style="
    float: right;
    height: 100%;
"></iframe>
