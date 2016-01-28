jQuery(document).ready(function($) {
    /**
     * Get jwplayer duration
     *
     */
    var lastValue = $('#acf-field-segment_1_key input').val();
    var lastValue2 = $('#acf-field-segment_2_key input').val();
    var lastValue3 = $('#acf-field-segment_3_key input').val();
    var key, key2, key3;
    $('#acf-field-segment_1_key input').on('change keyup paste mouseup',
        function() {
            if ($(this).val() != lastValue) {
                lastValue = $(this).val();
                // We'll pass this variable to the PHP function example_ajax_request
                key = $('#acf-field-segment_1_key input').val();
                // This does the ajax request
                $.ajax({
                    url: ajaxurl,
                    data: {
                        'action': 'jwplayer_ajax_request',
                        'key': key
                    },
                    //if data is returned from ajax request
                    success: function(data) {
                        $('#acf-segment_1_duration input').val(data);
                        console.log(data)
                        //checks to see if key came back with duration
                        if ( data.indexOf('00:00:00') !== -1 ) {
                          $('#publishing-action .button').attr('disabled', 'disabled');
                          $('#acf-field-segment_1_key input').css('border-color', '#ff0000');
                          $('#acf-field-segment_1_key .validate-player-key').remove();
                          $('#acf-field-segment_1_key input').after('<p class="validate-player-key" style="color: red;">Incorrect format for audio/video key.</p>');

                        }
                        else{
                          $('#acf-field-segment_1_key .validate-player-key').remove();
                          if ($(".validate-player-key").length <= 0){
                            $('#publishing-action .button').removeAttr('disabled');
                          }
                          $('#acf-field-segment_1_key input').css('border-color', '#33cc33');

                        }
                    },
                    error: function(errorThrown) {
                        console.log(errorThrown);
                    }
                });
            }
        });

        $('#acf-field-segment_2_key input').on('change keyup paste mouseup',
            function() {
                if ($(this).val() != lastValue2) {
                    lastValue2 = $(this).val();
                    // We'll pass this variable to the PHP function example_ajax_request
                    key2 = $('#acf-field-segment_2_key input').val();
                    // This does the ajax request
                    $.ajax({
                        url: ajaxurl,
                        data: {
                            'action': 'jwplayer_ajax_request',
                            'key': key2
                        },
                        success: function(data) {
                          $('#acf-segment_2_duration input').val(data);
                          if ( data.indexOf('00:00:00') !== -1 ) {
                            $('#publishing-action .button').attr('disabled', 'disabled');
                            $('#acf-field-segment_2_key input').css('border-color', '#ff0000');
                            $('#acf_acf_segment-2 .validate-player-key').remove();
                            $('#acf-field-segment_2_key input').after('<p class="validate-player-key" style="color: red;">Incorrect format for audio/video key.</p>');
                            $("#acf-field-segment_2_duration input").attr("readonly", false);
                          }
                          else{

                            $('#acf_acf_segment-2 .validate-player-key').remove();
                            if ($(".validate-player-key").length <= 0){
                              $('#publishing-action .button').removeAttr('disabled');
                            }
                            $('#acf-field-segment_2_key input').css('border-color', '#33cc33');
                            $("#acf-field-segment_2_duration input").attr("readonly", true);
                          }
                        },
                        error: function(errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                }
            });

            $('#acf-field-segment_3_key input').on('change keyup paste mouseup',
                function() {
                    if ($(this).val() != lastValue3) {
                        lastValue3 = $(this).val();
                        // We'll pass this variable to the PHP function example_ajax_request
                        key3 = $('#acf-field-segment_3_key input').val();
                        // This does the ajax request
                        $.ajax({
                            url: ajaxurl,
                            data: {
                                'action': 'jwplayer_ajax_request',
                                'key': key3
                            },
                            success: function(data) {
                              $('#acf-segment_3_duration input').val(data);
                              if ( data.indexOf('00:00:00') !== -1 ) {
                                $('#publishing-action .button').attr('disabled', 'disabled');
                                $('#acf-field-segment_3_key input').css('border-color', '#ff0000');
                                $('#acf_acf_segment-3 .validate-player-key').remove();
                                $('#acf-field-segment_3_key input').after('<p class="validate-player-key" style="color: red;">Incorrect format for audio/video key.</p>');
                                $("#acf-field-segment_3_duration input").attr("readonly", false);
                              }
                              else{

                                $('#acf_acf_segment-3 .validate-player-key').remove();
                                if ($(".validate-player-key").length <= 0){
                                  $('#publishing-action .button').removeAttr('disabled');
                                }
                                $('#acf-field-segment_3_key input').css('border-color', '#33cc33');
                                $("#acf-field-segment_3_duration input").attr("readonly", true);
                              }
                            },
                            error: function(errorThrown) {
                                console.log(errorThrown);
                            }
                        });
                    }
                });
});
