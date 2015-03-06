<?php

/**
 * Class Part
 * @property PartLink[] $childPartLinks
 * @property PartLink $parentPartLink
 */
class Part extends CPart {

    public $angle = 0;
    public $zoom = 1;

    protected function _extendedRelations() {
        return array(
            'parentPartLink' => array(self::HAS_ONE, 'PartLink', 'child_part_id'),
            'childPartLinks' => array(self::HAS_MANY, 'PartLink', 'parent_part_id'),
        );
    }

    /**
     * @return Part
     */
    public function getMainPart() {
        $parent = $this;
        while ($parent->parentPartLink) {
            $parent = $parent->parentPartLink->parentPart;
        }
        return $parent;
    }

    public function asArray($angle = 0, $zoom = 1) {
        $this->angle = $angle;
        $this->zoom = $zoom;
        $result = array(
            'id'     => (int)$this->id,
            'type'   => $this->type,
            'title'  => $this->title,
            'image'  => $this->image,
            'width'  => (int)$this->width,
            'height' => (int)$this->height,
            'zoom'   => $zoom,
            'angle'  => $angle,
            'items'  => array()
        );
        foreach ($this->childGlue as $parentGlue) {
            $childGlue = $parentGlue->childLink->childGlue;
            $parentLength = sqrt(pow($parentGlue->first_x - $parentGlue->second_x,2)+pow($parentGlue->first_y - $parentGlue->second_y,2));
            $childLength = sqrt(pow($childGlue->first_x - $childGlue->second_x,2)+pow($childGlue->first_y - $childGlue->second_y,2));

            if ($parentGlue->first_x == $parentGlue->second_x) {
                $parentAngle = 90;
            } else {
                $parentAngle = atan(($parentGlue->first_y-$parentGlue->second_y)/($parentGlue->first_x-$parentGlue->second_x));
                $parentAngle = 180 * $parentAngle / pi();
            }
            if ($childGlue->first_x == $childGlue->second_x) {
                $childAngle = 90;
            } else {
                $childAngle = atan(($childGlue->first_y-$childGlue->second_y)/($childGlue->first_x-$childGlue->second_x));
                $childAngle = 180 * $childAngle / pi();
            }
            $zoom = $this->zoom * $parentLength / $childLength;
            $angle = $this->angle - $childAngle + $parentAngle;
            $result['items'][] = array_merge(
                array(
                    'parent_glue' => $parentGlue->asArray(),
                    'child_glue' => $childGlue->asArray(),
                ),
                $childGlue->part->asArray($angle, $zoom)
            );
        }
        return $result;
    }
}