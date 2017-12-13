
<div class='row'>
    <div class="col-md-3 col-md-offset-4 input-field">
        <label for="search_box"><i class='material-icons left'>search</i>Rechercher</label>
        <input type="text" id="search_box" class="validate"/>
    </div>
</div>

<div class="row">
    <div class="col-md-3 col-md-offset-1">
		<label>Forme de l'appareil</label>
                            <select id="formComboBox">
							    <option disabled selected value> -- Sélectionner une option-- </option>
                                <option value="Rond">Rond</option>
                                <option value="Rectangle">Rectangle</option>
                                <option value="Carre">Carre</option>
                            </select>
    </div>

    <div class="col-md-3 col-md-offset-3">
	<label>Type d'appareil</label>
                            <select id="typeComboBox">
														    <option disabled selected value> -- Sélectionner une option-- </option>
                                <option value="Bois">Bois</option>
                                <option value="Plastique">Plastique</option>
                                <option value="Metallique">Metallique</option>
                            </select>
    </div>
</div>

<div class="row">
    <div class="col-md-3 col-md-offset-5">
        <input type="checkbox" id="dater_checkbox" />
        <label for="dater_checkbox">Tampon Dateur ?</label>
    </div>
</div>

<div class="row">
    <div class="col-md-12" id="pad-list">
    </div>
</div>


<script type="text/javascript">
    document.getElementById('formComboBox').onchange = document.getElementById('typeComboBox').onchange =
        document.getElementById('dater_checkbox').onchange = document.getElementById('search_box').oninput = function () {
            $('#pad-list').empty();
            refreshList();
        };

    $(document).ready(function () {
        $('select').material_select();
        refreshList();
    });

    function refreshList() {
        $.ajax({
			url: "<?php echo base_url(); ?>" + "index.php/tampon/refresh_list_pad",
            type: 'GET',
			data: 'form=' + $('#formComboBox').val() + '&type=' + $('#typeComboBox').val() + '&dater=' + $('#dater_checkbox').is(':checked') + '&search=' + $('#search_box').val(),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (returnedData) {
                $.each(returnedData, function (index) {
                    var name = "TAMPON " + returnedData[index][1] + " " + returnedData[index][2];
                    var id = returnedData[index][0];
                    var url = "<?php echo base_url(); ?>" + "index.php/tampon/personalize/" + id;
                    var line = "<div class='col-md-4'>" +
                        "<div class='card'>" +
                        "<div class='card-image waves-effect waves-block waves-light'>" +
                        "<img class='activator' src='http://www.tampon-en-ligne.fr/1289-thickbox_default/tampon-trodat-printy-4913.jpg'>" +
                        "</div>" +
                        "<div class='card-content'>" +
                        "<span class='card-title activator grey-text text-darken-4'><i class='material-icons right'>arrow_drop_down</i>" + name + "</span>" +
                        "</div>" +
                        "<div class='card-reveal'>" +
                        "<span class='card-title grey-text text-darken-4'>" + name + "<i class='material-icons right'>close</i></span>" +
                        "<p>Here is some more information about this product that is only revealed once clicked on.</p>" +
                        "<a class='btn waves-effect waves-light green' href='" + url + "'><i class='material-icons left'>mode_edit</i>PERSONNALISER</a>"
                    "</div>" +
                    "</div>" +
                    "</div >";
                    $('#pad-list').append(line);
                })
            },
            error: function () {
                alert("Erreur de récupération de données.");
            }
        });
    }

</script>
