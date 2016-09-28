<?php

/**
 * This is the model class for table "mission".
 *
 * The followings are the available columns in table 'mission':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $deleted_at
 *
 * The followings are the available model relations:
 * @property EventHasMission[] $eventHasMissions
 * @property Reward[] $rewards
 */
class Mission extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mission';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description', 'required'),
			array('name', 'length', 'max'=>45),
			array('description', 'length', 'max'=>100),
			array('deleted_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, deleted_at', 'safe', 'on'=>'search'),
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
			'eventHasMissions' => array(self::HAS_MANY, 'EventHasMission', 'mission_id'),
			'rewards' => array(self::MANY_MANY, 'Reward', 'reward_has_mission(mission_id, reward_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('deleted_at',$this->deleted_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Mission the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function returnCompletion($mission_id , $user_id){
		$completed = MissionCompleted::model()->findByAttributes(array('mission_id'=> $mission_id , "user_id" =>$user_id));
		
		if($completed != null){
			$completed = "Completo";
		}else{
			$completed = "Incompleto";
		}

		return $completed;
	}

	
}
