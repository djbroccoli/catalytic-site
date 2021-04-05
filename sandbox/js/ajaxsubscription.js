$(document).ready(function () {

            // Get the form.
            var form = $('#subscription-form');

            // Get the messages div.
            var output = $('#suboutput');


             $("#subscription-form").validate({
                 ignore: ":hidden",
                 rules: {
                    subemail: {
                        required: true,
                        email: true
                            }
                 },
                 messages: {
                    subemail: {
                        email: " <i class='fa fa-exclamation-triangle'></i>",
                        required: " <i class='fa fa-exclamation-triangle'></i>"
                    }
                },
                 submitHandler: function (form) {
                     $.ajax({
                         type: "POST",
                         url: "savesub.php",
                         data: $(form).serialize(),
                         success: function (response) {
                            $(output).removeClass('error');
                            $(output).addClass('success');
                            $('#subemail').val('');

                            $(form).hide().fadeOut(2000);

                            $(output).html(response).show().delay(4000).queue(function(n) {
                                $(this).hide(); n();
                                $(form).show().fadeIn(2000);
                            });
                         },
                         error: function (response) {
                            $(output).removeClass('success');
                            $(output).addClass('error');
                            $('#subemail').val('');

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