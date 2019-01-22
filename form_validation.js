$(document).ready(function(){
	$('newform').validate({
		rules:
		{
			create_name:{

				required:true,
			},

			create_age:{
				required:true,

			},
			create_password:{
				required:true,
				minlength:5,
				maxlength:8,
			}
		},
		messages:{
			create_name:{
				required:"Please enter the name "
			},

			create_age:{
				required:"Please enter the age in numbers only"
			},
			create_password:{
				required:"Please enter password of minimum length 5 letters."
			},
		},
	// 	submitHandler:function(form){
	// 	form.submit();
	// }
	highlight: function (element) {
        $(element).closest('.modal-content').removeClass('success').addClass('error');
    },
    success: function (element) {
        element.text('OK!').addClass('valid')
            .closest('.modal-content').removeClass('error').addClass('success');
    }
	});
});
