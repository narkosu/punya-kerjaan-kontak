<?php

/**
 * This is the model class for table "{{state}}".
 *
 * The followings are the available columns in table '{{state}}':
 * @property string $province_id
 * @property string $province
 * @property string $state_id
 * @property string $state
 */
class State extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return State the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{state}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('province_id, state_id', 'required'),
			array('province_id, state_id', 'length', 'max'=>10),
			array('province, state', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('province_id, province, state_id, state', 'safe', 'on'=>'search'),
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
			'province_id' => 'Province',
			'province' => 'Province',
			'state_id' => 'State',
			'state' => 'State',
		);
	}

	public function complete($key = null)
	{
	static $return;
		if ( empty($return)){
			$criteria=new CDbCriteria;
			$criteria->order = 'province asc, state asc';
		
			$returns = $this->findAll($criteria);
			foreach ($returns as $row){
				$return[$row['province_id'].$row['state_id']] = $row['province'] ." - ".$row['state'];
			}
		}
		if ( !empty($return[$key]) )	
			return $return[$key];
		else	
			return $return;
	}
		
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('province_id',$this->province_id,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('state_id',$this->state_id,true);
		$criteria->compare('state',$this->state,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}