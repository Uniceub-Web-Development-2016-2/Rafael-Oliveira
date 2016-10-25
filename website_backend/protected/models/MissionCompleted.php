<?php

/**
 * This is the model class for table "mission_completed".
 *
 * The followings are the available columns in table 'mission_completed':
 * @property integer $mission_completion_id
 * @property integer $mission_id_fk
 * @property integer $user_id_fk
 * @property string $completed_date
 *
 * The followings are the available model relations:
 * @property Mission $missionIdFk
 * @property User $userIdFk
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
			array('mission_id_fk, user_id_fk', 'required'),
			array('mission_id_fk, user_id_fk', 'numerical', 'integerOnly'=>true),
			array('completed_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('mission_completion_id, mission_id_fk, user_id_fk, completed_date', 'safe', 'on'=>'search'),
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
			'missionIdFk' => array(self::BELONGS_TO, 'Mission', 'mission_id_fk'),
			'userIdFk' => array(self::BELONGS_TO, 'User', 'user_id_fk'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mission_completion_id' => 'Mission Completion',
			'mission_id_fk' => 'Mission Id Fk',
			'user_id_fk' => 'User Id Fk',
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

		$criteria->compare('mission_completion_id',$this->mission_completion_id);
		$criteria->compare('mission_id_fk',$this->mission_id_fk);
		$criteria->compare('user_id_fk',$this->user_id_fk);
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
