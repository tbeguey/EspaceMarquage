<?php header('Content-Type: text/html; charset=utf-8'); ?>

<h1><?php echo $title; ?> </h1>

<div class="row">
	<div class="col s4 offset-s4">
		<label for="search_box"><i class='material-icons left'>search</i>Rechercher</label>
		<input type="text" id="search_box"/>
	</div>
</div>

<div class="row">
    <div class="col s8 offset-s2" id="ink-list">
    </div>
</div>

<div class="row">
	<div class="col l4 offset-l5">
		<ul class="pagination">
		</ul>
	</div>
</div>



<script type="text/javascript">
	/*$('#search_box').bind("enterKey",function(e){
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
	});*/

	document.getElementById('search_box').oninput = function () {
            refreshList();
        };

    $(document).ready(function () {
        refreshList();
    });

    function refreshList() {
	    $('#ink-list').empty();
		$('.pagination').empty();
		var active_page = 1;
		const number_by_page = 16 + 1; // +1 parceque j'avais la flemme de modifier le code pour que ca coincide
        $.ajax({
			url: "<?php echo base_url(); ?>" + "index.php/encre/refresh_list_ink",
            type: 'GET',
			data: 'search=' + $('#search_box').val(),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (returnedData) {
				var count = 0;
                $.each(returnedData, function (index) {
					count++;
					var page = Math.floor(count/number_by_page) + 1;
					if(count % number_by_page == 1){
						$('#ink-list').append("<div class='page' id='page" + page + "'>");
						$('.pagination').append("<li class='waves-effect num_page'><a>" + page + "</a></li>");
						$('.num_page').on('click', function(){
							$('.num_page').removeClass('active');
							$(this).addClass('active');
							$('.page').hide();
							active_page = $(this).text();
							$('#page' + active_page).show();
						});
					}
                    var name = "ENCRE POUR TAMPON " + returnedData[index].tampon.marque + " " + returnedData[index].tampon.nom;
                    var id = returnedData[index].id;
                    var url = "<?php echo base_url(); ?>" + "index.php/encre/personalize/" + id;
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
