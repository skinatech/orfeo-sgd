$(document).ready(function() {
    $('#config_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
      submitHandler: function(validator, form, submitButton) {
        $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#config_form').data('bootstrapValidator').resetForm();

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
            host: {
                validators: {
                     stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Ip o nombre de servidor.'
                    }
                }
            },
            servicio: {
                validators: {
                    stringLength:{
                        min: 4,
                        max:12,
                    },
                    notEmpty: {
                        message: 'Nombre de la BD.'
                    }
                }
            },
            usuario: {
                validators: {
                  stringLength:{
                          min: 4,
                          max: 12,
                        },
                    notEmpty: {
                        message: 'Usuario de la BD.'
                    }
                }
            },
                contrasena: {
                validators: {
                      stringLength: {
                        min: 2,
                        max: 20,
                        message:'Min 2 caracteres y no más de 20.'
                    },
                    notEmpty: {
                        message: 'Contraseña del usuario de BD.'
                    }
                }
            },
               driver: {
                validators: {stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Motor de BD.'
                    }
                }
            },

               port: {
                validators: {
                     stringLength: {
                        min: 2,
                        max: 4,
                        message:'Min 2 caracteres y no más de 4.'
                    },
                    notEmpty: {
                        message: 'Puerto de la BD.'
                    }
                }
            },
            ambiente: {
                validators: {
                  stringLength:{
                          min: 4,
                          max: 12,
                        },
                    notEmpty: {
                        message: 'Ambiente.'
                    }
                }
            },

            ambiente_capacitacion: {
                validators: {
                        stringLength:{
                          min: 4,
                          max: 12,
                        },
                    notEmpty: {
                        message: 'Ambiente de capacitación.'
                    }
                }
            },
            servProcDocs: {
                validators: {
                        stringLength: {
                        min: 4,
                    },
                }
            },

            entidad: {
                validators: {
                        stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Sigla de la entidad.'
                    }
                }
            },

            entidad_largo: {
                validators: {
                        stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Nombre de la entidad.'
                    }
                }
            },

            entidad_tel: {
                validators: {
                        stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Telefono de la entidad.'
                    }
                }
            },

            entidad_dir: {
                validators: {
                        stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Dirección de la entidad.'
                    }
                }
            },

            entidad_depsal: {
                validators: {
                        stringLength: {
                        min: 4,
                        max: 5,
                    },
                    notEmpty: {
                        message: 'Dependencia de salida.'
                    }
                }
            },

            ADODB_PATH: {
                validators: {
                        stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Ruta ADODB_PATH.'
                    }
                }
            },

            ADODB_CACHE_DIR: {
                validators: {
                        stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Ruta ADODB_CACHE.'
                    }
                }
            },

            MODULO_RADICACION_DOCS_ANEXOS: {
                validators: {
                        stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Ruta modulo rad anexos.'
                    }
                }
            },

            ldapServer: {
                validators: {
                        stringLength: {
                        min: 4,
                    },
                }
            },

            cadenaBusqLDAP: {
                validators: {
                        stringLength: {
                        min: 4,
                    },
                }
            },

            campoBusqLDAP: {
                validators: {
                        stringLength: {
                        min: 4,
                    },
                }
            },

            menuAdicional: {
                validators: {stringLength: {
                        min: 2,
                        max: 2,
                    },

                    notEmpty: {
                        message: 'Menu adicional?.'
                    }
                }
            },

            PEAR_PATH: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Ruta PEAR.'
                    }
                }
            },

            servidor_mail: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                }
            },

            protocolo_mail: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                }
            },

            puerto_mail: {
                validators: {
                     stringLength: {
                        min: 2,
                        max: 4,
                        message:'Min 2 caracteres y no más de 4.'
                    },
                }
            },

            colorFondo: {
                validators: {
                  stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Color de fondo?.'
                    }
                }
            },

            pais: {
                validators: {
                    stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Pais?.'
                    }
                }
            },

            administrador: {
                validators: {
                     stringLength: {
                        min: 2,
                        max: 12,
                        message:'Min 2 caracteres y no más de 12.'
                    },
                    notEmpty: {
                        message: 'Usuario administrador.'
                    }
                }
            },

            ESTILOS_PATH: {
                validators: {
                        stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Ruta de los estilos ORFEO.'
                    }
                }
            },



            }
        })
        
});

