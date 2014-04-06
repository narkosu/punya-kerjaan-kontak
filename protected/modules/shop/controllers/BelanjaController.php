<?php

class BelanjaController extends Controller
{
	public $_model;

	public function filters()
	{
		return array(
			'accessControl',
		);
	}	

	public function accessRules() {
		return array(
				array('allow',
					'actions'=>array('view', 'create', 'confirm', 'success', 'failure'),
					'users' => array('*'),
					),
				array('allow',
					'actions'=>array('admin','delete', 'view', 'slip', 'invoice','buyer','Shipto','payment','OrderConfirm'),
					'users' => array('@'),
					),
				array('deny',  // deny all other users
						'users'=>array('*'),
						),
				);
	}

	
	public function actionSlip($id) {
		if($model = $this->loadModel($id))
			$this->render(Shop::module()->slipView, array('model' => $model));
	}

	public function actionInvoice($id) {
		if($model = $this->loadModel($id))
			$this->render(Shop::module()->invoiceView, array('model' => $model));
	}



	public function beforeAction($action) {
		$this->layout = Shop::module()->layout;
		return parent::beforeAction($action);
	}


	public function actionView()
	{
		$this->render('view',array(
					'model'=>$this->loadModel(),
					));
	}

	/** Creation of a new Order 
	 * Before we create a new order, we need to gather Customer information.
	 * If the user is logged in, we check if we already have customer information.
	 * If so, we go directly to the Order confirmation page with the data passed
	 * over. Otherwise we need the user to enter his data, and depending on
	 * whether he is logged in into the system it is saved with his user 
	 * account or once just for this order.	
	 */
	 
