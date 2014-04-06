<?php

/**
 * This is the model class for table "shop_orders".
 *
 * The followings are the available columns in table 'shop_orders':
 * @property integer $order_id
 * @property string $date_add
 * @property string $date_update
 * @property integer $shop_id
 * @property integer $customer_id
 * @property string $total_product
 * @property string $total_shipping
 * @property string $total_paid
 * @property string $invoice_date
 * @property string $status
 * @property integer $delivery_id
 * @property integer $payment_id
 * @property integer $ordering_date
 * @property integer $ordering_done
 * @property integer $ordering_confirmed
 */
class ShopOrders extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ShopOrders the static model class
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
		return 'shop_orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_add, shop_id, customer_id, payment_id', 'required'),
			array('shop_id, customer_id, delivery_id, payment_id, ordering_date, ordering_done, ordering_confirmed', 'numerical', 'integerOnly'=>true),
			array('total_product, total_shipping, total_paid', 'length', 'max'=>17),
			array('status', 'length', 'max'=>45),
			array('date_update, invoice_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('order_id, date_add, date_update, shop_id, customer_id, total_product, total_shipping, total_paid, invoice_date, status, delivery_id, payment_id, ordering_date, ordering_done, ordering_confirmed', 'safe', 'on'=>'search'),
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
			'order_id' => 'Order',
			'date_add' => 'Date Add',
			'date_update' => 'Date Update',
			'shop_id' => 'Shop',
			'customer_id' => 'Customer',
			'total_product' => 'Total Product',
			'total_shipping' => 'Total Shipping',
			'total_paid' => 'Total Paid',
			'invoice_date' => 'Invoice Date',
			'status' => 'Status',
			'delivery_id' => 'Delivery',
			'payment_id' => 'Payment',
			'ordering_date' => 'Ordering Date',
			'ordering_done' => 'Ordering Done',
			'ordering_confirmed' => 'Ordering Confirmed',
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

		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('date_update',$this->date_update,true);
		$criteria->compare('shop_id',$this->shop_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('total_product',$this->total_product,true);
		$criteria->compare('total_shipping',$this->total_shipping,true);
		$criteria->compare('total_paid',$this->total_paid,true);
		$criteria->compare('invoice_date',$this->invoice_date,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('delivery_id',$this->delivery_id);
		$criteria->compare('payment_id',$this->payment_id);
		$criteria->compare('ordering_date',$this->ordering_date);
		$criteria->compare('ordering_done',$this->ordering_done);
		$criteria->compare('ordering_confirmed',$this->ordering_confirmed);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}