let counter;
let nb_line = 0;
let id_to_place_date;
let step_top;
let circletype_one;
let circletype_last;
let circle_width;
let last_row_id = -1;

$(document).ready(function () {
    $('select').material_select();
    $('.modal').modal();

    step_top = 78 / (max_lines - 1);

    while(nb_line !== max_lines)
        addrow();

    if (dateur === 1) {
        let d = new Date();

        let month = d.getMonth() + 1;
        let day = d.getDate();

        let today_date = (day < 10 ? '0' : '') + day + ' ' +
            (month < 10 ? '0' : '') + month + ' ' +
            d.getFullYear();

        id_to_place_date = Math.ceil(max_lines / 2);

        let new_line = "<p id='p_date_left' class='p_pad left-align'></p> <p id='p_date_right' class='p_pad right-align'></p> <p id='p_date' style='position: absolute; top: 50%; margin-top:0px;' class='middle-align'>" + today_date + "</p>";
        $('#pad').append(new_line);

        re_center("date_right");
        re_center("date");

        let new_textfield = "<div class='row'>" +
            "<div class='col s12'>" +
            "<div class='col s4'>" +
            "<input type='text' class='textfield' id='textfield_date_left' />" +
            "</div>" +
            "<div class='col s4'>" +
            "<input type='text' style='text-align:center' value='" + today_date + "' disabled />" +
            "</div>" +
            "<div class='col s4'>" +
            "<input type='text' class='textfield' id='textfield_date_right' />" +
            "</div>" +
            "</div>" +
            "</div >";

        $(new_textfield).insertAfter('#lines');

        $('#date-border').removeClass('invisible');
    }

    if(circle === 1){
        $('#align_buttons_targets_1').children().each(function(){
            $(this).addClass('disabled');
        });
        $('#align_buttons_targets_' + max_lines).children().each(function(){
            $(this).addClass('disabled');
        });
        $('#delete_button_1').addClass('disabled');
        $('#delete_button_' + max_lines).addClass('disabled');

        $('#underline_button_target_1').addClass('disabled');
        $('#underline_button_target_' + max_lines).addClass('disabled');

        if(nb_line == 3)
            $('#delete_button_2').addClass('disabled');


        $('#pads').children().each(function(){
            $(this).css('border-radius', '100%');
        });

        circle_width = ($('#pads').css('width').replace('px', '')/2);

        $('#p_1').text("Bonjour");
        $('#p_' + max_lines).text("Aurevoir");

        $('#p_' + max_lines).css('top', '93%');
        $('#p_' + max_lines).css('left', circle_width);
        $('#p_1').css('left', circle_width);

        circletype_one = new CircleType(document.getElementById('p_1'));
        circletype_one.radius(circle_width - 5).dir(1);
        circletype_last = new CircleType(document.getElementById('p_' + max_lines));
        circletype_last.radius(circle_width - 5).dir(-1);
    }


    $.ajax({
        url: base_url + "tampon/json_categories",
        type: 'GET',
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (returnedData) {
            returnedData.forEach(function(item, i){
                let line = "<option value='" + item + "'>" + item + "</option>";
                $('#categories-list').append(line);
            });
            $('#categories-list').material_select();
        }
    });

    refreshListLogoLibrary();
    refreshListLogoUpload();
    refreshListFonts();

    $('#pad').append("<img class='filter-black' id='pad-img' style='width:50px; height:50px; position:absolute; visibility:hidden; '/>");

    for(let i=0; i<5; i++)
        zoom_in_pad();

});

