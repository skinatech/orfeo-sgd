$(document).ready(function() {
    $('#configRoot').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
      submitHandler: function(validator, form, submitButton) {
        $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#configRoot').data('bootstrapValidator').resetForm();

            var bv = form.data('bootstrapValidator');
            // Use Ajax to submit form data
            $.post(form.attr('action'), form.serialize(), function(result) {
                console.log(result);
            }, 'json');
      },
        fields: {
            hostRoot: {
                validators: {
                        stringLength: {
                        min: 4,
                    },
                        notEmpty: {
                        message: 'Ip o nombre de servidor.'
                    }
                }
            },
             portRoot: {
                validators: {
                     stringLength: {
                        min: 2,
                        max: 4,
                        message:'Min 2 caracteres y no más de 4'
                    },
                    notEmpty: {
                        message: 'Puerto BD.'
                    }
                }
            },

            userRoot: {
                validators: {
                      stringLength: {
                        min: 2,
                        max:12,
                     },
                    notEmpty: {
                        message: 'Usuario de la BD.'
                    }

                }
            },
            passRoot: {
                validators: {
                     stringLength: {
                        min: 2,
                        max: 12,
                    },
                    notEmpty: {
                        message: 'Contraseña de la BD.'
                    }
                }
            },
            }
        })

});
