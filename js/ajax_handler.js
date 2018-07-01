// Initialize Firebase
var databaseConfig = {
    apiKey: "AIzaSyDf6TwRt1WQf6TdJaBjRT69b9xseZmoFJg",
    authDomain: "onlinevotersys.firebaseapp.com",
    databaseURL: "https://onlinevotersys.firebaseio.com",
    projectId: "onlinevotersys",
    storageBucket: "",
    messagingSenderId: "473955500102"
};
var firebaseRef = firebase.initializeApp(databaseConfig);
var databaseRef = firebaseRef.database();
// Variable to hold request
var request;
$(document).ready(() => {
    $('input').val('')
    // $('select').empty()
})
var sendNoteError = (from, align, type, message, timer) => {
    $.notify({
        icon: "fa fa-exclamation-triangle fa-lg",
        message: message,
    }, {
            type: type,
            timer: timer,
            placement: {
                from: from,
                align: align
            }
        });
}
var sendNoteSuccess = (from, align, type, message, timer) => {
    $.notify({
        icon: "fa fa-gift fa-lg",
        message: message,
    }, {
            type: type,
            timer: timer,
            placement: {
                from: from,
                align: align
            }
        });
}
function signupUser() {
    var fullName = valuesArr.first_name + "_" + valuesArr.last_name
    var regNumber = valuesArr.reg_number
    var school = valuesArr.school
    var email = valuesArr.email
    var password = valuesArr.pass
    var confirm_password = document.getElementById('confirm_password').value
    var terms_checkbox = document.getElementById('terms_checkbox').checked
    // console.log(`
    // Name: ${fullName}
    // reg_number: ${regNumber}
    // school: ${school}
    // email: ${email}
    // pass: ${password}
    // Checkbox ${terms_checkbox}`);

    if (terms_checkbox != true) {
        sendNoteError('top', 'right', 'danger', "You must agree to the terms and conditions to procceed", 4000)
    } else if (fullName == null) {
        sendNoteError('top', 'right', 'danger', "You must provide both names to procceed", 4000)
    } else if (regNumber == null || regNumber.length < 10) {
        sendNoteError('top', 'right', 'danger', "You must provide a valid registration number to procceed", 4000)
    } else if (school == null) {
        sendNoteError('top', 'right', 'danger', "You must select a school to procceed", 4000)
    } else if (email == null) {
        sendNoteError('top', 'right', 'danger', "You must add a valid email to procceed", 4000)
    } else if (password == null || password.length < 8) {
        sendNoteError('top', 'right', 'danger', "You must add a password of at least 8 characters to procceed", 4000)
    } else if (password !== confirm_password) {
        sendNoteError('top', 'right', 'danger', "The passwords you provided dont match. Please retype", 4000)
    } else {
        sendNoteSuccess('top', 'left', 'success', "Signing You Up! Just a Moment...", 2000)
        executeSignup()
    }
}
function executeSignup() {
    var name = valuesArr.first_name + "_" + valuesArr.last_name
    var fullName = name.toUpperCase()
    var regNumber = valuesArr.reg_number
    var school = valuesArr.school
    var email = valuesArr.email
    var password = valuesArr.pass.toUpperCase()
    var newRegnum = regNumber.toUpperCase()
    var fb_reg_num = newRegnum.split('/').join('_')
    var firebase_ID = fullName + '_' + fb_reg_num
    // console.log(firebase_ID)
    var $inputs = $('form').find('input,select')
    $inputs.prop('disabled', true)
    // Fire off the request to /form.php
    var serializedData = [
        { name: 'reg_number', value: newRegnum },
        { name: 'email', value: email },
        { name: 'user_name', value: fullName },
        { name: 'firebase_id', value: firebase_ID },
        { name: 'firebase_pass', value: password },
        {name:'school', value:school}
    ]

    request = $.ajax({
        url: 'php/user-create.php',
        contentType: 'application/x-www-form-urlencoded',
        type: 'POST',
        data: serializedData
    })

    request.done((response, textStatus, jqXHR) => {
        console.log(response)
        if (response.success == true) {
            firebaseRef.auth().createUserWithEmailAndPassword(email,password).then(()=>{
                sendNoteSuccess('top', 'left', 'info', 'Account created Successfully.', 3000)
                setTimeout(()=>{
                    window.location.href = 'index.php'
                },3000)
            }).catch((err)=>{
                sendNoteError('top', 'left', 'info', err.message, 6000)
            })
        } else {
            sendNoteError('top', 'left', 'danger', response.sql_result, 4000)
        }
    })
    request.fail((jqXHR, textStatus, errorThrown) => {
        sendNoteError('top', 'right', 'danger', `Request Failure: ${textStatus}: `+errorThrown, 6000)
    })
    request.always(() => {
        $inputs.prop('disabled', false)
        // sendNote('top','right','warning','something happened',6000)
    })
    // var hr = new XMLHttpRequest()
    // hr.open('POST', 'php/user-create.php', true)
    // hr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    // hr.onreadystatechange = () => {
    //     if (hr.readyState == 4 && hr.status == 200) {
    //         var data = JSON.parse(hr.responseText)
    //         console.log(data.success)
    //         if(data.success == true){
    //             sendNote('top','right','warning','Signup Successful. Now you can Login to Vote',3000)
    //             // setTimeout(()=>{
    //             //     window.location.href = 'index.html'
    //             // },2000)
    //         }
    //     }
    // }

    // hr.send("reg_number=" + newRegnum + "&email=" + email+"&user_name="+fullName+"&firebase_id="+firebase_ID)

}
