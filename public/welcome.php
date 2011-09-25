<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitionl.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Outglow Welcome Screen</title>
		<link rel="stylesheet" type="text/css" href="v/default.css" />
	</head>
	<body>
		<div class="header">
			<div id="logo">
				<img src="v/i/logo.png" alt="Outglow Logo" />
			</div>
		</div>
		<div class="info-bar">
			<div class="f" style="margin-top: 15px;margin-left: 20px;">
				Version: <span>Miranda 1.0</span>
			</div>
		</div>
		<div class="content">
			<h2>Getting Started:</h2>
			<h3>Basic Structure</h3>
			<h4>Bridges, oModules, Views</h4>
			<p>
				These are the 3 main concepts of the Outglow framework that build up your application. As the Outglow framework follows an MVC type pattern, you could alomst think of Bridges as being the controllers, the oModules being models, and the Views, well, as views. There are some differences, but for now that explains it.
			</p>
			<p>
				There is no point in trying to explain too much here, so providing you have a basic knowledge of Object Orientated PHP, and MVC, you might aswell get started actually writing code.
			</p>
			<p>
				<span>/config/start/settings.php</span>
			</p>
			<p>
				<textarea class="code" style="height:400px;">&lt;?php

	/*
		SITE URL IS NEEDED FOR WEB LINKS
		MAKE SURE YOU USE A TRAILING SLASH
		E.G 'http://localhost/myapp/'
	*/
	
	define("ROOT_PATH", "http://localhost/outglow/_current-BETA/");
	
	define("DEVELOPMENT_MODE", "on");

	/*
		MAKE SURE YOU CHANGE THE ROUTE VAR
		TO THE NAME OF THE BRIDGE YOU WANT
		YOUR APPLICATION TO START ON
		
		TO DO THIS, UNCOMMENT, THEN CHANGE
		THE NAME 'welcome', TO THE NAME OF
		YOUR BRIDGE
	*/

	##$route = "welcome";		//THIS IS VITAL
	
?&gt;</textarea>
			</p>
			<p>
				First, you are going to need to set a route. Currently it is set to 'welcome', so you can leave this, or change it. For this quick guide, we are going to leave it how it is, but <u>uncomment</u> it. Next, we need to create a new file.
			</p>
			<p>
				<span>/app/bridges/welcome.php</span>
			</p>
			<p>
				<textarea class="code" style="height: 180px;">&lt;?php
	class Welcome extends Bridge
	{
		function index()
		{
			global $render;
			
			$render->TEXT("Hello");
		}
	}
?&gt;</textarea>
			</p>
			<p>
				What is important to note here, is that throughout making an app using the Outglow framework, you can just use <u>any</u> PHP code you already know, and you are not restricetd to use <u>only</u> what the Outglow framework has to offer.
			</p>
			<p>
				More quick starts and documentation, coming soon!
			</p>
		</div>
	</body>
</html>