document.querySelector('.img-btn').addEventListener('click', function()
	{
		document.querySelector('.cont').classList.toggle('s-signup')
	}
);

var verified = 1
$(document).ready(function() {
	var rname = /^[a-zA-Z ]+$/
	var runame = /^[a-zA-Z0-9_.]+$/
	var rmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
	var rpass = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/
	$("#fname").keyup(function() {
		var name_input = $("#fname").val();
		if (rname.test(name_input) == false) {
			$("#text1").show();
			verified = 1;
		} else if (rname.test(name_input) == true) {
			$("#text1").hide();
			verified = 0;
		}
	});
	$("#femail").keyup(function() {
		var mail_input = $("#femail").val();
		if (rmail.test(mail_input) == false) {
			$("#email1").show();
			verified = 1
		} else if (rmail.test(mail_input) == true) {
			$("#email1").hide();
			verified = 0
		}
	});
	$("#femail1").keyup(function() {
		var mail_input = $("#femail1").val();
		if (rmail.test(mail_input) == false) {
			$("#email2").show();
			verified = 1
		} else if (rmail.test(mail_input) == true) {
			$("#email2").hide();
			verified = 0
		}
	});
	$("#pass").keyup(function() {
		var pass_input = $("#pass").val();
		if (rpass.test(pass_input) == false) {
			$("#text4").show();
			verified = 1
		} else if (rpass.test(pass_input) == true) {
			$("#text4").hide();
			verified = 0
		}
	});
	$("#pass1").keyup(function() {
		var pass_input = $("#pass1").val();
		if (rpass.test(pass_input) == false) {
			$("#text7").show();
			verified = 1
		} else if (rpass.test(pass_input) == true) {
			$("#text7").hide();
			verified = 0
		}
	});
	$("#cpass").keyup(function () {
		var cpass_input = $("#cpass").val();
		var pass_input = $("#pass1").val();
		if (pass_input != cpass_input) {
			$("#text5").show();
			verified = 1
		}
		if (pass_input == cpass_input) {
			$("#text5").hide();
			verified = 0
		}
	});
	$("#sub").click(function (){
		if (verified == 0)
			location.href="main.html";
		else
			alert("Enter the full details accurately");
	});
	$("#sub1").click(function (){
		if (verified == 0)
			location.href="main.html";
		else
			alert("Enter the full details accurately");
	});
})
