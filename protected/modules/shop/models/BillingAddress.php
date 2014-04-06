<?php

	class BillingAddress extends Profile {

		// This address is not *required*
		public function rules()
		{
			return array(
					array('firstname, lastname, street, zipcode, city, country', 'length', 'max'=>255),
					array('id, street, zipcode, city, country', 'safe', 'on'=>'search'),
					);
		}

	}
?>
