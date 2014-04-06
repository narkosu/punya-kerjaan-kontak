<?php

/**
 * This is the model class for table "shop_order_history".
 *
 * The followings are the available columns in table 'shop_order_history':
 * @property string $id
 * @property string $created_at
 * @property string $created_by
 * @property string $order_id
 * @property string $authority_
 * @property string $description
 * @property string $price
 * @property string $type_activity
 */
class ShopOrderHistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ShopOrderHistory the static model class
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
		return 'shop_order_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_at, created_by, order_id', 'required'),
			array('created_by, order_id', 'length', 'max'=>20),
			array('authority_', 'length', 'max'=>45),
			array('description', 'length', 'max'=>255),
			array('price', 'length', 'max'=>11),
			array('type_activity', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, created_at, created_by, order_id, authority_, description, price, type_activity', 'safe', 'on'=>'search'),
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
			'created_at' => 'Created At',
			'created_by' => 'Created By',
			'order_id' => 'Order',
			'authority_' => 'Authority',
			'description' => 'Description',
			'price' => 'Price',
			'type_activity' => 'Type Activity',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('authority_',$this->authority_,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('type_activity',$this->type_activity,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}