	 public function actionCreate(
			$sid,
			$customer = null,
			$payment_method = null,
			$shipping_method = null ) {

		/* cara pengiriman */	
		if(isset($_POST['ShippingMethod'])) 
			Yii::app()->user->setState('shipping_method', $_POST['ShippingMethod']);

		/* pembayaran */	
		if(isset($_POST['PaymentMethod'])) 
			Yii::app()->user->setState('payment_method', $_POST['PaymentMethod']);

		/* alamat kriirm */
		if(isset($_POST['DeliveryAddress']) && $_POST['DeliveryAddress'] === true) {
			if(Address::isEmpty($_POST['DeliveryAddress'])) {
				Shop::setFlash(Shop::t('Delivery address is not complete! Please fill in all fields to set the Delivery address'));
			} else {
				$deliveryAddress = new DeliveryAddress;
				$deliveryAddress->attributes = $_POST['DeliveryAddress'];
				if($deliveryAddress->save()) {
					$model = Shop::getCustomer();

					if(isset($_POST['toggle_delivery']))
						$model->delivery_address_id = $deliveryAddress->id;
					else
						$model->delivery_address_id = 0;
					$model->save(false, array('delivery_address_id'));
				}
			}
		}
		
		/* alamat billing */
		/*
		if(isset($_POST['BillingAddress']) && $_POST['BillingAddress'] === true) {
			if(Address::isEmpty($_POST['BillingAddress'])) {
				Shop::setFlash(Shop::t('Billing address is not complete! Please fill in all fields to set the Billing address'));
			} else {
				$BillingAddress = new BillingAddress;
				$BillingAddress->attributes = $_POST['BillingAddress'];
				if($BillingAddress->save()) {
					$model = Shop::getCustomer();
					if(isset($_POST['toggle_billing']))
						$model->billing_address_id = $BillingAddress->id;
					else
						$model->billing_address_id = 0;
					$model->save(false, array('billing_address_id'));
				}
			}
		}
		*/
		/* check pelanggan */
		
		if(!$customer)
			$customer =  Profile::model()->find('user_id = :user_id ', array(
				':user_id' => Yii::app()->user->id));	
			
			//$customer = Shop::getCustomer();
			//$customer = Yii::app()->user->getState('customer_id');
			
		if(!Yii::app()->user->isGuest && !$customer) {
			/*$customer = Customer::model()->find('user_id = :user_id ', array(
				':user_id' => Yii::app()->user->id));
				*/
			
			$customer =  Profile::model()->find('user_id = :user_id ', array(
				':user_id' => Yii::app()->user->id));	
		}		
		//echo $customer->firstname;
		
		
		if(!$payment_method)
			$payment_method = Yii::app()->user->getState('payment_method');
			
		if(!$shipping_method)
			$shipping_method = Yii::app()->user->getState('shipping_method');

		if(!$customer) {
			
			$this->render('/customer/create', array(
						'action' => array('//shop/customer/create')));
			Yii::app()->end();
		}
		//exit;
		if(!$shipping_method) {
			$this->render('/shippingMethod/choose', array(
						'customer' => $customer,
						'sid' => $sid));
			Yii::app()->end();
		}
		
		if(!$payment_method) {
			$this->render('/paymentMethod/choose', array(
						'sid' => $sid,
						'customer' => $customer));
			Yii::app()->end();
		}


		if($customer && $payment_method && $shipping_method)   {
			if(is_numeric($customer))
				$customer = Customer::model()->findByPk($customer);
			if(is_numeric($shipping_method))
				$shipping_method = ShippingMethod::model()->findByPk($shipping_method);
			if(is_numeric($payment_method))
				$payment_method = PaymentMethod::model()->findByPk($payment_method);
			
			
			$this->render('/order/create', array(
						'sid' => $sid,
						'customer' => $customer,
						'shippingMethod' => $shipping_method,
						'paymentMethod' => $payment_method,
						));
		}
	}
	
	
	public function actionBuyer($sid) {
		$carts 	= Shop::getCartContent();
		//print_r($carts);
		$cart 	= $carts[$sid];
		
		/* save new address */
		
		if ( (isset($_POST['NewAddress']) && $_POST['NewAddress'] == 1) && !empty($_POST['Address'])){
			$newaddress = new Address;
			$_POST['Address']['user_id'] = Yii::app()->user->id; 
			if ($_POST['Address']['location_type'] == 'dn') {
				
				$cityDN = $_POST['Address']['city_state_dn'];
				
				if (!empty($cityDN)){
					$dataState = State::model()->complete();
					list($_POST['Address']['state'],$_POST['Address']['city'])  = explode(" - ",$dataState[$cityDN]);
				}
			}
			$contry = Country::model()->getCountries($_POST['Address']['country_id']);
			$_POST['Address']['country'] = $contry['name'];
			$newaddress->attributes = $_POST['Address'];
			
			if ( $newaddress->save()){
				//echo 'simpan';
			}
			
		}
		
		/* save delivery and payment method */
		
		if ( isset($_POST['checkout']) ) {
			/* deliveryAddress */
			if ( isset($_POST['checkout']['toaddress']) ){
				$shipaddress = Address::model()->findByPk($_POST['checkout']['toaddress']);
				Yii::app()->user->setState('deliveryAddress_'.$sid, $shipaddress->attributes);
				
			}
			
			if (isset($_POST['checkout']['payment_method'])){
				Yii::app()->user->setState('payment_method_'.$sid,$_POST['checkout']['payment_method']);
				$payment_method = $_POST['checkout']['payment_method'];
			}
			$isSubmit = true;
		}
		
		$deliveryAddress = Yii::app()->user->getState('deliveryAddress_'.$sid);
		$payment_method = Yii::app()->user->getState('payment_method_'.$sid);
		if ( $isSubmit && isset( $deliveryAddress) && isset( $payment_method) )
			$this->redirect(array('orderconfirm','sid'=>$sid));
			
		if (isset( $deliveryAddress)) {
			$_POST['checkout']['toaddress'] = $deliveryAddress['id'];
		}
		if (isset( $payment_method)) {
			$_POST['checkout']['payment_method'] = $payment_method;
		}
		
		/*$deliveryAddress = Yii::app()->user->getState('deliveryAddress_'.$sid);
		//print_r($deliveryAddress);
		/*if (isset($_POST['checkout']))
			print_r($_POST['checkout']);
		* /
		$newaddress = new Address;
		
		if (isset( $deliveryAddress))
			$this->redirect(array('shipto','sid'=>$sid));
			
		/* create new address * /
		
		if ( (isset($_POST['NewAddress']) && $_POST['NewAddress'] == 1) && !empty($_POST['Address'])){
			$_POST['Address']['user_id'] = Yii::app()->user->id; 
			if ($_POST['Address']['location_type'] == 'dn') {
				
				$cityDN = $_POST['Address']['city_state_dn'];
				
				if (!empty($cityDN)){
					$dataState = State::model()->complete();
					list($_POST['Address']['state'],$_POST['Address']['city'])  = explode(" - ",$dataState[$cityDN]);
				}
			}
			$contry = Country::model()->getCountries($_POST['Address']['country_id']);
			$_POST['Address']['country'] = $contry['name'];
			$newaddress->attributes = $_POST['Address'];
			
			if ( $newaddress->save()){
				echo 'simpan';
			}
			
		}
		
		/* check out Send Address * /
		if ( isset($_POST['checkout']['toaddress']) ){
			$shipaddress = Address::model()->findByPk($_POST['checkout']['toaddress']);
			Yii::app()->user->setState('deliveryAddress_'.$sid, $shipaddress->attributes);
			
		}
		/**/
		
		$address 	= Address::model()->findAll('user_id = :user_id ', array(
			':user_id' => Yii::app()->user->id));	// for shipping
		
		$this->render('buyer', array(
		
					'newaddress'=>$newaddress,
					'address'=>$address,
					
					'sid'=>$sid,
					'cart'=>$cart,
					'action' => array('//shop/customer/create')));
		
	
		
	}
	
