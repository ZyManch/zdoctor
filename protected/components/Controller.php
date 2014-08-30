<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

	public $menu=array();

	public $breadcrumbs=array();

    public $onlyRegistered = false;

    public function init() {
        parent::init();
        if ($this->onlyRegistered && Yii::app()->user->isGuest) {
            $this->redirect(array('site/login'));
        }
        Yii::app()->bootstrap->register();
        $user = Yii::app()->user;
        $isGuest = $user->getIsGuest();
        $this->menu = array(
            array('label'=>'Главная', 'url'=>array('site/index')),
            array('label'=>'Операционная', 'url'=>array('operating/index'),'visible' => !$isGuest),
            array('label'=>'Аккаунт'.(!$isGuest ? ' ('.Yii::app()->user->name.')':''), 'items' => array(
                array('label'=>'Выход', 'url'=>array('site/logout'), 'visible'=>!$isGuest),
                array('label'=>'Войти', 'url'=>array('site/login'), 'visible'=>$isGuest),
                array('label'=>'Регистрация', 'url'=>array('site/register'), 'visible'=>$isGuest),
            ))
        );
    }

}