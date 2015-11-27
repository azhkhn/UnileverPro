<div class="uk-modal" id="modalChangePassword">
    <div class="uk-modal-dialog">
        <button type="button" class="uk-modal-close uk-close"></button>
        <div class="uk-modal-header">
            <h3 class="uk-modal-title">CHANGE PASSWORD</h3>
        </div>
        <form action="" class="uk-form-stacked" id="frmAddNewBeautyAgent">
            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-Large uk-width-large">
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <h3 class="md-card-toolbar-heading-text">
                                INFORMATION DETAILS
                            </h3>
                        </div>
                        <div class="md-card-content large-padding">
                            <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                                <div class="uk-width-large">
                                    <div class="uk-form-row">
                                        <label for="email" >Email<span class="req">*</span></label>
                                        <input type="email" name="txtEmailChangePassword" id="txtEmailChangePassword" data-parsley-trigger="change" required  readonly="readonly" class="md-input" value="<?php echo $this->ion_auth->user()->row()->email;?>"/>
                                    </div>
                                    <div class="uk-form-row">
                                        <label for="password" >Password<span class="req">*</span></label>
                                        <input type="password" class="md-input" id="txtPasswordChangePassword" name="txtPasswordChangePassword" required value=""/>
                                    </div>
                                    <div class="uk-form-row">
                                        <label for="confirmation_password" >Confirmation Password<span class="req">*</span></label>
                                        <input type="password" class="md-input" id="txtConfirmationPasswordChangePassword" name="txtConfirmationPasswordChangePassword" required value=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="uk-modal-footer uk-text-right">
            <button type="button" class="md-btn uk-modal-close">Close</button>
            <input type="button" class="md-btn md-btn-primary" data='' id="btnUpdatePassword" value="Update"/>
        </div>
        </form>
    </div>
</div>