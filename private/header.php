<!------------------------------------------------------------------------>
<!-- Opensource Github: https://github.com/arlextra/myinstants-sinusbot -->
<!-- 					By ArLextra https://arlextra.fr/ 				-->
<!doctype html>
<html>
    <head>
    <link rel="stylesheet" href="public/bootstrap.min.css?v=3">
    <link rel="stylesheet" href="public/style.css?v=3">
    <script src="public/jquery.min.js"></script>
    <script src="public/bootstrap.min.js"></script>
    <script src="public/randomColor.js"></script>
    <meta charset="utf-8">
    <title>Sinusbot | Myinstants</title>
    <script type="text/javascript">
	//<!--function for RAMDOM button color-->
	function button_set_color()
	{
		var style_construct = "color:rgb(51, 51, 51);height:34px;margin-top:8px;margin-left:15px;padding-top:6px;background:-moz-linear-gradient(left, "+randomColor({luminosity:'light'})+" 0%,"+randomColor({luminosity: 'light'})+" 50%,"+randomColor({luminosity: 'light'})+" 100%);background:-webkit-linear-gradient(left, "+randomColor({luminosity:'light'})+" 0%,"+randomColor({luminosity: 'light'})+" 50%,"+randomColor({luminosity: 'light'})+" 100%);background:linear-gradient(to right, "+randomColor({luminosity:'light'})+" 0%,"+randomColor({luminosity: 'light'})+" 50%,"+randomColor({luminosity: 'light'})+" 100%);";
		$("#rande").attr("style", style_construct);
		setTimeout(button_set_color,500);
	}
	
	//<!--function for slider-->
	function on_slide_update(number)
	{
		$("#htmlvolumevalue").html("Volume: " + number);
	}

	<!--function for favori-->
	function etoileclick(idspan, url, name, color)
	{
		if(document.getElementById(idspan).className == "etoile-gris glyphicon glyphicon-star"){
			$.get("?page=action&action=add&url=" + url + "&name=" + name + "&color=" + encodeURIComponent(color));
			document.getElementById(idspan).className = "etoile-jaune glyphicon glyphicon-star";
		} else {
			$.get("?page=action&action=delete&url=" + url);
			document.getElementById(idspan).className = "etoile-gris glyphicon glyphicon-star";
		}
	};
	
	//<!--function for sinusbot api-->
	function setvolume(volumepercent)
	{
		$.get("?page=sinusbot&action=volume&value=" + volumepercent);
	};
	function play(url)
	{
		$.get("?page=sinusbot&action=play&url=" + "http://www.myinstants.com" + url);
	};
	function stopm()
	{
		$.get("?page=sinusbot&action=stop");
	};
	function randomm()
	{
		$.get("?page=sinusbot&action=random");
	};
	
	//<!--Music play-->
	function playlocal(url) {
            $("#mp3_source").attr("src", "http://www.myinstants.com" + url);
            $("#player")[0].load();
            $("#player")[0].play();
    }
	
	//<!--function for live search-->
	var globalTimeout = null;  
	function livesearch(valuesearch)
	{
	if(valuesearch == ""){
		$("#instants_container").html(button_local_save);
	} else {
		if (globalTimeout != null) {
    		clearTimeout(globalTimeout);
  		}
  		globalTimeout = setTimeout(function() {
    		globalTimeout = null;  
    		$.get("?page=search&r=" + valuesearch, function(data){
  				$("#instants_container").html(data);
			});
  		}, 400);  
	}
	};
	
	//<!--Page loaded-->
	$(document).ready(function(){
		$('.iframelink').height($(window).height() - 50);
		button_set_color();
		$("#htmlvolumevalue").html("Volume: " + $("#inputvolumevalue").val());
		if($('.navbar').height() != 50){
			$('#instants_container').attr("style", "margin-top:" + ($('.navbar').height() + 14) + "px;");
		};
		button_local_save = $("#instants_container").html();
	});
    </script>
    </head>
    <body>
 		<audio id="player">
		<source id="mp3_source" type="audio/mpeg">
		</audio>
<!--------------------------------->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
    <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="?"><b>Sinusbot | Myinstants</b></a> </div>
    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
          <ul class="nav navbar-nav">
        <li><a class="btn btn-default" id="echo" onclick="stopm()" style="height:34px;margin-top:8px;margin-left:15px;padding-top:6px;">Stop</a></li>
        <li><a class="btn btn-default" id="rande" onclick="randomm()" style="color:#333;height:34px;margin-top:8px;margin-left:15px;padding-top:6px;">RANDOM</a></li>
        <li><a class="btn btn-default" href="?page=upload" style="height:34px;margin-top:8px;margin-left:15px;padding-top:6px;">Upload</a></li>
        <li><a class="btn btn-default" href="?page=favori" style="height:34px;margin-top:8px;margin-left:15px;padding-top:6.5px;"><span class="glyphicon glyphicon-star" style="color: #E7711B !important;"></span></a></li>
      </ul>
          <form class="navbar-header navbar-form navbar-left" role="search" method="get" action="">
        <input type="hidden" name="page" value="search">
        <div class="input-group">
              <input type="text" class="form-control" placeholder="Live search" name="r" onkeyup="livesearch(this.value)" style="border-radius: 4px;">
        </div>
      </form>
      
          <div class="navbar-right"><p id="htmlvolumevalue" style="float: left;margin-top: 15px;color:#666;">Volume:</p>
        <input id="inputvolumevalue" type="range" value="<?php echo $sinusbot->GetInstanceStatus()['volume']; ?>" name="inputvolumevalue" max="100" min="0" step="1" onchange="setvolume(this.value)" oninput="on_slide_update(this.value)" style="width: 200px;margin-top: 14px;margin-left: 10px;margin-right: 0px;float: left;">
        <?php if ($_SESSION['deco']==true): ?>
        <a class="btn btn-default navbar-right" href="?page=deco" style="margin-top:8px;margin-left: 12px;padding: 6px;margin-right: 0px;">X</a><?php endif; ?>
        <a id="gotoiframepage" class="btn btn-default navbar-right" href="?page=iframe" style="height:34px;margin-top:8px;margin-left:15px;padding-top:6.5px;margin-right: 0px;"><span class="glyphicon glyphicon-th" aria-hidden="true"></span></a></div>
        </div>
  </div>
      </div>
    </nav>
