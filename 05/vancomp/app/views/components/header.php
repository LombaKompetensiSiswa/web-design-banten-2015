<html>
<head>
<title>Van Comp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="http://localhost/vancomp/resources/css/grid.css"> 
    <link rel="stylesheet" type="text/css" href="http://localhost/vancomp/resources/css/style.css"> 
</head>
<body>
<div class="modal" id="login">
	<div class="modal-head">LOGIN</div>
    <div class="modal-close">X</div>
    <div class="modal-body">
    <form method="POST" >
    	<div id="login-alert" class="alert" style="display:none;"> Login </div>
    	<input type="text" id="username" class="input full-width" placeholder="username" required>
        <input type="password" id="password" class="input full-width"  placeholder="Password" required>
        <button class="btn full-width" id="login-btn" type="submit">LOG IN</button>
    </form>
    </div>
</div>
    <div class="grid border-top">
        <div class="container">
            <div class="col-12 no-padd">
                <div class="header">
                    <div class="login-grp">
                    	<?php if(user::is_login() == true): ?>
                        	<a href="<?php echo base_url()?>user/logout" >Logout</a>
                        <?php else:?>
                            <a href="#" class="login-btn modal-btn" data-target="login">Login</a>
                            <a href="<?php echo base_url();?>/user/register" class="reg-btn">Register</a>
                        <?php endif; ?>
                    </div> 
                    <div class="col-4">
                        <div class="logo">
                            <a href="<?php echo base_url(); ?>home/index"><img src="http://localhost/vancomp/resources/images/logo.png"></a>
                        </div>
                    </div>
                     <div class="col-4 right">
                     <?php /*
                        <nav class="menu">
                            <ul>
                           		<li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
					*/?>
                </div>
             </div>
        </div>
    </div>
    <div class="grid container">
    	<div class="col-12">
        	<div class="navbar">
                    <div class="col-6">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                <div class="col-4 right">
                <form class="search-form" method="POST" action="<?php echo base_url()?>/home/search">
                    <input type="text" class="input-search" name="search" placeholder="Cari Barang Disini..">
                    <button class="btn-search" type="submit">Search</button>
            	</form>	
                </div>
            </div>
        </div>
    </div>
	<div class="grid container content">
    	<div class="col-3">
        	<div class="sidebar">