$(function(){
	
	// TODO: CREATE SALES OBJECT
	var sales = {};

	// TODO: LIST ALL USERS
	sales.getAllSales = function(URL){
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

	// TODO: ON CHANGE ON BA 
	$("#selectedBA").change(function(){
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'report/changeba',
			type: "POST",
			dataType: "JSON",
			data: {
				'ba_id' : $("#selectedBA").val(),
			},
			success: function(data){
				console.log(data);
				$('.md-input-wrapper').find('.md-input').val('');
				if(data.user){
					$("#txtSupervisorName").val(data.user.supervisor);
					$("#txtBAExecutive").val(data.user.executive);
					$("#txtMarketName").val(data.user.outlet_address);
					$("#txtOutletName").val(data.user.outlet_name);
					$("#txtDMSCode").val(data.user.dms_code);
					$("#txtDT").val(data.user.distributor);
					$("#txtCustomerType").val(data.user.customer_type);
					$("#txtChannel").val(data.user.channel);
					$("#txtMonthlyTarget").val('$ '+ data.user.monthly_target);
					$("#txtTodayTarget").val('$ ' + data.user.monthly_target/26);
					$("#startDate").val(data.user.start_date);
					$("#endDate").val(data.user.end_date);
					$("#txtTodayAchievement").val(data.today_achievement);
					$("#txtMonthToDateAchievement").val(data.month_achievement);
					$("#txtYearToDateAchievement").val(data.year_achievement);
					$("#txtTodayAchievementPercent").val(data.today_achievement_percent);
					$("#txtMonthToDateAchievementPercent").val(data.month_achievement_percent);
					$("#txtYearToDateAchievementPercent").val(data.year_achievement_percent);
					$('.md-input-wrapper').addClass('md-input-filled');
				}
				modal.hide();
			},
			error: function(data){
				$('.md-input-wrapper').find('.md-input').val('');
				modal.hide();
				console.log(data);
			}
		});
	});
});