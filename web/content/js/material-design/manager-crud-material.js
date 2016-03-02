/**
 * Created by leflo on 03/02/2016.
 */
$(function(){
    //  +------------------------------------------------------------------+
    //      Input
    //  +------------------------------------------------------------------+
    //Add class on div if contains inputs
    $("#form-advertisement form div").children("input").parent().addClass("mdl-textfield mdl-js-textfield mdl-textfield--floating-label");
    //Add class on all input text
    $("#form-advertisement form div").children("input").addClass("mdl-textfield__input");
    //Add class on all label
    $("#form-advertisement form .mdl-textfield").children("label").addClass("mdl-textfield__label");

    //  +------------------------------------------------------------------+
    //      Textarea
    //  +------------------------------------------------------------------+
    //Add class on div if contains textarea
    $("#form-advertisement form div").children("textarea").parent().addClass("mdl-textfield mdl-js-textfield");
    //Add class on all input text
    $("#form-advertisement form div").children("textarea").addClass("mdl-textfield__input");
    //Add class on all label
    $("#form-advertisement form .mdl-textfield").children("label").addClass("mdl-textfield__label");

    //  +------------------------------------------------------------------+
    //      Select
    //  +------------------------------------------------------------------+
    //Add class on div if contains select
    //$("#form-advertisement form div").children("select").parent().addClass("mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-labe");
    ////Add class on all input text
    //$("#form-advertisement form div").children("select").addClass("mdl-selectfield__select");
    ////Add class on all label
    //$("#form-advertisement form .mdl-selectfield").children("label").addClass("mdl-selectfield__label");

    //  +------------------------------------------------------------------+
    //      Button
    //  +------------------------------------------------------------------+
    //Add class on div if contains select
    $("#form-advertisement form div").children("button").addClass("mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect");

    componentHandler.upgradeAllRegistered();

});