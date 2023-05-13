function buttonClicked(pageName) {
    var formID = "";
    if (pageName == 'customersuccess1') {
        formID = $("#custForm1");
    }
    else if (pageName == 'customersuccess2') {
        formID = $("#custForm2");
    }
    else if (pageName == 'customersuccess3') {
        formID = $("#custForm3");
    }
    $(formID).valid();
    var validator = $(formID).validate();
    if (validator.form()) {

        var filePath = "";
        if ($("#customerdownloadform01").is(":visible"))
            filePath = "predicting_outofstocks.html";
        else if ($("#customerdownloadform02").is(":visible"))
            filePath = "optimizing_promotion.html";
        else if ($("#customerdownloadform03").is(":visible"))
            filePath = "building_kpi.html";

        $.ajax({
            type: 'POST',
            url: 'handlers/Datahandler.ashx?Action=SalesEnquiry',
            // async: true,

            data: {
                Firstname: toTitleCase($(formID).find("#firstname").val()),
                LastName: $(formID).find("#lastname").val(),
                Emailid: $(formID).find("#email").val(),
                Company: $(formID).find("#company").val(),
                Check: $(formID).find("#chkTalkSales").is(":checked"),
                filePath: filePath
            },
            dataType: "json",
            success: function (data1) {

                $(formID)[0].reset();
                if ($("#ErrorId").length) {
                    $("#ErrorId").remove();
                }
                $(".modal").modal('hide');
            },
            error: function (d) {
                alert("Failed to submit the request.");
            }
        });
    }
    else {
        $(".tooltip").hide();
        $(".error").parent('div').addClass("has-error");
        if ($("#ErrorId").length === 0) {
            $(".checkbox").after("<p id='ErrorId' style='color:red;line-height:2px!important;font-size:11px!important;'>*Required</p>");
        }
    }
}

function toTitleCase(str) {
    return str.replace(/(?:^|\s)\w/g, function (match) {
        return match.toUpperCase();
    });
}

function custCloseClick(pageName) {
    if (pageName == 'customersuccess1') {
        $("#custForm1")[0].reset();
    }
    else if (pageName == 'customersuccess2') {
        $("#custForm2")[0].reset();
    }
    else if (pageName == 'customersuccess3') {
        $("#custForm3")[0].reset();
    }
    $(".tooltip").hide();
    $(".error").parent('div').removeClass("has-error");
    $("form #ErrorId").remove();
    $(".modal").modal('hide');
}

function saveDataOfPC() {
    $.ajax({
        type: 'POST',
        url: 'handlers/Datahandler.ashx?Action=EnquirerInfo',
        // async: true,

        data: {
            Firstname: $("#pcFirstName").val(),
            LastName: $("#pcLastName").val(),
            Emailid: $("#pcEmail").val(),
            Phone: $("#pcPhone").val(),
            Company: $("#pcCompany").val(),
            JobTitle: $("#pcJobTitle").val()
        },
        dataType: "json",
        success: function (data1) {
            $('#pcForm')[0].reset();
        },
        error: function (d) {
            alert("Failed to submit the request.");
        }

    });

}

function saveDataOfMobile() {
    $.ajax({
        type: 'POST',
        url: 'handlers/Datahandler.ashx?Action=EnquirerInfo',
        // async: true,

        data: {
            Firstname: $("#mobFirstName").val(),
            LastName: $("#mobLastName").val(),
            Emailid: $("#mobEmail").val(),
            Phone: $("#mobPhone").val(),
            Company: $("#mobCompany").val(),
            JobTitle: $("#mobJobTitle").val()
        },
        dataType: "json",
        success: function (data1) {
            $('#mobForm')[0].reset();
        },
        error: function (d) {
            alert("Failed to submit the request.");
        }

    });

}

function SubscribeClick() {
    $("#footForm").valid();
    var validator = $("#footForm").validate();
    if (validator.form()) {
        $.ajax({
            type: 'POST',
            url: 'handlers/Datahandler.ashx?Action=subscription',
            // async: true,

            data: {
                emailid: $("#subEmail").val()
            },
            dataType: "json",
            success: function (data1) {
                $("#footForm")[0].reset();
            },
            error: function (d) {
                alert("Failed to submit the request.");
            }

        });
    }
}

function btnDoneClicked() {
    $("#pcForm").valid();
    var validator = $("#pcForm").validate();
    if (validator.form()) {
        saveDataOfPC();
        if ($("#pcErrorId").length) {
            $("#pcErrorId").remove();
        }
        $(".pcContent").hide();
    }
    else {
        $(".tooltip").hide();
        $(".error").parent('div').addClass("has-error");
        if ($("#pcErrorId").length === 0) {
            $("#pcForm .actions").prepend("<p id='pcErrorId' style='color:red;line-height:2px!important;'>*Required</p>");
        }
    }
}

function btnCancelClicked() {
    $("#pcForm")[0].reset();
    $(".tooltip").hide();
    $(".error").parent('div').removeClass("has-error");
    $("#pcErrorId").remove();
    $(".pcContent").hide();
}

function pcCrossClick() {
    $("#pcForm")[0].reset();
    $(".tooltip").hide();
    $(".error").parent('div').removeClass("has-error");
    $("#pcErrorId").remove();
    $(".pcContent").slideUp(500);
}

function mobBtnDoneClicked() {
    $("#mobForm").valid();
    var validator = $("#mobForm").validate();
    if (validator.form()) {
        saveDataOfMobile();
        if ($("#mobErrorId").length) {
            $("#mobErrorId").remove();
        }
        $(".modal").modal('hide');
    }
    else {
        $(".tooltip").hide();
        $(".error").parent('div').addClass("has-error");
        if ($("#mobErrorId").length === 0) {
            $("#mobForm .actions").prepend("<p id='mobErrorId' style='color:red;line-height:2px!important;text-align:left;'>*Required</p>");
        }
    }
}

function mobBtnCancelClicked() {
    $("#mobForm")[0].reset();
    $(".tooltip").hide();
    $(".error").parent('div').removeClass("has-error");
    $("#mobErrorId").remove();
    $(".modal").modal('hide');
}

function mobCrossClick() {
    $("#mobForm")[0].reset();
    $(".tooltip").hide();
    $(".error").parent('div').removeClass("has-error");
    $("#mobErrorId").remove();
    $(".modal").modal('hide');
}
