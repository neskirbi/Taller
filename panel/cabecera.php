<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
	
	<a href="javascript: void(0)" aria-label="Open Menu" id="nav-hamburger-menu" onclick="OpenClosNav();" >
	    <i class="fa fa-bars"></i>
	</a>
	<div class="card-h">			
		<div class="card-h-foto">
			<img class="h-img"  src="<?php echo $foto; ?>" >					
		</div>
		<div class="card-h-nombre">
			<span class="h-name"><?php echo $user; ?></span>					
		</div>
	</div>
	
</body>
</html>