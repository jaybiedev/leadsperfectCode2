[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
    <div class="row"> 
        <div class="col-12">
            [[info title="Check" id="check-existing-account"]]
                Please search for existing accounts to avoid duplication.
            [[/info]]
            
            <div id="account-search-result">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-9">
            <div class="input-group center-block">
                <input type="text" class="form-control" aria-label="Text input with dropdown button">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Any</button>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Name</a>
                    <a class="dropdown-item" href="#">Client Name</a>
                    <a class="dropdown-item" href="#">Account Number</a>
                    <a class="dropdown-item" href="#">Co-Maker</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add New
            </button>
        </div>
    </div>   

[[/block]]