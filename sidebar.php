		<div id="wrapper">
		<div id="menu" class="hidden-phone">
			<div id="menuInner">
				<div id="search">
					<input type="text" placeholder="Quick search ..." />
					<button class="glyphicons search"><i></i></button>
				</div>
				<ul>
					<li class="heading"><span>Menu</span></li>
					<li class="glyphicons home active"><a href="index.html?lang=en"><i></i><span>Dashboard</span></a></li>
<?php
echo "<div id='main' style='text-align: center;font-weight: 700;'>
Welcome, $loggedInUser->displayname </div>";
?>

					<li class="glyphicons cogwheels"><a href="account.php?lang=en"><i></i><span>Companies</span></a></li>
					<li class="glyphicons charts"><a href="stocks.php?lang=en"><i></i><span>Stocks</span></a></li>
					<li class="hasSubmenu">
						<a data-toggle="collapse" class="glyphicons show_thumbnails_with_lines" href="#menu_forms"><i></i><span>Settings</span></a>
						<ul class="collapse" id="menu_forms">
							<li class=""><a href="user.php?lang=en"><span>My Account</span></a></li>
							<li class=""><a href="pay.php?lang=en"><span>Card Details</span></a></li>
						</ul>
					</li>
				</ul>
				<ul>
					<li class="heading"><span>Latest News</span></li>
					<li class="glyphicons coins"><a href="blog.php?lang=en"><i></i><span>Blog</span></a></li>
					<li class="glyphicons sort"><a href="pages.html?lang=en"><i></i><span>Main Site</span></a></li>
					<li class="glyphicons picture"><a href="gallery.html?lang=en"><i></i><span>Photo Gallery</span></a></li>
					<li class="glyphicons adress_book"><a href="bookings.html?lang=en"><i></i><span>Stocks and Prices</span></a></li>
				</ul>
			</div>
		</div>

