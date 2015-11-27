$(function(){
    // TODO: UPDATE USER
    $("#btnUpdatePassword").click(function(){
        modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
        var id = $(this).attr('data');
        $.ajax({
            url: SITE_URL+'changepassword',
            type: "POST",
            dataType: "JSON",
            data:{
                'txtPasswordChangePassword' : $("#txtPasswordChangePassword").val(),
                'txtConfirmationPasswordChangePassword' : $("#txtConfirmationPasswordChangePassword").val(),
            },
            success: function(data){
                console.log(data);
                modal.hide();
                console.log(data);
                if(data.status==true){
                    UIkit.modal.alert(data.message);
                    var modalPopup = UIkit.modal("#modalChangePassword");
                    if ( modalPopup.isActive() ) {
                        modalPopup.hide();
                    } else {
                        modalPopup.show();
                    }
                    UIkit.modal.alert("You have been changed your password successfully. You have to loggin again!");
                	location.href=SITE_URL + "auth/logout";
                }else{
                    UIkit.modal.alert(data.message);
                }
            },
            error: function(data){
                console.log(data);
                modal.hide();
                UIkit.modal.alert(data);
            }
        });
    });
});