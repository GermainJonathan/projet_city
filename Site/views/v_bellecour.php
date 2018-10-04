<?php

// En tête de page
require_once(PATH_VIEWS.'header.php');

// menu navigation
require_once(PATH_VIEWS.'alert.php');

require_once(PATH_VIEWS.'spinner.php');?>



<!-- SideBar Page -->
<div>
    <div id="sideBar">
        <nav id="menuQuartier">
            <ul class="nav navbar-nav">
                <li>
                    <a class="nav-link active" href="#bodyHistoire">
                        <p class="navLien">Histoire</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#bodyMonuments">
                    <p class="navLien">Monuments</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#bodyActivites">
                    <p class="navLien">Activités</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#bodyRestaurants">
                    <p class="navLien">Restaurants</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#bodyCommentaires">
                    <p class="navLien">Commentaires</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!--  Les catégories  -->
    <div class="bodyQuartier">
        <div id="bodyHistoire">
            <h1> Histoire</h1>
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
        <div id="bodyMonuments">
        <h1> Monuments</h1>
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

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');
