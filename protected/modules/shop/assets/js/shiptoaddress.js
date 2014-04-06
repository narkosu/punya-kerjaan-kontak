/**
 * jQuery shipping product list plugin
 * @author budi sunarko
 */

;
(function($) {
    /**
	 * shiptoaddress set function.
	 * @param options map settings for the comments list. Availablel options are as follows:
	 * - deleteConfirmString
         * - approveConfirmString
	 */
    $.fn.shiptoaddress = function(options) {
        return this.each(function(){
            var settings = $.extend({}, $.fn.shiptoaddress.defaults, options || {});
            var $this = $(this);
            var id = $this.attr('id');
            
            $.fn.shiptoaddress.settings[id] = settings;
           // $.fn.shiptoaddress.initDialog(id);
            $this
            .delegate('#shiptoaddress', 'change', function(){
				//alert($(this).val()+' '+$("#shiptoaddress").find('option[value='+$(this).val()+']').attr('city_state_dn'));
				
				var city_state_dn = $("#shiptoaddress").find('option[value='+$(this).val()+']').attr('city_state_dn');
				var store_id = $(this).attr('store_id');
				alert($(this).serialize()+'&shipto='+city_state_dn+'&store_id='+store_id);
				/* ajax for consumer */
				$.ajax({
					url:'../../shop/customer/getaddress',
					data: $(this).serialize()+'&shipto='+city_state_dn+'&store_id='+store_id,
					dataType:'html',
					success: function(result) {
						$('#address_'+store_id).html(result);
						
					},
					error: function() {
						$(this).css('background-color', 'red');
					},

				});
				/* ajax for update */
				$.ajax({
					url:'../../shop/shoppingCart/UpdatePricingByShipping',
					data: $(this).serialize()+'&shipto='+city_state_dn+'&store_id='+store_id,
					dataType:'json',
					success: function(result) {
						$.each(result[store_id], function(product_id, item) {
							alert(product_id);
							$('.shipping_area_'+store_id+'_'+product_id).html(' + Biaya kirim : ' + item.single_cr);
						  });
						
					},
					error: function() {
						$(this).css('background-color', 'red');
					},

				});
			})
            ;
        });
    };
        
    $.fn.shiptoaddress.defaults = {
       /* dialogTitle: 'Add comment',
        deleteConfirmString: 'Delete this comment?',
        approveConfirmString: 'Approve this comment?',
        postButton: 'Add comment',
        cancelButton: 'Cancel'*/
    };
        
    $.fn.shiptoaddress.settings = {};
  
})(jQuery);