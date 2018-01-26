<?php header('Content-Type: text/html; charset=utf-8'); ?>

<div class="row">
	<div class="col s4">
		<label for="search_box"><i class='material-icons left'>search</i>Rechercher</label>
		<input type="text" id="search_box"/>
	</div>
</div>

<div class="row">
	<div class="col s10 offset-s1">
		<div class="col s4">
			<label>Forme de l'appareil</label>
				<select id="formComboBox">
					<option selected value="none"> -- Selectionner une option-- </option>
					<option value="Rond">Rond</option>
					<option value="Rectangle">Rectangle</option>
					<option value="Carre">Carre</option>
				</select>
		</div>

		<div class="col s3 offset-s1" style="margin-top:30px;">
			<input type="checkbox" id="dater_checkbox" />
			<label for="dater_checkbox">Tampon Dateur ?</label>
		</div>

		<div class="col s4">
			<label>Type d'appareil</label>
				<select id="typeComboBox">
					<option selected value="none"> -- Selectionner une option-- </option>
					<option value="Bois">Bois</option>
					<option value="Plastique">Plastique</option>
					<option value="Metallique">Metallique</option>
				</select>
		</div>
	</div>
</div>

<div class="row">
    <div class="col s8 offset-s2" id="pad-list">
    </div>
</div>

<div class="row">
	<div class="col l4 offset-l5">
		<ul class="pagination">
		</ul>
	</div>
</div>



<script type="text/javascript">
	$('#search_box').bind("enterKey",function(e){
		refreshList();
	});
	$('#search_box').keyup(function(e){
		if(e.keyCode == 13)
		{
			$(this).trigger("enterKey");
		}
		if(e.keyCode == 8)
		{
			if($(this).val().length == 0)
				$(this).trigger("enterKey");
		}
	});

    document.getElementById('formComboBox').onchange = document.getElementById('typeComboBox').onchange =
        document.getElementById('dater_checkbox').onchange = function () {
            refreshList();
        };

    $(document).ready(function () {
        $('select').material_select();
        refreshList();
    });

    function refreshList() {
	    $('#pad-list').empty();
		$('.pagination').empty();
		var active_page = 1;
		const number_by_page = 16 + 1; // +1 parceque j'avais la flemme de modifier le code pour que ca coincide
        $.ajax({
			url: "<?php echo base_url(); ?>" + "index.php/tampon/refresh_list_pad",
            type: 'GET',
			data: 'form=' + $('#formComboBox').val() + '&type=' + $('#typeComboBox').val() + '&dater=' + $('#dater_checkbox').is(':checked') + '&search=' + $('#search_box').val(),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (returnedData) {
				var count = 0;
                $.each(returnedData, function (index) {
					count++;
					var page = Math.floor(count/number_by_page) + 1;
					if(count % number_by_page == 1){
						$('#pad-list').append("<div class='page' id='page" + page + "'>");
						$('.pagination').append("<li class='waves-effect num_page'><a>" + page + "</a></li>");
						$('.num_page').on('click', function(){
							$('.num_page').removeClass('active');
							$(this).addClass('active');
							$('.page').hide();
							active_page = $(this).text();
							$('#page' + active_page).show();
						});
					}
                    var name = "TAMPON " + returnedData[index].marque + " " + returnedData[index].nom;
                    var id = returnedData[index].id;
					var dater = "Non";
					if(returnedData[index].dateur === true)
						dater = "Oui";
                    var url = "<?php echo base_url(); ?>" + "index.php/tampon/personalize/" + id;
                    var line = "<div class='col l3 s10 offset-s1'>" +
                        "<div class='card'>" +
                        "<div class='card-image waves-effect waves-block waves-light'>" +
                        "<img class='activator' src='http://www.tampon-en-ligne.fr/1289-thickbox_default/tampon-trodat-printy-4913.jpg'>" +
                        "</div>" +
                        "<div class='card-content'>" +
                        "<span class='card-title activator grey-text text-darken-4'><i class='material-icons right'>arrow_drop_down</i>" + name + "</span>" +
                        "</div>" +
                        "<div class='card-reveal'>" +
                        "<span class='card-title grey-text text-darken-4'>" + name + "<i class='material-icons right'>close</i></span>" +
						"<p style='margin:3px; margin-top: 10px;'>Type : " + returnedData[index].type + ".</p>" +
						"<p style='margin:3px;'>Forme : " + returnedData[index].forme + ".</p>" +
                        "<p style='margin:3px;'>Largeur : " + returnedData[index].largeur + "mm.</p>" +
						"<p style='margin:3px;'>Hauteur : " + returnedData[index].hauteur + "mm.</p>" +
						"<p style='margin:3px;'>Lignes maximum : " + returnedData[index].lignes_max + ".</p>" +
						"<p style='margin:3px;'>Dateur : " + dater + ".</p>" +
						"<h5 style='text-align:center;'>Prix : 1500.2&euro;.</h5>" +

                        "<a class='btn waves-effect waves-light green' href='" + url + "'><i class='material-icons left'>mode_edit</i>EDITER</a>"
                    "</div>" +
                    "</div>" +
                    "</div >";
					
					$('#page' + page).append(line);
					if(count % number_by_page == 0){
						$('#pad-list').append("</div>");
					}
                })
				$('.page').hide();
				$('.pagination').children().first().trigger('click');
				$("<li><a class='waves-effect' id='left-page'><i class='material-icons'>chevron_left</i></a></li>").insertBefore($('.pagination').children().first());
				$("<li><a class='waves-effect' id='right-page'><i class='material-icons'>chevron_right</i></a></li>").insertAfter($('.pagination').children().last());

				$('#left-page').on('click', function(){
					$('.pagination').children().each(function(){
						if($(this).text() == (parseInt(active_page)-1).toString())
							$(this).trigger('click');
					});
				});
				$('#right-page').on('click', function(){
					$('.pagination').children().each(function(){
						if($(this).text() == (parseInt(active_page)+1).toString())
							$(this).trigger('click');
					});
				})
            },
            error: function () {
                alert("Erreur de récupération de données.");
            }
        });
    }

</script>
