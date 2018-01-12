<?php header('Content-Type: text/html; charset=iso-8859-1'); ?>

<h4 id="title"><?php echo $title ?></h4>

<div class="row">
    <div id="pads" class="col-md-4 col-md-offset-5" style="width: <?php echo $width ?>; height: <?php echo $height ?>">
        <div id="pad"></div>
        <div id="border_one" class="invisible"></div>
        <div id="border_two" class="invisible"></div>
    </div>
    <div class="col-md-2 col-md-offset-1">
        <a onclick="zoom_in_pad()" style="cursor: pointer"><i class="material-icons small grey-text text-grey">zoom_in</i></a>
        <label>
            <input type="text" style="color: grey; width: 30px;" id="zoom_value" value="100"/>
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
            <li class="tab col s2" onclick="$('.carousel-item').trigger('click')"><a href="#test-swipe-3">Images / Logos</a></li>
            <li class="tab col s2"><a href="#test-swipe-4">Cadre / Bordures</a></li>
			<li class="tab col s2"><a href="#test-swipe-5">Modèles</a></li>
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
            <div class="carousel" id="logo-carousel"></div>
            <div class="jumbotron">
                <form action="<?php echo base_url(); ?>index.php/tampon/save_upload_file/" method="post" enctype="multipart/form-data" class="dropzone" id="dropzoneForm">
                    <div class="dz-message" data-dz-message><span>Glissez/Déposez votre image ici ou cliquez pour ouvrir l'explorateur de fichiers.</span></div>
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
                    <p class="border-title">Bordure</p>
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
                                <option value="dashed">Pointillé</option>
                            </select>
                        </div>
                        <div> 
                            <label> Largeur
                                <input type="range" min="2" max="100" value="2" step="1" id="width_border_one" class="width_border"/> 
                            </label>
                        </div>
                        <div> 
                            <label> Hauteur
                                <input type="range" min="5" max="100" value="5" step="1" id="height_border_one" class="height_border"/> 
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
        </div>
        <div id="test-swipe-5" class="col s12">
			<br/>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<input type="text" style="margin-right:15px;" id="title-model" placeholder="Titre du modèle"/>
					<a class='btn waves-effect waves-light blue model-save'><i class='material-icons left'>save</i>Enregistrer ce modèle</a>
				</div>
			</div>
			<div class="row" id="container-models">
				
			</div>
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
            <label>Préférence de couleur du boitier (Facultatif) : </label>
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
            <img src="<?php echo base_url('images/logo-pdf.png');?>" style="width:50px; height:50px" />
            <a href="javascript:export_pdf(true)">Télécharger le visuel en PDF</a>
        </div>

        <div class="col-md-6 col-md-offset-2" style="text-align:right">
            <label>Quantité : </label>
            <input id="input_quantity" type="number" min="1" max="9" step="1" value="1" style="font: 24pt Courier; width: 50px; height: 50px; text-align:center; margin-right:15px;">
            <a class="waves-effect waves-light btn modal-trigger" href="#mail-modal"><i class="material-icons left">shopping_cart</i>ENVOYER COMMANDE</a>
        </div>
    </div>
</div>
<br />
<div id="mail-modal" class="modal modal-fixed-footer">
    <div class="modal-content">
		<h4>Modal Header</h4>
		<label for="modal-object">Objet : </label> <input type="text" id="modal-object" value="COMMANDE XXXXXXXX [CLIENT]"/>
		<br/>
		<textarea cols="50" rows="6" name="text-mail" id="Commentaires">Vous pouvez écrire votre texte ici.</textarea>                
		<script type="text/JavaScript">CKEDITOR.replace('Commentaires');</script>
	</div>

    <div class="modal-footer">
      <a onclick="order()" class="modal-action modal-close waves-effect waves-green btn">ENVOYER</a>
    </div>
