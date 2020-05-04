// Wait for the DOM to be ready
  
$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"  
    $("form").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        "nombre-medico": {
            required:true,
            pattern: /^[A-Z ]{2,30}$/i
        },
        "nombre-solicitante":{
            required:true,
            pattern: /^[A-Z ]{2,30}$/i
        },
        "email-medico": {
          required: true,
          email: true
        },
        "email-solicitante": {
            required: true,
            email: true
          },
        "twitter-medico":{
            pattern: /(^|[^@\w])@(\w{1,15})\b/
        },
        "twitter-solicitante":{
            pattern: /(^|[^@\w])@(\w{1,15})\b/
        },
        "celular-medico":{
            pattern: /^(\+?569)?(\s?)[9876543]\d{7}$/
        },
        "celular-solicitante":{
            pattern: /^(\+?569)?(\s?)[9876543]\d{7}$/
        },
        "foto-medico":"required",
        "archivos-solicitante":"required"
        
      },
      // Specify validation error messages
      messages: {
        "nombre-medico": "Ingrese un nombre válido",
        "nombre-solicitante": "Ingrese un nombre válido",
        "email-medico": "Ingrese un mail válido",
        "email-solicitante": "Ingrese un mail válido",
        "twitter-medico": "Ingrese usuario de twitter válido",
        "twitter-solicitante": "Ingrese usuario de twitter válido",
        "celular-medico": "Ingrese un número de celular válido",
        "celular-solicitante": "Ingrese un número de celular válido"
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });
  });