function addrow() {
    if(nb_line == 1)
        $('#delete_button_' + last_row_id).removeClass('disabled');

    nb_line++;
    // Check to see if the counter has been initialized
    if (typeof counter === 'undefined') {
        // It has not... perform the initialization
        counter = 0;
    }

    // Do something stupid to indicate the value
    ++counter;

    let new_textfield = "<div class='row'>" +
        "<div class='col s4' style='text-align:center'>" +
        "<div class='col s5'>" +
        "<input type='text' class='textfield' id='textfield_" +
        counter +
        "' /> " +
        "</div>" +
        "<div class='col s2'>" +
        "<select class='font_size_list_targets' id='font_size_list_" +
        counter +
        "' onchange='change_font_size_target(" +
        counter +
        ")'>" +
        "<option value='8'>8</option>" +
        "<option value='9'>9</option>" +
        "<option value='10' selected='selected'>10</option>" +
        "<option value='11'>11</option>" +
        "<option value='12'>12</option>" +
        "<option value='13'>13</option>" +
        "<option value='14'>14</option>" +
        "<option value='15'>15</option>" +
        "<option value='16'>16</option>" +
        "<option value='17'>17</option>" +
        "<option value='18'>18</option>" +
        "<option value='19'>19</option>" +
        "<option value='20'>20</option>" +
        "</select>" +
        "</div>" +
        "<div class='col s5'>" +
        "<select class='font_family_list_targets' onchange='change_font_family_target(" +
        counter +
        ")' id='font_family_list_" +
        counter +
        "'>" +
        "</select>" +
        "</div>" +
        "</div>" +
        "<div class='col s4' style='text-align:center'>" +
        "<div class='col s4'>" +
        "<label> Espacement des lettres" +
        "<input type='range' min='0' max='100' value='0' step='1' class='slider_range' id='space_letter_slider_" +
        counter +
        "' onchange='space_letter_target(" +
        counter +
        ")' oninput='space_letter_target(" +
        counter +
        ")' />" +
        "</label>" +
        "</div>" +
        "<div class='col s4'>" +
        "<label> Position X de la ligne" +
        "<input type='range' min='10' max='90' value='50' step='1' class='line_position_x_slider' id='line_position_x_slider_" +
        counter +
        "' onchange='move_position_x(" +
        counter +
        ")' oninput='move_position_x(" +
        counter +
        ")' />" +
        "</label>" +
        "</div>" +
        "<div class='col s4'>" +
        "<label> Position Y de la ligne" +
        "<input type='range' min='7' max='85' step='1' class='line_position_y_slider' id='line_position_y_slider_" +
        counter +
        "' onchange='move_position_y(" +
        counter +
        ")' oninput='move_position_y(" +
        counter +
        ")' />" +
        "</label>" +
        "</div>" +
        "</div>" +
        "<div class='col s4' style='text-align:center; display:flex; justify-content:space-between'>" +
        "<div id='align_buttons_targets_" +
        counter +
        "'>" +
        "<a class='btn btn-floating btn-small waves-effect waves-light left_align_button_targets' id='left_align_button_target_" +
        counter +
        "' onclick='left_align_target(" +
        counter +
        ")'><i class='material-icons'>format_align_left</i></a> " +
        "<a class='btn btn-floating btn-small waves-effect waves-light center_align_button_targets active_button' id='center_align_button_target_" +
        counter +
        "' onclick='center_align_target(" +
        counter +
        ")'><i class='material-icons'>format_align_center</i></a> " +
        "<a class='btn btn-floating btn-small waves-effect waves-light right_align_button_targets' id='right_align_button_target_" +
        counter +
        "' onclick='right_align_target(" +
        counter +
        ")'><i class='material-icons'>format_align_right</i></a> " +
        "</div>" +
        "<div>" +
        "<a class='btn btn-floating btn-small waves-effect waves-light' id='bold_button_target_" +
        counter +
        "' onclick='to_bold_target(" +
        counter +
        ")'><i class='material-icons'>format_bold</i></a> " +
        "<a class='btn btn-floating btn-small waves-effect waves-light' id='italic_button_target_" +
        counter +
        "' onclick='to_italic_target(" +
        counter +
        ")'><i class='material-icons'>format_italic</i></a> " +
        "<a class='btn btn-floating btn-small waves-effect waves-light' id='underline_button_target_" +
        counter +
        "' onclick='to_underline_target(" +
        counter +
        ")'><i class='material-icons'>format_underline</i></a> " +
        "</div>" +
        "<div>" +
        "<a class='btn btn-floating btn-small waves-effect waves-light red' id='delete_button_" +
        counter +
        "' onclick='delete_target(" +
        counter +
        ")'><i class='material-icons'>delete_forever</i></a>" +
        "</div>" +
        "</div>" +
        "</br>" +
        "</div>";

    $('#lines').append(new_textfield);


    $('.font_size_list_targets').each(function () {
        if ($(this).attr('id') !== undefined) {
            $(this).material_select();
        }
    });

    setUpFontSelect("font_family_list_" + counter);

    let top_move = step_top * (counter - 1);
    top_move = top_move + 7;

    if(counter > max_lines){
        let max_move = 0;
        $('.p_pad').each(function(){
            let i = $(this).attr('id').replace('p_', '');
            if(!(circle === 1 && i == max_lines))
            {
                let t = parseFloat($(this)[0].style.top.replace('%',''));
                if(t > max_move){
                    max_move = t;
                }
            }


        });
        top_move = max_move + step_top;
    }

    if(dateur === 1 && counter >= (max_lines/2)+1)
        top_move = top_move + 7;

    let new_pad_line = "<p id='p_" + counter + "' class='p_pad middle-align' style='top:" + top_move + "%'></p>";
    $('#pad').append(new_pad_line);

    $('#line_position_y_slider_' + counter).val(top_move);

    if (nb_line === max_lines)
        $('#add-row').addClass("disabled");
}

