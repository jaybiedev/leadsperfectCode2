$(document).ready(function() {
    var financeReport = new FinanceReport(false);
    financeReport.init();
});

function FinanceReport() {

    this.init = function(is_filter_shown) {
        // font-size slider
        var slider = document.getElementById("report-preview-font-size-slider");
        if (slider &&  parseInt($(slider).val()) > 0) {
            $("div.report-container").css('font-size', $(slider).val() + "px");
        }
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

        // init select2
        $("select.select2-ajax-dd").select2({
            ajax: {
              url: '/finance/account/get',
              dataType: 'json'
              // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
          });
    }
}