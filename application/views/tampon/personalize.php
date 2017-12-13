<div class="row">
    <div id="pads" class="col-md-4 col-md-offset-5" style="width: <?php echo $width ?>; height: <?php echo $height ?>">
        <div id="pad"></div>
        <div id="border_one" class="invisible"></div>
        <div id="border_two" class="invisible"></div>
    </div>
    <div class="col-md-2 col-md-offset-1">
        <a onclick="zoom_in_pad()" style="cursor: pointer"><i class="material-icons small grey-text text-grey">zoom_in</i></a>
        <label>
            <input type="text" class="textfield" style="color: grey; width: 30px;" id="zoom_value" value="100"/>
            %
        </label>
        <a onclick="zoom_out_pad()" style="cursor: pointer"><i class="material-icons small grey-text text-grey">zoom_out</i></a>
    </div>
</div>
<br />

<div class="row" style="background-color:white">
    <div class="col-md-12">
        <ul id="tabs-swipe-demo" class="tabs">
            <li class="tab col s3"><a href="#test-swipe-1">Texte entier</a></li>
            <li class="tab col s3"><a href="#test-swipe-2">Ligne par ligne</a></li>
            <li class="tab col s3" onclick="$('.carousel-item').trigger('click')"><a href="#test-swipe-3">Images / Logos</a></li>
            <li class="tab col s3"><a href="#test-swipe-4">Cadre / Bordures</a></li>
        </ul>
        <div id="test-swipe-1" class="col s12">
            <br />
            <div class="row">
                <div class="col-md-12" style="text-align:center">
                    <a class="btn waves-effect waves-light" id="left_align_button" onclick="left_align()"><i class="material-icons left">format_align_left</i>ALIGNER A GAUCHE</a>
                    <a class="btn waves-effect waves-light active_button" id="center_align_button" onclick="center_align()"><i class="material-icons left">format_align_center</i>CENTRER</a>
                    <a class="btn waves-effect waves-light" id="right_align_button" onclick="right_align()"><i class="material-icons left">format_align_right</i>ALIGNER A DROITE</a>
                </div>
            </div>
            <br />
            <div class="row">
                <form class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Couleur de texte</label>
                            <select onchange="change_color()" id="list_color">
                                <option value="black">Noir</option>
                                <option value="blue">Bleu</option>
                                <option value="red">Rouge</option>
                                <option value="green">Vert</option>
                                <option value="purple">Violet</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Taille de texte</label>
                            <select onchange="change_font_size()" id="font_size_list">
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10" selected="selected">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Police de texte</label>
                            <select onchange="change_font_family()" id="font_family_list" style="height:20px; overflow:scroll">
                                <option value="Arial" style="font-family:'Arial'">Arial</option>
                                <option value="Agency FB" style="font-family:'Agency FB'">Agency FB</option>
                                <option value="Century" style="font-family:'Century'">Century</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <br />
        </div>
        <div id="test-swipe-2" class="col s12">
            <br />
            <div id="lines">
            </div>
            <br />
            <div class="row">
                <div class="col-md-6 col-md-offset-4" style="padding:0px">
                    <a class="waves-effect waves-light btn" onclick="addrow()" id="add-row"><i class="material-icons left">add</i>AJOUTER UNE LIGNE</a>
                </div>
            </div>
            <br />
        </div>

        <div id="test-swipe-3" class="col s12">
            <br />
            <div class="row">
                <a class="waves-effect waves-light btn" onclick="img_size_plus()"><i class="material-icons">zoom_in</i></a>
                <a class="waves-effect waves-light btn" onclick="img_size_minus()"><i class="material-icons">zoom_out</i></a>
            </div>
            <br />
            <div class="row">
                <a class="waves-effect waves-light btn" onclick="img_move_top()"><i class="material-icons">keyboard_arrow_up</i></a>
                <a class="waves-effect waves-light btn" onclick="img_move_left()"><i class="material-icons">keyboard_arrow_left</i></a>
                <a class="waves-effect waves-light btn" onclick="img_move_right()"><i class="material-icons">keyboard_arrow_right</i></a>
                <a class="waves-effect waves-light btn" onclick="img_move_down()"><i class="material-icons">keyboard_arrow_down</i></a>
            </div>
            <br />
            <div class="row">
                <div class="col-md-3 col-md-offset-2">
                    <input type="checkbox" class="filled-in" checked="checked" id="general_librairy_checkbox" onchange="refreshList()" />
                    <label for="general_librairy_checkbox">Biblioth�que g�n�rale</label>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <input type="checkbox" class="filled-in" checked="checked" id="personal_librairy_checkbox" onchange="refreshList()" />
                    <label for="personal_librairy_checkbox">Biblioth�que personnelle</label>
                </div>
            </div>
            <br />
            <div class="carousel" id="logo-carousel"></div>
            <br />
            <div class="row">
                <div class="col-md-offset-5 col-md-3">
                    <a class="waves-effect waves-light btn" onclick="add_image_pad()"><i class="left material-icons">add_a_photo</i>AJOUTER</a>
                </div>
            </div>
            <br/>
            <div class="jumbotron">
                <form action="" method="post" enctype="multipart/form-data" class="dropzone" id="dropzoneForm"> <!-- J'ai enlever l'action l�, fais key-->
                    <div class="dz-message" data-dz-message><span>Glissez/D�posez votre image ici ou cliquez pour ouvrir l'explorateur de fichiers.</span></div>
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                </form>
            </div>
            <br />
        </div>
        <div id="test-swipe-4" class="col s12">
            <br/>
            <div class="row">
                <div class="col-md-4 col-md-offset-1 border-rect">
                    <p class="border-title">Bordure 1</p>
                    <div class="switch">
                        <label>
                            Off
                            <input type="checkbox" onchange="active_border_one()">
                            <span class="lever"></span>
                            On
                        </label>
                    </div>
                    <div id="options-border-1" class="invisible">
                        <div>
                            <label>Style de bordure : </label>
                            <select>
                                <option value="solid">Normal</option>
                                <option value="dashed">Pointill�</option>
                            </select>
                        </div>
                        <div> 
                            <label> Largeur
                                <input type="range" min="0" max="100" value="0" step="1" id="width_border_one" class="width_border"/> 
                            </label>
                        </div>
                        <div> 
                            <label> Hauteur
                                <input type="range" min="0" max="100" value="0" step="1" id="height_border_one" class="height_border"/> 
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1 border-rect">
                    <p class="border-title">Bordure 2</p>
                    <div class="switch">
                        <label>
                            Off
                            <input type="checkbox" onchange="active_border_two()">
                            <span class="lever"></span>
                            On
                        </label>
                    </div>
                    <div id="options-border-2" class="invisible">
                        <div>
                            <label>Style de bordure : </label>
                            <select>
                                <option value="solid">Normal</option>
                                <option value="dashed">Pointill�</option>
                            </select>
                        </div>
                        <div> 
                            <label> Largeur
                                <input type="range" min="0" max="100" value="0" step="1" id="width_border_two" class="width_border"/> 
                            </label>
                        </div>
                        <div> 
                            <label> Hauteur
                                <input type="range" min="0" max="100" value="0" step="1" id="height_border_two" class="height_border"/> 
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
        </div>
    </div>
