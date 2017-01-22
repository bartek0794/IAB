$('document').ready(function()
{ 
    $("#login-form").validate({
      rules:
   {
   password: {
   required: true,
   },
   user_email: {
            required: true,
            email: true
            },
    },
       messages:
    {
            password:{
                      required: "Wprowadź hasło"
                     },
            user_email: "Wprowadź adres e-mail",
       },
    submitHandler: submitForm 
       });  
});