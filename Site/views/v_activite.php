<span class="anchor" id="anchorBodyHistoire"></span>
<div class="row">
    <h1>
        <?= TITRE_HISTOIRE ?>
    </h1>
    <div id="BodyHistoire">
        <div id="sousTitreHistory"></div>
        <p id="txtHistory" class="text-justify"></p>
    </div>
    <div>
        <!--  Catégorie Histoire  -->
        <div id="timelineHistory">
        </div>
    </div>
</div>
<span class="anchor" id="anchorBodyMonuments"></span>
<div class="row">
    <div id="BodyMonuments">
        <h1>
            <?= TITRE_MONUMENT ?>
        </h1>
        <div class="carrousel">
            <div class="arrow-carrousel">
                <div class="arrow" id="arrowLeftMonument"></div>
                <div class="arrow" id="arrowRightMonument"></div>
            </div>
            <div class="carrousel-contenu" id="carrouselMonument">
            </div>
        </div>
    </div>
</div>
<span class="anchor" id="anchorBodyActivites"></span>
<div id="bodyActivites" class="container-fluid">
    <div class="row">
        <div class="row">
            <h1>
                <?= TITRE_ACTIVITE ?>
            </h1>
        </div>
        <div class="row">
            <div class="col-9">
                <div class="arrow" id="arrowUpActivity"></div>
                <div id="activiteconteneur" class="row">
                    <section data-panel="1">
                        <h2>Title 1</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat.
                            Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat.</p>
                    </section>
                    <section data-panel="2">
                        <h2>Title 2</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat.
                            Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat.</p>
                    </section>
                    <section data-panel="3">
                        <h2>Title 3</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat.
                            Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat.</p>
                    </section>
                    <section data-panel="4">
                        <h2>Title 4</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat.
                            Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat.</p>
                    </section>
                </div>
                <div class="arrow" id="arrowDownActivity"></div>
            </div>
            <div id="parallaxactivite" class="col-3">
                <div class="parallax" data-height="60" data-image-src="<?= PATH_ACCUEIL.'lyon.jpg' ?>">
                    <div class="caption">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>activite.js"></script>