<ul class="breadcrumb">
	<li><a href="<?php echo getURL(array('index')); ?>" class="glyphicons home"><i></i> <?php echo APP_NAME; ?></a></li>
	<li class="divider"></li>
	<li><?php echo $translate->_('photo_gallery'); ?></li>
</ul>
<div class="separator"></div>

<h3 class="glyphicons picture"><i></i> <?php echo $translate->_('photo_gallery'); ?></h3>
<div class="separator"></div>

<div class="well">
	<div class="row-fluid gallery">
		<ul>
			<?php for ($i=1; $i<=12; $i++): ?>
			<li class="span4">
				<span class="thumb view">
					<img src="<?php echo getURL(); ?>theme/images/gallery/rs/<?php echo $i; ?>.jpg" alt="Album" />
				</span>
				<span class="name"></span>
			</li>
			<?php endfor; ?>
		</ul>
	</div>
</div>