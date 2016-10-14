<?php

/**
 * This is the model class for table "emc".
 *
 * The followings are the available columns in table 'emc':
 * @property integer $event_id
 * @property string $description
 * @property integer $id
 * @property integer $em_mission_id
 * @property integer $em_event_id
 * @property integer $mission_completion_id
 * @property integer $mission_id_fk
 * @property integer $user_id_fk
 * @property string $completed_date
 * @property integer $mission_id
 * @property string $name
 * @property string $mission_description
 * @property string $deleted_at
 */
class Emc extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'emc';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description', 'required'),
			array('event_id, id, em_mission_id, em_event_id, mission_completion_id, mission_id_fk, user_id_fk, mission_id', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>200),
			array('name', 'length', 'max'=>45),
			array('mission_description', 'length', 'max'=>100),
			array('completed_date, deleted_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('event_id, description, id, em_mission_id, em_event_id, mission_completion_id, mission_id_fk, user_id_fk, completed_date, mission_id, name, mission_description, deleted_at', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'event_id' => 'Event',
			'description' => 'Description',
			'id' => 'ID',
			'em_mission_id' => 'Em Mission',
			'em_event_id' => 'Em Event',
			'mission_completion_id' => 'Mission Completion',
			'mission_id_fk' => 'Mission Id Fk',
			'user_id_fk' => 'User Id Fk',
			'completed_date' => 'Completed Date',
			'mission_id' => 'Mission',
			'name' => 'Name',
			'mission_description' => 'Mission Description',
			'deleted_at' => 'Deleted At',
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

		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('em_mission_id',$this->em_mission_id);
		$criteria->compare('em_event_id',$this->em_event_id);
		$criteria->compare('mission_completion_id',$this->mission_completion_id);
		$criteria->compare('mission_id_fk',$this->mission_id_fk);
		$criteria->compare('user_id_fk',$this->user_id_fk);
		$criteria->compare('completed_date',$this->completed_date,true);
		$criteria->compare('mission_id',$this->mission_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('mission_description',$this->mission_description,true);
		$criteria->compare('deleted_at',$this->deleted_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Emc the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
