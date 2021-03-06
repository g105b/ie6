<?php if(isset($_GET["iurl"])) {
require("Proxy.php");
exit;
}?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>IE6 Simulator!</title>
	<meta name="description" content="" />

	<link rel="stylesheet" href="/Style.css" />
</head>
<body>
	
<div id="ie6-window" class="block">
	<div id="ie6-titlebar">
		<span>Microsoft Internet Explorer</span>
		<div id="ie6-titlebar-buttons">
			<button class="block">&#95;</button>
			<button class="block">&#x29C9;</button>
			<button class="block">&#x274C;</button>
		</div>
	</div>
	<menu type="toolbar" id="ie6-toolbar-menu" class="toolbar">
		<li>
			<label>File</label>
		</li>
		<li>
			<label>Edit</label>
		</li>
		<li>
			<label>View</label>
		</li>
		<li>
			<label>Favourites</label>
		</li>
		<li>
			<label>Tools</label>
		</li>
		<li>
			<label>Help</label>
		</li>
	</menu>
	<menu id="ie6-action-menu" class="toolbar">
		<li>
			<button>Back</button>
		</li>
		<li>
			<button>Forward</button>
		</li>
		<li>
			<button>Stop</button>
		</li>
		<li>
			<button>Refresh</button>
		</li>
		<li>
			<button>Home</button>
		</li>
		<li class="separator"></li>
		<li>
			<button>Search</button>
		</li>
		<li>
			<button>Favourites</button>
		</li>
		<li>
			<button>History</button>
		</li>
		<li class="separator"></li>
		<li>
			<button>Mail</button>
		</li>
		<li>
			<button>Print</button>
		</li>
	</menu>
	<form id="ie6-addressbar" class="toolbar" target="output">
		<label for="iurl">Address</label>
		<input name="iurl" id="iurl" value="" list="websites" autofocus />
		<button id="btn_go">Go</button>
	</form>

	<iframe src="/?iurl=http://google.com" frameborder="0" 
	id="output"></iframe>
</div>

<datalist id="websites">
	<option value="http://microsoft.com" />
	<option value="http://bing.com" />
</datalist>

<script src="/Script.js"></script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-48731152-1', 'g105b.com');
ga('send', 'pageview');
</script>

</body>
</html>