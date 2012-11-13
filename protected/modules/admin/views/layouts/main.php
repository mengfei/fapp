<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo $this->module->assetsUrl; ?>/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->module->assetsUrl; ?>/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->module->assetsUrl; ?>/css/style.css" />
	<script type="text/javascript" src="<?php echo $this->module->assetsUrl; ?>/js/jquery.1.8.2.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->module->assetsUrl; ?>/js/bootstrap.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div id="container">
	<div id="header">
		<?php include(dirname(__FILE__)."/layout_admin_head.php");?>
	</div>
	<!-- header -->
	 <div id="breadcrumbs" class="row">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	</div>
	<div id="content">
		<div id="left">
		<?php include(dirname(__FILE__)."/layout_admin_left.php");?>
		</div>
		<div id="right">
			<?php echo $content; ?>
		</div>
		<div class="clear"></div>
	</div>
	

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