$(document).on('input', '.textfield', function () {
    let textfield_id = $(this).attr('id');
    let id = textfield_id.replace("textfield_", "");
    let text = $('#' + textfield_id).val();


    if(id == 1 && circle === 1)
    {
        $('#p_' + id).text(text);
        circletype_one = new CircleType(document.getElementById('p_1'));
        circletype_one.radius(circle_width - circle_width/6.1).dir(1);
        if(circletype_one.radius() != circle_width - circle_width/6.1)
        {
            $(this).val(
                function(index, value){
                    return value.substr(0, value.length - 1);
                });
            $(this).trigger('input');
        }
    }
    else if (id == max_lines && circle === 1)
    {
        //$('#p_' + id).css('top', 100 - (text.length * 1.6 + 7) + '%');
        $('#p_' + id).text(text);
        circletype_last = new CircleType(document.getElementById('p_' + max_lines));
        circletype_last.radius(circle_width - circle_width/6.1).dir(-1);
        if(circletype_last.radius() != circle_width - circle_width/6.1)
        {
            $(this).val(
                function(index, value){
                    return value.substr(0, value.length - 1);
                });
            $(this).trigger('input');
        }

    }
    else
    {
        $('#p_' + id).text(text);
        re_center(id);
    }
});

function delete_target(id) {
    $('#add-row').removeClass("disabled");
    nb_line--;
    $('#p_' + id).remove();
    $('#textfield_' + id).parent().parent().parent().remove();

    $('.p_pad').each(function(){
        let i = parseInt($(this).attr('id').replace('p_', ''));
        if(i > id){
            if(!(circle === 1 && i == max_lines))
            {
                let t = parseFloat($(this)[0].style.top.replace('%','')) - step_top;
                $(this).css('top', t +'%');
            }

        }
    });

    if(nb_line == 1){
        last_row_id = $('.p_pad').first().attr('id').replace('p_', '');
        $('#delete_button_' + last_row_id).addClass('disabled');
    }
}

function left_align() {
    $('.line_position_x_slider').val(0);

    $('.p_pad').removeClass('right-align');
    $('.p_pad').removeClass('middle-align');
    $('.p_pad').addClass('left-align');

    $('#left_align_button').addClass('active_button');
    $('#center_align_button').removeClass('active_button');
    $('#right_align_button').removeClass('active_button');

    $('.left_align_button_targets').addClass('active_button');
    $('.center_align_button_targets').removeClass('active_button');
    $('.right_align_button_targets').removeClass('active_button');
}

function left_align_target(id) {
    $('#line_position_x_slider_' + id).val(0);

    $('#p_' + id).removeClass('right-align');
    $('#p_' + id).removeClass('middle-align');
    $('#p_' + id).addClass('left-align');

    $('#left_align_button_target_' + id).addClass('active_button');
    $('#center_align_button_target_' + id).removeClass('active_button');
    $('#right_align_button_target_' + id).removeClass('active_button');
}

