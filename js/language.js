/**
 * Created by Trah on 26/10/2016.
 */
$(document).ready(function() {
    $('#frButton').click(function () {

        $.ajax({
            type: "POST",
            url: window.location.pathname,
            data: {lang: "fr"},
            dataype : "json",

        }).success(function (msg){
            location.reload();
        });

    });
});

$(document).ready(function() {
    $('#enButton').click(function () {

        $.ajax({
            type: "POST",
            url: window.location.pathname,
            data: {lang: "en"}
        }).done(function (msg) {
            location.reload();
        });

    });
});

