<?php

/**
 * This is the model class for table "reward".
 *
 * The followings are the available columns in table 'reward':
 * @property integer $reward_id
 * @property string $reward_name
 * @property string $reward_descrition
 * @property string $image_url
 *
 * The followings are the available model relations:
 * @property RewardHasMission[] $rewardHasMissions
 * @property UserHasReward[] $userHasRewards
 */
class Reward extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reward';
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
			array('reward_name, image_url', 'length', 'max'=>45),
			array('reward_descrition', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('reward_id, reward_name, reward_descrition, image_url', 'safe', 'on'=>'search'),
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
			'rewardHasMissions' => array(self::HAS_MANY, 'RewardHasMission', 'rm_reward_id'),
			'userHasRewards' => array(self::HAS_MANY, 'UserHasReward', 'reward_id'),
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reward the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
