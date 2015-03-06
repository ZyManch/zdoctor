<?php

/**
 * This is the model class for table "part".
 *
 * The followings are the available columns in table 'part':
 * @property string $id
 * @property string $type
 * @property string $title
 * @property string $image
 * @property integer $width
 * @property integer $height
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property PartLink[] $partLinks
 * @property PartLink[] $partLinks1
 */
class CPart extends ActiveRecord {

	public function tableName()	{
		return 'part';
	}

	public function rules()	{
		return array(
			array('title, width, height', 'required'),
			array('width, height', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>4),
			array('title, image', 'length', 'max'=>64),
			array('status', 'length', 'max'=>7),
            array('changed','length','max'=>20),
			array('id, type, title, image, width, height, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	protected function _baseRelations()	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'partLinks' => array(self::HAS_MANY, 'PartLink', 'child_part_id'),
			'partLinks1' => array(self::HAS_MANY, 'PartLink', 'parent_part_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'type' => 'Type',
			'title' => 'Title',
			'image' => 'Image',
			'width' => 'Width',
			'height' => 'Height',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('width',$this->width);
		$criteria->compare('height',$this->height);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


}
