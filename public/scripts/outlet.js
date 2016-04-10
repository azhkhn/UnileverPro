$(function(){
   // TODO: DELETE OUTLET
	$(document).on('click','#btnDelete', function(){
		var id = $(this).data('id');
		var _this = $(this);
		UIkit.modal.confirm('Do you want to delete that outlet?', 
			function(){ 
				UIkit.modal.confirm("Are you really want to delete that outlet?",
					function(){
						modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
						$.ajax({
							url: SITE_URL+'outlet/deletepro/'+id,
							type: "POST",
							dataType: "JSON",
							success: function(data){
								modal.hide();
								console.log(data);
								if(data){
									UIkit.modal.alert('You have been deleted successfully!'); 	
									location.href=SITE_URL + "Outlet";
								}else{
									UIkit.modal.alert('You have an error when delete the outlet. Please try again!'); 	
								}
							},
							error: function(data){
								modal.hide();
								console.log(data);
							}
						});
					}
				
				);
			}
		);			
	});
	
	
	// TODO: UPDATE STATUS
	$(document).on('change','#btnStatus', function(){
		var id = $(this).attr('data');
		var value = ($(this).val()=="on") ? 1 : 0 ;
		var _this = $(this);
		UIkit.modal.confirm('Are you really want to pending this outlet?', 
			function(){ 
				modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
				$.ajax({
					url: SITE_URL+'outlet/changestatus/'+id,
					type: "POST",
					dataType: "JSON",
					data:{
						'status' : value
					},
					success: function(data){
						modal.hide();
						console.log(data);
						if(data){
							_this.val((_this.val()=="on") ? "off" : "on")
							UIkit.modal.alert('You have been changed successfully!'); 	
						}else{
							_this.val((_this.val()=="on") ? "on" : "off")
							UIkit.modal.alert('You have an error when changing the status. Please try again!'); 	
						}
					},
					error: function(data){
						modal.hide();
						_this.val((_this.val()=="on") ? "on" : "off")
						console.log(data);
					}
				});
			}
		);		
	});
});