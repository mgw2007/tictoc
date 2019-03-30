$(document).ready(function ($) {
    var boardState = [['', '', ''], ['', '', ''], ['', '', '']];
    var playerUnit = 'X';

    $('.square').click(function (event) {
        var x = $(this).data('x');
        var y = $(this).data('y');
        $.post(urls.play, {data: [x, y, 'X']}, function (res) {
            for (var i = 0; i <= 2; i++) {
                for (var j = 0; j <= 2; j++) {
                    if (res.data[i][j]) {

                        $('#square_' + i + '_' + j).html(res.data[i][j]);
                        $('#square_' + i + '_' + j).unbind('click');
                    }
                }
            }
            if (res.status != '') {
                $('.square').unbind('click')
            }
            $('#result').html(res.status)
        });
    });


});

