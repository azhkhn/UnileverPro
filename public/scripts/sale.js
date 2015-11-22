$(function(){
	
	$("#txtTransactionOf").val(moment().format('DD-MMMM-YYYY'));
	// TODO: CREATE SALES OBJECT
	var sales = {};

	// TODO: LIST ALL USERS
	sales.getAllSales = function(URL){
		var selectedDate = moment($("#txtTransactionOf").val()).format('YYYY-MM-DD');
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: URL,
			type: "POST",
			dataType: "JSON",
			data: {
				'sale_date' : selectedDate
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
			//$(this).parents(".uk-pagination").find('li').removeClass('uk-active');
			//$(this).parent('li').addClass('uk-active');
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

	$("#txtPrice").change(function(){
		$("#txtAmount").val($('#txtQuantitySold').val() * $("#txtPrice").val());
		$('#txtAmount').parents('.md-input-wrapper').addClass('md-input-filled');
	});

	$("#txtQuantitySold").keyup(function(){
		$("#txtAmount").val($('#txtQuantitySold').val() * $("#txtPrice").val());
		$('#txtAmount').parents('.md-input-wrapper').addClass('md-input-filled');
	});

	$("#txtTransactionOf").change(function(){
		sales.getAllSales(SITE_URL+"sale/ajax");
	});

});