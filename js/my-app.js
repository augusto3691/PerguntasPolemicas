// Initialize your app
var myApp = new Framework7({
    swipePanel: 'left'
});

// Export selectors engine
var $$ = Dom7;

var mainView = myApp.addView('.view-main', {
    dynamicNavbar: true,
    domCache: true //enable inline pages
});



$$('form.ajax-submit').on('submitted', function (e) {


    var response = JSON.parse(e.detail.xhr.responseText);
    if ((response.success)) {
        window.location = "dash.html";
    } else {
        myApp.alert(response.error.message, "Opa");
    }

});