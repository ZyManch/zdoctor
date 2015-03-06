<?php

/**
 * This is the model class for table "part_link".
 *
 * The followings are the available columns in table 'part_link':
 * @property string $id
 * @property string $parent_part_id
 * @property string $child_part_id
 * @property integer $x
 * @property integer $y
 * @property integer $angle
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Part $childPart
 * @property Part $parentPart
 */
class CPartLink extends ActiveRecord {

	public function tableName()	{
		return 'part_link';
	}

	public function rules()	{
		return array(
			array('parent_part_id, child_part_id', 'required'),
			array('x, y, angle', 'numerical', 'integerOnly'=>true),
			array('parent_part_id, child_part_id', 'length', 'max'=>10),
			array('status', 'length', 'max'=>7),
            array('changed','length','max'=>20),
			array('id, parent_part_id, child_part_id, x, y, angle, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'childPart' => array(self::BELONGS_TO, 'Part', 'child_part_id'),
			'parentPart' => array(self::BELONGS_TO, 'Part', 'parent_part_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'parent_part_id' => 'Parent Part',
			'child_part_id' => 'Child Part',
			'x' => 'X',
			'y' => 'Y',
			'angle' => 'Angle',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('parent_part_id',$this->parent_part_id,true);
		$criteria->compare('child_part_id',$this->child_part_id,true);
		$criteria->compare('x',$this->x);
		$criteria->compare('y',$this->y);
		$criteria->compare('angle',$this->angle);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
