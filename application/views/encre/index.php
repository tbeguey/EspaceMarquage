<?php header('Content-Type: text/html; charset=utf-8'); ?>

<h1><?php echo $title; ?> </h1>

<div class="container">
	<br>
	<br>
	<div class="row">
		<div class="col s2 offset-s1 hide-on-med-and-down" id="left_column">
			<p class="bold" style="text-align:center;">FILTRER PAR</p>
			<hr>
			<p>Forme</p>
			<form action="#">
				<p>
					<input class="with-gap group1" name="group1" type="radio" id="Rectangle"  />
					<label for="Rectangle">Rectangulaire</label>
				</p>
				<p>
					<input class="with-gap group1" name="group1" type="radio" id="Carre"  />
					<label for="Carre">Carr�</label>
				</p>
				<p>
					<input class="with-gap group1" name="group1" type="radio" id="Cercle"  />
					<label for="Cercle">Cercle</label>
				</p>
				<p style="position:fixed; opacity:0;"/>
					<input class="with-gap group1" name="group1" type="radio" id="none" />
					<label for="none"></label>
				</p>
			</form>
			<hr>
			<p>Type</p>
			<form action="#">
				<p>
					<input class="with-gap group2" name="group2" type="radio" id="Plastique"  />
					<label for="Plastique">Plastique</label>
				</p>
				<p>
					<input class="with-gap group2" name="group2" type="radio" id="Metallique"  />
					<label for="Metallique">M�tallique</label>
				</p>
				<p style="position:fixed; opacity:0;"/>
					<input class="with-gap group2" name="group2" type="radio" id="none"  />
					<label for="none"></label>
				</p>
			</form>
			<hr>
			<p>Dateur</p>
			<form action="#">
				<p>
					<input class="with-gap group3" name="group3" type="radio" id="true"  />
					<label for="true">Oui</label>
				</p>
				<p >
					<input class="with-gap group3" name="group3" type="radio" id="false"  />
					<label for="false">Non</label>
				</p>
				<p style="position:fixed; opacity:0;"/>
					<input class="with-gap group3" name="group3" type="radio" id="none"  />
					<label for="none"></label>
				</p>
			</form>

		</div>
		<div class="col s8">
			<div class="col s12">
				<div class="col s3">
					Affichage de <span id="start_index">1</span> - <span id="end_index">2</span> de <span id="total">2</span> article(s).
				</div>
				<div class="col s4 offset-s4" style="display:flex; justify-content:center; align-items: center;">
					<input type="text" id="search_box" placeholder="Rechercher"/>
					<i class='material-icons'>search</i>
				</div>
				<div class="col s6" id="chips">

				</div>
			</div>
			

			<div class="col s12" id="pad-list">
			</div>

			<div class="row">
				<div class="col l4 offset-l5">
					<ul class="pagination">
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>






