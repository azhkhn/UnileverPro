$(function(){
	
	var dmsCode = false;
	$("#txtTransactionOf").val(moment().format('DD-MMMM-YYYY'));
	$("#txtTransactionOfsaleTransactionHistory").val(moment().format('DD-MMMM-YYYY'));
	// TODO: ON CHANGE ON BA 
	$("#selectedBA").change(function(){
		var start_date = moment().date(1).format('YYYY-MM-DD');
		var end_date = moment().add('months', 1).date(0).format('YYYY-MM-DD');
		if(dmsCode==true){
			dmsCode = false;
			return false;
		}
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'projectsupervisor/changeba',
			type: "POST",
			dataType: "JSON",
			data: {
				'ba_id' : $("#selectedBA").val(),
				'start_date' : start_date,
				'end_date' : end_date
			},
			success: function(data){
				console.log(data);
				$('.md-input-wrapper').find('.md-input').not("#txtTransactionOf,#txtTransactionOfsaleTransactionHistory, #txtNumberOfWorking").val('');
				$('.md-input-wrapper').removeClass('md-input-filled');
				if(data.user){
					$("#txtPhoto").attr('src',data.user.photo);
					$("#txtSupervisorName").val(data.user.supervisor);
					$("#txtBAExecutive").val(data.user.executive);

					$("#txtMarketName").val(data.user.outlet_address);
					$("#txtOutletName").data("id", data.user.outlet_id);
					//alert($("#txtOutletName").data("id"));
					$("#txtOutletName").val(data.user.outlet_name);
					$("#txtDMSCode").val(data.user.dms_code);
					$("#txtDT").val(data.user.distributor);
					$("#txtCustomerType").val(data.user.customer_type);
					$("#txtChannel").val(data.user.channel);
					$("#txtMonthlyTarget").val('$ '+ data.user.sumtarget);
					$("#txtTodayTarget").val('$ ' + data.user.sumtodaytarget);
					$("#startDate").val(moment(start_date).format('DD-MMMM-YYYY'));
					$("#endDate").val(moment(end_date).format('DD-MMMM-YYYY'));
					$("#txtTodayAchievement").val('$ ' + data.user.today_achievement);
					$("#txtMonthToDateAchievement").val('$ ' + data.user.month_achievement);
					$("#txtYearToDateAchievement").val('$ ' + data.user.year_achievement);
					$("#txtTodayAchievementPercent").val('% ' + data.user.today_achievement_percent);
					$("#txtMonthToDateAchievementPercent").val('% ' + data.user.month_achievement_percent);
					$("#txtYearToDateAchievementPercent").val('% ' + data.user.year_achievement_percent);
					$('.md-input-wrapper').addClass('md-input-filled');
					sales.getAllSales(SITE_URL+"projectsupervisor/ajax");
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
	});


	// TODO: ON CHANGE ON BA 
	$("#txtDMSCode").keyup(function(e){
		var code = (e.keyCode ? e.keyCode : e.which);
    	if (code==13) {
    		dmsCode = true;
			var start_date = moment().date(1).format('YYYY-MM-DD');
			var end_date = moment().add('months', 1).date(0).format('YYYY-MM-DD');
			modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
			$.ajax({
				url: SITE_URL+'projectsupervisor/changedmsCode',
				type: "POST",
				dataType: "JSON",
				data: {
					'dms_code' : $("#txtDMSCode").val(),
					'start_date' : start_date,
					'end_date' : end_date
				},
				success: function(data){
					console.log(data);
					$("#txtNumberOfWorking").val(26);
					if(data.user){
						dmsCode = true;
						$('.md-input-wrapper').find('.md-input').not("#txtTransactionOf,,#txtTransactionOfsaleTransactionHistory,#txtNumberOfWorking").val('');
						$('.md-input-wrapper').removeClass('md-input-filled');
						$("#txtNumberOfWorking").val(26);
						var $selectedBA = $("#selectedBA").selectize();
						var selectedBA = $selectedBA[0].selectize;
						selectedBA.setValue(data.user.id);
						$("#txtPhoto").attr('src',data.user.photo);
						$("#txtSupervisorName").val(data.user.supervisor);
						$("#txtBAExecutive").val(data.user.executive);
						$("#txtMarketName").val(data.user.outlet_address);
						$("#txtOutletName").val(data.user.outlet_name);
						$("#txtDMSCode").val(data.user.dms_code);
						$("#txtDT").val(data.user.distributor);
						$("#txtCustomerType").val(data.user.customer_type);
						$("#txtChannel").val(data.user.channel);
						$("#txtMonthlyTarget").val('$ '+ data.user.sumtarget);
						$("#txtTodayTarget").val('$ ' + data.user.sumtodaytarget);
						$("#startDate").val(moment(start_date).format('DD-MMMM-YYYY'));
						$("#endDate").val(moment(end_date).format('DD-MMMM-YYYY'));
						$("#txtTodayAchievement").val('$ ' + data.user.today_achievement);
						$("#txtMonthToDateAchievement").val('$ ' + data.user.month_achievement);
						$("#txtYearToDateAchievement").val('$ ' + data.user.year_achievement);
						$("#txtTodayAchievementPercent").val('% ' + data.user.today_achievement_percent);
						$("#txtMonthToDateAchievementPercent").val('% ' + data.user.month_achievement_percent);
						$("#txtYearToDateAchievementPercent").val('% ' + data.user.year_achievement_percent);
						$('.md-input-wrapper').addClass('md-input-filled');
						sales.getAllSales(SITE_URL+"projectsupervisor/ajax");
					}else{
						$("#txtPhoto").attr('src',"");
						$("#txtSupervisorName").val("");
						$("#txtBAExecutive").val("");
						$("#txtMarketName").val("");
						$("#txtOutletName").val("");
						$("#txtDT").val("");
						$("#txtCustomerType").val("");
						$("#txtChannel").val("");
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
					$("#txtNumberOfWorking").val(26);
					modal.hide();
					console.log(data);
				}
			});
    	}
	});

	// TODO: ON CHANGE ON STARTE DATE 
	$("#startDate, #endDate").change(function(e){
		if($("#startDate").val()=="" || $("#endDate").val()==""){
			return false;
		}
		if(moment($("#startDate").val()).format('YYYY-MM-DD') > moment($("#endDate").val()).format('YYYY-MM-DD')){
			return false;
		}
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'projectsupervisor/changeba',
			type: "POST",
			dataType: "JSON",
			data: {
				'ba_id' : $("#selectedBA").val(),
				'start_date' : moment($("#startDate").val()).format("YYYY-MM-DD"),
				'end_date' :  moment($("#endDate").val()).format("YYYY-MM-DD")
			},
			success: function(data){
				console.log(data);
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
				$("#txtNumberOfWorking").val(26);
				modal.hide();
				console.log(data);
			}
		});
	});

	var sales = {};

	// TODO: LIST ALL USERS
	sales.getAllSales = function(URL){
		var selectedDate = moment($("#txtTransactionOfsaleTransactionHistory").val()).format('YYYY-MM-DD');
		//modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: URL,
			type: "POST",
			dataType: "JSON",
			data: {
				'ba_id'     : $("#selectedBA").val(),
				'sale_date' : selectedDate,
				'outlet_id' : $("#txtOutletName").data("id"),
			},
			success: function(data){
				console.log(data);
				$("#PAGINATIONsaleTransactionHistory").html(data.page_links);
				if(data.sales.length>0){
					$("tbody#CONTENTSsaleTransactionHistory").html('');
					for(var i=0;i<data.sales.length;i++){
                        data.sales[i]['check']='';
                        console.log(data.sales[i]);
                        sales.formatData(data.sales[i]);
                    }
					$("#CONTENT_TEMPLATE").tmpl(data.sales).appendTo("tbody#CONTENTSsaleTransactionHistory");
				}else{
					$("tbody#CONTENTSsaleTransactionHistory").html('<tr>NO CONTENTS</tr>');
				}
				//modal.hide();
			},
			error: function(data){
				modal.hide();
				console.log(data);
			}
		});
	};

	/*sales.getAllSales(SITE_URL+"supervisor/ajax");*/

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
	
	$(document).on('click',"#btnDelete", function(e){
		if(confirm("Do you really want to delete it?")){
			var _this = $(this);
			modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
			$.ajax({
				url: SITE_URL+"projectsupervisor/deleteSale",
				type: "POST",
				dataType: "JSON",
				data: {
					'product_id' : _this.parent().data("productid"),
					'sale_id' : _this.parent().data("saleid")
				},
				success: function(data){
					sales.getAllSales(SITE_URL+"projectsupervisor/ajax");
				},
				error: function(data){
					modal.hide();
					console.log(data);
				}
			}).done(function(){
				modal.hide();
			});
		}		
	});
	
	$(document).on('click','#btnUpdate', function(){
		//alert($(this).parent().data("productid"));
		$("#selectedItemCode").val($(this).parent().data("itemcode"));
		$("#selectedItemName").val($(this).parent().data("itemname"));
		$("#txtQuantitySold").val($(this).parent().data("quantitysold"));
		$("#txtPrice").val($(this).parent().data("price"));
		$("#txtAmount").val($(this).parent().data("amount"));
		$("#txtPromotion").val($(this).parent().data("promotionname"));
		$("#btnSave").data("productid", $(this).parent().data("productid"));
		$("#btnSave").data("saleid", $(this).parent().data("saleid"));
		$("#btnSave").data("promotionid", $(this).parent().data("promotionid"));
		var modalPopup = UIkit.modal("#modalAddNewSale");
		if ( modalPopup.isActive() ) {
		    modalPopup.hide();
		} else {
		    modalPopup.show();
		}
	});
	
	$("#txtQuantitySold").change(function(){
		$("#txtAmount").val($("#txtQuantitySold").val() * $("#txtPrice").val());
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+"supervisor/checkpromotion",
			type: "POST",
			dataType: "JSON",
			data: {
				'product_id' : $("#btnSave").data("productid"),
				'quantity' : $("#txtQuantitySold").val()
			},
			success: function(data){
				console.log(data);
				if(data.promotion){
					$("#btnSave").data("promotionid", data.promotion.id);
					$("#txtPromotion").val("BUY "+ data.promotion.buy + " FREE " + data.promotion.free);
				}else{
					$("#btnSave").data("promotionid", "");
					$("#txtPromotion").val("");
				}
				modal.hide();
			},
			error: function(data){
				console.log(data);
				modal.hide();
			}
		}).done(function(data){
			console.log(data);
			modal.hide();
		});
	});
	
	$(document).on('click', "#btnSave", function(e){
		e.preventDefault();
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+"projectsupervisor/updatesale",
			type: "POST",
			dataType: "JSON",
			data: {
				'sale_id' : $("#btnSave").data("saleid"),
				'product_id' : $("#btnSave").data("productid"),
				'quantity' : $("#txtQuantitySold").val(),
				'promotion_id': $("#btnSave").data("promotionid")
			},
			success: function(data){
				console.log(data);
				UIkit.modal.alert(data.message);
				modal.hide();
			},
			error: function(data){
				console.log(data);
				modal.hide();
			}
		}).done(function(data){
			console.log(data);
			modal.hide();
		});
	});
	
	$("#btnClose").click(function(){
		sales.getAllSales(SITE_URL+"projectsupervisor/ajax");	
	});

	// TODO: ON CHANGE ON Transaction Of Date
	$("#txtTransactionOfsaleTransactionHistory").change(function(){
		sales.getAllSales(SITE_URL+"projectsupervisor/ajax");
	});
});