<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD
	<head>
		<meta charset="utf-8">
		<title> <?php $this->fetch('title') ?> </title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Avant">
		<meta name="author" content="The Red Team">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
		<!--[if lt IE 9]>
		<link rel="stylesheet" href="css/ie8.css">
		<script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
		<script type="text/javascript" src="/plugins/charts-flot/excanvas.min.js"></script>
		<![endif]-->

		<?php echo $this->Html->css(array(
		'bootstrap.min',
		'sb-admin2',
		'/font-awesome/css/font-awesome.min',
		'/plugins/form-daterangepicker/daterangepicker-bs3',
		'/plugins/fullcalendar/fullcalendar',
		'/plugins/form-markdown/css/bootstrap-markdown.min',
		'/plugins/codeprettifier/prettify',
		'/plugins/form-toggle/toggles')) ?>

		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<?php
		echo $this -> fetch('meta');
		echo $this -> fetch('css');
		?>
		
		<link rel="stylesheet" href="/css/styles.css?=121">
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>

		<link href='/demo/variations/default.css' rel='stylesheet' type='text/css' media='all' id='styleswitcher'>
		<link href='/demo/variations/default.css' rel='stylesheet' type='text/css' media='all' id='headerswitcher'>
	</head>

	<body>
		<?php if(AuthComponent::user()) { ?>
		<div id="wrapper">
		<?php } else { ?>
		<div id="">
		<?php } ?>

		<div id="page-container">
			<?php echo $this -> element('menu'); ?>
			<div id="page-content" style="<?php if(!AuthComponent::user()) { ?> margin-left: 0px; <?php }?>" >
				<div id='wrap'>
					<?php echo $this -> fetch('content'); ?>
				</div>
			</div>
		</div>

		<?php echo $this->Html->script(array('jquery', 'bootstrap.min', 'jquery.maskedinput.min', 'main')) ?>
		<?php echo $this -> fetch('script'); ?>
		<script type='text/javascript' src='/js/jqueryui-1.10.3.min.js'></script>
		<script type='text/javascript' src='/js/enquire.js'></script>
		<script type='text/javascript' src='/js/jquery.cookie.js'></script>
		<script type='text/javascript' src='/js/jquery.nicescroll.min.js'></script>
		<script type='text/javascript' src='/plugins/codeprettifier/prettify.js'></script>
		<script type='text/javascript' src='/plugins/easypiechart/jquery.easypiechart.min.js'></script>
		<script type='text/javascript' src='/plugins/sparklines/jquery.sparklines.min.js'></script>
		<script type='text/javascript' src='/plugins/form-toggle/toggle.min.js'></script>
		<script type='text/javascript' src='/plugins/fullcalendar/fullcalendar.min.js'></script>
		<script type='text/javascript' src='/plugins/form-daterangepicker/daterangepicker.min.js'></script>
		<script type='text/javascript' src='/plugins/form-daterangepicker/moment.min.js'></script>
		<script type='text/javascript' src='/plugins/charts-flot/jquery.flot.min.js'></script>
		<script type='text/javascript' src='/plugins/charts-flot/jquery.flot.resize.min.js'></script>
		<script type='text/javascript' src='/plugins/charts-flot/jquery.flot.orderBars.min.js'></script>
		<script type='text/javascript' src='/plugins/pulsate/jQuery.pulsate.min.js'></script>
		<script type='text/javascript' src='/demo/demo-index.js'></script>
		<script type='text/javascript' src='/js/placeholdr.js'></script>
		<script type='text/javascript' src='/js/application.js'></script>
		<script type='text/javascript' src='/demo/demo.js'></script>

	</body>
=======
<head>
	<meta charset="utf-8">
	<title>
		<?php $this->fetch('title') ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<?php echo $this->Html->css(array('bootstrap.min', 'sb-admin2', '/font-awesome/css/font-awesome.min', 'styles')) ?>

	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php
	echo $this->fetch('meta');
	echo $this->fetch('css');
	?>
</head>

<body>
<?php if(AuthComponent::user()) { ?>
	<div id="wrapper">
<?php } else { ?>
	<div id="">
<?php } ?>


	<?php
		echo $this->element('menu');
	?>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>
		</div>
	</div>


	<?php echo $this->Html->script(array('jquery', 'bootstrap.min', 'jquery.maskedinput.min', 'main')) ?>
	<?php echo $this->fetch('script'); ?>

</body>
>>>>>>> bcc68f043a4d7a3d010da4152340245418c42e5f
</html>
