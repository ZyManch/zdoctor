<?php
$this->breadcrumbs=array(
	'Parts',
);

$this->menu=array(
	array('label'=>'Create Part','url'=>array('create')),
	array('label'=>'Manage Part','url'=>array('admin')),
);
?>

<h1>Parts</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
