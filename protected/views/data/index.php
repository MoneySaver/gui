<?php
$this->breadcrumbs=array(
	'Datas'=>array('index'),
	'Manage',
);
?>

<h1>Manage Datas</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'data-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'sensor',
		'value',
		'created_at',
),
)); ?>
