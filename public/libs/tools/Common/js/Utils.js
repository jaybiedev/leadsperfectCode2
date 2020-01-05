var CommonUtils = {
    encrypt : function(data) {
        return window.btoa(data);
    },

    decrypt : function(data) {
        return window.atob(data);
    },

    getParam : function(name) {
        var results = new RegExp('[\?&]' + name + '=([^&#]*)')
                          .exec(window.location.href);
        if (results == null) {
             return null;
        }
        return results[1] || null;        
    }
}