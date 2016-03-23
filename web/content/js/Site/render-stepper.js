/**
 * Created by leflo on 03/02/2016.
 */
$(function () {

    Routing;
    debugger;
    //  +------------------------------------------------------------------+
    //      Init variables
    //  +------------------------------------------------------------------+
    var current = 0;
    var stepContent = $(".wi-stepper-content");

    // Init  UI
    stepContent.not(':eq(0)').hide();

    //  +------------------------------------------------------------------+
    //      Add class if subcategories is already load
    //  +----------------------------------------------------------------[--+
    $('.mdl-tabs__tab').click(function (e) {
        var result;
        var panel = e.currentTarget.hash;
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
            switch (current) {
                case 1: //step 2 because :eq() start with 0 index
                    // $("#loader-form").removeClass("display-none");
                    // var selectedSub = $("#selected-subcategories").val();
                    // stepContent.eq(current).load('http://wolfi.local/app_dev.php/Annonce/car/new #form-advertisement', function(){
                    //     $.getScript( "../../../content/js/material-design/manager-crud-material.js" );
                    // });
                    $.ajax({
                            type: "POST",
                            dataType: 'json',
                            url: Routing.generate('ajax'),
                            async: false //you won't need that if nothing in your following code is dependend of the result
                        })
                        .done(function(response){
                            template = response;
                            stepContent.eq(current).html(template.html); //Change the html of the div with the id = "your_div"
                        })
                        .fail(function(jqXHR, textStatus, errorThrown){
                            alert('Error : ' + errorThrown);
                        });
                    break;
                case 2:
                    alert("2");
                    break;
            }
        }
        $('.back').prop("disabled", (current > 0 ? false : true));

    });

    //  +------------------------------------------------------------------+
    //      Back Button
    //  +------------------------------------------------------------------+
    $(".back").click(function () {
        if (current > 0) {
            current = current - 1;
            if (current < stepContent.length) {
                stepContent.show();
                stepContent.not(':eq(' + current + ')').hide();
            }
        }
        $('.back').prop("disabled", (current > 0 ? false : true));
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
        //url: 'http://wolfi.local/app_dev.php/Home/GetSubcategories/' + id,
        beforeSend: function () {
            $(panel + " .loader").show();
        },
        error     : function (xhr, textStatus, error) {
            $(panel + " .loader").hide();
            $(panel).append("Impossible de charger les sous catégories : " + error);
        },
        success   : function (data) {
            $(panel).append("<ul>");
            $.each(data.Subcategories, function (index, value) {
                $(panel).append('<li class="subcategory" id="subcategory-' + index + '"><a onclick="selectedSubcategory(' + index + ')">' + value + '</a></li>');
            });
            $(panel).append("</ul>");
            $(panel + " .loader").hide();
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
    $('.next').prop("disabled", false);
}