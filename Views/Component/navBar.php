<ul class = "flexible space-between">
    <?php if (isset($_SESSION['user'])) : ?>
        <li class='menu'><a href='mesClub_Basket'>Mes clubs de basket</a></li>
        <li class='menu'><a href='profil'>Profil</a></li>
        <li class='menu'><a href='deconnexion'>Déconnexion</a></li>
    <?php else : ?>
        <li class='menu'><a href='inscription'>Inscription</a></li>
        <li class='menu'><a href='connexion'>Connexion</a></li>
        <li class='menu'><a href='index.php'>Home</a></li>
    <?php endif ?>
</ul>