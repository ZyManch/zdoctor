<?php
/**
 * @var $model
 * @var $destination_id
 * @var $source_id
 */
$this->breadcrumbs=array(
	'Parts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Part','url'=>array('index')),
	array('label'=>'Manage Part','url'=>array('admin')),
);
?>

<h1>Create Part</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'destination_id' => $destination_id,'source_id' => $source_id)); ?>