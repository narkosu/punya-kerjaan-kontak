/**
 * jQuery shipping product list plugin
 * @author budi sunarko
 */

;
(function($) {
    /**
	 * additionalPriceset function.
	 * @param options map settings for the comments list. Availablel options are as follows:
	 * - deleteConfirmString
         * - approveConfirmString
	 */
    $.fn.additionalPrice= function(options) {
        return this.each(function(){
            var settings = $.extend({}, $.fn.additionalPrice.defaults, options || {});
            var $this = $(this);
            var id = $this.attr('id');
          
            $.fn.additionalPrice.settings[id] = settings;
           // $.fn.additionalPrice.initDialog(id);
            $this
            .delegate('.saveadditionalprice', 'click', function(){
				var $form = $("#addfeenewrecord");
				var error = '';
				alert($form.attr("action") + 'asas '+$("#addfeenewrecord").serialize());

				
				alert($('#order_id').attr('name') );
				if ( $('#order_id').val() == ''){
					error += 'order id kosong';
				}
				
				if ( $('#add_description').val() == ''){
					error += 'Penjelasan kosong';
				}
				
				if ( $('#add_fee').val() == ''){
					error += 'Biaya kosong';
				}
				
				
				if (error != ''){
					alert(error);
					return false;
				}
				
				$.post($('#addfeenewrecord').attr('action'),
					   $('#addfeenewrecord').serialize(),
					   function(res){
							$('<tr id="rowaf_'+res.id+'">'+
								'<td>'+$('#add_description').val()+'</td>'+
								'<td>'+$('#add_fee').val()+'</td>'+
								'<td></td>'+
								'<td class="lastcol">'+
								'<span class="icon-remove removeitem" relhref="'+
								res.url_delete+'" delid="'+res.id+'"></span></td>'+
								'</tr>').insertBefore(".lastrecord");
							  
						},'json');
				
                return false;
            }).
			delegate(".removeitem",'click',function(){
				var url = $(this).attr('relhref');
				var delid = $(this).attr('delid');
				var param = 'id='+delid;
				var $confirm = confirm('are you sure to delete?');
				if ( $confirm ){
					$.post(url,param
					   ,
					   function(res){
							$("#rowaf_"+delid).remove();
						});
				}
				return false;
			});
			
        });
    };
        
    $.fn.additionalPrice.defaults = {
       /* dialogTitle: 'Add comment',
        deleteConfirmString: 'Delete this comment?',
        approveConfirmString: 'Approve this comment?',
        postButton: 'Add comment',
        cancelButton: 'Cancel'*/
    };
        
    $.fn.additionalPrice.settings = {};
     /*
    $.fn.additionalPrice.initDialog = function(id){
        var $dialog = $('#addCommentDialog-'+id);
        $dialog.data('widgetID', id);
        $dialog.dialog({
            'title':$.fn.additionalPrice.settings[id]['dialogTitle'],
            'autoOpen':false,
            'width':'auto',
            'height':'auto',
            'resizable':false,
            'modal':true,
            'buttons':[
                {
                    text: $.fn.additionalPrice.settings[id]['postButton'],
                    click: function(){
                        $.fn.additionalPrice.postComment($(this));
                    }
                },
                {
                    text: $.fn.additionalPrice.settings[id]['cancelButton'],
                    click: function(){
                        $(this).dialog("close");
                        return false;
                    }
                }
            ]
        });
    }
     
    $.fn.additionalPrice.postComment = function($dialog){
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