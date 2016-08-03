$(function () {
    //  +------------------------------------------------------------------+
    //      Init variables
    //  +------------------------------------------------------------------+
    var current = 0;
    var stepContent = $(".wi-stepper-content");
    //  +------------------------------------------------------------------+
    //      Add class if subcategories is already load and load subcategories
    //  +------------------------------------------------------------------+
    $('.og-main-menu').click(function (e) {
        var result;
        var panel = "#" + $(this).data('idcategory');
        var id = $(this).data("id");
        if (!$(panel).hasClass('load')) {result = getSubcategories(id, panel);}
        if (result) {$(panel).addClass('load');}
        $(".subcategory").removeClass("sub-active");
        $('.next').prop("disabled", true);
    });

    //  +------------------------------------------------------------------+
    //      Next Button
    //  +------------------------------------------------------------------+
    $(".next").click(function () {
        if (current < stepContent.length) {
            current++;
            //Load form subcategory
            stepContent.show();
            stepContent.not(':eq(' + current + ')').hide();
            var id = $("#selected-subcategories").val();
            switch (current) {
                case 1: //step 2 because :eq() start with 0 index
                    $("#loader-form").removeClass("display-none");
                    $.ajax({
                        type    : "POST",
                        dataType: 'json',
                        url     : Routing.generate('RouterAdvertisement', {id: id})
                    })
                        .done(function (response) {
                            stepContent.eq(current).html(response);
                        })
                        .fail(function (jqXHR, textStatus, errorThrown) {
                            stepContent.eq(current).html('Error : ' + errorThrown);
                        })
                        .always(function () {
                            $("#loader-form").addClass("display-none");
                            componentHandler.upgradeAllRegistered();
                            $(".mdl-textfield").removeClass("is-invalid");
                        });
                    break;
                case 2:
                    var form = $("#form-advertisement > form")[0];

                    if (getFormValues(form) || form.checkValidity()) {
                        $.ajax({
                            url : Routing.generate('RouterAdvertisement', {id: id}),
                            type: form.method,
                            data: $(form).serialize()
                        })
                            .fail(function (jqXHR, textStatus, errorThrown) {
                                stepContent.eq(current).append('Error : ' + errorThrown);
                            })
                            .done(function (response) {
                                stepContent.eq(current).html(response);
                            });
                    }
                    else {
                        current = 1;
                        stepContent.show();
                        stepContent.not(':eq(' + current + ')').hide();
                    }
                    break;
                case 3 :
                    break;
            }
        }
        $('.back').prop("disabled", (current <= 0));

    });

    //  +------------------------------------------------------------------+
    //      Back Button
    //  +------------------------------------------------------------------+
    $(".back").click(function () {
        if (current > 0) {
            current -= 1;
            if (current < stepContent.length) {
                stepContent.show();
                stepContent.not(':eq(' + current + ')').hide();
            }
        }
        $('.back').prop("disabled", (current <= 0));
    });

    //  +------------------------------------------------------------------+
    //      Add class in selected subcategory
    //  +------------------------------------------------------------------+
    $("#selected-subcategories").change(function () {
        var id = $(this).val();
        $(".subcategory").removeClass("sub-active");
        $("#subcategory-" + id).addClass("sub-active");
    });

});

//  +------------------------------------------------------------------+
//      get Subcategories with id category
//  +------------------------------------------------------------------+
function getSubcategories(id, panel) {
    $.ajax({
        type      : 'post',
        url       : Routing.generate('GetSubcategoriesById', {id: id}),
        error     : function (xhr, textStatus, error) {
            $(panel).append("Impossible de charger les sous catégories : " + error);
        },
        success   : function (data) {
            $('.mdl-spinner').addClass("display-none");
            $(panel).append("<ul></ul>");
            $.each(data.Subcategories, function (index, value) {
                $(panel + " ul").append('<li class="subcategory" id="subcategory-' + index + '"><a onclick="selectedSubcategory(' + index + ')">' + value + '</a></li>');
            });
        }
    });
    return true;
}

//  +------------------------------------------------------------------+
//      Choose subcategory
//  +------------------------------------------------------------------+
function selectedSubcategory(id) {
    $("#selected-subcategories").val(id);
    $("#selected-subcategories").change();
    $(".next").prop("disabled", false);
}

function getFormValues(form) {
    var result = true;
    var controls = form.elements;

    for (var i = 0, iLen = controls.length; i < iLen; i++) {
        if (controls[i].required === true && (controls[i].value == "" || controls[i].value == undefined)) {
            result = false;
            controls[i].parentElement.className += " is-invalid";
        }
    }
    // Prevent form submission
    return false;
}
