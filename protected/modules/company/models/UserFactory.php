<?php

/**
 * This is the model class for table "{{user_factory}}".
 *
 * The followings are the available columns in table '{{user_factory}}':
 * @property string $id
 * @property integer $user_id
 * @property integer $company_id
 * @property string $level_as
 * @property string $jabatan
 * @property string $created_at
 * @property string $updated_at
 * @property string $status
 */
class UserFactory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserFactory the static model class
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
		return '{{user_factory}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, company_id', 'numerical', 'integerOnly'=>true),
			array('level_as', 'length', 'max'=>100),
			array('jabatan', 'length', 'max'=>255),
			array('status', 'length', 'max'=>25),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, company_id, level_as, jabatan, created_at, updated_at, status', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'company_id' => 'Company',
			'level_as' => 'Level As',
			'jabatan' => 'Jabatan',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'status' => 'Status',
		);
	}

	public function getfactorybyuser($id){
		return $this->find('user_id = :uid',array(':uid'=>$id));	
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('level_as',$this->level_as,true);
		$criteria->compare('jabatan',$this->jabatan,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}