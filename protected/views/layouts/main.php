<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php Yii::app()->bootstrap->register(); ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div class="container">
	<div class="row">
			<div class="span12" id="mainmenu">
				<?php 
				$this->widget('bootstrap.widgets.TbNavbar', array(
					//'fixed'=>false,
					'items'=>array(
						array(
							'class'=>'bootstrap.widgets.TbMenu',
							'items'=>array(
								array('label'=>'Home', 'icon'=>'home', 'url'=>array('/site/index')),
								array('label'=>'Data', 'icon'=>'th-list', 'url'=>array('/data/index')),
								array('label'=>'Graph', 'icon'=>'time', 'url'=>array('/data/graph')),
								/*array('label'=>'Login', 'icon'=>'lock','url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
								array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)*/
							),
						),
					),
				)); ?>
			</div><!-- mainmenu -->
	</div>

<div class="row" style="padding-top:45px;">	
<?php
	$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'htmlOptions'=>array('class'=>'pull-right'),
	'stacked'=>false, // whether this is a stacked menu
    'items'=>$this->menu,
));
echo '</div><div class="row">';
echo $content;
echo '</div><div class="row">';
	$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'htmlOptions'=>array('class'=>'pull-right'),
	'stacked'=>false, // whether this is a stacked menu
    'items'=>$this->menu,
));
?>
</div>

</div>
</div><!-- page -->
</body>
</html>
