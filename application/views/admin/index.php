<?php header('Content-Type: text/html; charset=utf-8'); ?>

<h1><?php echo $title; ?> </h1>
<br>
<a href="<?php echo base_url('admin/users'); ?>">Utilisateurs (<?php echo $nb_users; ?> notifications)</a>