<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 06.03.2015
 * Time: 10:34
 * @var $this Controller
 * @var $part Part
 * @var $main_part Part
 */
?>
<li>
    <?php if ($part->id != $main_part->id):?>
        <?php echo CHtml::link(CHtml::encode($part->title),array('part/view','id'=>$part->id));?>
    <?php else:?>
        <?php echo CHtml::encode($part->title);?>
    <?php endif;?>

    <?php if ($part->childPartLinks):?>
        <ul>
        <?php foreach ($part->childPartLinks as $childPart):?>
            <?php $this->renderPartial('_tree',array('part'=>$childPart->childPart,'main_part'=>$main_part));?>
        <?php endforeach;?>
        </ul>
    <?php endif;?>
</li>