[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
    <div class="row float-right report-filter-icons">
        <i id="report-print-draft" class="fa fa-print report-icons" alt="Print" title="Print" data-toggle="tooltip"></i>
        <i id="report-print" class="fa  fa-memory report-icons" alt="Print" title="Print Draft" data-toggle="tooltip"></i>
        <i id="report-filter" class="fa fa-filter report-icons" alt="Filters"  title="Show report filter" data-toggle="tooltip"></i>
    </div>
     <div class="float-right report-filter-wrapper"/>
        <div class="report-filter-header">
            <span class="report-filter-title">Report Filter</span>
            <i id="report-filter" class="fa fa-times" alt="Close dilters" 
             title="Close report filter"
             data-toggle="tooltip"
             style="margin-right:45px;"></i>
        </div>
        <div class="report-filter-form">
            <form method="POST" action="">
                [[block name="ReportFilter"]]Report Filter Area[[/block]]
                <div class="report-buttons-bottom">
                    <button type="button" class="btn btn-primary report-button-continue">Continue</button>
                </div>
            </form>
        </div>
    </div>
    [[block name="ReportBody" hide]]
        Report Content Goes Here
    [[/block]]
    [[if ($View->hasData == false)]]
        <div style="color:#aaa;text-align:center;margin-top:10%;">
            <i class="fa fa-baby-carriage fa-4x color-primary-light"></i>
            <h3>No report found</h3>
            <p>Please select report filters and press Continue</p>
        </div>
    [[/if]]
[[/block]]
[[block name="JavascriptBlock"]]
    <script src="/js/Finance/report/report.js"></script>
[[/block]]
