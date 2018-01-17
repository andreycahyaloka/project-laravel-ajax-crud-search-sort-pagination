<style>
/* font size */
	html {
		font-size: 100%;
/* footer */
		position: relative;
		min-height: 100%;
	}

/* body */
	body {
		/* background: url(/images/bg_2880.jpg); */
		/* background-color: #d1c4e9; */
		background: linear-gradient(rgba(209,196,233, 0.7), rgba(209,196,233, 0.7)),
			url(/storage/images/bg_2880.jpg);
		background-repeat: repeat;
		background-attachment: fixed;
		background-position: top center;
		background-size: cover;
/* footer */
		margin-bottom: 90px;
	}

/* footer */
	footer {
		position: absolute;
		bottom: 0;
		width: 100%;
		/* Set the fixed height of the footer here */
		height: 90px;
		/*background: #000000;*/
	}
	.footer-bottom {
		/* background: #212121; */
		background: rgba(245,245,245, 0.9);
		height: 90px;
		color: #000000;
	}
	.footer-bottom p {
		margin: 5px 0;
	}

/*navbar*/
	.navbar {
		/* z-index: 5000; */
		/* opacity: 0.75; */
	}

/*sidenav*/
	.sidenav {
		height: 100%; /* 100% Full-height */
		width: 0; /* 0 width - change this with JavaScript */
		position: fixed; /* Stay in place */
		z-index: 5001; /* Stay on top */
		top: 0;
		left: 0;
		background-color: #212121; /* Black */
		overflow-x: hidden; /* Disable horizontal scroll */
		padding-top: 45px; /* Place content 60px from the top */
		transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
	}
	.sidenav hr {
		border-color: #9e9e9e;
		margin: 10px 18px 10px 18px;
		padding: 0px;
	}
	/* The navigation menu links */
	.sidenav .sidenav-a {
		margin: 0px 5px 0px 5px;
		padding: 5px 5px 5px 18px; /* (top,right,bottom,left) */
		text-decoration: none;
		font-size: 16px;
		color: #9e9e9e;
		display: block;
		transition: 0.3s
	}
	/* When you mouse over the navigation links, change their color */
	.sidenav .sidenav-a:hover, .sidenav .sidenav-a.active, .offcanvas .sidenav-a:focus {
		color: #fafafa;
		background: #424242;
	}
	/* activated sidebar-a link */
	/* .sidenav .sidenav-a.active {
		color: #fafafa;
		background: #424242;
	} */
	.sidenav .sidenav-close-a:hover, .offcanvas .sidenav-close-a:focus {
		background: #212121;
	}
	/* Position and style the close button (top right corner) */
	.sidenav .closebtn {
		position: absolute;
		top: 0;
		right: 0px;
		font-size: 30px;
		padding: 5px 18px 5px 18px;
	}
	/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
	@media screen and (max-height: 450px) {
		.sidenav {padding-top: 15px;}
		.sidenav .sidenav-a {font-size: 16px;}
	}
	/*side nav background*/
	.sidenavBG {
		height: 100%;
		width: 0;
		position: fixed;
		z-index: 5000;
		top: 0;
		left:0;
		background-color: rgba(0,0,0, 1);
		overflow-y: auto;
		overflow-x: hidden;
		text-align: center;
		opacity:0;
		transition: opacity 1s;
	}

/*button go to top*/
	#btnGoToTop {
		display: none;
		position: fixed;
		bottom: 25px;
		right: 5px;
		z-index: 5000;
		opacity: 0.9;
	}

/* demo pagination */
	.pagination {
		justify-content: center;
		/* margin-top: 10px; */
		/* margin-bottom: 10px; */
	}
</style>