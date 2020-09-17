<?php
var_dump($include['datas']);
$revue = $include['datas']['revue'];
$rubriques = $include['datas']['rubriques'] ?? null;
$auteurs = $include['datas']['auteurs'] ?? null;
$rubrique = $include['datas']['rubrique'] ?? null;
$auteur = $include['datas']['auteur'] ?? null;
$articles = $include['datas']['articles'] ?? null;
$article = $include['datas']['article'] ?? null;
?>
<section id="revue">
    <div id="categories">
        <h2>Catégories</h2>
        <ul>
        <?php if($rubrique != null): ?>

        <?php else: ?>
            <?php $max = sizeof($rubriques);
            for($i=0; $i<$max; $i++): ?>
                <li><a href='index.php?page=article&co_revue=<?= $revue->getco_revue() ?>&rubrique_id=<?= $rubriques[$i]->getRubrique_id() ?>'><?= $rubriques[$i]->getRub_nom() ?> </a></li>
            <?php endfor ?>
        <?php endif ?>
        </ul>
    </div>
    <div id="infos">
        <h2>PLANETE N°<?= $include["datas"]["revue"]->getRev_numero() ?></h2>
        <figure class="illustration">
            <img src="<?= $include["datas"]["revue"]->getRev_couv() ?>" alt="">
        </figure>
    </div>
    <div id="auteurs">
        <h2>Auteurs</h2>
        <ul>
        <?php if($auteur != null): ?>
            <li><a href='index.php?page=article&co_revue=<?= $revue->getco_revue() ?>&personne_id=<?= $auteur->getPersonne_id() ?>'><?= $auteur->getPer_nom() ?></a></li>
        <?php else: ?>
        <?php $max = sizeof($include['datas']['auteurs']); ?>
            <?php for($i=0; $i<$max; $i++): ?>
                <li><a href='index.php?page=article&co_revue=<?= $include["datas"]["revue"]->getco_revue() ?>&personne_id=<?= $include['datas']['auteur'][$i]['personne_id'] ?>'><?= $include['datas']['auteur'][$i]['per_nom'] ?></a></li>
            <?php endfor ?>
        <?php endif ?>
        </ul>
    </div>
</section>