</div>

<br />
<div style="padding:5px; background-color:white;">
    <div class="row">
        <div class="col-md-12" style="text-align:center">
            <input type="checkbox" id="alone_checkbox" onchange="$('#pad-colors').toggleClass('invisible')"/>
            <label for="alone_checkbox">Empreinte seule ?</label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="text-align: center" id="pad-colors">
            <label>Pr�f�rence de couleur du boitier (Facultatif) : </label>
            <a class="btn waves-effect waves-light pad-color-button red"><i class="material-icons">check</i></a>
            <a class="btn waves-effect waves-light pad-color-button green"><i class="material-icons">check</i></a>
            <a class="btn waves-effect waves-light pad-color-button blue"><i class="material-icons">check</i></a>
            <a class="btn waves-effect waves-light pad-color-button purple"><i class="material-icons">check</i></a>
            <a class="btn waves-effect waves-light pad-color-button orange"><i class="material-icons">check</i></a>
            <a class="btn waves-effect waves-light pad-color-button black"><i class="material-icons">check</i></a>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-3">
            <img src="" style="width:50px; height:50px" />
            <a href="javascript:export_pdf()">T�l�charger le visuel en PDF</a>
        </div>

        <div class="col-md-6 col-md-offset-2" style="text-align:right">
            <label>Quantit� : </label>
            <input id="input_quantity" type="number" min="1" max="9" step="1" value="1" style="font: 24pt Courier; width: 50px; height: 50px; text-align:center">
            <a class="waves-effect waves-light btn" onclick="order()" style="margin-left:15px"><i class="material-icons left">shopping_cart</i>ACHETER MAINTENANT</a>
        </div>
    </div>
