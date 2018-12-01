/*-----------------------------------------------------------------------------------

    Template Name: Option Plus
    Author: Md. Nayem
    Author URI:

-----------------------------------------------------------------------------------

    JAVASCRIPT INDEX
    ===================

    1. Image verify and show
    2. Keyup called the function check user input


-----------------------------------------------------------------------------------*/


/*----------------------------------------*/
/*  1.  Image verify and show
/*----------------------------------------*/

// image upload file open
function chooseFile() {
    $("#fileInput").click();
}

// Function to preview image after validation
$(function () {
    $("#fileInput").change(function () {
        var file = this.files[0];
        var imagefile = file.type;
        var match = ["image/jpeg", "image/png", "image/jpg"];
        if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
            alert("only jpeg, jpg and png Images type allowed");
            return false;
        }
        else {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
});

function imageIsLoaded(e) {
    $('#previewing').attr('src', e.target.result);
}


/*----------------------------------------*/
/*  2.  Keyup called the function check user input
/*----------------------------------------*/
/**
 * Called function when keyup
 */
$("#inputName").keyup(function () {
    inputName();
});
$("#inputEmail").keyup(function () {
    inputEmail();
});
$("#inputPassword").keyup(function () {
    inputPassword();
});
$("#inputrePassword").keyup(function () {
    inputrePassword();
});
$("#inputNumber").keyup(function () {
    inputNumber();
});
$("#inputAddress").keyup(function () {
    inputAddress();
});


/**
 * @return {boolean}
 */
function inputName() {
    let name = $("#inputName").val();
    let word = name.charAt(0);
    let numeric = /^[0-9]+$/;
    if (name === "") {
        $("#userAllertName").css({"visibility": "visible"}).html("Enter your first name.");
        $("#inputName").css({"border": "2px solid red"});
        return false;
    } else if (word.match(numeric)) {
        $("#userAllertName").css({"visibility": "visible"}).html("First word must be a latter.");
        $("#inputName").css({"border": "2px solid red"});
        return false;
    } else {
        $("#userAllertName").css({"visibility": "hidden"}).html("");
        $("#inputName").css({"border": "1px solid #8c5858"});
        return true;
    }
}

/**
 * @return {boolean}
 */
function inputEmail() {
    let name = $("#inputEmail").val();
    let na = /^[\w\-.+]+@[a-zA-Z0-9.\-]+\.[a-zA-z0-9]{2,4}$/;
    let back = true;

    if (name === "") {
        $("#userAllertEmail").css({"visibility": "visible"}).html("Enter your Email Id.");
        $("#inputEmail").css({"border": "2px solid red"});
        return false;
    } else if (name.match(na)) {
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: 'AddUserEmailCheck',
            type: 'POST',
            data: {_token: CSRF_TOKEN, PostEmail: name},
            dataType: 'JSON',
            success: function (data) {
                if (data > 0) {
                    $("#userAllertEmail").css({"visibility": "visible"}).html("Already This Email Use To Create An Account.");
                    $("#inputEmail").css({"border": "2px solid red"});
                    back = false;
                } else if (data == "0") {
                    $("#userAllertEmail").css({"visibility": "hidden"}).html("");
                    $("#inputEmail").css({"border": "1px solid #8c5858"});
                    back = true;
                } else {
                    $("#userAllertEmail").css({"visibility": "visible"}).html("Something wrong, We fix the problem.");
                    $("#inputEmail").css({"border": "2px solid red"});
                    back = false;
                }
            }
        });
        return back;
    } else {
        $("#userAllertEmail").css({"visibility": "visible"}).html("Enter Valid Email Id..");
        $("#inputEmail").css({"border": "2px solid red"});
        return false;
    }
}

/**
 * @return {boolean}
 */
function inputPassword() {
    let name = $('#inputPassword').val();
    if (name === "") {
        $("#userAllertPass").css({"visibility": "visible"}).html("Enter your password");
        $("#inputPassword").css({"border": "2px solid red"});
        return false;
    } else if (name.length < 8 || name.length > 20) {
        $("#userAllertPass").css({"visibility": "visible"}).html("Your Password must be 8 to 20");
        $("#inputPassword").css({"border": "2px solid red"});
        return false;
    } else {
        $("#userAllertPass").css({"visibility": "hidden"}).html("");
        $("#inputPassword").css({"border": "1px solid #8c5858"});
        return true;
    }
}

/**
 * @return {boolean}
 */
function inputrePassword() {
    let name = $('#inputPassword').val();
    let rename = $('#inputrePassword').val();
    if (rename === "") {
        $("#userAllertrePass").css({"visibility": "visible"}).html("Enter your Re password");
        $("#inputrePassword").css({"border": "2px solid red"});
        return false;
    } else if (inputPassword() !== true) {
        $("#userAllertrePass").css({"visibility": "visible"}).html("Password not match.");
        $("#inputrePassword").css({"border": "2px solid red"});
        return false;
    } else if (name.length !== rename.length) {
        $("#userAllertrePass").css({"visibility": "visible"}).html("Password not match.");
        $("#inputrePassword").css({"border": "2px solid red"});
        return false;
    } else if (rename.match(name)) {
        $("#userAllertrePass").css({"visibility": "hidden"}).html("");
        $("#inputrePassword").css({"border": "1px solid #8c5858"});
        return true;
    } else {
        $("#userAllertrePass").css({"visibility": "visible"}).html("Password not match.");
        $("#inputrePassword").css({"border": "2px solid red"});
        return false;
    }
}


/**
 * @return {boolean}
 */
