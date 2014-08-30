<?php
$this->breadcrumbs=array(
	'Parts'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Part','url'=>array('index')),
	array('label'=>'Create Part','url'=>array('create')),
	array('label'=>'Update Part','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Part','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Part','url'=>array('admin')),
);
?>
<div class="row-fluid">
    <div class="block non-border-left span6">
        <h1>View Part #<?php echo $model->id; ?></h1>

        <?php $this->widget('bootstrap.widgets.TbDetailView',array(
            'data'=>$model,
            'attributes'=>array(
                'id',
                'type',
                'title',
                'angle',
                'image',
                'width',
                'height',
                'status',
                'changed',
            ),
        )); ?>
    </div>
    <div class="block non-border-right span6 text-center">
        <img src="/part/image/<?php echo $model->id;?>" width="<?php echo $model->width;?>px" height="<?php echo $model->height;?>px">
    </div>
</div>