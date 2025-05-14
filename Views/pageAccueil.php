
<?php if ($uri === "/mesclub_Basket") : ?>
    <h1>Vos clubs de basket</h1>
<?php else : ?>
    <h1>Liste des clubs de baskets répertoriés</h1>
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
                    <img src=" <?= $club_Basket->club_BasketImage ?>" alt="photo du club de basket" >
                </div>
                <div class="center">
                <a href="https://rbcerpent.be/" class="btn btn-page">Voir le club</a>
                    <p><span><?= $club_Basket->club_BasketAdresse?> - </span> - <span><?= $club_Basket->club_BasketTel . " " . $club_Basket->club_BasketNom?></span></p>
                    <a href="voirClub.php" class="btn btn-page">Voir le club</a>
                    <?php if ($uri === "/mesClub_basket") : ?>
                        <p><a href="deleteClub?club_basketId=<?= $club_Basket->club_BasketId ?>">Supprimer le club de basket</a></p>
                        <p><a href="updateClub?club_basketId=<?= $club_Basket->club_BasketId ?>">Modifier le club de basket</p>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>