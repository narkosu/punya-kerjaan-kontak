<?php

class ShoppingCartController extends Controller
{
	public function actionView()
	{
		$this->layout = '//layouts/mainproduk';
		$cart = Shop::getCartContent();
		//print_r($cart);
		
		$this->render('view',array(
						'products'=>$cart
						));
	}

	public function actionGetPriceTotal($sid) {
		echo Shop::getPriceTotal($sid);
	}

	public function actionUpdatePricingByShipping() {
		$cart = Shop::getCartContent();
		
		$store_id 	= $_GET['store_id'];
		$ship_to 	= $_GET['shipto'];
		$kode_propinsi 	= substr($ship_to,0,2);
		$kode_kabupaten = substr($ship_to,2,2);
		$other_item 	= false;
		$dumi_bigger 	= 0;
		$bigger_is 		= '';
		foreach ( $cart[$store_id] as $position=>$product ){
			
			$getShipping 	= ShippingProduct::model()->find("product_id = '".$product['product_id']."' and store_id = '".$store_id."' and kode_propinsi = '".$kode_propinsi."' and kode_kabupaten = '".$kode_kabupaten."'");
			if ( $getShipping ){
				if ( $dumi_bigger < $getShipping->price ){
					$dumi_bigger = $getShipping->price;
					$bigger_is = $product['product_id'];
				}
				
				if ( $product['amount'] > 1 ){
					$single = $getShipping->price;
					$price_other_item = (($product['amount']-1) * $getShipping->price_other_item);
					$single = $single + $price_other_item;
					$other_item = true;
				}else{
					if ( $other_item )
						$single = $getShipping->price_other_item;
					else
						$single = $getShipping->price;
				}
				
				$shippingto[$store_id][$product['product_id']] =  array('single'=> $single,
																		'single_cr'=>Shop::priceFormat($single),
																		'couple'=> $getShipping->price_other_item,
																		'couple_cr'=> Shop::priceFormat($getShipping->price_other_item)
																		);
				
			}else{
				$shippingto[$store_id][$product['product_id']] =  array('single'=>'Dihitung oleh penjual',
																		'single_cr'=>'Dihitung oleh penjual',
																		'couple'=> 'Dihitung oleh penjual',
																		'couple_cr'=> 'Dihitung oleh penjual'
																		);
			}
		}
		echo json_encode($shippingto);
	}
	
	public function actionUpdateAmount() {
		$cart = Shop::getCartContent();

		foreach($_GET as $key => $value) {
			if(substr($key, 0, 7) == 'amount_') {
				if($value == '')
					return true;
				if (!is_numeric($value) || $value <= 0)
					throw new CException('Wrong amount');
					
				$positions = explode('_', $key);
				$store_id = $positions[1];
				$position = $positions[2];
				
				if(isset($cart[$store_id][$position]['amount']))
					$cart[$store_id][$position]['amount'] = $value;
					$product = Products::model()->findByPk($cart[$store_id][$position]['product_id']);
					echo Shop::priceFormat(
							@$product->getPrice($cart[$store_id][$position]['Variations'], $value));
					return Shop::setCartContent($cart);
			}	
		}
	}


	// Add a new product to the shopping cart
	public function actionCreate()
	{
		if(!is_numeric($_POST['amount']) || $_POST['amount'] <= 0) {
			Shop::setFlash(Shop::t('Illegal amount given'));
			$this->redirect(array( 
							'//shop/products/view', 'id' => $_POST['product_id']));
		}
		
		if(isset($_POST['Variations']))
			foreach($_POST['Variations'] as $key => $variation) {
				$specification = ProductSpecification::model()->findByPk($key);
				if($specification->required && $variation[0] == '') {
					Shop::setFlash(Shop::t('Please select a {specification}', array(
									'{specification}' => $specification->title)));
					$this->redirect(array(
								'//shop/products/view', 'id' => $_POST['product_id']));
				}
		}
		
		$storeId = $_POST['store_id'];
		/* get properties of product */
		$_POST['info_product'] = Products::model()->findByPk($_POST['product_id'])->attributes;
		$cart = Shop::getCartContent();

		// remove potential clutter
		if(isset($_POST['yt0']))
			unset($_POST['yt0']);
		if(isset($_POST['yt1']))
			unset($_POST['yt1']);
		
		/* ceckProduct */
		/*
		$a = Products::model()->findByPk($_POST['product_id']);
		
		
		$_POST['product'] = $a->attributes;
		*/
		$cart[$storeId][] = $_POST;
	
		Shop::setCartcontent($cart);
		Shop::setFlash(Shop::t('The product has been added to the shopping cart'));
		$this->redirect(array('//shop/products/index'));
	}

	public function actionDelete($id)
	{
		list($store_id,$position) = explode(",",$id);
		$position = (int) $position;
		$cart = json_decode(Yii::app()->user->getState('cart'), true);
		
		unset($cart[$store_id][$position]);
		if (empty($cart[$store_id])){
			unset($cart[$store_id]);
		}
		
		Yii::app()->user->setState('cart', json_encode($cart));

			$this->redirect(array('//shop/shoppingCart/view'));
	}

	public function actionIndex()
	{
		
		if(isset($_SESSION['cartowner'])) {
			$carts = ShoppingCart::model()->findAll('cartowner = :cartowner', array(':cartowner' => $_SESSION['cartowner']));

			$this->render('index',array( 'carts'=>$carts,));
		} 
	}

	public function actionAdmin()
	{
		$model=new ShoppingCart('search');
		if(isset($_GET['ShoppingCart']))
			$model->attributes=$_GET['ShoppingCart'];
			$model->cartowner = Yii::app()->User->getState('cartowner');

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=ShoppingCart::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='shopping cart-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