</div>
<br />


<style>
    .row {
        margin: 0;
    }

    .p_pad {
        position: absolute;
        font-family: 'Arial';
        color: black;
        text-anchor: middle;
        font-size: 10pt;
        font-weight: normal;
        font-style: normal;
        text-decoration: none;
    }
    

    .bold {
        font-weight: bold;
    }

    .italic {
        font-style: italic;
    }

    .underline {
        text-decoration: underline;
    }

    #pad {
        border: 2px dashed grey;
        overflow: hidden;
        /*display: flex;
        flex-direction: column;
        justify-content: space-around;
        line-height: 15px;*/
        display: inline-block;
        padding: 0;
        padding-top: 5px;
        line-height: 4px;
    }

    .active_button {
        background-color: #29524e
    }

    .textfield {
        text-align: center;
    }

    .pad-color-button > i {
        display: none;
    }

    .active-pad-color > i {
        display: block;
    }

    #date{
        position: absolute;
        text-align:center;
        left: 49%;
        transform: translateX(-49%);
        top: 50%;
    }

    #p_date_left{
        position: absolute;
        top: 50%;
    }

    #p_date_right{
        position: absolute;
        top: 50%;
        right: 70%;
    }

    .filter-blue {
        filter: sepia(100%) hue-rotate(190deg) saturate(500%);
    }
    .filter-black {
        filter: grayscale(100%);
    }
    .filter-red {
        filter: sepia(100%) saturate(10000%) hue-rotate(30deg);
    }
    .filter-green {
        filter: sepia(100%) saturate(10000%) hue-rotate(100deg);
    }
    .filter-purple {
        filter: sepia(100%) saturate(10000%) hue-rotate(270deg);
    }

    .invisible {
        visibility: hidden;
    }
    
    .tabs {
        overflow-x: hidden;
    }
    
    .border-rect {
        border: 1px solid darkblue;
        border-radius: 5px;
    }
    
    .border-title {
        font-weight: bold;
    }
    
    #pads {
        position: relative;
        display: flex;
        align-items: center;
        vertical-align: middle;
        justify-content: center;
    }

    #pads > div {
        position: absolute;
        width: 100%;
        height: 100%;
    }
    
    #pads > div:not(#pad) {
        border-width: 1px;
        border-style: solid;
        border-color: black;
    }
    
    .thumb {
        visibility: hidden;   
    }
    
    .left-align {
        left: 0;
    }
    

</style>