function center_align() {
    $('.line_position_x_slider').val(50);

    $('.p_pad').removeClass('right-align');
    $('.p_pad').removeClass('left-align');
    $('.p_pad').addClass('middle-align');


    $('.p_pad').each(function() {
        let padding = ($('#pad').css('width').replace('px', '') - $(this).css('width').replace('px','')) / 2;
        $(this).css('left', padding + "px");
    });

    $('#center_align_button').addClass('active_button');
    $('#left_align_button').removeClass('active_button');
    $('#right_align_button').removeClass('active_button');

    $('.center_align_button_targets').addClass('active_button');
    $('.left_align_button_targets').removeClass('active_button');
    $('.right_align_button_targets').removeClass('active_button');
}

function center_align_target(id) {
    $('#line_position_x_slider_' + id).val(50);

    $('#p_' + id).removeClass('right-align');
    $('#p_' + id).removeClass('left-align');
    $('#p_' + id).addClass('middle-align');

    re_center(id);

    $('#center_align_button_target_' + id).addClass('active_button');
    $('#left_align_button_target_' + id).removeClass('active_button');
    $('#right_align_button_target_' + id).removeClass('active_button');
}

function right_align() {
    $('.line_position_x_slider').val(100);

    $('.p_pad').addClass('right-align');
    $('.p_pad').removeClass('left-align');
    $('.p_pad').removeClass('middle-align');

    $('.p_pad').each(function() {
        let padding = $('#pad').css('width').replace('px', '') - $(this).css('width').replace('px','') - 5;
        $(this).css('left', padding + "px");
    });

    $('#right_align_button').addClass('active_button');
    $('#center_align_button').removeClass('active_button');
    $('#left_align_button').removeClass('active_button');

    $('.right_align_button_targets').addClass('active_button');
    $('.center_align_button_targets').removeClass('active_button');
    $('.left_align_button_targets').removeClass('active_button');
}

function right_align_target(id) {
    $('#line_position_x_slider_' + id).val(100);

    $('#p_' + id).addClass('right-align');
    $('#p_' + id).removeClass('left-align');
    $('#p_' + id).removeClass('middle-align');

    re_center(id);

    $('#right_align_button_target_' + id).addClass('active_button');
    $('#center_align_button_target_' + id).removeClass('active_button');
    $('#left_align_button_target_' + id).removeClass('active_button');
}

$("#list_color").on('change', function(){
    let color = $("#list_color").val();
    $('.p_pad').css('color', color);

    $('#pad-img').removeClass('filter-black');
    $('#pad-img').removeClass('filter-blue');
    $('#pad-img').removeClass('filter-red');
    $('#pad-img').removeClass('filter-green');
    $('#pad-img').removeClass('filter-purple');

    $('#pad-img').addClass('filter-' + color);

    $('#border_one').css('border-color', color);
    $('#border_two').css('border-color', color);
});

function change_font_size() {
    let size = $("#font_size_list").val();
    $('.p_pad').css('font-size', size + "pt");

    $('.font_size_list_targets').each(function () {
        if ($(this).attr('id') !== undefined) {
            $(this).val(size);
            $(this).material_select();
        }
    });

    $('.p_pad').each(function () {
        let id = $(this).attr('id').replace('p_','');
        if (id != undefined) {
            re_center(id);
        }
    });

    circletype_one.destroy();
    circletype_one = new CircleType(document.getElementById('p_1'));
    circletype_one.radius(circle_width - 5).dir(1);
}

function change_font_size_target(id) {
    let size = $('#font_size_list_' + id).val();
    $('#p_' + id).css('font-size', size + "pt");

    re_center(id);
}

function to_bold_target(id) {
    $('#p_' + id).toggleClass('bold');
    $('#bold_button_target_' + id).toggleClass('active_button');

    re_center(id);
}

function to_italic_target(id) {
    $('#p_' + id).toggleClass('italic');
    $('#italic_button_target_' + id).toggleClass('active_button');

    re_center(id);
};

function to_underline_target(id) {
    $('#p_' + id).toggleClass('underline');
    $('#underline_button_target_' + id).toggleClass('active_button');

    re_center(id);
}

function change_font_family() {
    let font = $("#font_family_list").val();
    $('.p_pad').css('font-family', font);

    $('.font_family_list_targets').each(function () {
        if ($(this).attr('id') !== undefined) {
            $(this).val(font);
            setUpFontSelect($(this).attr('id'));
        }
    });

    $('.p_pad').each(function () {
        let id = $(this).attr('id').replace('p_','');
        if (id !== undefined) {
            re_center(id);
        }
    });
}

