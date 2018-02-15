<?php header('Content-Type: text/html; charset=utf-8'); ?>

<h1><?php echo $title; ?> </h1>

<table id="users-table">
	<thead>
		<th>N�</th>
		<th>Entreprise</th>
		<th>Adresse �lectronique</th>
		<th></th>
		<th></th>
	</thead>
	<tbody id="users-lines">
	</tbody>
</table>


<script type="text/javascript">
	$(document).on('ready', function(){
		refresh_list();
	});

	function refresh_list(){
		$('#users-lines').empty();
		$.ajax({
			url: "<?php echo base_url(); ?>" + "index.php/admin/get_not_active_users",
			type: 'GET',
			data: '',
			contentType: "application/json; charset=utf-8",
			dataType: "json",
			success: function (returnedData) {
				$.each(returnedData, function (index) {
					var id = returnedData[index].id;
					var line = "<tr> <td> " + id + " </td> <td> " + returnedData[index].company +
					"</td> <td> " + returnedData[index].email + " </td> <td> <a onclick='active_user(" + id + ")' style='cursor:pointer;'> Valider </a> </td> <td> <a onclick='delete_user(" + id + ");' style='cursor:pointer;'> Supprimer </a> </td> </tr>";
					$('#users-lines').append(line);
				});
			},
			error: function () {
				alert("Erreur de r�cup�ration de donn�es.");
			}
		});
	}

	function delete_user(id){
		$.ajax({
			url: "<?php echo base_url(); ?>" + "index.php/admin/delete_user",
			type: 'GET',
			data: 'id=' + id,
			contentType: "application/json; charset=utf-8",
			success: function () {	
				refresh_list();
			},
			error: function () {
				alert("Erreur de suppression de donn�es.");
			}
		});
	}

	function active_user(id){
		$.ajax({
			url: "<?php echo base_url(); ?>" + "index.php/admin/active_user",
			type: 'GET',
			data: 'id=' + id,
			contentType: "application/json; charset=utf-8",
			success: function () {	
				refresh_list();
			},
			error: function () {
				alert("Erreur de validation de donn�es.");
			}
		});
	}

</script>