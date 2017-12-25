<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0);" class="closebtn sidenav-a sidenav-close-a" onclick="closeNav();">&times;</a>
	<hr />
	<a href="#" class="sidenav-a {{ Request::is('about') ? 'active' : '' }}">
		<i class="fa fa-list-alt fa-fw"></i>
		About
	</a>
	<a href="#" class="sidenav-a {{ Request::is('contact') ? 'active' : '' }}">
		<i class="fa fa-id-card fa-fw"></i>
		Contact
	</a>
	<hr />
</div>
<!--sidenav background-->
<div id="mySidenavBG" class="sidenavBG" onclick="closeNav();"></div>