</div>


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
        left: 0 !important;
    }
    
	.modal {
		width: 50% !important;
		max-height: 100% !important;
		overflow-y: hidden !important;
	}
	
	.models {
		text-align:center;
		border: 1px solid #1e88e5;
		border-radius:15px 50px;
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
		$('.modal').modal();
        $('.indicator').css('height', '10px');

        step_top = 78 / (max_lines - 1);
        
        while(nb_line != max_lines)
            addrow();
        

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
        
        refreshListPad();
		refreshListModels();
		$()

		
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
            "<input type='range' min='10' max='90' value='50' step='1' class='line_position_x_slider' id='line_position_x_slider_" +
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
		top_move = top_move + 7;

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
        $('#textfield_' + id).parent().parent().parent().remove();
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
        var color = $("#list_color").val(); 
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
        var size = $("#font_size_list").val(); 
        $('.p_pad').css('font-size', size + "pt");

        $('.font_size_list_targets').each(function (index) {
            if ($(this).attr('id') != undefined) {
                $(this).val(size);
                $(this).material_select();
            }
        });

		$('.p_pad').each(function (index) {
			var id = $(this).attr('id').replace('p_','');
            if (id != undefined) {
				re_center(id);
            }
        });
    }

    function change_font_size_target(id) {
        var size = $('#font_size_list_' + id).val();
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
        var font = $("#font_family_list").val();
        $('.p_pad').css('font-family', font);

        $('.font_family_list_targets').each(function (index) {
            if ($(this).attr('id') != undefined) {
                $(this).val(font);
                $(this).material_select();
            }
        });

		$('.p_pad').each(function (index) {
			var id = $(this).attr('id').replace('p_','');
            if (id != undefined) {
				re_center(id);
            }
        });
    }

    function change_font_family_target(id) {
        var font = $('#font_family_list_' + id).val();
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
    });

    var doc;
    var nb_img_charged;
    var nb_img = 3;
    var border;

    function export_pdf(save) {
        doc = new jsPDF('p', 'mm');
        nb_img_charged = 0;

		border = $('#pad').css('border');
        $('#pad').css('border', 'none');

        html2canvas($("#title"), {
            onrendered: function (canvas) {
                doc.addImage(canvas, 'PNG', 1, 1);
                nb_img_charged++;
				if(save == true)
				save_pdf(save);
            }
        });

        html2canvas($("#pad-colors"), {
            onrendered: function (canvas) {
                doc.addImage(canvas, 'PNG', 5, 150);
                nb_img_charged++;
				if(save == true)
				save_pdf(save);
            }
        });

        html2canvas($("#pad"), {
            scale: 8,
            onrendered: function (canvas) {
                doc.addImage(canvas, 'PNG', 50, 50, width_mm, height_mm);
                nb_img_charged++;
				save_pdf(save);
            }
        });
    }

    function save_pdf(save) {
        if (nb_img_charged == nb_img) {
			if(save == true)
				doc.save('sample-file.pdf');
			else
			{
				var pdf = doc.output(); //returns raw body of resulting PDF returned as a string as per the plugin documentation.
				var data = new FormData();
				data.append("data" , pdf);
				var xhr = new XMLHttpRequest();
				xhr.open( 'post', "<?php echo base_url(); ?>" + "index.php/tampon/upload_pdf", true ); //Post to php Script to save to server
				xhr.send(data);

				$.ajax({
					url: "<?php echo base_url(); ?>" + "index.php/tampon/send_mail",
					type: 'GET',
					data: 'header=' + $('#modal-object').val() + '&content=' + $('#Commentaires').val(),
					contentType: "application/json; charset=utf-8",
					success: function (returnedData) {
						alert(returnedData);
					},
					error: function () {
						alert("Erreur d'envoie.");
					}
				});
			}

            $('#pad').css('border', border);
            return;
        }
    }
    
    function refreshListPad() {
		$('#logo-carousel').empty();
			$.ajax({
				url: "<?php echo base_url(); ?>" + "index.php/tampon/refresh_list_logo",
				type: 'GET',
				data: '',
				contentType: "application/json; charset=utf-8",
				dataType: "json",
				success: function (returnedData) {
					$.each(returnedData, function (index) {
						var line = "<a class='carousel-item'><img src='<?php  echo base_url('uploads/'); ?>" + returnedData[index] + "'/>" +
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
					alert("Erreur de récupération de données.");
				}
		});
    }

    function add_image_pad() {
		if(carousel_src != undefined){
	        $('#pad-img').css('visibility', 'visible');
			$('#pad-img').attr('src', carousel_src);
		}
    }

    Dropzone.options.dropzoneForm = {
        init: function () {
            this.on('complete', function () {
			alert("hoptions");
                refreshListPad();
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

    function active_border_one() {
        $('#options-border-1').toggleClass('invisible');
        $('#border_one').toggleClass('invisible');

		$('#width_border_one').trigger('change');
		$('#height_border_one').trigger('change');
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
		var max = parseInt($('#line_position_x_slider_' + id).attr('max'));
		var min = parseInt($('#line_position_x_slider_' + id).attr('min'));
		var value = parseInt($('#line_position_x_slider_' + id).val());
		var mid = (max + min)/2;
        var left = max + min;
		left = value / left;
        left = left * $('#pad').css('width').replace('px', '');
        left = left - $('#p_' + id).textWidth()/2;

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
    
	/* LE ZOOM COMME CA MARCHE PAS SUR FIREFOX ! */

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

	function order(){
		export_pdf(false);		
	}

	function refreshListModels() {
		$('#container-models').empty();
		$.ajax({
			url: "<?php echo base_url(); ?>" + "index.php/tampon/refresh_list_models",
			type: 'GET',
			data: '',
			contentType: "application/json; charset=utf-8",
			dataType: "json",
			success: function (returnedData) {
				$.each(returnedData, function (index) {		
					var model = returnedData[index];
					var append = "<div class='col-md-4 models' id='model_" + model.id + "'>";
					$.each(model.lignes, function(i){
						var line = model.lignes[i];
						var space = line.espacement / 2;
						append += "<p style='font-family:" + line.police + ";font-size:" + line.taille + "pt;letter-spacing:" + space + "px; text-indent:" + space + "px; margin-left:-" + space + "px; margin-right:-" + space + "px;' class='" + line.alignement + "-align ";
						if(line.gras == true)
							append += " bold ";
						if(line.italique == true)
							append += " italic ";
						if(line.souligne == true)
							append += " underline ";
						append += "'>" + line.texte + "</p>";
					})
					append += "<br/>";
					append += "<h5 class='bold' style='font-family:serif;'>" + model.titre + "</h5>";
					append += "<div style='margin:5px;'>"
					append += "<a class='btn btn-floating btn-small waves-effect waves-light green model-check'><i class='material-icons'>check</i></a>";
					append += "<a class='btn btn-floating btn-small waves-effect waves-light red model-remove"
					if(model.id == 0)
						append += "disabled";
					append += "'><i class='material-icons'>cancel</i></a>";
					append += "</div>";

					$('#container-models').append(append);

					//if(model.titre == "Défaut")
					//	$('#model_' + model.id).children('div')[0].children('a')[0].trigger('click');
				})

				$('.model-remove').on('click', function(){
					var id = $(this).parent().parent().attr('id').replace('model_', '');
					$.ajax({
						url: "<?php echo base_url(); ?>" + "index.php/tampon/delete_model",
						type: 'GET',
						data: 'model=' + id,
						contentType: "application/json; charset=utf-8",
						success: function (returnedData) {
							refreshListModels();
						},
						error: function () {
							alert("Erreur de suppression de données.");
						}
					});
				})

				$('.model-check').on('click', function(){
					var lines = [];
					$(this).parent().parent().children('p').each(function(index){
						var text = $(this).text();
						var size = $(this)[0].style.fontSize;
						size = size.replace('pt', '');
						var family = $(this).css('font-family').split('"').join("");
						var space = $(this).css('letter-spacing') * 2;
						var align = "";
						if($(this).hasClass('left-align') == true)
							align = "left";
						else if($(this).hasClass('middle-align') == true)
							align = "middle";
						else if($(this).hasClass('right-align') == true)
							align = "right";
						var bold = false;
						if($(this).hasClass('bold') == true)
							bold = true;

						var italic = false;
						if($(this).hasClass('italic') == true)
							italic = true

						var underline = false;
						if($(this).hasClass('underline') == true)
							underline = true;

						var line = {
							"texte" : text,
							"taille" : size,
							"police" : family,
							"espacement" : space,
							"alignement" : align,
							"gras" : bold,
							"italique" : italic,
							"souligne" : underline
						};
						lines.push(line);
					})
					
					var index_textfields = [];
					$('.textfield').each(function(){
						var id = $(this).attr('id').replace('textfield_', '');
						index_textfields.push(id);
					})

					lines.forEach(function(item, i){
						var index = index_textfields[i];
						$('#textfield_' + index).val(item.texte);
						$('#textfield_' + index).trigger('input');

						$('#font_size_list_' + index).val(item.taille);
						$('#font_size_list_' + index).material_select();
						change_font_size_target(index);

						$('#font_family_list_' + index).val(item.police);
						$('#font_family_list_' + index).material_select();
						change_font_family_target(index);

						$('#space_letter_slider_' + index).val(item.espacement);
						space_letter_target(index);

						$('#' + item.alignement + '_align_button_target_' + index).click();

						if(item.gras == 1)
							$('#bold_button_target_' + index).click();

						if(item.italique == 1)
							$('#italic_button_target_' + index).click();

						if(item.souligne == 1)
							$('#underline_button_target_' + index).click();
					});
				})
			},
			error: function () {
				alert("Erreur de récupération de données.");
			}
		});
    }	

	$('.model-save').on('click', function(){
		var title = $('#title-model').val();
		var lines = [];
		$('.textfield').each(function() {
			var id = $(this).attr('id').replace('textfield_', '');
			var text = $('#textfield_' + id).val();
			var size = $('#font_size_list_' + id).val();
			var family = $('#font_family_list_' + id).val();
			var space = $('#space_letter_slider_' + id).val();
			var align = "";
			if($('#left_align_button_target_' + id).hasClass('active_button'))
				align = "left";
			else if($('#center_align_button_target_' + id).hasClass('active_button'))
				align = "middle";
			else if($('#right_align_button_target_' + id).hasClass('active_button'))
				align = "right";

			var bold = false;
			if($('#bold_button_target_' + id).hasClass('active_button'))
				bold = true;

			var italic = false;
			if($('#italic_button_target_' + id).hasClass('active_button'))
				italic = true;

			var underline = false
			if($('#underline_button_target_' + id).hasClass('active_button'))
				underline =true;

			lines.push(text);
			lines.push(size);
			lines.push(family);
			lines.push(space);
			lines.push(align);
			lines.push(bold);
			lines.push(italic);
			lines.push(underline);
		})
		if(title){
			var lines_to_send = JSON.stringify(lines);
			$.ajax({
					url: "<?php echo base_url(); ?>" + "index.php/tampon/save_model",
					type: 'GET',
					data: 'title=' + title + '&lines=' + lines_to_send,
					contentType: "application/json; charset=utf-8",
					success: function (returnedData) {
						refreshListModels();
					},
					error: function () {
						alert("Erreur de sauvegarde de données.");
					}
			});
		}
		else{
			alert("Veuillez définir un titre.");
		}

	})
</script>