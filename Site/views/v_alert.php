<?php
// Alerte pour une erreur, une information ou une confirmation
if(isset($alert))
{
?>
	<div class="alert alert-<?= isset($alert['classAlert']) ? $alert['classAlert'] : 'danger' ?>">
		<strong><?= $alert['messageAlert'] ?></strong>
	</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>alert.js"></script>
<?php
}
