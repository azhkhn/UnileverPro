$(function() {

	$("#btnOpenAddNew").click(function(){
		$("#frmSaleTarget")[0].reset();
	});

	$("#frmSaleTarget")
			.submit(
					function(event) {
						event.preventDefault();
						
						
						modal = UIkit.modal
								.blockUI('<div class=\'uk-text-center\'>Processing...<br/><img class=\'uk-margin-top\' src=\'<?php echo base_url()?>public/assets/img/spinners/spinner.gif\' alt=\'\'>');
						$.ajax({
							type : "POST",
							url : SITE_URL + "SaleTarget/addSaleTarget",
							dataType : 'json',
							data : {
								name			   	 : $.trim($("#name").val()),
//								oldname			   	 : $.trim($("#oldname").val()),
								description		     : $.trim($("#description").val()),
								ba_id				 : $.trim($("#ba_id").val()),
								target_achievement   : $.trim($("#target_achievement").val()),
								start_date		     : $.trim($("#start_date").val()),
								end_date		     : $.trim($("#end_date").val())
							},
							success : function(data) {
								console.log(data);
								console.log(data);
								if(data["ERROR"]==true){
									console.log(data["MSG"]);
									modal.hide();
									$("#name").css('border-color','red').focus();
									$("#msgError").fadeIn(2500);
								}else{
									UIkit.modal.alert(data["MSG"]);
									console.log(data["MSG"]);
									setTimeout(function(){ 
										location.href= SITE_URL + "saletarget";
						 			}, 1000);
								}
								
								
							},
							error : function(data) {
								modal.hide();
								console.log("ERROR" + data);
							}
						});

					});
	
	
	$(document).on('click','#btnUpdate', function(){
		var id = $(this).attr("data");
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		$.ajax({
			url: SITE_URL+'SaleTarget/update/'+id,
			type: "GET",
			dataType: "JSON",
			success: function(data){
				
				console.log("Success " +data);
				
				var $selectBA = $("#ba_id").selectize();
				var selectBA = $selectBA[0].selectize;
				
				
				$("#name").val(data.name);
				$("#oldname").val(data.name);
				$("#target_achievement").val(data.target_achievement);
				$("#start_date").val(data.start_date);
				$("#end_date").val(data.end_date);
				selectBA.setValue(data.ba_id); 
				$("#description").val(data.description);
				
				
				modal.hide();
				$("#btnSave").hide();
				$("#btnUpdateSave").attr('data',data.id);
				$("#btnUpdateSave").show();
				
				var modalPopup = UIkit.modal("#modalSaleTarget");
				if ( modalPopup.isActive() ) {
				    modalPopup.hide();
				} else {
				    modalPopup.show();
				}

				$('.md-input-wrapper').addClass('md-input-filled');
			},
			error: function(data){
				console.log("Error" + data);
				modal.hide();
				UIkit.modal.alert(data.message);
			}
		});
	});
	
	
	$("#btnUpdateSave").click(function(){
		modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
		var id = $(this).attr('data');
		$.ajax({
			url: SITE_URL+'SaleTarget/updateSaleTarget/'+id,
			type: "POST",
			dataType: "JSON",
			data : {
				name			   	 : $.trim($("#name").val()),
				oldname			   	 : $.trim($("#oldname").val()),
				description		     : $.trim($("#description").val()),
				ba_id				 : $.trim($("#ba_id").val()),
				target_achievement   : $.trim($("#target_achievement").val()),
				start_date		     : $.trim($("#start_date").val()),
				end_date		     : $.trim($("#end_date").val())
			},
			success : function(data) {
				console.log(data);
				console.log(data);
				if(data["ERROR"]==true){
					console.log(data["MSG"]);
					modal.hide();
					$("#name").css('border-color','red').focus();
					$("#msgError").fadeIn(2500);
				}else{
					UIkit.modal.alert(data["MSG"]);
					console.log(data["MSG"]);
					setTimeout(function(){ 
						location.href= SITE_URL + "saletarget";
		 			}, 1000);
				}
				
				
			},
			error : function(data) {
				modal.hide();
				console.log("ERROR" + data);
			}
		});
	});



	//TODO: KENDO GRID	
	var dataSource = new kendo.data.DataSource({
	   	/*pageSize: 20,*/
	   	//data: data.products,
	   	change: function(e) {
	      if (e.action == "itemchange")  {
	        if (e.field == "quantity" || e.field == "price") {
	       
	          var item=  e.items[0];
	         	item.trigger("change", {field: "amount"})
	       } 
	       }

	    },
	   	transport: {
	        read:  {
	            url: SITE_URL + "saletarget/all",
	            dataType: "json"
	        },
	        update: {
	            url: SITE_URL + "saletarget/update_rows",
	            type: "POST",
	            dataType: "json",
	            beforeSend: function(){
	     			modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
	            },
	            complete: function(data){
	            	modal.hide();
	            	console.log(data.responseText.message);
	            	$("#grid").data("kendoGrid").dataSource.read(); 
	            }
	        },
	        /*destroy: {
	            url: SITE_URL + "/Products/Destroy",
	            dataType: "jsonp"
	        },*/
	        create: {
	            url: SITE_URL + "saletarget/create",
	            type: "POST",
	            dataType: "json",
	            beforeSend: function(){
	     			modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
	            },
	            complete: function(data){
	            	modal.hide();
	            	console.log(data.responseText.message);
	            	$("#grid").data("kendoGrid").dataSource.read(); 
	            }
	        },
	        parameterMap: function(options, operation) {
	            if (operation !== "read" && options.models) {
	                return { 
	                	models: kendo.stringify(options.models),
	                };
	            }
	        }
	    },
	   batch: true,
	   /*autoSync: true,*/
	   schema: {
	       model: {
	       	 Total:function() {
	          return this.get("price") * this.get("quantity");
	         },
	         id: "id",
	         fields: {
	         	ba_id: { editable: true, nullable: false },
	            ba_name: { editable: true, nullable: false },
	            target_achievement: {type: "number", editable: true, validation: { required: true, min: 0}},
	            start_date: { editable: true, nullable: false},
	            end_date: { editable: true}
	         },

	       }
	   }
	});

	var dataSourceBA = new kendo.data.DataSource({
       transport: {
            read:  {
                url: SITE_URL + "saletarget/ba_all",
                dataType: "json"
            },
            parameterMap: function(options, operation) {
                if (operation !== "read" && options.models) {
                    return { 
                    	models: kendo.stringify(options.models)
                    };
                }
            }
        },
       batch: true
    });

    var dataSourceOutlets = new kendo.data.DataSource({
       transport: {
            read:  {
                url: SITE_URL + "saletarget/outlets_all",
                dataType: "json"
            },
            parameterMap: function(options, operation) {
                if (operation !== "read" && options.models) {
                    return { 
                    	models: kendo.stringify(options.models)
                    };
                }
            }
        }
    });

	var _grid = $("#grid").kendoGrid({
		dataSource: dataSource,
	    sortable: true,
	    pageable: true,
	    /*pageSize: 2,*/
	    toolbar: ["create","save", "excel"],
	    excel: {
	        fileName: "SALE TARGET REPORT.xlsx"
	    },
	    editable: true,
	    selectable: true,
	    columns: [
	        { field:"id",title:"Id", hidden: true},
	        { field: "ba_name", title:"BA Name", 
	    		editor: function(container, options) {
        			console.log(container, options);
        			console.log(dataSource);
	                $("<input data-bind='value:ba_name' />")
                    .attr("id", "ddl_roleTitle")
                    .appendTo(container)
                    .kendoDropDownList({
                        dataSource : dataSourceBA,
                        dataTextField: "username",
                        dataValueField: "username",
                        template: "<span data-id='${data.id}'>${data.username}</span>",
                        select: function(e) {
                        	console.log(this.dataItem(e.item.index()));
                            var id = e.item.find("span").attr("data-id");
                            var dataItem = e.sender.dataItem();
							options.model.set("ba_id", this.dataItem(e.item.index()).id);
                        }
                    });
				} 

	    	},
	        { field: "target_achievement", title: "Target Achievement", width: "20%"},
	        { field: "start_date", title: "Start Date", width: "15%",format:"{0:dd-MM-yyyy}", editor: dateTimeEditor} ,
	        { field: "end_date", title: "End Date", width: "15%",format:"{0:dd-MM-yyyy}",editor: dateTimeEditor} 
	    ]
	});


	function dateTimeEditor(container, options) {
    	$('<input data-text-field="' + options.field + '" data-value-field="' + options.field + '" data-bind="value:' + options.field + '" data-format="' + options.format + '"/>')
            .appendTo(container)
            .kendoDatePicker({
            	format: "yyyy-MM-dd",
            	parseFormats:["yyyy-MM-dd"],
            	culture: "de-DE"
            });
	}
	
});