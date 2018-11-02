<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');

require_once(PATH_VIEWS.'spinner.php');?>


<!-- SideBar Page -->
<div>
    <div id="sideBar" class="col-lg-2 col-md-2 col-sm-0">
        <nav id="menuQuartier">
            <ul class="nav navbar-nav">
                <li>
                    <a class="nav-link" href="#anchorBodyHistoire">
                        <p class="navLien">Histoire</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#anchorBodyMonuments">
                    <p class="navLien">Monuments</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#anchorBodyActivites">
                    <p class="navLien">Activités</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#anchorBodyRestaurants">
                    <p class="navLien">Restaurants</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#anchorBodyCommentaires">
                    <p class="navLien">Commentaires</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!--  Les catégories  -->
     <div class="bodyQuartier">
        <span class="anchor" id="anchorBodyHistoire"></span>
        <div class="row">
            <div class="col-lg-4 offset-lg-2 col-md-3 offset-md-2 col-sm-12" id="BodyHistoire">
                <h1> Histoire</h1>
                <p id="txtHistory" class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
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
            </div>
            <div class="col-lg-6 col-md-7 col-sm-12">
                <!--  Catégorie Histoire  -->
                <div id="timelineHistory">
                    <div>
                        <div class="bubble"></div>
                        <h2 class="marginFrise">New Web Design</h2>
                        <p class="marginFrise text-justify txtBubble">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
                        <button class="btn btn-primary btnHistory" onclick="" title="Recentrer" style="outline: none;">En voir plus...</button>
                        <div class="lineTimeline"></div>
                    </div>
                    <div>
                        <div class="bubble"></div>
                            <h2 class="marginFrise">New Web Design</h2>
                            <p class="marginFrise text-justify txtBubble">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
                            <button class="btn btn-primary btnHistory" onclick="" title="Recentrer" style="outline: none;">En voir plus...</button>
                            <div class="lineTimeline"></div>
                        </div>
                    <div>
                        <div class="bubble"></div>
                        <h2 class="marginFrise">New Web Design</h2>
                        <p class="marginFrise text-justify txtBubble">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
                        <button class="btn btn-primary btnHistory" onclick="" title="Recentrer" style="outline: none;">En voir plus...</button>
                        <div class="lineTimeline"></div>
                    </div>
                    <div>
                        <div class="bubble"></div>
                        <h2 class="marginFrise">New Web Design</h2>
                        <p class="marginFrise text-justify txtBubble">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
                        <button class="btn btn-primary btnHistory" onclick="" title="Recentrer" style="outline: none;">En voir plus...</button>
                    </div>   
                </div>
            </div>
        </div>
    </div> 
        <span class="anchor" id="anchorBodyMonuments"></span>
        <div id="bodyMonuments">
        <h1> Monuments</h1>
            <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
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
            
        </div>
        <span class="anchor" id="anchorBodyActivites"></span>
        <div id="bodyActivites">
        <h1> Activités</h1>
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
        </div>
        <span class="anchor" id="anchorBodyRestaurants"></span>
        <div id="bodyRestaurants">
        <h1> Restaurants</h1>
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
        
        </div>
        <span class="anchor" id="anchorBodyCommentaires"></span>
        <div id="bodyCommentaires">
        <h1> Commentaires</h1>
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
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS ?>quartier.js"></script>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');
