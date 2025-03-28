<nav class="barre">
    <!-- logo du site-->
    <div class="logo">
        <a href="index.php">
            <img id="logopart1" alt="logo du site" src="../../images/logo-site.jpeg">
            <img id="logopart2" alt="logo du site" src="../../images/logo-titre.png">
        </a>
    </div>
    <!-- partie pour la recherche-->
    <div class="search-container">
        <input id="search-tab" placeholder="Search" type="search">
        <button id="button-search"><i class="fas fa-search logo-search"></i></button>
    </div>
    <!-- partie gauche de la barre-->
    <div class="tabpartiegauche">
        <a href="cartpage.php" class="logo-panier"><i class="fas fa-shopping-cart"></i></a>
        <i class="fas fa-bars menu-bar" onclick="ShowSideBar()"></i><!--afficher le menu interieur-->
        <div> <!-- barre interieure-->
            <ul class="sidebar" style="list-style: none; padding: 0;">
                <span class="material-symbols-outlined crosssidebar" Onclick="Hidesidebar()">
                    close
                </span>

                <li>
                    <a href="profile.php" class="sidebar-link">
                        <span class="material-symbols-outlined symbolist">person</span> My Profile
                    </a>
                </li>

                <li><span class="material-symbols-outlined symbolist">
                        yard
                    </span>Our plants</li>
                <li><span class="material-symbols-outlined symbolist">
                        potted_plant
                    </span>pots and decoration</li>
                <li> <span class="material-symbols-outlined symbolist">
                        favorite
                    </span> Favorites</li>
                <li> <span class="material-symbols-outlined symbolist">
                        home
                    </span>About us</li>
            </ul>
        </div>
    </div>
</nav>