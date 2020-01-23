[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
    <form method="POST" action="" id="frm-account-edit">
        <div class="row">
            <div class="form-group col-6">
                <input type="text" class="form-control" id="account" placeholder="Account Name" value="[[$aAccount->account]]">
            </div>
            <div class="form-group col-4">
                [[branchdropdown name="branch_id" selected=$aAccount->branch_id]]
            </div>
            <div class="col-2"></div>
       </div>
        
        <ul class="nav nav-tabs">
            <li class="nav-item"><a href="#personal-info" class="nav-link active" data-toggle="tab">Personal Info</a></li>
            <li class="nav-item"><a href="#other-info" class="nav-link" data-toggle="tab">Other Info</a></li>
            <li class="nav-item"><a href="#account-info" class="nav-link" data-toggle="tab">Account</a></li>
            <li class="nav-item"><a href="#loan-info" class="nav-link" data-toggle="tab">Loans</a></li>
            <li class="nav-item"><a href="#image-info" class="nav-link" data-toggle="tab">Image Info</a></li>
            <li class="nav-item"><a href="#audit-info" class="nav-link" data-toggle="tab">Audit</a></li>
        </ul>

        <div class="tab-content" style="padding:10px 5px;min-height:400px;">
            <div class="tab-pane active" id="personal-info">
                [[include file='Finance/Account/_personal_info.tpl']]
            </div>
            <div class="tab-pane fade" id="other-info">
                [[include file='Finance/Account/_other_info.tpl']]
            </div>
            <div class="tab-pane fade" id="account-info">
                [[include file='Finance/Account/_account_info.tpl']]
            </div>
            <div class="tab-pane fade" id="loan-info">
                [[include file='Finance/Account/_loan_info.tpl']]
            </div>
            <div class="tab-pane fade" id="image-info">
                [[include file='Finance/Account/_image_info.tpl']]
            </div>
            <div class="tab-pane fade" id="audit-info">
                [[include file='Finance/Account/_audit_info.tpl']]
            </div>
        </div>
        <button type="button" class="btn btn-primary" id="frm-save">
            <i class="fa fa-save"></i> Save
        </button>
        <button type="button" class="btn btn-outline" id="frm-cancel">
            <i class="fa fa-times"></i> Cancel
        </button>
    </form>
[[/block]]