function change_font_family_target(id) {
    let font = $('#font_family_list_' + id).val();
    $('#p_' + id).css('font-family', font);

    re_center(id);
}

function img_size_plus() {
    $('#pad').children('img').animate({
        zoom:'+=5%'
    }, 50);
}

function img_size_minus() {
    $('#pad').children('img').animate({
        zoom: '-=5%'
    }, 50);
}

function img_move_left() {
    $('#pad').children('img').animate({
        left: '-=5px'
    }, 50);
}

function img_move_right() {
    $('#pad').children('img').animate({
        left: '+=5px'
    }, 50);
}

function img_move_top() {
    $('#pad').children('img').animate({
        top: '-=5px'
    }, 50);
}

function img_move_down() {
    $('#pad').children('img').animate({
        top: '+=5px'
    }, 50);
}

$('.pad-color-button').click(function () {
    $(this).toggleClass('active-pad-color');
    if ($(this).hasClass('active-pad-color')) {
        let i = 0;
        let index = $('.active-pad-color').index($(this));
        while ($('.active-pad-color').length > $('#input_quantity').val()) {
            if (index !== i) {
                $('.active-pad-color').eq(i).removeClass('active-pad-color');
            }
            i++;
        }
    }
});

$('#input_quantity').change(function () {
    while ($('.active-pad-color').length > $('#input_quantity').val()) {
        $('.active-pad-color').eq(0).removeClass('active-pad-color');
    }
});

function export_pdf() {
    let doc = new jsPDF('l', 'mm', [height_mm, width_mm]);

    $('#pad').css('border-style', 'none');

    html2canvas($("#pads"), {
        scale: 8,
        onrendered: function (canvas) {
            doc.addImage(canvas, 'PNG', 0, 0, width_mm, height_mm);
            doc.save('APERCU - ' + $('#title').text() + ' - ' + $.now() + '.pdf');
            $('#pad').css('border-style', 'dashed');
            return;
        },
        letterRendering:true
    });
}



function remove_image_pad(){
    $('#logo-buttons').addClass('undisplay');
    $('#pad-img').css('visibility', 'hidden');
}

Dropzone.options.dropzoneForm = {
    init: function () {
        this.on('complete', function () {
            refreshListLogoUpload();
        });
    }
};

function space_letter_target(id) {
    let space = $("#space_letter_slider_" + id).val();
    space = space / 2;
    space += "px";
    $('#p_' + id).css('letter-spacing', space);
    $('#p_' + id).css('text-indent', space);
    //$('#p_' + id).css('margin-left', '-' + space);
    //$('#p_' + id).css('margin-right', '-' + space);

    re_center(id);
}

$("#switch_border_one").on('change', function(){
    $('#options-border-1').toggleClass('invisible');
    $('#border_one').toggleClass('invisible');

    $('#width_border_one').trigger('change');
    $('#height_border_one').trigger('change');
});

function active_border_date() {
    $('#options-border-d').toggleClass('invisible');
    $('#p_date').toggleClass('date_border');
    let move = 10;
    if($('#p_date').hasClass('date_border'))
        move = -10;
    let top = parseFloat($('#p_date').css('top').replace('px', '')) + move;
    let left = parseFloat($('#p_date')[0].style.left.replace('px', '')) + move;
    $('#p_date').css('top', top + 'px');
    $('#p_date').css('left', left + 'px');
}

$('.width_border').on('change input', function() {
    let width = 100 - $(this).val();
    let id = $(this).attr('id').replace('width_', '');
    $('#' + id).css('width', width + '%');
});

$('.height_border').on('change input', function() {
    let height = 100 - $(this).val();
    let id = $(this).attr('id').replace('height_', '');
    $('#' + id).css('height', height + '%');
});

