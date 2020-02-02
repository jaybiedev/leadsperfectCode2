$(document).ready(function() {
    var financeReport = new FinanceReport(false);
    financeReport.init();
});

function FinanceReport() {

    this.init = function(is_filter_shown) {
        // font-size slider
        var slider = document.getElementById("report-font-size-slider");
        slider.oninput = function() {
            $("div.report-container").css('font-size', this.value + "px");
        }

        // close filter dialog
        $("i.fa.fa-times").on('click', function() {
            $("div.report-filter-wrapper").hide('slide', {direction: 'right'}, 500);
        });

        // open filter dialog
        $("i.fa.fa-filter").on('click', function() {
            $("div.report-filter-wrapper").show('slide', {direction: 'right'}, 500);
        });

        // actions
        $('.report-buttons-bottom button[class*="report-button-"]').on('click', function() {
            var btn = $(this);
            if (btn.hasClass('report-button-preview'))
                $("input#printOption").val("");
            else if (btn.hasClass('report-button-print-draft'))
                $("input#printOption").val("printDraft");
            else if (btn.hasClass('report-button-preview'));
                $("input#printOption").val("print");

            btn.html("Processing...");
            $("report-buttons-bottom.button").prop('disabled', true);
            $("div.report-filter-form form").submit();
        })
    }
}