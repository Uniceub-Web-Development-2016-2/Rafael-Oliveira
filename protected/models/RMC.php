<?php

/**
 * This is the model class for table "RMC".
 *
 * The followings are the available columns in table 'RMC':
 * @property integer $reward_id
 * @property string $reward_name
 * @property string $reward_descrition
 * @property string $image_url
 * @property integer $rm_reward_id
 * @property integer $rm_mission_id
 * @property integer $mission_completion_id
 * @property integer $mission_id_fk
 * @property integer $user_id_fk
 * @property string $completed_date
 * @property integer $mission_id
 * @property string $name
 * @property string $mission_description
 * @property string $deleted_at
 */
class RMC extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'RMC';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('reward_name, reward_descrition, image_url', 'required'),
			array('reward_id, rm_reward_id, rm_mission_id, mission_completion_id, mission_id_fk, user_id_fk, mission_id', 'numerical', 'integerOnly'=>true),
			array('reward_name, image_url, name', 'length', 'max'=>45),
			array('reward_descrition', 'length', 'max'=>150),
			array('mission_description', 'length', 'max'=>100),
			array('completed_date, deleted_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('reward_id, reward_name, reward_descrition, image_url, rm_reward_id, rm_mission_id, mission_completion_id, mission_id_fk, user_id_fk, completed_date, mission_id, name, mission_description, deleted_at', 'safe', 'on'=>'search'),
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
			'reward_id' => 'Reward',
			'reward_name' => 'Reward Name',
			'reward_descrition' => 'Reward Descrition',
			'image_url' => 'Image Url',
			'rm_reward_id' => 'Rm Reward',
			'rm_mission_id' => 'Rm Mission',
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

		$criteria->compare('reward_id',$this->reward_id);
		$criteria->compare('reward_name',$this->reward_name,true);
		$criteria->compare('reward_descrition',$this->reward_descrition,true);
		$criteria->compare('image_url',$this->image_url,true);
		$criteria->compare('rm_reward_id',$this->rm_reward_id);
		$criteria->compare('rm_mission_id',$this->rm_mission_id);
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
	 * @return RMC the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
