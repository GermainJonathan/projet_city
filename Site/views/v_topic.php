<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');?>
<div class="bodyForum">
<table class="table">
    <thead>
        <tr>
            <th scope="col">Messages</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <?php
                foreach ($listMessage as $message)
                    echo $message;
                ?>
            </td>
        </th>
    </tbody>
</table>
</div>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');
