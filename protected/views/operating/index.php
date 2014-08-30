<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 30.08.14
 * Time: 10:46
 * @var Part[] $fullParts
 * @var Part $destination
 * @var Part $source
 */
$script = Yii::app()->clientScript;
$script->registerScript(
    'data',
    'window.source = '.json_encode($source->asArray()).';
    window.destination = '.json_encode($destination->asArray()).';',
    CClientScript::POS_HEAD
);
$script->registerScriptFile('/js/jQueryRotateCompressed.js');
$script->registerScriptFile('/js/doctor.js');
$script->registerCssFile('/css/doctor.css');
?>
<div class="row-fluid">
    <div class="block non-border-left span6">
        <h3>Собиратель</h3>
        <div class="text-right">
            <div class="btn-group">
                <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                    Загрузить
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><?php echo CHtml::link('Создать Новый',array('part/create','destination_id' => $destination->id,'source_id' => $source->id));?></li>
                    <li class="divider"></li>
                    <?php foreach ($fullParts as $part):?>
                        <li<?php if ($part->id == $destination->id):?> class="active"<?php endif;?>>
                            <?php echo CHtml::link($part->title,array_merge(array('operating/index'),$_GET,array('destination_id' => $part->id)));?>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
        <div class="work-area" id="constructor">

        </div>
    </div>

    <div class="block non-border-right  span6">
        <h3>Расщепитель</h3>
        <div class="text-left">
            <div class="btn-group">
                <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                    Загрузить
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <?php foreach ($fullParts as $part):?>
                        <li<?php if ($part->id == $source->id):?> class="active"<?php endif;?>>
                            <?php echo CHtml::link($part->title,array_merge(array('operating/index'),$_GET,array('source_id' => $part->id)));?>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
        <div class="work-area" id="destructor">

        </div>
    </div>
</div>