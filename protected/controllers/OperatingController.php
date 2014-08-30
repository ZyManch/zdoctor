<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 30.08.14
 * Time: 10:45
 */
class OperatingController extends Controller {

    public $onlyRegistered = true;

    public function actionIndex($destination_id = null, $source_id = null) {
        $fullParts = $this->_getParts();
        $availableParts = array_keys($fullParts);
        if (!$destination_id) {
            $destination_id = $availableParts[0];
        }
        if(!$source_id) {
            $source_id = array_pop($availableParts);
        }
        if (!isset($fullParts[$destination_id])) {
            throw new Exception('Ошибка загрузки в собиратель');
        }
        if (!isset($fullParts[$source_id])) {
            throw new Exception('Ошибка загрузки в расщепитель');
        }
        $this->render('index',array(
            'fullParts' => $fullParts,
            'source' => $fullParts[$source_id],
            'destination' => $fullParts[$destination_id],
        ));
    }

    protected function _getParts() {
        $criteria = new CDbCriteria();
        $criteria->compare('type','full');
        $criteria->index = 'id';
        $criteria->order = 'changed ASC';
        return Part::model()->findAll($criteria);
    }
}