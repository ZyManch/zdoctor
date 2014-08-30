<?php
/**
 * @var $model
 * @var $destination_id
 * @var $source_id
 */
$this->breadcrumbs=array(
	'Parts'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Part','url'=>array('index')),
	array('label'=>'Create Part','url'=>array('create')),
	array('label'=>'View Part','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Part','url'=>array('admin')),
);
?>

<h1>Update Part <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model,'destination_id' => $destination_id,'source_id' => $source_id)); ?>