var LoanType = {
    renderBasis : function(val, meta) {
        var render = val;
        switch (val) {
            case 'M':
                render = 'Monthly';
                break;
            case 'A':
                render = 'Annual';
                break;
            case 'I':
                render = 'Interest Only';
                break;
        }
        return render;
    },

    renderInterest : function(val, meta) {
        var render = val;
        switch (val) {
            case 'D':
                render = 'Discounted';
                break;
            case 'A':
                render = 'Add On';
                break;
            case 'F':
                render = 'Fixed';
                break;
        }
        return render;
    }
}