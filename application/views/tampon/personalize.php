<?php header('Content-Type: text/html; charset=iso-8859-1'); ?>

<body>
	<div class="container body-content">

		<h4 id="title">TAMPON <?php echo $title ?></h4>

		<div class="row" style="display:flex; justify-content:center; align-items:center;">
			<div id="pads" style="width: <?php echo $width ?>; height: <?php echo $height ?>">
				<div id="pad"></div>
				<div id="border_one" class="invisible"></div>
				<div id="border_two" class="invisible"></div>
			</div>
			<div style="display:inline-grid; margin: 10px; margin-top:0">
				<a onclick="zoom_in_pad()" style="cursor: pointer"><i class="material-icons small grey-text text-grey">zoom_in</i></a>
				<span id="zoom_value">100%</span>
				<a onclick="zoom_out_pad()" style="cursor: pointer"><i class="material-icons small grey-text text-grey">zoom_out</i></a>
			</div>
		</div>

		<div class="row" style="background-color:white; margin-top:10px;">
			<div class="col s12">
				<ul id="tabs-swipe-demo" class="tabs">
					<li class="tab col s3"><a class="swipe-text" href="#test-swipe-1">Texte entier</a></li>
					<li class="tab col s3"><a class="swipe-text" href="#test-swipe-2">Ligne par ligne</a></li>
					<li class="tab col s2" onclick="$('.carousel-item').trigger('click')"><a class="swipe-text" href="#test-swipe-3">Images / Logos</a></li>
					<li class="tab col s2"><a class="swipe-text" href="#test-swipe-4">Cadre / Bordures</a></li>
					<li class="tab col s2"><a class="swipe-text" href="#test-swipe-5">Modèles</a></li>
				</ul>
				<div id="test-swipe-1" class="col s12">
					<br />
					<div class="row">
						<div class="col s12" style="text-align:center">
							<a class="btn waves-effect waves-light" id="left_align_button" onclick="left_align()"><i class="material-icons left">format_align_left</i>ALIGNER A GAUCHE</a>
							<a class="btn waves-effect waves-light active_button" id="center_align_button" onclick="center_align()"><i class="material-icons left">format_align_center</i>CENTRER</a>
							<a class="btn waves-effect waves-light" id="right_align_button" onclick="right_align()"><i class="material-icons left">format_align_right</i>ALIGNER A DROITE</a>
						</div>
					</div>
					<br />
					<div class="row">
						<form class="col s12">
							<div class="row">
								<div class="col s4">
									<label>Couleur de texte</label>
									<select onchange="change_color()" id="list_color">
										<option value="black">Noir</option>
										<option value="blue">Bleu</option>
										<option value="red">Rouge</option>
										<option value="green">Vert</option>
										<option value="purple">Violet</option>
									</select>
								</div>
								<div class="col s4">
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
								<div class="col s4">
									<label>Police de texte</label>
									<select onchange="change_font_family()" id="font_family_list" style="height:20px; overflow:scroll">
										<option value="Arial" class="arial">Arial</option>
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
						<div class="col s6 col offset-s4" style="padding:0px">
							<a class="waves-effect waves-light btn" onclick="addrow()" id="add-row"><i class="material-icons left">add</i>AJOUTER UNE LIGNE</a>
						</div>
					</div>
					<br />
				</div>

				<div id="test-swipe-3" class="col s12">
					<br />
					<div class="switch col offset-l4">
						<label style="font-size:15">
							Notre bibliothèque
							<input type="checkbox" id="switch_logo">
							<span class="lever"></span>
							Vos téléchargements
						</label>
					</div>
					<br />
					<div id="logo-buttons" class="undisplay">
						<a class="waves-effect waves-light btn" onclick="img_size_plus()"><i class="material-icons">zoom_in</i></a>
						<a class="waves-effect waves-light btn" onclick="img_size_minus()"><i class="material-icons">zoom_out</i></a>
						<a class="waves-effect waves-light btn red" id="rmv-btn" onclick="remove_image_pad()"><i class="material-icons">highlight_off</i></a>
						<br />
						<div class="row" style="margin: 3px; margin-left: 40px;">
							<a class="waves-effect waves-light btn" onclick="img_move_top()"><i class="material-icons">keyboard_arrow_up</i></a>
						</div>
						<div class="row" style="margin: 3px;">
							<a class="waves-effect waves-light btn" onclick="img_move_left()"><i class="material-icons">keyboard_arrow_left</i></a>
							<a class="waves-effect waves-light btn" onclick="img_move_right()"><i class="material-icons">keyboard_arrow_right</i></a>
						</div>
						<div class="row" style="margin: 3px; margin-left: 40px;">
							<a class="waves-effect waves-light btn" onclick="img_move_down()"><i class="material-icons">keyboard_arrow_down</i></a>
						</div>
					</div>
					<div id="library-logo-div">
						<div class="row" style="margin-top:10px;">
							<div class="col s3">
								<select id="categories-list">
									<option value="">Tout</option>
								</select>
							</div>
							<div class="col s6 offset-s3">
								<input type="text" id="logo-search" placeholder="Rechercher"/>
							</div>
						</div>
						<ul class="logo-list" id="logo-list-library">
						</ul>
					<br/>
					</div>
					<div id="upload-logo-div" class="undisplay">
						<div class="jumbotron">
							<form action="<?php echo base_url(); ?>tampon/save_upload_file/" method="post" enctype="multipart/form-data" class="dropzone" id="dropzoneForm">
								<div class="dz-message" data-dz-message><span>Glissez/Déposez votre image ici ou cliquez pour ouvrir l'explorateur de fichiers.</span></div>
								<div class="fallback">
									<input name="file" type="file" multiple />
								</div>
							</form>
						</div>
						<br />
						<ul class="logo-list" id="logo-list-upload">
						</ul>
					</div>
				</div>
				<div id="test-swipe-4" class="col s12">
					<br/>
					<div class="row">
						<div class="col s4 col offset-s1 border-rect">
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
									<select class="border_style" id="border_style_one">
										<option value="solid">Normal</option>
										<option value="dashed">Pointillé</option>
										<option value="double">Double</option>
									</select>
								</div>
								<div style="display:inline-flex"> 
									<label> Largeur 1
										<input type="range" min="2" max="100" value="2" step="1" id="width_border_one" class="width_border"/> 
									</label>
									<label> Largeur 2 (Double uniquement)
											<input type="range" min="10" max="100" value="10" step="1" id="width_border_two" class="width_border" disabled/> 
									</label>
								</div>
								<div style="display:inline-flex"> 
									<label> Hauteur 1
										<input type="range" min="5" max="100" value="5" step="1" id="height_border_one" class="height_border"/> 
									</label>
									<label> Hauteur 2 (Double uniquement)
											<input type="range" min="15" max="100" value="15" step="1" id="height_border_two" class="height_border" disabled/> 
									</label>
								</div>
							</div>
						</div>
						<div id="date-border" class="col s4 col offset-s1 border-rect invisible">
							<p class="border-title">Bordure de date</p>
							<div class="switch">
								<label>
									Off
									<input type="checkbox" onchange="active_border_date()">
									<span class="lever"></span>
									On
								</label>
							</div>
							<div id="options-border-d" class="invisible">
								<div>
									<label>Style de bordure : </label>
									<select class="border_style" id="border_style_date">
										<option value="solid">Normal</option>
										<option value="dashed">Pointillé</option>
										<option value="double">Double</option>
									</select>
								</div>
								<!--<div style="display:inline-flex"> 
									<label> Largeur 1
										<input type="range" min="2" max="100" value="2" step="1" id="width_border_one" class="width_border"/> 
									</label>
									<label> Largeur 2 (Double uniquement)
											<input type="range" min="10" max="100" value="10" step="1" id="width_border_two" class="width_border" disabled/> 
									</label>
								</div>
								<div style="display:inline-flex"> 
									<label> Hauteur 1
										<input type="range" min="5" max="100" value="5" step="1" id="height_border_one" class="height_border"/> 
									</label>
									<label> Hauteur 2 (Double uniquement)
											<input type="range" min="15" max="100" value="15" step="1" id="height_border_two" class="height_border" disabled/> 
									</label>
								</div>-->
							</div>
						</div>
					</div>
					<br/>
				</div>
				<div id="test-swipe-5" class="col s12">
					<br/>
					<div class="row">
						<div class="col s6 offset-s3">
							<input type="text" style="margin-right:15px;" id="title-model" placeholder="Titre du modèle"/>
						</div>
					</div>
					<div class="row">
						<div class="col s4 offset-s4">
							<a class='btn waves-effect waves-light blue model-save'><i class='material-icons left'>save</i>Enregistrer un modèle</a>
						</div>
					</div>
					<div class="row">
						<div class="col s10 offset-s1" id="container-models">
							
						</div>						
					</div>
				</div>
			</div>
		</div>
		<br />
		<div style="padding:5px; background-color:white;">
			<div class="row">
				<div class="col s12" style="text-align:center">
					<input type="checkbox" id="alone_checkbox" onchange="alone_function()"/>
					<label for="alone_checkbox">Empreinte seule ?</label>
				</div>
			</div>
			<div class="row">
				<div class="col s12" style="text-align: center" id="pad-colors">
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
				<div class="col s3">
					<img src="<?php echo base_url('images/logo-pdf.png');?>" style="width:50px; height:50px" />
					<a href="javascript:export_pdf(true)">Télécharger le visuel en PDF</a>
				</div>

				<div class="col s6 col offset-s2" style="text-align:right">
					<label>Quantité : </label>
					<input id="input_quantity" type="number" min="1" max="9" step="1" value="1" style="font: 24pt Courier; width: 50px; height: 50px; text-align:center; margin-right:15px;">
					<a class="waves-effect waves-light btn modal-trigger" href="#mail-modal"><i class="material-icons left">shopping_cart</i>ENVOYER COMMANDE</a>
				</div>
				<div class="col s6 col offset-s6" style="text-align:center">
				</div>
			</div>
		</div>
		<br />
	</div>
