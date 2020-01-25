[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
    <div class="row float-right report-filter-icons">
        <i id="report-print-draft" class="fa fa-print report-icons" alt="Print" title="Print"></i>
        <i id="report-print" class="fa  fa-memory report-icons" alt="Print" title="Print Draft"></i>
        <i id="report-filter" class="fa fa-filter report-icons" alt="Filters"  title="Show report filter"></i>
    </div>
     <div class="float-right report-filter-wrapper"/>
        <div class="report-filter-header">
            <span class="report-filter-title">Report Filter</span>
            <i id="report-filter" class="fa fa-times" alt="Close dilters" 
             title="Close report filter"
             style="margin-right:45px;"></i>
        </div>
        <div class="report-filter-form">
            <form method="post" action="">
                [[block name="ReportFilter"]]Report Filter Area[[/block]]
                <div class="report-buttons-bottom">
                    <button type="button" class="btn btn-primary report-button-continue">Continue</button>
                </div>
            </form>
        </div>
    </div>
    [[block name="ReportBody"]]Report Content Area[[/block]]
[[/block]]
[[block name="JavascriptBlock"]]
    <script src="/js/Finance/report/report.js"></script>
[[/block]]
