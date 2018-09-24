<?php

//  En tête de page

require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<div class="parallax" id="parallax-1" data-image-src="./assets/images/lyon.jpg" data-height="60">
    <div class="caption">
        <span class="border">Presqu'île</span>
    </div>
</div>

<div class="texttest">
    <h3>Parallax Demo</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus felis at congue tempus. Integer egestas
        vehicula orci, sodales vulputate diam sodales nec.
        Vivamus sagittis orci id leo gravida, luctus posuere neque tincidunt. Praesent facilisis iaculis pulvinar. In
        porta pulvinar mi, eget congue nulla laoreet vitae.
        Ut vestibulum vel lorem et facilisis. In malesuada ornare enim eget tempor. In vitae ipsum odio. Cras sodales
        mauris non augue tincidunt porttitor.
        Nam ultricies consectetur quam eget fermentum.
    </p>
</div>

<div class="row no-padding no-margin">
    <div id="mapid"data-height="60"></div>
</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>map.js"></script>
<!--  Fin de la page -->

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');
