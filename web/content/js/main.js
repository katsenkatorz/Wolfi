$(function () {
    //Show Submenu
    $(".menu-toggleable").click(function () {
        $(".display-none").toggle("slow");
    });

    //Show autocomplete on focus in input search
    $("#wi-search-input").focus(function () {
        $("#wi-autocomplete-content").slideDown(150);
    });

    //Hide search auto complete on focus lose
    $("#wi-search-input").focusout(function () {
        $("#wi-autocomplete-content").slideUp(150);
    });

    //show profile container
    $("#wi-profile").click(function () {
        $("#wi-profile-display").show();
    });

    //Hide container profile if click mousse outside div
    $(document).mouseup(function (e) {
        var container = $("#wi-profile-display");

        if (!container.is(e.target) && container.has(e.target).length === 0) // ... nor a descendant of the container
        {
            container.hide();
        }
    });
});
