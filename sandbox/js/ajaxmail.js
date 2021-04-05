$(document).ready(function () {

            // Get the form.
            var form = $('#contact-form');

            // Get the messages div.
            var output = $('#output');


             $("#contact-form").validate({
                 ignore: ":hidden",
                 rules: {
                    contactname: {
                        required: true,
                        minlength: 2
                            },
                    contactemail: {
                        required: true,
                        email: true
                            },
                    contactmessage: {
                        required: true,
                        minlength: 10
                            }
                 },
                 messages: {
                    contactname: {
                        required: "<i class='fa fa-exclamation-triangle'></i> Please, type your name",
                        minlength: "<i class='fa fa-exclamation-triangle'></i> Your name must consist of at least 2 characters"
                    },
                    contactemail: {
                        required: "<i class='fa fa-exclamation-triangle'></i> Please, type your e-mail address"
                    },
                    contactmessage: {
                        required: "<i class='fa fa-exclamation-triangle'></i> Please, write your message",
                        minlength: "Sure? That message seems too short"
                    }
                },
                 submitHandler: function (form) {
                     $.ajax({
                         type: "POST",
                         url: "sendmail.php",
                         data: $(form).serialize(),
                         success: function (response) {
                            $(output).removeClass('error');
                            $(output).addClass('success');

                             $(output).html(response)
                                 .fadeIn(3000, function () {
                                 //$('#output').append("<img id='checkmark' src='images/ok.png' />");
                             });
                             $(form).hide().fadeOut(2000);   
                         },
                         error: function (response) {
                            // Make sure that the formMessages div has the 'error' class.
                            $(output).removeClass('success');
                            $(output).addClass('error');

                            // Set the message text.
                            if (data.responseText !== '') {
                                $(output).text(data.responseText);
                            } else {
                                $(output).text('Something went wrong. Please, try again later.');
                            }
                        }
                     });
                     return false; // required to block normal submit since you used ajax
                 }
             });

        });
