<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<div class="span6 offset3">
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'login-form',
    'htmlOptions'=>array('class'=>'well'),
));
echo $form->errorSummary($model);
?>

<h1>Login</h1>
<?php 
/*
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
));
*/

?>

<?php echo $form->textFieldRow($model, 'username', array('class'=>'span3')); ?>
<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3')); ?>
<?php echo $form->checkboxRow($model, 'rememberMe'); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Login')); ?>

<?php $this->endWidget(); ?>
</div><!-- form -->
<div class="span3">
<?PHP
$content="
<ul>
<li>demo/demo</li>
<li>admin/admin</li>
</ul>";
    $this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'Users are',
    'headerIcon' => 'icon-user',
    'content' => $content,
    ));
?>
</div>