$('#border_style_one').on('change', function(){
    let value = $(this).val();
    $('#label_width_border_two').addClass('invisible');
    $('#label_height_border_two').addClass('invisible');
    $('#width_border_two').addClass('invisible');
    $('#height_border_two').addClass('invisible');
    $('#border_two').addClass('invisible');

    switch(value){
        case "solid":
            $('#border_one').css('border-style', 'solid');
            break;
        case "dashed":
            $('#border_one').css('border-style', 'dashed');
            break;
        case "double":
            $('#label_width_border_two').removeClass('invisible');
            $('#label_height_border_two').removeClass('invisible');
            $('#width_border_two').removeClass('invisible');
            $('#height_border_two').removeClass('invisible');
            $('#border_two').removeClass('invisible');
            $('#width_border_two').trigger('change');
            $('#height_border_two').trigger('change');
            $('#border_one').css('border-style', 'solid');

            break;
    }
});

$.fn.textWidth = function(){
    let html_org = $(this).html();
    let html_calc = '<span>' + html_org + '</span>';
    $(this).html(html_calc);
    let width = $(this).find('span:first').width();
    $(this).html(html_org);
    return width;
};

function re_center(id){

    let padding;
    if ($('#p_' + id).hasClass('middle-align')) {
        padding = ($('#pad').css('width').replace('px', '') - $('#p_' + id).css('width').replace('px',''))/2;
        padding -= 2;
        $('#p_' + id).css('left', padding + "px");
    }
    else if ($('#p_' + id).hasClass('right-align')) {
        padding = $('#pad').css('width').replace('px', '') - $('#p_' + id).textWidth() - 5;
        $('#p_' + id).css('left', padding + "px");
    }

}

function move_position_x(id) {
    let max = parseInt($('#line_position_x_slider_' + id).attr('max'));
    let min = parseInt($('#line_position_x_slider_' + id).attr('min'));
    let value = parseInt($('#line_position_x_slider_' + id).val());
    let mid = (max + min)/2;
    let left = max + min;
    left = value / left;
    left = left * $('#pad').css('width').replace('px', '');
    left = left - $('#p_' + id).css('width').replace('px','')/2;

    $('#p_' + id).css('left', left + "px");

    $('#p_' + id).removeClass('middle-align');
    $('#p_' + id).removeClass('left-align');
    $('#p_' + id).removeClass('right-align');

    $('#right_align_button_target_' + id).removeClass('active_button');
    $('#left_align_button_target_' + id).removeClass('active_button');
    $('#center_align_button_target_' + id).removeClass('active_button');

    if (value === parseInt(min)){
        $('#left_align_button_target_' + id).addClass('active_button');
        $('#p_' + id).addClass('left-align');
    }
    else if(value === parseInt(mid)){
        $('#center_align_button_target_' + id).addClass('active_button');
        $('#p_' + id).addClass('middle-align');
    }

    else if(value === parseInt(max)){
        $('#right_align_button_target_' + id).addClass('active_button');
        $('#p_' + id).addClass('right-align');
    }

}

function move_position_y(id) {
    let top = $('#line_position_y_slider_' + id).val();
    $('#p_' + id).css('top', top + '%');
}

function zoom_in_pad() {
    let zoom = parseInt($('#zoom_value').text().replace('%',''));
    zoom = zoom + 20;
    if (zoom < 300) {
        $('#pads').parent().animate({
            zoom: '+=20%'
        }, 0);
        $('#zoom_value').text(zoom + '%');
    }
}

/* LE ZOOM COMME CA MARCHE PAS SUR FIREFOX !
    $('#pads').parent().css('-webkit-transform', 'scale(2)');
    $('#pads').parent().css('transform', 'scale(2)');
    --- Pourrait etre une solution mais c'est tres moche...
*/

function zoom_out_pad() {
    let zoom = parseInt($('#zoom_value').text().replace('%',''));
    zoom = zoom - 20;
    if (zoom > 50) {
        $('#pads').parent().animate({
            zoom: '-=20%'
        }, 0);
        $('#zoom_value').text(zoom + '%');
    }
}


function order(){
    $("body").css("cursor", "progress");
    let border = $('#pad').css('border');
    $('#pad').css('border', 'none');
    html2canvas($("#pad"), {
        scale: 8,
        onrendered: function (canvas) {
            let data = encodeURIComponent(canvas.toDataURL("image/jpg").split(',')[1]);
            $.ajax({
                url: base_url + "tampon/send_mail",
                type: 'POST',
                data: 'header=' + $('#modal-object').val() + '&content=' + $('#Commentaires').val() + '&data=' + data + '&id_pad=' + id_pad,
                success: function () {
                $('#pad').css('border', border);
                $("body").css("cursor", "default");
                $('#buy-encre-modal').modal('open');
            },
            error: function () {
                alert("Erreur d'envoi de commande.");
            }
        });
        },
        letterRendering:true
    });
}

