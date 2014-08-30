<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'type',array('class'=>'span5','maxlength'=>4)); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'angle',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'image',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'width',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'height',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>7)); ?>

	<?php echo $form->textFieldRow($model,'changed',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
