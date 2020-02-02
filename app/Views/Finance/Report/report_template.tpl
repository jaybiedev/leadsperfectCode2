[[extends file="Finance/template.tpl"]]
[[block name="ContentBody"]]
    <div class="row float-right report-filter-icons">
        <input type="range" min="8" max="80" value="[[if $Report->previewFontSize neq '']][[$Report->previewFontSize]][[else]]18[[/if]]" title="Adjust font size" id="report-preview-font-size-slider" alt="Adjust font size" [[if ($Report->content eq '')]]disabled="true"[[/if]]>
        <!-- <i id="report-star" class="fa fa-star report-icons" alt="Add to favorites" title="Add to favorites" data-toggle="tooltip"></i> -->
        <i id="report-print-draft" class="fa fa-print report-icons" alt="Print" title="Print" data-toggle="tooltip"></i>
        <i id="report-print" class="fa  fa-memory report-icons report-button-print-draft" alt="Print" title="Print Draft" data-toggle="tooltip"></i>
        <i id="report-filter" class="fa fa-filter report-icons report-button-print" alt="Filters"  title="Show report filter" data-toggle="tooltip"></i>
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
                <input type="hidden" name="printOption" id="printOption" value="" />
                [[block name="ReportFilter"]]Report Filter Area[[/block]]
                <div class="report-buttons-bottom">
                    <button type="button" class="btn btn-primary report-button-preview">Preview</button>
                    <button type="button" class="btn btn-outline report-button-print">Print</button>
                    <button type="button" class="btn btn-outline report-button-print-draft">Print Draft</button>
                </div>
            </form>
        </div>
    </div>
    [[if ($View->hasData == false)]]
        <div style="color:#aaa;text-align:center;margin-top:10%;">
            <i class="fa fa-baby-carriage fa-4x color-primary-light"></i>
            <h3>No report found</h3>
            <p>Please select report filters and press Continue</p>
        </div>
    [[else]]
        <div class="report-container preformatted">
        [[block name="ReportBody" hide]]
            Report Content Goes Here
        [[/block]]
        </div>
    [[/if]]
[[/block]]
[[block name="JavascriptBlock"]]
    <script src="/js/Finance/report/report.js"></script>
[[/block]]