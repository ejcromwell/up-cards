
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


(function($) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /* Build out html for card content
    ---------------------------------------------------------------*/
    var buildCard = function (response) {
        var cards = [];
        for (var i = response.length - 1; i >= 0; i--) {
            var html = `
                <div class="card">
                    <div class="card-suit-top">
                        ${response[i].value}
                    </div>
                    <div class="card-value">
                        ${response[i].suit}
                    </div>
                    <div class="card-suit-bottom">
                        ${response[i].value}
                    </div>
                </div>
            `;
            cards.push(html);
        }
        return cards;
    };

    /* Crate ajax call to shuffle controller
    ---------------------------------------------------------------*/
    var ajaxCall = function () {
        $.ajax({
            method: 'GET',
            url: '/shuffle',
            success: function(response) {
                var output = buildCard(JSON.parse(response));
                $('#shuffle-card-wrap').html(output);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                //
            }
        });
    }

    /* Create click function to trigger shuffle call
    ---------------------------------------------------------------*/
    $("#shuffle-btn").on('click', function (e) {
        e.preventDefault();
        ajaxCall();
    });


})(jQuery);