<script type="text/javascript">
	var type_pad = "none";
	var form_pad = "none";
	var dater = "none";

    $(document).ready(function () {
        refreshList();
    });

	$('.group1').on('click', function(){
		if(form_pad != "none"){
			$('#chips').children().each(function(){
				if($(this).attr('id').replace('-chip', '') == form_pad){
					$(this).remove();
				}
			});
		}
		form_pad = $(this).attr('id');
		if(form_pad != "none"){
			var new_chip =  "<div class='chip' id='" + form_pad + "-chip'>" +
						$("label[for='" + form_pad + "']").text() + "<i class='close material-icons'>close</i>" +
						"</div>";
			$('#chips').append(new_chip);

			$('.close').on('click', function() {
				var id = $(this).parent().attr('id').replace('-chip', '');
				var group = $('#' + id).attr('class').split(' ')[1];
				$('.' + group).each(function(){
					if($(this).attr('id') == "none")
						$(this).trigger('click');
				});
			});
		}
		refreshList();
	});

	$('.group2').on('click', function(){
		if(type_pad != "none"){
			$('#chips').children().each(function(){
				if($(this).attr('id').replace('-chip', '') == type_pad){
					$(this).remove();
				}
			});
		}
		type_pad = $(this).attr('id');
		if(type_pad != "none"){
			var new_chip =  "<div class='chip' id='" + type_pad + "-chip'>" +
						$("label[for='" + type_pad + "']").text() + "<i class='close material-icons'>close</i>" +
						"</div>";
			$('#chips').append(new_chip);

			$('.close').on('click', function() {
				var id = $(this).parent().attr('id').replace('-chip', '');
				var group = $('#' + id).attr('class').split(' ')[1];
				$('.' + group).each(function(){
					if($(this).attr('id') == "none")
						$(this).trigger('click');
				});
			});
		}
		refreshList();
	});

	$('.group3').on('click', function(){
		if(dater != "none"){
			$('#chips').children().each(function(){
				if($(this).attr('id').replace('-chip', '') == dater){
					$(this).remove();
				}
			});
		}
		dater = $(this).attr('id');
		if(dater != "none"){
			var new_chip =  "<div class='chip' id='" + dater + "-chip'>" +
						$("label[for='" + dater + "']").text() + "<i class='close material-icons'>close</i>" +
						"</div>";
			$('#chips').append(new_chip);

			$('.close').on('click', function() {
				var id = $(this).parent().attr('id').replace('-chip', '');
				var group = $('#' + id).attr('class').split(' ')[1];
				$('.' + group).each(function(){
					if($(this).attr('id') == "none")
						$(this).trigger('click');
				});
			});
		}
		refreshList();
	});

	$('#search_box').on('input', function(){
		refreshList();
	});

       function refreshList() {
		const number_by_page = 8; 
        $.ajax({
			url: "<?php echo base_url(); ?>" + "encre/refresh_list_ink",
            type: 'GET',
			data: 'form=' + form_pad + '&type=' + type_pad + '&dater=' + dater + '&search=' + $('#search_box').val(),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (returnedData) {
				$('#pad-list').empty();
				$('.pagination').empty();
				var active_page = 1;
				var count = 0; // obliger car l'index n'est pas une valeur sur
                $.each(returnedData, function (index) {
					var page = Math.floor(count/number_by_page) + 1;
					if(count % number_by_page == 0){
						$('#pad-list').append("<div class='page' id='page" + page + "'>");
						$('.pagination').append("<li class='waves-effect num_page'><a>" + page + "</a></li>");
						$('.num_page').on('click', function(){
							$('.num_page').removeClass('active');
							$(this).addClass('active');
							$('.page').hide();
							active_page = $(this).text();
							$('#page' + active_page).show();
							var start_index = (active_page-1) * number_by_page;
							$('#start_index').text(start_index + 1);
							$('#end_index').text(start_index + $('#page' + active_page).children().length);
						});
					}
                    var name = "ENCRE POUR TAMPON " + returnedData[index].tampon.marque + " " + returnedData[index].tampon.nom;
                    var id = returnedData[index].id;
                    var url = "<?php echo base_url(); ?>" + "encre/" + id;
                    var line = "<div class='col l3 s10 offset-s1'>" +
                        "<div class='card'>" +
                        "<div class='card-image waves-effect waves-block waves-light'>" +
                        "<img class='activator' src='https://www.montampon.fr/158-large_default/recharge-d-encre-pour-trodat-printy-4913.jpg'>" +
                        "</div>" +
                        "<div class='card-content'>" +
                        "<span class='card-title activator grey-text text-darken-4'><i class='material-icons right'>arrow_drop_down</i>" + name + "</span>" +
                        "</div>" +
                        "<div class='card-reveal'>" +
                        "<span class='card-title grey-text text-darken-4'>" + name + "<i class='material-icons right'>close</i></span>" +
						"<p style='margin:3px; margin-top: 10px;'>Type : " + returnedData[index].tampon.type + ".</p>" +
						"<p style='margin:3px;'>Forme : " + returnedData[index].tampon.forme + ".</p>" +
                        "<p style='margin:3px;'>Largeur : " + returnedData[index].tampon.largeur + "mm.</p>" +
						"<p style='margin:3px;'>Hauteur : " + returnedData[index].tampon.hauteur + "mm.</p>" +
						"<p style='margin:3px;'>Lignes maximum : " + returnedData[index].tampon.lignes_max + ".</p>" +
						"<h5 style='text-align:center;'>Prix : 1500.2&euro;.</h5>" +

                        "<a class='btn waves-effect waves-light green' href='" + url + "'><i class='material-icons left'>mode_edit</i>EDITER</a>"
                    "</div>" +
                    "</div>" +
                    "</div >";
					
					$('#page' + page).append(line);
					if(count % number_by_page == (number_by_page-1) || (count+1) == returnedData.length){
						$('#pad-list').append("</div>");
					}
					count++;
                });
				$('#total').text(returnedData.length);
				if(returnedData.length === 0)
					$('#pad-list').append("<h3>Bientot disponible / Produit inexistant </h3>");
				$('#start_index').text(1);
				$('#end_index').text(number_by_page);
				$('.page').hide();
				$('.pagination').children().first().trigger('click');
				$("<li><a class='waves-effect' id='left-page'><i class='material-icons'>chevron_left</i></a></li>").insertBefore($('.pagination').children().first());
				$("<li><a class='waves-effect' id='right-page'><i class='material-icons'>chevron_right</i></a></li>").insertAfter($('.pagination').children().last());

				$('#left-page').on('click', function(){
					$('.pagination').children().each(function(){
						if($(this).text() == (parseInt(active_page)-1).toString()){
							$(this).trigger('click'); 
							return false;
						}
					});
				});
				$('#right-page').on('click', function(){
					$('.pagination').children().each(function(){
						if($(this).text() == (parseInt(active_page)+1).toString()){
							$(this).trigger('click');
							return false;
						}
					});
				})
            },
            error: function () {
                alert("Erreur lors de la recuperation de la liste des tampons.");
            }
        });
    }

</script>
                    