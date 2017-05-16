$(document).ready(function () {
        // ANIMATEDLY DISPLAY THE NOTIFICATION COUNTER.
        $('#noti_Counter')
            .css({ opacity: 0 })
            .text('0')              // ADD DYNAMIC VALUE (YOU CAN EXTRACT DATA FROM DATABASE OR XML).
            .css({ top: '-10px' })
            .animate({ top: '10px', opacity: 1 }, 500);

        $('#noti_Counter').click(function () {

            // TOGGLE (SHOW OR HIDE) NOTIFICATION WINDOW.
            $('#notifications').fadeToggle('fast', 'linear', function () {
                if ($('#notifications').is(':hidden')) {
                    $('#noti_Button').css('background-color', '#FFF');
                }
                else $('#noti_Button').css('background-color', '#FFF');        // CHANGE BACKGROUND COLOR OF THE BUTTON.
            });

            $('#noti_Counter').fadeOut('slow');                 // HIDE THE COUNTER.

            return false;
        });

        // HIDE NOTIFICATIONS WHEN CLICKED ANYWHERE ON THE PAGE.
        $(document).click(function () {
            $('#notifications').hide();

            // CHECK IF NOTIFICATION COUNTER IS HIDDEN.
            if ($('#noti_Counter').is(':hidden')) {
                // CHANGE BACKGROUND COLOR OF THE BUTTON.
                $('#noti_Button').css('background-color', '#FFF');
            }
        });

        $('#notifications').click(function () {
            return false;       // DO NOTHING WHEN CONTAINER IS CLICKED.
        });
    });
