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
                    <select class="form-control" ng-model="Data.searchField" ng-init="Data.searchField='account'">
                        <option value="account">Name</option>
                        <option value="account_code">Account No.</option>
                        <option value="member">Member</option>
                        <option value="bank_account">Bank No.</option>
                    </select>
                    <!--
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ng-model="Data.searchField">Any</button>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Name</a>
                    <a class="dropdown-item" href="#">Member</a>
                    <a class="dropdown-item" href="#">Account Number</a>
                    -->
                    </div>
                </div>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-primary" id="btn-account-edit">
                    <i class="fa fa-plus"></i> Add New
                </button>
            </div>
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
                        <li><i class="fa fa-money-check"></i> <span>{{item.account_code}}</span></li>
                        <li><i class="fa fa-calendar-alt"></i> <span>{{item.date}}</span> <span>{{item.status}}</span></li>
                        <li><i class="fa fa-layer-group"></i> <span>{{item.classification}}</span></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-10 excerpt">
                    <h5><a href="/finance/account/edit/{{item.account_id}}" title="">{{item.account}}</a></h5>
                    <div>{{item.lastname}} {{item.firstname}}</div>
                    <div>{{item.address}} - {{item.branch}}</div>					
                </div>
                <span class="clearfix borda"></span>
            </article> 
        </section>   
    </div>
    <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
[[/block]]