	public function actionShipto($sid) {
		$carts = Shop::getCartContent();
		$cart = $carts[$sid];
		
		$deliveryAddress = Yii::app()->user->getState('deliveryAddress_'.$sid);
		
		$payment_method = Yii::app()->user->getState('payment_method_'.$sid);
		if ( !$payment_method ){
			if (isset($_POST['PaymentMethod'])){
				Yii::app()->user->setState('payment_method_'.$sid,$_POST['PaymentMethod']);
				$payment_method = $_POST['PaymentMethod'];
			}
		}
		
		if ($deliveryAddress && $payment_method ) {
			$this->redirect(array('order/OrderConfirm/sid/'.$sid));
		}
		
		if (isset($_POST['existing_address'])){
			
			$shipaddress = Address::model()->findByPk($_POST['existing_address']);
			Yii::app()->user->setState('deliveryAddress_'.$sid, $shipaddress->attributes);
			//print_r($shipaddress->attributes);
			
			$model = new DeliveryAddress ;
			$model->attributes = $shipaddress->attributes;
			$deliveryAddress = $shipaddress->attributes;
			
		}	
		
	
		
		$this->render('/customer/order_confirm', array(
						
						'deliveryAddress'=>$deliveryAddress,
						'cart'=>$cart,
						'store_id'=>$sid,
						'action' => array('//shop/customer/create')));
		
	}
	
	public function actionPayment($sid) {
		$newaddress = new Address;
		
		if ( isset($_POST['Address'])){
			$_POST['Address']['user_id'] = Yii::app()->user->id; 
			if ($_POST['Address']['location_type'] == 'dn') {
				
				$cityDN = $_POST['Address']['city_state_dn'];
				
				if (!empty($cityDN)){
					$dataState = State::model()->complete();
					list($_POST['Address']['state'],$_POST['Address']['city'])  = explode(" - ",$dataState[$cityDN]);
				}
			}
			$contry = Country::model()->getCountries($_POST['Address']['country_id']);
			$_POST['Address']['country'] = $contry['name'];
			$newaddress->attributes = $_POST['Address'];
			
			if ( $newaddress->save()){
				echo 'simpan';
			}
			
		}
		
		$customer 	=  Profile::model()->find('user_id = :user_id ', array(
			':user_id' => Yii::app()->user->id));	
		$address 	= Address::model()->findAll('user_id = :user_id ', array(
			':user_id' => Yii::app()->user->id));	// for shipping
			
		$this->render('/customer/buyer', array(
					'customer'=>$customer,
					'newaddress'=>$newaddress,
					'address'=>$address,
					'action' => array('//shop/customer/create')));
	
		
	}
	