</body>

<div id="mail-modal" class="modal modal-fixed-footer">
    <div class="modal-content">
		<h4>Envoi de commande</h4>
		<label for="modal-object">Objet : </label> <input type="text" id="modal-object" value="ESPACE MARQUAGE - COMMANDE XXXXXXXX [<?php echo $this->ion_auth->user()->row()->username ?>]"/>
		<br/>
		<textarea cols="50" rows="6" name="text-mail" id="Commentaires">Vous pouvez écrire votre texte ici.</textarea>                
		<script type="text/JavaScript">CKEDITOR.replace('Commentaires');</script>
	</div>

    <div class="modal-footer">
      <a onclick="order()" class="modal-action modal-close waves-effect waves-green btn">ENVOYER</a>
    </div>
</div>

<div id="buy-encre-modal" class="modal">
    <div class="modal-content">
        <p style="text-align: center;">Voulez-vous commander des recharges d'encres associées à ce tampon ?</p>
        <div class="row">
            <div class="col s2 offset-s4">
                <a class="waves-effect waves-light btn" href="<?php echo base_url('encre/' . $id_pad);?>">OUI</a>
            </div>
            <div class="col s2 offset-s1">
                <a class="waves-effect waves-light btn modal-close">NON</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var counter;
    var nb_line = 0;
    var id_to_place_date;
	 var step_top;
	var has_favori = false;

    var width_mm = <?php echo $width_mm ?>;
    var height_mm = <?php echo $height_mm ?>;
    var max_lines = <?php echo $max_lines ?>;
	var dateur = <?php echo $dater ?>;
	var circle = <?php echo $circle ?>;

    $(document).ready(function () {
        $('select').material_select();
		$('.modal').modal();

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

            var new_line = "<p id='p_date_left' class='p_pad left-align'></p> <p id='p_date_right' class='p_pad right-align'></p> <p id='p_date' style='position: absolute; top: 50%; margin-top:0px;' class='middle-align'>" + today_date + "</p>";
            $('#pad').append(new_line);

			re_center("date_right");
			re_center("date");

            var new_textfield = "<div class='row'>" +
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

		if(circle == true){
			$('#pads').children().each(function(){
				$(this).css('border-radius', '100%');
			});
		}
        

		$.ajax({
			url: "<?php echo base_url(); ?>" + "tampon/json_categories",
			type: 'GET',
			contentType: "application/json; charset=utf-8",
			dataType: "json",
			success: function (returnedData) {
				returnedData.forEach(function(item, i){
					var line = "<option value='" + item + "'>" + item + "</option>";
					$('#categories-list').append(line);
				});
				$('#categories-list').material_select();
			}
		});

        refreshListModels();
        refreshListLogoLibrary();
		refreshListLogoUpload();
		refreshListFonts();
		
        $('#pad').append("<img class='filter-black' id='pad-img' style='width:50px; height:50px; position:absolute; visibility:hidden; '/>");  
		
		for(var i=0;i<2;i++)
			zoom_in_pad();
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
            "<div class='col s4' style='text-align:center'>" +
            "<div class='col s5'>" +
            "<input type='text' class='textfield' id='textfield_" +
            counter +
            "' /> " +
            "</div>" +
            "<div class='col s3'>" +
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
            "<div class='col s4'>" +
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

		if(counter > max_lines){
			var max_move = 0;
			$('.p_pad').each(function(){
				var t = parseFloat($(this)[0].style.top.replace('%',''));
				if(t > max_move){
					max_move = t;
				}
			});
			top_move = max_move + step_top;
		}

		if(dateur == true && counter >= (max_lines/2)+1)
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
    });

    function delete_target(id) {
        $('#add-row').removeClass("disabled");
        nb_line--;
        $('#p_' + id).remove();
        $('#textfield_' + id).parent().parent().parent().remove();

		$('.p_pad').each(function(){
			var i = parseInt($(this).attr('id').replace('p_', ''));
			if(i > id){
				var t = parseFloat($(this)[0].style.top.replace('%','')) - step_top;
				$(this).css('top', t +'%');
			}
		});
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

    function export_pdf() {
        var doc = new jsPDF('l', 'mm', [height_mm, width_mm]);

		var border = $('#pad').css('border');
        $('#pad').css('border', 'none');

        html2canvas($("#pad"), {
            scale: 8,
            onrendered: function (canvas) {
                doc.addImage(canvas, 'PNG', 0, 0, width_mm, height_mm);
				doc.save('APERCU - ' + $('#title').text() + ' - ' + $.now() + '.pdf');			
				$('#pad').css('border', border);
				return;
			}
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

	function active_border_date() {
		$('#options-border-d').toggleClass('invisible');
		$('#p_date').toggleClass('date_border');
		var move = 10;
		if($('#p_date').hasClass('date_border'))
			move = -10;
		var top = parseFloat($('#p_date').css('top').replace('px', '')) + move;
		var left = parseFloat($('#p_date')[0].style.left.replace('px', '')) + move;
		$('#p_date').css('top', top + 'px');
		$('#p_date').css('left', left + 'px');
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

	$('#border_style_one').on('change', function(){
		var value = $(this).val();
		$('#border_two').addClass('invisible');

		switch(value){
			case "solid":
				$('#border_one').css('border-style', 'solid');
				break;
			case "dashed":
				$('#border_one').css('border-style', 'dashed');
				break;
			case "double":
				$('#width_border_two').prop('disabled', false);
				$('#height_border_two').prop('disabled', false);
				$('#border_two').removeClass('invisible');
				$('#width_border_two').trigger('change');
				$('#height_border_two').trigger('change');
				$('#border_one').css('border-style', 'solid');

				break;
		}
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
			padding -= 2;
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
        var zoom = parseInt($('#zoom_value').text().replace('%',''));
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
        var zoom = parseInt($('#zoom_value').text().replace('%',''));
        zoom = zoom - 20;
        if (zoom > 50) {
            $('#pads').parent().animate({
                zoom: '-=20%'
            }, 0);
            $('#zoom_value').text(zoom + '%');
        }
    }

	function refreshListModels() {
		$('#container-models').empty();
		$.ajax({
			url: "<?php echo base_url(); ?>" + "tampon/refresh_list_models",
			type: 'GET',
			data: 'id_pad=' + <?php echo $id_pad ?>,
			contentType: "application/json; charset=utf-8",
			dataType: "json",
			success: function (returnedData) {
				$.each(returnedData, function (index) {		
					var model = returnedData[index];
					var append = "<div class='col s4 models' id='model_" + model.id + "'>";
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
					append += "<hr>";
					append += "<h5 class='bold'>" + model.titre + "</h5>";
					append += "<div>";
					append += "<a class='btn btn-floating btn-small waves-effect waves-light model-star tooltipped' data-position='bottom' data-delay='50' data-tooltip='Ajouter aux favoris'><i class='material-icons icon-";
					if(model.favori == true){
						append += "yellow";
						has_favori = true;
					}
					else
						append += "grey";
					append += "'>star</i></a>";
					append += "<a class='btn btn-floating btn-small waves-effect waves-light green model-check tooltipped' data-position='bottom' data-delay='50' data-tooltip='Appliquer' style='margin:10px'><i class='material-icons'>check</i></a>";
					append += "<a class='btn btn-floating btn-small waves-effect waves-light red model-remove tooltipped' data-position='bottom' data-delay='50' data-tooltip='Supprimer'><i class='material-icons'>delete</i></a>";
					append += "</div>";

					$('#container-models').append(append);
				});
				$('.tooltipped').tooltip({delay: 50});

				$('.model-remove').on('click', function(){
					var id = $(this).parent().parent().attr('id').replace('model_', '');
					$.ajax({
						url: "<?php echo base_url(); ?>" + "tampon/delete_model",
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

						if($('#right_align_button_target_' + index).hasClass('active_button') == true)
							$('#right_align_button_target_' + index).trigger('click');
						else if($('#middle_align_button_target_' + index).hasClass('active_button') == true)
							$('#middle_align_button_target_' + index).trigger('click');
						else if($('#left_align_button_target_' + index).hasClass('active_button') == true)
							$('#left_align_button_target_' + index).trigger('click');

						if($('#bold_button_target_' + index).hasClass('active_button') == true)
							$('#bold_button_target_' + index).trigger('click');
						if($('#italic_button_target_' + index).hasClass('active_button') == true)
							$('#italic_button_target_' + index).trigger('click');
						if($('#underline_button_target_' + index).hasClass('active_button') == true)
							$('#underline_button_target_' + index).trigger('click');

						$('#' + item.alignement + '_align_button_target_' + index).click();

						if(item.gras == 1)
							$('#bold_button_target_' + index).click();

						if(item.italique == 1)
							$('#italic_button_target_' + index).click();

						if(item.souligne == 1)
							$('#underline_button_target_' + index).click();
					});						
				});

				$('.model-star').on('click', function(){
					var id = $(this).parent().parent().attr('id').replace('model_', '');
					$.ajax({
						url: "<?php echo base_url(); ?>" + "tampon/star_model",
						type: 'GET',
						data: 'model=' + id,
						contentType: "application/json; charset=utf-8",
						success: (returnedData) => {
							$(this).children().toggleClass('icon-yellow');
							$(this).children().toggleClass('icon-grey');
						},
						error: function () {
							alert("Erreur dans la mise en favori.");
						}
					});
				});
				if(has_favori == true)
					$('.model-check').first().trigger('click');
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
					url: "<?php echo base_url(); ?>" + "tampon/save_model",
					type: 'GET',
					data: 'title=' + title + '&lines=' + lines_to_send + '&id_pad=' + <?php echo $id_pad ?>,
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

	function order(){
		$("body").css("cursor", "progress");
		var border = $('#pad').css('border');
        $('#pad').css('border', 'none');
	    html2canvas($("#pad"), {
            scale: 8,
            onrendered: function (canvas) {
				var data = encodeURIComponent(canvas.toDataURL("image/jpg").split(',')[1]);
                $.ajax({
					url: "<?php echo base_url(); ?>" + "tampon/send_mail",
					type: 'POST',
					data: 'header=' + $('#modal-object').val() + '&content=' + $('#Commentaires').val() + '&data=' + data + '&id_pad=' + <?php echo $id_pad ?>,
					success: function (returnedData) {
						$('#pad').css('border', border);
						$("body").css("cursor", "default");
						$('#buy-encre-modal').modal('open');
					},
					error: function () {
						alert("Erreur d'envoie de commande.");
					}
				});
			}
        });		
	}

	function alone_function(){
		$('#pad-colors').toggleClass('invisible');
		if($('#alone_checkbox').is(':checked')){
			$('#title').text('EMPREINTE POUR <?php echo $title; ?>');
		}
		else{
			$('#title').text('TAMPON <?php echo $title; ?>');
		}
	}

	$('#switch_logo').on('change', function(){
		$('#upload-logo-div').toggleClass('undisplay');
		$('#library-logo-div').toggleClass('undisplay');
	})



	$('#logo-search').on('input', function(){
		refreshListLogoLibrary();
	});

	$('#categories-list').on('change', function(){
		refreshListLogoLibrary();
	});

	function refreshListLogoLibrary(){
		var search = $('#logo-search').val();
		var category = $('#categories-list').val();
		$.ajax({
			url: "<?php echo base_url(); ?>" + "tampon/get_list_logo_library",
			type: 'GET',
			contentType: "application/json; charset=utf-8",
			dataType: "json",
			data: 'search=' + search + "&category=" + category,
			success: function (returnedData) {
				$('#logo-list-library').empty();
				returnedData.forEach(function(i){
					var line = "<li class='logo-item tooltipped' data-position='bottom' data-delay='50' data-tooltip='" + i.nom + "'><img class='logo-img' src='<?php echo base_url('assets/Site/CLIP ART SITE/')?>" + i.categorie + "/" + i.nom + "." + i.extension + "'></li>";
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
			url: "<?php echo base_url(); ?>" + "tampon/get_list_logo_upload",
			type: 'GET',
			contentType: "application/json; charset=utf-8",
			dataType: "json",
			success: function (returnedData) {
				$('#logo-list-upload').empty();
				returnedData.forEach(function(i){
					var line = "<li class='logo-item'><img class='logo-img' src='" + i + "'></li>";
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

	function refreshListFonts(){
        $.ajax({
            url: "<?php echo base_url(); ?>" + "tampon/get_list_fonts",
            type: 'GET',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (returnedData) {
                alert("police");
            },
            error: function(){
                alert("Erreur de récupérations des polices.");
            }
        });
    }

</script>

