<?php

/**
 * This is the model class for table "mission_completed".
 *
 * The followings are the available columns in table 'mission_completed':
 * @property integer $id
 * @property integer $mission_id
 * @property integer $user_id
 * @property string $completed_date
 *
 * The followings are the available model relations:
 * @property Mission $mission
 * @property User $user
 */
class MissionCompleted extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mission_completed';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mission_id, user_id', 'required'),
			array('mission_id, user_id', 'numerical', 'integerOnly'=>true),
			array('completed_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, mission_id, user_id, completed_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'mission' => array(self::BELONGS_TO, 'Mission', 'mission_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'mission_id' => 'Mission',
			'user_id' => 'User',
			'completed_date' => 'Completed Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('mission_id',$this->mission_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('completed_date',$this->completed_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MissionCompleted the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