<script type="text/javascript">
    var counter;
    var nb_line = 0;
    var id_modal;
    var carousel_src;
    var id_to_place_date;
    var last_slider_value;
    var width_mm = <?php echo $width_mm ?>;
    var height_mm = <?php echo $height_mm ?>;
    var max_lines = <?php echo $max_lines ?>;
	var dateur = <?php echo $dater ?>;
    var step_top;

    $(document).ready(function () {
        $('select').material_select();

        $('.indicator').css('height', '10px');

        step_top = 85 / (max_lines - 1);
        
        while(nb_line != max_lines)
            addrow();

        $('#p_1').text("Bonjour");
        $('#textfield_1').val("Bonjour");

        re_center(1);

        $('#p_1').css('top', '5%');
        //$('#p_' + max_lines).css('top', '85%');
        
        $('#line_position_y_slider_1').val(0);
        $('#line_position_y_slider_' + max_lines).val(100);

        if (dateur == true) {
            var d = new Date();

            var month = d.getMonth() + 1;
            var day = d.getDate();
            
            var today_date = (day < 10 ? '0' : '') + day + ' ' +
                (month < 10 ? '0' : '') + month + ' ' +
                d.getFullYear();

            id_to_place_date = Math.ceil(max_lines / 2);

            var new_line = "<p id='p_date_left' class='p_pad'></p> <p id='p_date_right' class='p_pad'></p> <p id='date'>" + today_date + "</p>";
            $('#pad').append(new_line);


            var new_textfield = "<div class='row'>" +
                "<div class='col-md-12'>" +
                "<div class='col-md-4'>" +
                "<input type='text' class='textfield' id='textfield_date_left' />" +
                "</div>" +
                "<div class='col-md-4'>" +
                "<input type='text' style='text-align:center' value='" + today_date + "' disabled />" +
                "</div>" +
                "<div class='col-md-4'>" +
                "<input type='text' class='textfield' id='textfield_date_right' />" +
                "</div>" + 
                "</div>" +
                "</div >";

            $(new_textfield).insertAfter('#lines');
        }
        
        refreshList();

        $('#pad').append("<img class='filter-black' id='pad-img' style='width:50px; height:50px; position:absolute; visibility:hidden; '/>");

        //$("#p_0").arctext({ radius: 47, dir: 1, rotate: true });
        
    });

    function addrow() {
        nb_line++;
        // Check to see if the counter has been initialized
        if (typeof counter == 'undefined') {
            // It has not... perform the initialization
            counter = 0;
        }

        // Do something stupid to indicate the value
        ++counter;

        var new_textfield = "<div class='row'>" +
            "<div class='col-md-4' style='text-align:center'>" +
            "<div class='col-md-5'>" +
            "<input type='text' class='textfield' id='textfield_" +
            counter +
            "' /> " +
            "</div>" +
            "<div class='col-md-3'>" +
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
            "<div class='col-md-4'>" +
            "<select class='font_family_list_targets' onchange='change_font_family_target(" +
            counter +
            ")' id='font_family_list_" +
            counter +
            "'>" +
            "<option value='Arial' style='font-family:'Arial''>Arial</option>" +
            "<option value='Agency FB' style='font-family:'Agency FB''>Agency FB</option>" +
            "<option value='Century' style='font-family:'Century''>Century</option>" +
            "</select>" +
            "</div>" +
            "</div>" +
            "<div class='col-md-4' style='text-align:center'>" +
            "<div class='col-md-4'>" +
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
            "<div class='col-md-4'>" +
            "<label> Position X de la ligne" +
            "<input type='range' min='0' max='100' value='50' step='1' class='line_position_x_slider' id='line_position_x_slider_" +
            counter +
            "' onchange='move_position_x(" +
            counter +
            ")' oninput='move_position_x(" +
            counter +
            ")' />" +
            "</label>" +
            "</div>" +
            "<div class='col-md-4'>" +
            "<label> Position Y de la ligne" +
            "<input type='range' min='0' max='100' value='50' step='1' class='line_position_y_slider' id='line_position_y_slider_" +
            counter +
            "' onchange='move_position_y(" +
            counter +
            ")' oninput='move_position_y(" +
            counter +
            ")' />" +
            "</label>" +
            "</div>" +
            "</div>" +
            "<div class='col-md-4' style='text-align:center; display:flex; justify-content:space-between'>" +
            "<div>" +
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
            "<a class='btn btn-floating btn-small waves-effect waves-light red delete_button' onclick='delete_target(" +
            counter +
            ")'><i class='material-icons'>delete_forever</i></a>" +
            "</div>" +
            "</div>" +
            "</br>" +
            "</div>";

        $('#lines').append(new_textfield);

        $('.font_size_list_targets').each(function (index) {
            if ($(this).attr('id') != undefined) {
                $(this).material_select();
            }
        });
        $('.font_family_list_targets').each(function (index) {
            if ($(this).attr('id') != undefined) {
                $(this).material_select();
            }
        });

        var top_move = step_top * (counter - 1);

        var new_pad_line = "<p id='p_" + counter + "' class='p_pad middle-align' style='top:" + top_move + "%'></p>";
        $('#pad').append(new_pad_line);

        $('#line_position_y_slider_' + counter).val(top_move);
        
        if (nb_line === max_lines)
            $('#add-row').addClass("disabled");
    }

    $(document).on('input', '.textfield', function () {
        var textfield_id = $(this).attr('id');
        var id = textfield_id.replace("textfield_", "");
        var text = $('#' + textfield_id).val();
        $('#p_' + id).text(text);
        
        re_center(id);

        /*$('#p_0').remove();
        var line = "<p id='p_0' class='p_pad' style='padding-top:5px'></p>";
        $('#pad').append(line);
        $('#p_0').text(text);
        $("#p_0").arctext({ radius: 47, dir: 1, rotate: true });*/
    });

    function delete_target(id) {
        $('#add-row').removeClass("disabled");
        nb_line--;
        $('#p_' + id).remove();
        $('#textfield_' + id).parent().parent().remove();
    }

    function left_align() {
        //$('.p_pad').css('text-align', 'left');

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
        //$('#p_' + id).css('text-align', 'left');
        
        $('#line_position_x_slider_' + id).val(0);
        
        $('#p_' + id).removeClass('right-align');
        $('#p_' + id).removeClass('middle-align');
        $('#p_' + id).addClass('left-align');

        $('#left_align_button_target_' + id).addClass('active_button');
        $('#center_align_button_target_' + id).removeClass('active_button');
        $('#right_align_button_target_' + id).removeClass('active_button');
    }

    function center_align() {
        //$('.p_pad').css('text-align', 'center');
        
        $('.line_position_x_slider').val(50);
        
        $('.p_pad').removeClass('right-align');
        $('.p_pad').removeClass('left-align');
        $('.p_pad').addClass('middle-align');
        

        $('.p_pad').each(function() {
            var padding = ($('#pad').css('width').replace('px', '') - $(this).textWidth()) / 2;
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
        //$('#p_' + id).css('text-align', 'center');

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
        //$('.p_pad').css('text-align', 'right');
        
        $('.line_position_x_slider').val(100);
        
        $('.p_pad').addClass('right-align');
        $('.p_pad').removeClass('left-align');
        $('.p_pad').removeClass('middle-align');
        
        $('.p_pad').each(function() {
            var padding = $('#pad').css('width').replace('px', '') - $(this).textWidth() - 5;
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
        //$('#p_' + id).css('text-align', 'right');
        
        $('#line_position_x_slider_' + id).val(100);
        
        $('#p_' + id).addClass('right-align');
        $('#p_' + id).removeClass('left-align');
        $('#p_' + id).removeClass('middle-align');
        
        re_center(id);
        
        $('#right_align_button_target_' + id).addClass('active_button');
        $('#center_align_button_target_' + id).removeClass('active_button');
        $('#left_align_button_target_' + id).removeClass('active_button');
    }

    function change_color() {
        var color = $("#list_color").val(); // The value of the selected option
        $('.p_pad').css('color', color);

        $('#pad-img').removeClass('filter-black');
        $('#pad-img').removeClass('filter-blue');
        $('#pad-img').removeClass('filter-red');
        $('#pad-img').removeClass('filter-green');
        $('#pad-img').removeClass('filter-purple');

        $('#pad-img').addClass('filter-' + color);

        $('#border_one').css('border-color', color);
        $('#border_two').css('border-color', color);
    }

    function change_font_size() {
        var size = $("#font_size_list").val(); // The value of the selected option
        $('.p_pad').css('font-size', size + "pt");

        $('.font_size_list_targets').each(function (index) {
            if ($(this).attr('id') != undefined) {
                $(this).val(size);
                $(this).material_select();
            }
        });
    }

    function change_font_size_target(id) {
        var size = $('#font_size_list_' + id).val();
        $('#p_' + id).css('font-size', size + "pt");
    }

    function to_bold_target(id) {
        $('#p_' + id).toggleClass('bold');
        $('#bold_button_target_' + id).toggleClass('active_button');
    }

    function to_italic_target(id) {
        $('#p_' + id).toggleClass('italic');
        $('#italic_button_target_' + id).toggleClass('active_button');
    };

    function to_underline_target(id) {
        $('#p_' + id).toggleClass('underline');
        $('#underline_button_target_' + id).toggleClass('active_button');
    }

    function change_font_family() {
        var font = $("#font_family_list").val(); // The value of the selected option
        $('.p_pad').css('font-family', font);

        $('.font_family_list_targets').each(function (index) {
            if ($(this).attr('id') != undefined) {
                $(this).val(font);
                $(this).material_select();
            }
        });
    }

    function change_font_family_target(id) {
        var font = $('#font_family_list_' + id).val();
        $('#p_' + id).css('font-family', font);
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
            var i = 0;
            var index = $('.active-pad-color').index($(this));
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
    })

    var doc;
    var nb_img_charged;
    var nb_img = 3;
    var border;

    function export_pdf() {
        doc = new jsPDF('p', 'mm');
        nb_img_charged = 0;

        html2canvas($("#title"), {
            onrendered: function (canvas) {
                doc.addImage(canvas, 'PNG', 1, 1);
                nb_img_charged++;
                save_pdf();
            }
        });

        border = $('#pad').css('border');
        $('#pad').css('border', 'none');

        html2canvas($("#pad-colors"), {
            onrendered: function (canvas) {
                doc.addImage(canvas, 'PNG', 10, 150);
                nb_img_charged++;
                save_pdf();
            }
        });

        html2canvas($("#pad"), {
            scale: 8,
            onrendered: function (canvas) {
                doc.addImage(canvas, 'PNG', 50, 50, width_mm, height_mm);
                nb_img_charged++;
                save_pdf();
            }
        });
    }

    function save_pdf() {
        if (nb_img_charged == nb_img) {
            doc.save('sample-file.pdf');
            $('#pad').css('border', border);
            return;
        }
    }
    
    function refreshList() {
        /*$.ajax({
            url: '/Tampon/RefreshListLogo',
            type: 'POST',
            data: '{general: "' + $('#general_librairy_checkbox').is(':checked') + '", personal: "' + $('#personal_librairy_checkbox').is(':checked') + '"}',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (returnedData) {
                $.each(returnedData, function (index) {
                    var image = returnedData[index].Image;
                    var line = "<a class='carousel-item'><img src='data:image/png;base64," + image + "'/>" +
                        "</a>";
                    $('#logo-carousel').append(line);
                })
                $('.carousel').carousel({
                    pause: true,
                    interval: false,
                    onCycleTo: function(data) {
                        carousel_src = data.children('img').attr('src');
                    },
                });
            },
            error: function () {
                alert("Erreur de r�cup�ration de donn�es.");
            }
        });*/
    }

    function add_image_pad() {
        $('#pad-img').css('visibility', 'visible');
        $('#pad-img').attr('src', carousel_src);
    }

    Dropzone.options.dropzoneForm = {
        init: function () {
            // Set up any event handlers
            this.on('complete', function () {
                refreshList();
            });
        }
    };

    function space_letter_target(id) {
        var space = $("#space_letter_slider_" + id).val();
        space = space / 2;
        space += "px";
        $('#p_' + id).css('letter-spacing', space);
        $('#p_' + id).css('text-indent', space);
        $('#p_' + id).css('margin-left', '-' + space);
        $('#p_' + id).css('margin-right', '-' + space);

        re_center(id);
    }

    function order() {
        alert("Bam la t'affiche un pop up o� tu fais apparaitre la date de livraison tout ca tout ca");
    }
    
    function active_border_one() {
        $('#options-border-1').toggleClass('invisible');
        $('#border_one').toggleClass('invisible');
    }
    
    function active_border_two() {
        $('#options-border-2').toggleClass('invisible');
        $('#border_two').toggleClass('invisible');
    }


    $('.width_border').on('change input', function() {
        var width = 100 - $(this).val();
        var id = $(this).attr('id').replace('width_', '');
        $('#' + id).css('width', width + '%');
    });
    
    $('.height_border').on('change input', function() {
        var height = 100 - $(this).val();
        var id = $(this).attr('id').replace('height_', '');
        $('#' + id).css('height', height + '%');
    });
    
    $.fn.textWidth = function(){
        var html_org = $(this).html();
        var html_calc = '<span>' + html_org + '</span>';
        $(this).html(html_calc);
        var width = $(this).find('span:first').width();
        $(this).html(html_org);
        return width;
    };
    
    function re_center(id){
        if ($('#p_' + id).hasClass('middle-align')) {
            var padding = ($('#pad').css('width').replace('px', '') - $('#p_' + id).textWidth())/2;
            $('#p_' + id).css('left', padding + "px");
        }
        else if ($('#p_' + id).hasClass('right-align')) {
            var padding = $('#pad').css('width').replace('px', '') - $('#p_' + id).textWidth() - 5;
            $('#p_' + id).css('left', padding + "px");
        }
        
    }
    
    function move_position_x(id) {
        var value = $('#line_position_x_slider_' + id).val();
        var left = value / 100;
        left = left * $('#pad').css('width').replace('px', '');
        left = left - $('#p_' + id).textWidth()/2;
        $('#p_' + id).css('left', left + "px");
        
        
        $('#right_align_button_target_' + id).removeClass('active_button');
        $('#left_align_button_target_' + id).removeClass('active_button');
        $('#center_align_button_target_' + id).removeClass('active_button');
        
        if (value === 0)
            $('#left_align_button_target_' + id).addClass('active_button');
        else if(value === 50)
            $('#center_align_button_target_' + id).addClass('active_button');
        else if(value === 100)
            $('#right_align_button_target_' + id).addClass('active_button');
        
    }
    
    function move_position_y(id) {
        var top = $('#line_position_y_slider_' + id).val();
        $('#p_' + id).css('top', top + '%');
    }
    
    function zoom_in_pad() {
        var zoom = parseInt($('#zoom_value').val());
        zoom = zoom + 20;
        if (zoom < 300) {
            $('#pads').animate({
                zoom: '+=20%'
            }, 0);
            $('#zoom_value').val(zoom);
        }
    }
    
    function zoom_out_pad() {
        var zoom = parseInt($('#zoom_value').val());
        zoom = zoom - 20;
        if (zoom > 50) {
            $('#pads').animate({
                zoom: '-=20%'
            }, 0); 
            $('#zoom_value').val(zoom);
        }
    }
    
    $('#zoom_value').on('input', function() {
        var zoom = parseInt($(this).val());
        if (zoom < 300 && zoom > 50) {
            $('#pads').animate({
                zoom: '=' + zoom + '%'
            }, 0);
        }
    })
</script>