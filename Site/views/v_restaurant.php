<span class="anchor" id="anchorBodyRestaurants"></span>
<div id="bodyRestaurants" class="container-fluid">
    <h1 class="row">
        <?= TITRE_RESTAURANT ?>
    </h1>
    <div class="containerCard row" id="RestaurantCards">
    </div>
    <div class="arrow-restaurant justify-content-center row" id="ArrowRes">
        <a class="arrow" id="arrowTopRestaurant" href="#anchorBodyRestaurants"></a>
        <a class="arrow" id="arrowDownRestaurant"></a>
    </div>
    <div class="col-12" id="rowSavoirPlus">
        <div class="EnsavoirPlus col-lg-10 col-md-10 col-sm-12" id="SavoirPlusRestaurants">
            <div class="imgSavoirPlus"></div>
            <div class="txtSavoirPlus">
                <div class="titreSavoirPlus"></div>
                <div class="descSavoirPlus"></div>
            </div>
            <div class="contactSavoirPlus">
                <div class="contactRowSavoirPlus">
                    <span class="mapicon"></span>
                    <span class="adresseSavoirPlus"></span>
                </div>
                <div class="contactRowSavoirPlus">
                    <span class="telicon"></span>
                    <a class="telephoneSavoirPlus"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>restaurant.js"></script>