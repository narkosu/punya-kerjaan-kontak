/**
 * jQuery shipping product list plugin
 * @author budi sunarko
 */

;
(function($) {
    /**
	 * shippingForm set function.
	 * @param options map settings for the comments list. Availablel options are as follows:
	 * - deleteConfirmString
         * - approveConfirmString
	 */
    $.fn.shippingForm = function(options) {
        return this.each(function(){
            var settings = $.extend({}, $.fn.shippingForm.defaults, options || {});
            var $this = $(this);
            var id = $this.attr('id');
            
            $.fn.shippingForm.settings[id] = settings;
           // $.fn.shippingForm.initDialog(id);
            $this
            .delegate('.delete', 'click', function(){
				
				$(this).parents('.listrecord_'+$(this).attr('delid')).remove();
				
                return false;
            })
			.delegate('.showmore', 'click', function(){
				
				$(this).parents().find('.listshowmore').toggle();
				if ($(this).hasClass('icon-chevron-down')){
					$(this).removeClass('icon-chevron-down').addClass('icon-chevron-up');
				}else{
					$(this).removeClass('icon-chevron-up').addClass('icon-chevron-down');
				}				
                return false;
            })
			.delegate('#shippingfrom', 'change', function(){
				var newrecord = $(this).parents().find('.local').clone();
				var shiptoname = newrecord.find('.shipsto').text();
				var shiptoid = newrecord.find('.shipsto').attr('shipstoid');
				
				if (!$(this).parents().find('tr').hasClass('listrecord_'+shiptoid) && shiptoid  ){
					/* add to after */
					newrecord.find('.shipsto').html(shiptoname);
					newrecord.find('.lastcol').html('<span class="icon-remove delete" delid="'+shiptoid+'"></span>');
					newrecord.removeClass('local').addClass('listrecord_'+shiptoid);
					$(this).parents().find('.newrecord').before(newrecord);
					/* add new shipping */
					$(this).parents().find('.local').find('.shipsto').attr('shipstoid',$(this).val());
					$(this).parents().find('.local').find('.shipsto').text($(this).find('option:selected').text());
				}	
			})
            .delegate('#ShippingProduct_shipping_from_newrecord', 'change', function(){
				var val = $(this).find('option:selected').val();
				$(this).find('option[selected=selected]').removeAttr('selected');
				$(this).find('option[value='+val+']').attr('selected','selected');
			})
			
			.delegate('.addshipping', 'click', function(){	
				//var id = $($(this).parents('.comment-widget')[0]).attr("id");
				var newrecord = $(this).parents().find('.newrecord').clone();
				
				
				//alert(newrecord.find('#ShippingProduct_shipping_from_newrecord option:selected').val());
				var shiptoid 	= newrecord.find('#ShippingProduct_shipping_from_newrecord option:selected').val();
				
				var shiptoname 	= newrecord.find('#ShippingProduct_shipping_from_newrecord option:selected').text()+
								'<input type="hidden" name="ShippingProduct[shipsto]['+shiptoid+']" value="'+shiptoid+'">'//hidden field sipid
								;
				
				
				if (!$(this).parents().find('tr').hasClass('listrecord_'+shiptoid) && shiptoid  ){
					newrecord.find('#new_record_cost').attr('name','ShippingProduct[cost]['+shiptoid+']');
					newrecord.find('#new_record_other_cost').attr('name','ShippingProduct[other_cost]['+shiptoid+']');
					newrecord.find('.shipsto').html(shiptoname);
					newrecord.find('.lastcol').html('<span class="icon-remove delete" delid="'+shiptoid+'"></span>');
					newrecord.removeClass('newrecord').addClass('listrecord_'+shiptoid);
					$(this).parents().find('.newrecord').before(newrecord);
				}	
				
                return false;
            });
        });
    };
        
    $.fn.shippingForm.defaults = {
       /* dialogTitle: 'Add comment',
        deleteConfirmString: 'Delete this comment?',
        approveConfirmString: 'Approve this comment?',
        postButton: 'Add comment',
        cancelButton: 'Cancel'*/
    };
        
    $.fn.shippingForm.settings = {};
     /*
    $.fn.shippingForm.initDialog = function(id){
        var $dialog = $('#addCommentDialog-'+id);
        $dialog.data('widgetID', id);
        $dialog.dialog({
            'title':$.fn.shippingForm.settings[id]['dialogTitle'],
            'autoOpen':false,
            'width':'auto',
            'height':'auto',
            'resizable':false,
            'modal':true,
            'buttons':[
                {
                    text: $.fn.shippingForm.settings[id]['postButton'],
                    click: function(){
                        $.fn.shippingForm.postComment($(this));
                    }
                },
                {
                    text: $.fn.shippingForm.settings[id]['cancelButton'],
                    click: function(){
                        $(this).dialog("close");
                        return false;
                    }
                }
            ]
        });
    }
     
    $.fn.shippingForm.postComment = function($dialog){
        var $form = $("form", $dialog);
        $.post(
            $form.attr("action"),
            $form.serialize()
            ).success(function(data){
            data = $.parseJSON(data);
            $dialog.html(data["form"]);
            if(data["code"] == "success")
            {
                var id = $dialog.data('widgetID');
				alert($(data["list"]).html());
                $('#'+id).html($(data["list"]).html());
               // $dialog.dialog("close");
			   alert(id);
            }
        });
    }
	 */  
})(jQuery);