	public function actionOrderConfirm($sid) {
		
		/*Yii::app()->user->setState('order_comment', @$_POST['Order']['Comment']);*/
		$carts = Shop::getCartContent();
		$cart = $carts[$sid];
		//print_r($cart);	
		$deliveryAddress = Yii::app()->user->getState('deliveryAddress_'.$sid);
		print_r($deliveryAddress);
		$payment_method = Yii::app()->user->getState('payment_method_'.$sid);
			
		if(isset($_POST['accept_terms']) && $_POST['accept_terms'] == 1) {
			$order = new Order();
			//$customer = Shop::getCustomer();
			
			$order->customer_id = Yii::app()->user->id;
			$order->store_id = $sid;

			//$order->delivery_id = $deliveryAddress['id'];
			//$order->date_add = 'now()';
			//$order->delivery_address_id = '';
			$order->ordering_date = time();
			$order->payment_method = Yii::app()->user->getState('payment_method_'.$sid);
			
			if($order->save()) {
				foreach($cart as $position => $product) {
					/*$order_product  = new ShopOrderProducts;
					$order_product->order_id = $order->order_id;
					$order_product->product_id = $product['product_id'];
					$order_product->quantity = $product['amount'];
					$order_product->shop_id = $sid;
					$order_product->product_title = $product['info_product']['title'];
					$order_product->description = $product['info_product']['description'];
					$order_product->price = $product['info_product']['price'];
					$order_product->total_price = $product['amount'] * $product['info_product']['price'];
					$order_product->customer_id = $order->customer_id;
					$order_product->save();
					*/
					
					$position = new OrderPosition;
					$position->order_id = $order->order_id;
					$position->product_id = $product['product_id'];
					$position->amount = $product['amount'];
					$position->specifications = @json_encode($product['Variations']);
					$position->save();
					
				}
				
				$address = new DeliveryAddress();
				$deliveryAddress['order_id'] = 	$order->order_id;
				if($deliveryAddress){
					$address->attributes = $deliveryAddress;
					$address->save();
				}
				$order->delivery_address_id = $address->id;
				$order->save();
				
				unset($carts[$sid]);
				Yii::app()->user->setState('cart', Shop::setCartContent($carts));
				//Yii::app()->user->setState('shipping_method', null);
				Yii::app()->user->setState('deliveryAddress_'.$sid, null);
				//Yii::app()->user->setState('order_comment', null);
				Shop::mailNotification($order);
				$this->redirect(Shop::module()->successAction);
			} else {
				print_r($order->getErrors());
				exit;
				$this->redirect(Shop::module()->failureAction);
			}
		} else {
			Shop::setFlash(
					Shop::t(
						'Please accept our Terms and Conditions to continue'));
			//$this->redirect(array('//shop/order/create'));
		}
		
		$this->render('order_confirm', array(
						
						'deliveryAddress'=>$deliveryAddress,
						'cart'=>$cart,
						'store_id'=>$sid,
						'action' => array('//shop/customer/create')));
	}
	
	public function actionConfirm($sid) {
		
		/*Yii::app()->user->setState('order_comment', @$_POST['Order']['Comment']);*/
		
		if(isset($_POST['accept_terms']) && $_POST['accept_terms'] == 1) {
			$order = new Order();
			$customer = Shop::getCustomer();
			$carts = Shop::getCartContent();
			$cart = $carts[$sid];
			
			$order->customer_id = $customer->customer_id;
			$order->store_id = $sid;

			$address = new DeliveryAddress();
			if($customer->deliveryAddress)
				$address->attributes = $customer->deliveryAddress->attributes;
			else
				$address->attributes = $customer->address->attributes;
			$address->save();
			$order->delivery_address_id = $address->id;

			$address = new BillingAddress();
			if($customer->billingAddress)
				$address->attributes = $customer->billingAddress->attributes;
			else
				$address->attributes = $customer->address->attributes;
			$address->save();
			$order->billing_address_id = $address->id;

			$order->ordering_date = time();
			$order->payment_method = Yii::app()->user->getState('payment_method');
			$order->shipping_method = Yii::app()->user->getState('shipping_method');
			$order->comment = Yii::app()->user->getState('order_comment');


			if($order->save()) {
				foreach($cart as $position => $product) {
					$position = new OrderPosition;
					$position->order_id = $order->order_id;
					$position->product_id = $product['product_id'];
					$position->amount = $product['amount'];
					$position->specifications = @json_encode($product['Variations']);
					$position->save();
					
				}
				unset($carts[$sid]);
				Yii::app()->user->setState('cart', Shop::setCartContent($cart));
				Yii::app()->user->setState('shipping_method', null);
				Yii::app()->user->setState('payment_method', null);
				Yii::app()->user->setState('order_comment', null);
				Shop::mailNotification($order);
				$this->redirect(Shop::module()->successAction);
			} else 
				$this->redirect(Shop::module()->failureAction);
		} else {
			Shop::setFlash(
					Shop::t(
						'Please accept our Terms and Conditions to continue'));
			$this->redirect(array('//shop/order/create'));
		}
	}

	public function actionSuccess()
	{
		$this->render('/order/success');
	}

	public function actionFailure()
	{
		$this->render('/order/failure');
	}


	public function actionAdmin()
	{
		/* $model=new Order('search');
		if(isset($_GET['Order']))
			$model->attributes=$_GET['Order'];
		*/
		
		$model = Order::model()->findAll("store_id = '".Yii::app()->user->getState('storeLogin')->id."'");
		$this->render('admin',array(
					'model'=>$model,
					));
	}

	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Order::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

}
