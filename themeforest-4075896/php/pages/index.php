<ul class="breadcrumb">
	<li><a href="<?php echo getURL(array('index')); ?>" class="glyphicons home"><i></i> <?php echo APP_NAME; ?></a></li>
	<li class="divider"></li>
	<li><?php echo $translate->_('dashboard'); ?></li>
</ul>
<div class="separator"></div>

<div class="heading-buttons">
	<h3 class="glyphicons display"><i></i> <?php echo $translate->_('dashboard'); ?></h3>
	<div class="buttons pull-right">
		<a href="" class="btn btn-default btn-icon glyphicons edit"><i></i> <?php echo $translate->_('edit'); ?></a>
	</div>
	<div class="clearfix" style="clear: both;"></div>
</div>
<div class="separator"></div>

<div class="menubar">
	<ul>
		<li><a href="">Button 1</a></li>
		<li><a href="">Button 2</a></li>
		<li class="divider"></li>
		<li><a href="">Export</a></li>
	</ul>
</div>

<div class="innerLR">
	<div class="row-fluid">
		<div class="span4">
			<div class="widget widget-4">
				<div class="widget-head">
					<h4 class="heading"><?php echo $translate->_('activity'); ?></h4>
					<a href="" class="details pull-right">view all</a>
				</div>
				<div class="widget-body list">
					<ul>
						<li>
							<span>Sales today</span>
							<span class="count">&euro;5,900</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="span8">
			<div class="row-fluid">
				<?php for ($i=1;$i<=3;$i++): ?>
				<div class="span4">
					<a href="" class="widget-stats">
						<span class="glyphicons user_add"><i></i></span>
						<span class="txt"><strong>20</strong>signups</span>
						<div class="clearfix"></div>
					</a>
				</div>
				<?php endfor; ?>
			</div>
		</div>
	</div>
</div>
<div class="separator bottom"></div>

<div class="widget widget-2 widget-tabs widget-tabs-2">
	<div class="widget-head">
		<ul>
			<li class="active"><a class="glyphicons cardio" href="#website-traffic-tab" data-toggle="tab"><i></i><?php echo $translate->_('website_traffic'); ?></a></li>
			<li><a class="glyphicons cardio" href="#website-traffic-tab2" data-toggle="tab"><i></i>Secondary Tab</a></li>
		</ul>
	</div>
	<div class="widget-body">
		<div class="tab-pane active" id="website-traffic-tab">
			<div class="btn-group separator bottom pull-right">
				<button id="websiteTraffic24Hours" class="btn btn-small btn-default">24 <?php echo $translate->_('hours'); ?></button>
				<button id="websiteTraffic7Days" class="btn btn-small btn-default">7 <?php echo $translate->_('days'); ?></button>
				<button id="websiteTraffic14Days" class="btn btn-small btn-default">14 <?php echo $translate->_('days'); ?></button>
				<button id="websiteTrafficClear" class="btn btn-small btn-default" disabled="disabled"><?php echo $translate->_('clear'); ?></button>
			</div>
			<div class="clearfix" style="clear: both;"></div>
			<div id="placeholder" style="height: 200px;"></div>
			<div id="overview" style="height: 40px;"></div>
		</div>
	</div>
</div>

<div class="innerLR">
	<div class="row-fluid">
		<div class="span6">
			<div class="widget widget-4">
				<div class="widget-head">
					<h4 class="heading"><?php echo $translate->_('overview'); ?></h4>
				</div>
				<div class="widget-body list">
					<ul>
						<li><span class="count">350,254 <span class="sparkline"></span></span> <?php echo $translate->_('visits'); ?></li>
						<li><span class="count">120,103 <span class="sparkline"></span></span> <?php echo $translate->_('visitors'); ?></li>
						<li><span class="count">5,156,392 <span class="sparkline"></span></span> <?php echo $translate->_('pageviews'); ?></li>
					</ul>
				</div>
			</div>
			<div class="widget widget-4">
				<div class="widget-head">
					<h4 class="heading"><?php echo $translate->_('interest'); ?></h4>
				</div>
				<div class="widget-body list">
					<ul>
						<li><span class="count">00:01:59 <span class="sparkline"></span></span> <?php echo $translate->_('avg_time'); ?></li>
						<li><span class="count">48% <span class="sparkline"></span></span> <?php echo $translate->_('returning'); ?></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="span6">
			<div class="widget widget-4">
				<div class="widget-head">
					<h4 class="heading"><?php echo $translate->_('traffic_sources'); ?></h4>
				</div>
				<div class="widget-body">
					<div id="pie" style="height: 220px;"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="well">