function inputNumber() {
    let name = $('#inputNumber').val();
    if (name === "") {
        $("#userAllertNumber").css({"visibility": "visible"}).html("Enter your Phone Number");
        $("#inputNumber").css({"border": "2px solid red"});
        return false;
    } else if (name.length < 8 || name.length > 20) {
        $("#userAllertNumber").css({"visibility": "visible"}).html("Your number must be 8 to 20");
        $("#inputNumber").css({"border": "2px solid red"});
        return false;
    } else {
        $("#userAllertNumber").css({"visibility": "hidden"}).html("");
        $("#inputNumber").css({"border": "1px solid #8c5858"});
        return true;
    }
}

$(function () {
    $("#inputDob").datepicker({
        dateFormat: 'mm/dd/yy',
        changeMonth: true,
        changeYear: true,
        yearRange: '-100y:c+nn',
        maxDate: '-1d'
    });
});

/**
 * @return {boolean}
 */
function inputAddress() {
    let name = $("#inputAddress").val();
    if (name === "") {
        $("#userAllertAddress").css({"visibility": "visible"}).html("Enter your Address.");
        $("#inputAddress").css({"border": "2px solid red"});
        return false;
    } else {
        $("#userAllertAddress").css({"visibility": "hidden"}).html("");
        $("#inputAddress").css({"border": "1px solid #8c5858"});
        return true;
    }
}

function inputDob() {
    let name = $("#inputDob").val();
    if (name === "") {
        $("#userAllertDob").css({"visibility": "visible"}).html("Enter your Date of Birth.");
        $("#inputDob").css({"border": "2px solid red"});
        return false;
    } else {
        $("#userAllertDob").css({"visibility": "hidden"}).html("");
        $("#inputDob").css({"border": "1px solid #8c5858"});
        return true;
    }
}

function inputDepartment() {
    let name = $("#inputDepartment").val();
    if (name === "") {
        $("#userAllertDepartment").css({"visibility": "visible"}).html("Enter Department.");
        $("#inputDepartment").css({"border": "2px solid red"});
        return false;
    } else {
        $("#userAllertDepartment").css({"visibility": "hidden"}).html("");
        $("#inputDepartment").css({"border": "1px solid #8c5858"});
        return true;
    }
}

function inputUserRole() {
    let name = $("#inputUserRole").val();
    if (name === "") {
        $("#userAllertUserRole").css({"visibility": "visible"}).html("Enter User Role Name.");
        $("#inputUserRole").css({"border": "2px solid red"});
        return false;
    } else {
        $("#userAllertUserRole").css({"visibility": "hidden"}).html("");
        $("#inputUserRole").css({"border": "1px solid #8c5858"});
        return true;
    }
}

$("#target").submit(function (event) {
    inputName();
    inputEmail();
    inputPassword();
    inputrePassword();
    inputNumber();
    inputAddress();
    inputDob();
    inputDepartment();
    inputUserRole();

    if (inputName() !== true) {
    } else if (inputEmail() !== true) {
    } else if (inputPassword() !== true) {
    } else if (inputrePassword() !== true) {
    } else if (inputDob() !== true) {
    } else if (inputNumber() !== true) {
    } else if (inputDepartment() !== true) {
    } else if (inputUserRole() !== true) {
    } else if (inputAddress() !== true) {
    } else {
        return;
    }
    event.preventDefault();
});

$("#UpdateUser").submit(function (event) {
    inputName();
    inputEmail();
    inputNumber();
    inputAddress();
    inputDob();
    inputDepartment();
    inputUserRole();

    if (inputName() !== true) {
    } else if (inputEmail() !== true) {
    } else if (inputDob() !== true) {
    } else if (inputDepartment() !== true) {
    } else if (inputNumber() !== true) {
    } else if (inputUserRole() !== true) {
    } else if (inputAddress() !== true) {
    } else {
        return;
    }
    event.preventDefault();
});



function status(sendValue) {
    let status = $("#status" + sendValue).text();
    let value = "";
    if (status.trim() == "Inactive"){
        value = 1;
        $("#status" + sendValue).html("Active").removeClass('btn-secondary').addClass('btn-warning');
    } else {
        value = 0;
        $("#status" + sendValue).html("Inactive").removeClass('btn-warning').addClass('btn-secondary');
    }

    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: 'StatusChange',
        type: 'POST',
        data: {_token: CSRF_TOKEN, status: value, id: sendValue},
        dataType: 'JSON',
        success: function (data) {
           console.log(data);
        }
    });
}


$("#PassChange").submit(function (event) {
    let pass1 = $("#ChangePass1").val();
    let pass2 = $("#ChangePass2").val();
    let pass3 = $("#ChangePass3").val();
    if (pass1==="" || pass2==="" || pass3===""){
        $("#PassChangeAllert").css({"visibility": "visible"}).html("Password field empty");
    } else if (pass1.length < 21 && pass1.length > 7 && pass2.length < 21 && pass2.length > 7 && pass3.length < 21 && pass3.length > 7) {
        if (pass2.length !== pass3.length){
            $("#PassChangeAllert").css({"visibility": "visible"}).html("Re type password not match.");
        }else if (pass1.match(pass2) && pass1.length === pass2.length) {
            $("#PassChangeAllert").css({"visibility": "visible"}).html("Old password and new password are same.");
        }else if (pass2.match(pass3)){
            return;
        }else {
            $("#PassChangeAllert").css({"visibility": "visible"}).html("Re type password not match.");
        }
    }else {
        $("#PassChangeAllert").css({"visibility": "visible"}).html("Your password must be 8 to 20 charecter");
    }
    event.preventDefault();
});




























