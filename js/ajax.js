function send_otp() {
    const email = $("#email").val();
    $.ajax({
        url: "send_otp.php",
        type: "POST",
        data: "email=" + email,
        success: function (result) {
            if (result == "yes") {
                $(".box2").show();
                $(".box1").hide();
            }
            
            if (result == "not") {
                $("#msg").html("Please enter valid email.");
            }
            console.log(result);
        },
        
    });
}

function check_otp() {
    const otp = $("#otp").val();
    $.ajax({
        url: "check_otp.php",
        type: "POST",
        data: "otp=" + otp,
        success: function (data) {
            if(data == 'yes'){
                window.location.href='home.php'
            }
            
            if(data == 'not'){
               $("#error").html("Please enter valid OTP.");
            }
            console.log(data);
        },
    });
}