<div class="row-fluid">
	<div class="span12">
		<div class="widget widget-2 widget-tabs">
			<div class="widget-head">
				<ul>
					<li class="active"><a class="glyphicons coffe_cup" href="#dataTableSourcesTab" data-toggle="tab"><i></i><?php echo $translate->_('traffic_sources'); ?></a></li>
					<li><a class="glyphicons share_alt" href="#dataTableRefferingTab" data-toggle="tab"><i></i><?php echo $translate->_('referrals'); ?></a></li>
				</ul>
			</div>
			<div class="widget-body">
				<div class="tab-content">
					<div class="tab-pane active" id="dataTableSourcesTab">
						<div id="dataTableSources"></div>
					</div>
					<div class="tab-pane" id="dataTableRefferingTab">
						<div id="dataTableReffering"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- <a href="" class="btn btn-block btn-icon right btn-inverse glyphicons cardio" style="margin-bottom: 20px;"><i></i> Full Analytics</a> -->
	</div>
</div>
</div>

<h4 class="heading-arrow">Recent Activity</h4>
<div class="innerLR">
	<div class="widget-activity">
		<ul class="filters">
			<li>Filter by</li>
			<li class="glyphicons user_add"><i></i></li>
			<li class="glyphicons shopping_cart active"><i></i></li>
			<li class="glyphicons envelope"><i></i></li>
			<li class="glyphicons link"><i></i></li>
			<li class="glyphicons camera"><i></i></li>
		</ul>
		<div class="clearfix"></div>
		<ul class="activities">
			<?php for($i=1;$i<=3;$i++): ?>
			<li<?php if ($i == 1): ?> class="highlight"<?php endif; ?>>
				<span class="glyphicons activity-icon shopping_cart"><i></i></span>
				<a href="">Client name</a> bought 10 items worth of &euro;50 (<a href="">order #230<?php echo $i; ?></a>)
			</li>
			<?php endfor; ?>
		</ul>
	</div>
</div>
<div class="separator"></div>
<br/>

<div class="innerLR">
<div class="row-fluid">
	<div class="span6">
		<h4 class="glyphicons clock"><i></i> <?php echo $translate->_('activity'); ?></h4>
		<div class="separator"></div>
		<div class="btn-group btn-group-vertical block">
			<a class="btn btn-icon btn-default btn-block glyphicons group count"><i></i> <span>5,986</span><?php echo $translate->_('total_users'); ?></a>
			<a class="btn btn-icon btn-default btn-block glyphicons user_add count"><i></i> <span>98</span><?php echo $translate->_('new_users'); ?></a>
			<a class="btn btn-icon btn-default btn-block glyphicons shopping_cart count"><i></i> <span>305</span><?php echo $translate->_('products'); ?></a>
		</div>
	</div>
	<div class="span6">
		<div class="btn-group btn-group-vertical block">
			<a class="btn btn-icon btn-default btn-block glyphicons cargo count"><i></i> <span>687</span><?php echo $translate->_('total_orders'); ?></a>
			<a class="btn btn-icon btn-default btn-block glyphicons download count"><i></i> <span>15</span><?php echo $translate->_('pending_orders'); ?></a>
			<a class="btn btn-icon btn-default btn-block glyphicons download count"><i></i> <span>3</span><?php echo $translate->_('pending_delivery'); ?></a>
			<a class="btn btn-icon btn-primary btn-block glyphicons fire count"><i></i> <span>5</span><?php echo $translate->_('support'); ?></a>
		</div>
	</div>
</div>
</div>
<br/>