<?php

/**
 * This is the model class for table "mission_requirements".
 *
 * The followings are the available columns in table 'mission_requirements':
 * @property integer $id
 * @property string $description
 * @property integer $mission_id
 * @property string $A
 * @property string $B
 * @property string $C
 * @property string $D
 * @property string $answer
 */
class MissionRequirements extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mission_requirements';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description, mission_id', 'required'),
			array('mission_id', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>400),
			array('A, B, C, D', 'length', 'max'=>200),
			array('answer', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, description, mission_id, A, B, C, D, answer', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'description' => 'Description',
			'mission_id' => 'Mission',
			'A' => 'A',
			'B' => 'B',
			'C' => 'C',
			'D' => 'D',
			'answer' => 'Answer',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('mission_id',$this->mission_id);
		$criteria->compare('A',$this->A,true);
		$criteria->compare('B',$this->B,true);
		$criteria->compare('C',$this->C,true);
		$criteria->compare('D',$this->D,true);
		$criteria->compare('answer',$this->answer,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MissionRequirements the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function returnRequirements($mission_id){
		$requirements = MissionRequirements::model()->findAllByAttributes(array('mission_id'=> $mission_id));
		$load = Array();
		foreach($requirements as $requirement){
			$load[] = $requirement->attributes;
		}

		return $load;
		
	}
}
