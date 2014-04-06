<?php

/**
 * This is the model class for table "country".
 *
 * The followings are the available columns in table 'country':
 * @property integer $country_id
 * @property string $name
 * @property string $iso_code_2
 * @property string $iso_code_3
 * @property string $address_format
 * @property integer $postcode_required
 * @property integer $status
 */
class Country extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Country the static model class
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
		return 'country';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, address_format, postcode_required', 'required'),
			array('postcode_required, status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			array('iso_code_2', 'length', 'max'=>2),
			array('iso_code_3', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('country_id, name, iso_code_2, iso_code_3, address_format, postcode_required, status', 'safe', 'on'=>'search'),
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
			'country_id' => 'Country',
			'name' => 'Name',
			'iso_code_2' => 'Iso Code 2',
			'iso_code_3' => 'Iso Code 3',
			'address_format' => 'Address Format',
			'postcode_required' => 'Postcode Required',
			'status' => 'Status',
		);
	}

	public function getCountries($code = '')
	{
		static $data_return;
		if (empty($data_return)){
			$criteria=new CDbCriteria;
			$criteria->order = 'name asc';
			$data = $this->findAll($criteria);
			foreach ((array) $data as $row){
				$data_return[$row['country_id']] = $row;
			}
		}
		if ( empty($code))
			return $data_return;
		else
			return $data_return[$code];
		
	}
}