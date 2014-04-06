<?php

/**
 * This is the model class for table "shop_order_products".
 *
 * The followings are the available columns in table 'shop_order_products':
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property string $product_title
 * @property string $description
 * @property string $price
 * @property integer $quantity
 * @property string $total_price
 * @property integer $shop_id
 * @property integer $customer_id
 */
class ShopOrderProducts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ShopOrderProducts the static model class
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
		return 'shop_order_products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id, order_id, product_id, quantity, shop_id, customer_id', 'numerical', 'integerOnly'=>true),
			array('product_title', 'length', 'max'=>45),
			array('price, total_price', 'length', 'max'=>11),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, order_id, product_id, product_title, description, price, quantity, total_price, shop_id, customer_id', 'safe', 'on'=>'search'),
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
			'order_id' => 'Order',
			'product_id' => 'Product',
			'product_title' => 'Product Title',
			'description' => 'Description',
			'price' => 'Price',
			'quantity' => 'Quantity',
			'total_price' => 'Total Price',
			'shop_id' => 'Shop',
			'customer_id' => 'Customer',
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
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('product_title',$this->product_title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('total_price',$this->total_price,true);
		$criteria->compare('shop_id',$this->shop_id);
		$criteria->compare('customer_id',$this->customer_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}