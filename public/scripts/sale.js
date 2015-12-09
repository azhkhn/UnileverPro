$(function(){
	
	$("#txtTransactionOf").val(moment().format('DD-MMMM-YYYY'));
	// TODO: CREATE SALES OBJECT
	var sales = {};
	var seller =  {};

	// TODO: GET SELLER INFORMATION
	seller.getSellerInformation = function(){
		var start_date = moment().date(1).format('YYYY-MM-DD');
		var end_date = moment().add('months', 1).date(0).format('YYYY-MM-DD');
		var selectedDate = moment($("#txtTransactionOf").val()).format('YYYY-MM-DD');
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'sale/onchange',
			type: "POST",
			dataType: "JSON",
			data: {
				'start_date' : start_date,
				'end_date' : end_date,
				'sale_date' : selectedDate,
				'outlet_id' : $("#txtOutletId").val(),
			},
			success: function(data){
				console.log(data);
				//$('.md-input-wrapper').find('.md-input').val('');
				$('.md-input-wrapper').removeClass('md-input-filled');
				$("#txtNumberOfWorking").val(26);
				if(data.user){
					$("#txtBAName").val(data.user.last_name + " " + data.user.first_name)
					$("#txtSupervisorName").val(data.user.supervisor);
					$("#txtBAExecutive").val(data.user.executive);
					$("#txtMarketName").val(data.user.outlet_address);
					$("#txtOutletName").val(data.user.outlet_name);
					$("#txtOutletId").val(data.user.outlet_id);
					$("#txtDMSCode").val(data.user.dms_code);
					$("#txtDT").val(data.user.distributor);
					$("#txtCustomerType").val(data.user.customer_type);
					$("#txtChannel").val(data.user.channel);
					$("#txtMonthlyTarget").val('$ '+ data.user.monthly_target);
					$("#txtTodayTarget").val('$ ' + data.user.today_target);
					$("#startDate").val(data.user.start_date);
					$("#endDate").val(data.user.end_date);
					$("#txtTodayAchievement").val('$ ' + data.sale_archievement.amount);
					$("#txtMonthToDateAchievement").val('$ ' + data.sale_archievement_month_to_date.amount);
					$("#txtYearToDateAchievement").val('$ ' + data.sale_archievement_year_to_date.amount);
					$("#txtTodayAchievementPercent").val('% ' + data.sale_archievement.amount);
					$("#txtMonthToDateAchievementPercent").val('% ' + data.sale_archievement_month_to_date.amount);
					$("#txtYearToDateAchievementPercent").val('% ' + data.sale_archievement_year_to_date.amount);
					$('.md-input-wrapper').addClass('md-input-filled');
					//sales.getAllSales(SITE_URL+"sale/ajax");
					$("#PAGINATION").html(data.page_links);
					if(data.sales.length>0){
						$("tbody#CONTENTS").html('');
						for(var i=0;i<data.sales.length;i++){
		                    data.sales[i]['check']='';
		                    sales.formatData(data.sales[i]);
		                }
						$("#CONTENT_TEMPLATE").tmpl(data.sales).appendTo("tbody#CONTENTS");
					}else{
						$("tbody#CONTENTS").html('<tr>NO CONTENTS</tr>');
					}
				}
				modal.hide();
			},
			error: function(data){
				$('.md-input-wrapper').find('.md-input').val('');
				$('.md-input-wrapper').removeClass('md-input-filled');
				$("#txtNumberOfWorking").val(26);
				modal.hide();
				console.log(data);
			}
		});
	};

	seller.getSellerInformation();
	// TODO: LIST ALL USERS
	sales.getAllSales = function(URL){
		var selectedDate = moment($("#txtTransactionOf").val()).format('YYYY-MM-DD');
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: URL,
			type: "POST",
			dataType: "JSON",
			data: {
				'sale_date' : selectedDate,
				'outlet_id' : $("#txtOutletId").val(),
			},
			success: function(data){
				console.log(data);
				$("#PAGINATION").html(data.page_links);
				if(data.sales.length>0){
					$("tbody#CONTENTS").html('');
					for(var i=0;i<data.sales.length;i++){
                        data.sales[i]['check']='';
                        sales.formatData(data.sales[i]);
                    }
					$("#CONTENT_TEMPLATE").tmpl(data.sales).appendTo("tbody#CONTENTS");
				}else{
					$("tbody#CONTENTS").html('<tr>NO CONTENTS</tr>');
				}
				modal.hide();
			},
			error: function(data){
				modal.hide();
				console.log(data);
			}
		});
	};
	// TODO: SALES FORMART DATA
	sales.formatData = function(val){
        
    }

	// TODO: PAGINATION ON SALES
	$('body').on('click', '.uk-pagination a', function(e){
		e.preventDefault();
		var URL = $(this).attr('href');
		if(URL!="#"){
			sales.getAllSales(URL);
		}
		return false;
	});

	// TODO: OPEN ADD NEW FORM
	$("#btnOpenAddNew").click(function(){
		$("#btnUpdateSave").hide();
		$("#btnSave").show();
		$('.md-input-wrapper').find('.inmd-input').val('');
		$('frmAddNewSale .md-input-wrapper').removeClass('md-input-filled');
		$('#txtAmount').parents('.md-input-wrapper').addClass('md-input-filled');
		$('#txtQuantitySold').parents('.md-input-wrapper').addClass('md-input-filled');
		$('#txtPrice').parents('.md-input-wrapper').addClass('md-input-filled');
		var $selectItemCode = $("#selectedItemCode").selectize();
		var selectItemCode = $selectItemCode[0].selectize;
		var $selectItemName = $("#selectedItemName").selectize();
		var selectItemName = $selectItemName[0].selectize;
		selectItemCode.setValue(''); 
		selectItemName.setValue('');
	});

	// TODO: ON CHANGE ON THE ITEMCODE
	$("#selectedItemCode").change(function(){
		var $selectItemName = $("#selectedItemName").selectize();
		var selectItemName = $selectItemName[0].selectize;
		selectItemName.setValue($(this).val());
		var selectedValue = $(this).val().split(';');
		$("#txtPrice").val(selectedValue[1]);
	});

	// TODO: ON CHANGE ON THE ITEMNAME
	/*$("#selectedItemName").change(function(){
		var selectedValue = $(this).val().split(';');
		$("#txtPrice").val(selectedValue[1]);
		var $selectItemCode = $("#selectedItemCode").selectize();
		var selectItemCode = $selectItemCode[0].selectize;
		selectItemCode.setValue($(this).val()); 
	});*/


	// TODO: ON CHANGE ON THE PRICE
	$("#txtPrice").change(function(){
		$("#txtAmount").val($('#txtQuantitySold').val() * $("#txtPrice").val());
		$('#txtAmount').parents('.md-input-wrapper').addClass('md-input-filled');
	});

	// TODO: ON KEY UP WHEN CHANGE ON THE QUANTITY SOLD
	$("#txtQuantitySold").keyup(function(){
		$("#txtAmount").val($('#txtQuantitySold').val() * $("#txtPrice").val());
		$('#txtAmount').parents('.md-input-wrapper').addClass('md-input-filled');
	});

	// TODO: ON CHANGE ON Transaction Of Date
	$("#txtTransactionOf").change(function(){
		sales.getAllSales(SITE_URL+"sale/ajax");
	});

	// TODO: ADD NEW SALE 
	$("#frmAddNewSale").submit(function(e){
		e.preventDefault();
		if($("#selectedItemName").val()=="" || $("#selectedItemCode").val()==""){
			UIkit.modal.alert("PLEASE CHOOSE THE ITEM YOU WANT TO SALE");
			return false;
		}
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		var selectedValue = $("#selectedItemCode").val().split(';');
		$.ajax({
			url: SITE_URL+'sale/add',
			type: "POST",
			dataType: "JSON",
			data:{
				'outlet_id'         : $("#txtOutletId").val(),
				'product_id'        : selectedValue[0],
				'price'   			: $("#txtPrice").val(),
				'promotion_id' 		: $("#txtPromotion").val(),
				'promotion_type_id' : $("#selectedPromotionType").val(),
				'quantity'			: $("#txtQuantitySold").val(),	
				'saleItems'         : [
					{
						'product_id'        : selectedValue[0],
						'price'   			: $("#txtPrice").val(),
						'promotion_id' 		: $("#txtPromotion").val(),
						'promotion_type_id' : $("#selectedPromotionType").val(),
						'quantity'			: $("#txtQuantitySold").val(),	
					}
				]
			},
			success: function(data){
				console.log(data);
				modal.hide();
				if(data.status==true){
					UIkit.modal.alert(data.message);
					var modalPopup = UIkit.modal("#modalAddNewSale");
					if ( modalPopup.isActive() ) {
					    modalPopup.hide();
					} else {
					    modalPopup.show();
					}
					seller.getSellerInformation();
					//sales.getAllSales(SITE_URL+"sale/ajax");
				}else{
					UIkit.modal.alert(data.message);
				}
				//location.href=SITE_URL + "sale";
			},
			error: function(data){
				modal.hide();
				UIkit.modal.alert(data);
			}
		});
		
	});

	$("#startDate, #endDate").change(function(){
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		if($("#startDate").val()=="" || $("#endDate").val()==""){
			return false;
		}
		if(moment($("#startDate").val()).format('YYYY-MM-DD') > moment($("#endDate").val()).format('YYYY-MM-DD')){
			return false;
		}
		$.ajax({
			url: SITE_URL+'sale/changeba',
			type: "POST",
			dataType: "JSON",
			data: {
				'start_date' : moment($("#startDate").val()).format('YYYY-MM-DD'),
				'end_date'   : moment($("#endDate").val()).format('YYYY-MM-DD'),
				'outlet_id' : $("#txtOutletId").val(),
			},
			success: function(data){
				console.log(data);
				//$('.md-input-wrapper').find('.md-input').val('');
				$('.md-input-wrapper').removeClass('md-input-filled');
				$("#txtNumberOfWorking").val(26);
				if(data.user){
					$("#txtMonthlyTarget").val('$ '+ data.user.sumtarget);
					$("#txtTodayTarget").val('$ ' + data.user.sumtodaytarget);
					$("#txtTodayAchievement").val('$ ' + data.user.today_achievement);
					$("#txtMonthToDateAchievement").val('$ ' + data.user.month_achievement);
					$("#txtYearToDateAchievement").val('$ ' + data.user.year_achievement);
					$("#txtTodayAchievementPercent").val('% ' + data.user.today_achievement_percent);
					$("#txtMonthToDateAchievementPercent").val('% ' + data.user.month_achievement_percent);
					$("#txtYearToDateAchievementPercent").val('% ' + data.user.year_achievement_percent);
					$('.md-input-wrapper').addClass('md-input-filled');
				}else{
					$("#txtMonthlyTarget").val('$ 0.00');
					$("#txtTodayTarget").val('$ 0.00');
					$("#txtTodayAchievement").val('$ 0.00');
					$("#txtMonthToDateAchievement").val('$ 0.00');
					$("#txtYearToDateAchievement").val('$ 0.00');
					$("#txtTodayAchievementPercent").val('% 0');
					$("#txtMonthToDateAchievementPercent").val('% 0');
					$("#txtYearToDateAchievementPercent").val('% 0');
					$('.md-input-wrapper').addClass('md-input-filled');
				}
				modal.hide();
			},
			error: function(data){
				$('.md-input-wrapper').removeClass('md-input-filled');
				$("#txtNumberOfWorking").val(26);
				modal.hide();
				console.log(data);
			}
		});
	});
});