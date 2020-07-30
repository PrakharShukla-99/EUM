$(document).ready(function(){
    $("form").each(function(){
        $(this).validate({
                    
        rules:{
         
        name: "required",
        mobile: {
         required:true,
         minlength:10
     },
        email: {
        required:true,
        email:true
    },
        city: "required",
    },

    messages: {
               name: "Enter your name",
               mobile: {
                required: "Enter your number",
                minlength: "Enter 10 digits"
               },
               email: {
                email:"Please enter a valid email"
               }
    },
                 submitHandler: function(form){
                    form.submit();

                 }
});
});
});
