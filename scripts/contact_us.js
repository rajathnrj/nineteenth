$(document).ready(function () {
    $("#contact-form").on("submit", function (e) {
        e.preventDefault();
		var name=""
		name= ($("#contact-form [name='first_name']").val()).concat($("#contact-form [name='last_name']").val())
        if (name === '' || name===' ') {
            $("#contact-form [name='first_name']").css("border", "1px solid red");
			$("#contact-form [name='last_name']").css("border", "1px solid red");
            $(".response_msg").text("");
            $(".response_msg").text("Please enter your Name!");
            $(".response_msg").show();
        } else if ($("#contact-form [name='email']").val() === '') {
            $("#contact-form [name='first_name']").css("border", "1px solid #000");
            $("#contact-form [name='last_name']").css("border", "1px solid #000");
            $("#contact-form [name='email']").css("border", "1px solid red");
            $(".response_msg").text("");
            $(".response_msg").text("Please enter your Email! ");
            $(".response_msg").show();
        } else {
            var sendData = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "get_response.php",
                data: sendData,
                success: function (data) {
                    $("#contact-form [name='first_name']").css("border", "1px solid #000");
                    $("#contact-form [name='last_name']").css("border", "1px solid #000");
                    $("#contact-form [name='email']").css("border", "1px solid #000");
                    $(".response_msg").text("");
                    $(".response_msg").text(data);
                    $(".response_msg").show();
                    $("#contact-form").find("input[type=text], input[type=email]").val("");
                }
            });
        }
    });
});