<?php

/**
 * This is the model class for table "shop_payment_seller".
 *
 * The followings are the available columns in table 'shop_payment_seller':
 * @property integer $id
 * @property integer $payment_methode_id
 * @property integer $user_id
 * @property integer $store_id
 * @property string $desc
 * @property string $attribute
 */
class ShopPaymentSeller extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ShopPaymentSeller the static model class
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
		return 'shop_payment_seller';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('payment_methode_id, user_id, store_id', 'numerical', 'integerOnly'=>true),
			array('attribute', 'length', 'max'=>255),
			array('desc', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, payment_methode_id, user_id, store_id, desc, attribute', 'safe', 'on'=>'search'),
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
			'payment_methode'=>array(self::BELONGS_TO,'PaymentMethod','payment_methode_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'payment_methode_id' => 'Payment Methode',
			'user_id' => 'User',
			'store_id' => 'Store',
			'desc' => 'Desc',
			'attribute' => 'Attribute',
		);
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

		$criteria->compare('id',$this->id);
		$criteria->compare('payment_methode_id',$this->payment_methode_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('store_id',$this->store_id);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('attribute',$this->attribute,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}