function alone_function(){
    $('#pad-colors').toggleClass('invisible');
    if($('#alone_checkbox').is(':checked')){
        $('#title').text('EMPREINTE POUR ' + name_pad);
    }
    else{
        $('#title').text('TAMPON ' + name_pad);
    }
}

$('#switch_logo').on('change', function(){
    $('#upload-logo-div').toggleClass('undisplay');
    $('#library-logo-div').toggleClass('undisplay');
});


$('#logo-search').on('input', function(){
    refreshListLogoLibrary();
});

$('#categories-list').on('change', function(){
    refreshListLogoLibrary();
});

function refreshListLogoLibrary(){
    let search = $('#logo-search').val();
    let category = $('#categories-list').val();
    $.ajax({
        url: base_url + "tampon/get_list_logo_library",
        type: 'GET',
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        data: 'search=' + search + "&category=" + category,
        success: function (returnedData) {
            $('#logo-list-library').empty();
            returnedData.forEach(function(i){
                let line = "<li class='logo-item tooltipped' data-position='bottom' data-delay='50' data-tooltip='" + i.nom + "'><img class='logo-img' src='" + base_url + "assets/Site/CLIP ART SITE/'" + i.categorie + "/" + i.nom + "." + i.extension + "'></li>";
                $('#logo-list-library').append(line);
            });
            $('.tooltipped').tooltip({delay: 50});

            $('.logo-item').on('click', function(){
                $('#logo-buttons').removeClass('undisplay');
                $('#pad-img').css('visibility', 'visible');
                $('#pad-img').attr('src', $(this).children().first().attr('src'));
            });
        },
        error: function(){
            alert("Erreur de récupérations des logos de notre bibliothèque.");
        }
    });
}

function refreshListLogoUpload(){
    $.ajax({
        url: base_url + "tampon/get_list_logo_upload",
        type: 'GET',
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (returnedData) {
            $('#logo-list-upload').empty();
            returnedData.forEach(function(i){
                let line = "<li class='logo-item'><img class='logo-img' src='" + i + "'></li>";
                $('#logo-list-upload').append(line);
            });

            $('.logo-item').on('click', function(){
                $('#logo-buttons').removeClass('undisplay');
                $('#pad-img').css('visibility', 'visible');
                $('#pad-img').attr('src', $(this).children().first().attr('src'));
            });
        },
        error: function(){
            alert("Erreur de récupérations de vos téléchargements.");
        }
    });
}

let fonts = [];
function setUpFontSelect(id)
{
    fonts.forEach(function(item, index){
        let value = fonts[index].split(".")[0];
        $('#' + id).append("<option value='" + value + "'>" + value + "</option>");
    });

    $('#' + id).material_select();

    $('#' + id).parent().children('ul').children('li').each(function(){
        $(this).css('font-family', $(this).children().text());
    });

}

function refreshListFonts(){
    $.ajax({
        url: base_url + "tampon/get_list_fonts",
        type: 'GET',
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (returnedData) {
            let style = document.createElement('style');
            style.type = 'text/css';
            returnedData.forEach(function(item){
                fonts.push(item);
            });
            fonts.forEach(function(item, index){
                let i = fonts[index];
                let value = i.split(".")[0];

                style.innerHTML += '@font-face {\n' +
                    '    font-family: ' + value + ';\n' +
                    '    src: url(' + base_url + 'assets/Site/Fonts/' + i + ');\n' +
                    '}\n';
                $('#font_family_list').append("<option value='" + value + "'>" + value + "</option>");
            });

            $('.font_family_list_targets').each(function(){
                if($(this).attr('id')){
                    let id = $(this).attr('id');
                    setUpFontSelect(id);
                }
            });

            document.getElementsByTagName('head')[0].appendChild(style);

            $('#font_family_list').material_select();
            $('#font_family_list').parent().children('ul').children('li').each(function(){
                $(this).css('font-family', $(this).children().text());
            });


        },
        error: function(){
            alert("Erreur de récupérations des polices.");
        }
    });
}

