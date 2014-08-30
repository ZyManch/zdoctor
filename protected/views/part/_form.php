<?php
/**
 * @var Part $model
 * @var TbActiveForm $form
 * @var int $destination_id
 * @var int $source_id
 */
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'part-form',
    'type' => 'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownListRow($model,'type',array('full' => 'Целый','part' => 'Часть')); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'angle',array('class'=>'span2')); ?>

	<?php echo $form->textFieldRow($model,'image',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'width',array('class'=>'span3')); ?>

	<?php echo $form->textFieldRow($model,'height',array('class'=>'span3')); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'url' => array('operating/index','source_id'=>$source_id,'destination_id' => $destination_id),
            'label'=>'Отмена',
        )); ?>
	</div>

<?php $this->endWidget(); ?>
