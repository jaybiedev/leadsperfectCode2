$(document).ready(function() {
    var financeReport = new FinanceReport(false);
    financeReport.init();
});

function FinanceReport() {

    this.init = function(is_filter_shown) {
        $("i.fa.fa-times").on('click', function() {
            $("div.report-filter-wrapper").hide('slide', {direction: 'right'}, 500);
        });

        $("i.fa.fa-filter").on('click', function() {
            $("div.report-filter-wrapper").show('slide', {direction: 'right'}, 500);
        });

        $("button.report-button-continue").on('click', function() {
            $(this).prop('disabled', true);
            $(this).html("Processing...");
            $("div.report-filter-form form").submit();
        })
    }
}