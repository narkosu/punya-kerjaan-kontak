<?php

/**
 * This is the model class for table "shop_product_custom_specification".
 *
 * The followings are the available columns in table 'shop_product_custom_specification':
 * @property string $id
 * @property integer $product_id
 * @property string $specification_name
 * @property string $specification_value
 */
class ShopProductCustomSpecification extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ShopProductCustomSpecification the static model class
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
		return 'shop_product_custom_specification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id', 'numerical', 'integerOnly'=>true),
			array('specification_name', 'length', 'max'=>255),
			array('specification_value', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, specification_name, specification_value', 'safe', 'on'=>'search'),
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
			'specification_name' => 'Specification Name',
			'specification_value' => 'Specification Value',
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
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('specification_name',$this->specification_name,true);
		$criteria->compare('specification_value',$this->specification_value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
  
  public function saveCustom($data){
      
    $dataReady = array();
		$this->deleteAll("product_id = '".$data['product_id'] ."'");
    
		/* load ships to cost , other cost */
		foreach ( (array) $data['specification_name'] as $index=>$specification_name ){
        if ( !empty($specification_name) && !empty($data['specification_value'][$index]) ){
            $dataReady['specification_name'] 	= $specification_name;
            $dataReady['specification_value'] 			= $data['specification_value'][$index];
            $dataReady['product_id'] 			= $data['product_id'];

            $saveCustom = new ShopProductCustomSpecification;
            $saveCustom->attributes = $dataReady;
            $saveCustom->save();
        }
		}
  }
}