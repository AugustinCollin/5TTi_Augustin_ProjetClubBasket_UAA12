<!-- corps de la page d'accueil qui prendar place dans le main de base.php -->

<!-- !!! corriger le chemin de images ! -->
<?php if ($uri === "/mesclub_Basket") : ?>
    <h1>Vos clubs de basket</h1>
<?php else : ?>
    <h1>Liste des clubs de basket répertoriés</h1>
<?php endif ?>

<?php if (isset($_SESSION["user"])) : ?>
    <a href="create">Ajouter un club de basket</a>
<?php endif ?>
        
<div class="flexible wrap space-around">
    <?php foreach ($clubs_Basket as $club_Basket) : ?>
        <div class="border card">
            <h2 class="center"><?= $club_Basket->club_BasketNom?></h2>
            <div>
                <div class="flexible blocImageclub_basket">
                    <img src="../../Assets/Images/Erpent.png" <?= $club_Basket->club_BasketImage ?> alt="photo du club de basket d'Erpent" >
                </div>
                <div class="center">
                <a href=""></a>
                    <p><span><?= $club_Basket->club_BasketAdresse?> - </span> - <span><?= $club_Basket->club_BasketTel . " " . $club_Basket->club_BasketNom?></span></p>
                    <a href="voirClub.php" class="btn btn-page">Voir le club</a>
                    <?php if ($uri === "/mesClubBasket") : ?>
                        <p><a href="deleteClub?club_BasketId=<?= $club_Basket->club_BasketId ?>">Supprimer le club de basket</a></p>
                        <p><a href="updateClub?club_BasketId=<?= $club_Basket->club_BasketId ?>">Modifier le club de basket</p>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>