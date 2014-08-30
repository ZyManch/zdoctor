<?php

/**
 * Class PartLink
 * @property PartGlue $parentGlue
 * @property PartGlue $childGlue
 */
class PartLink extends CPartLink {

    protected function _extendedRelations() {
        return array(
            'parentGlue' => array(self::BELONGS_TO, 'PartGlue', 'parent_glue_id'),
            'childGlue' => array(self::BELONGS_TO, 'PartGlue', 'child_glue_id'),
        );
    }

}