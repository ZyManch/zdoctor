<?php

/**
 * Class PartGlue
 * @property PartLink $parentLink
 * @property PartLink $childLink
 */
class PartGlue extends CPartGlue {

    protected function _extendedRelations() {
        return array(
            'parentLink' => array(self::HAS_ONE, 'PartLink', 'child_glue_id'),
            'childLink' => array(self::HAS_ONE, 'PartLink', 'parent_glue_id'),
        );
    }

    public function asArray() {
        return array(
            'first' => array('x' => (int)$this->first_x,'y' => (int)$this->first_y),
            'second' => array('x' => (int)$this->second_x,'y' => (int)$this->second_y),
        );
    }
}