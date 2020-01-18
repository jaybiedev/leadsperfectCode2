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
                <input type="text" class="form-control" aria-label="Search account information." placeholder="Search account information." ng-keyup="searchAccount()" ng-model="Data.searchKey">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ng-model="Data.searchField">Any</button>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Name</a>
                    <a class="dropdown-item" href="#">Member</a>
                    <a class="dropdown-item" href="#">Client Name</a>
                    <a class="dropdown-item" href="#">Account Number</a>
                    <a class="dropdown-item" href="#">Co-Maker</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-primary" id="btn-account-edit">
                <i class="fa fa-plus"></i> Add New
            </button>
        </div>
    </div>   
    <div class="search-results">
        <section class="col-xs-12 col-sm-6 col-md-12">
            <article class="search-result row" ng-repeat="(key, item) in Data.searchResult">
                <!--
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <a href="#" title="Lorem ipsum" class="thumbnail"><img src="http://lorempixel.com/250/140/people" alt="Lorem ipsum" /></a>
                </div> 
                -->
                <div class="col-xs-12 col-sm-12 col-md-2">
                    <ul class="meta-search">
                        <li><i class="fa fa-calendar-alt"></i> <span>{{item.date}}</span></li>
                        <li><i class="fa fa-fan"></i> <span>{{item.status}}</span></li>
                        <li><i class="fa fa-layer-group"></i> <span>{{item.classification}}</span></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-10 excerpt">
                    <h5><a href="/finance/account/edit/{{item.account_id}}" title="">{{item.account}}</a></h5>
                    <div>{{item.address}}</div>
                    <div>{{item.branch}}</div>					
                </div>
                <span class="clearfix borda"></span>
            </article> 
        </section>   
    </div>

[[/block]]