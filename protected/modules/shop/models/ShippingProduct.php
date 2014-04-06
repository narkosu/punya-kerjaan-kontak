<?php

/**
 * This is the model class for table "shop_shipping_product".
 *
 * The followings are the available columns in table 'shop_shipping_product':
 * @property string $id
 * @property integer $product_id
 * @property string $type_area
 * @property string $country_code
 * @property string $country
 * @property string $kode_propinsi
 * @property string $propinsi
 * @property string $kode_kabupaten
 * @property string $kabupaten
 * @property double $price
 * @property double $price_other_item
 * @property integer $store_id
 */
class ShippingProduct extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ShippingProduct the static model class
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
		return 'shop_shipping_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_kabupaten, price', 'required'),
			array('product_id, store_id', 'numerical', 'integerOnly'=>true),
			array('price, price_other_item', 'numerical'),
			array('type_area, country_code, country, kode_propinsi, propinsi, kode_kabupaten, kabupaten', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, type_area, country_code, country, kode_propinsi, propinsi, kode_kabupaten, kabupaten, price, price_other_item, store_id', 'safe', 'on'=>'search'),
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
			'product_id' => 'Product',
			'type_area' => 'Type Area',
			'country_code' => 'Country Code',
			'country' => 'Country',
			'kode_propinsi' => 'Kode Propinsi',
			'propinsi' => 'Propinsi',
			'kode_kabupaten' => 'Kode Kabupaten',
			'kabupaten' => 'Kabupaten',
			'price' => 'Price',
			'price_other_item' => 'Price Other Item',
			'store_id' => 'Store',
		);
	}

	public function saveCollective($data)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$state = State::model()->complete();
		$shippingfrom = $data['shipping_from'];
		$dataReady['product_id'] 	= $data['product_id'];
		$dataReady['store_id'] 		= $data['store_id'];
		$dataReady['type_area'] 	= 'local';
		$dataReady['country_code'] 	= '100';
		$dataReady['country'] 		= 'Indonesia';
		$this->deleteAll("product_id = '".$dataReady['product_id'] ."' AND store_id = '".$dataReady['store_id']."'");
		/* load ships to cost , other cost */
		foreach ( (array) $data['shipsto'] as $state_code ){
			list($nprop,$nkab) = explode("-",$state[$state_code]);
			$kprop 	= substr($state_code,0,2);
			$kkab 	= substr($state_code,2,2);
			$dataReady['kode_propinsi'] 	= $kprop;
			$dataReady['propinsi'] 			= $nprop;
			$dataReady['kode_kabupaten'] 	= $kkab;
			$dataReady['kabupaten'] 		= $nkab;
			$dataReady['price'] 			= $data['cost'][$state_code];
			$dataReady['price_other_item'] 	= $data['other_cost'][$state_code];
			
			$saveShip = new ShippingProduct;
			$saveShip->attributes = $dataReady;
			$saveShip->save();
			
		}
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
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('type_area',$this->type_area,true);
		$criteria->compare('country_code',$this->country_code,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('kode_propinsi',$this->kode_propinsi,true);
		$criteria->compare('propinsi',$this->propinsi,true);
		$criteria->compare('kode_kabupaten',$this->kode_kabupaten,true);
		$criteria->compare('kabupaten',$this->kabupaten,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('price_other_item',$this->price_other_item);
		$criteria->compare('store_id',$this->store_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}