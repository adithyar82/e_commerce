
    $(document).on("input", '#email_at_registration', function() {
        // alert("akjfl;j");
        // var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var cgemail = $('#email_at_registration').val().trim();
        if (($('#email_at_registration').val().length > 1)) {
    
            $('#spanEmail_at_registration').html("<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp Enter valid Email Address");
            $('#email_at_registration').focus();
    
            alert(cgemail);
            console.log(cgemail);
            $.ajax({
                url: './verify_email.php',
                data: {
                    'CGemail': cgemail
                },
                type: 'POST',
                datatype: 'text',
                success: function(data) {
                    console.log(data)
                    if (data == "failure") {
                        $('#spanEmail_at_registration').html("<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp Email already exists");
                        $('#spanEmail_at_registration').removeClass("error_green").addClass("error_red");
                        return false;
                    } else {
                        $('#spanEmail_at_registration').html("<i class='fa fa-thumbs-up' aria-hidden='true'></i>&nbsp Email available");
                        $('#spanEmail_at_registration').removeClass("error_red").addClass("error_green");
                    }
                }
            });
        }
    });

