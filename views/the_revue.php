<?php
$revue = $include['datas']['revue'];
$rubriques = $include['datas']['rubriques'] ?? null;
$auteurs = $include['datas']['auteurs'] ?? null;
$articles = $include['datas']['articles'] ?? null;
?>

<section id="revue" class="sm-col md-row">
    <div id="categories" class="sm-col-12 md-col-4 lg-col-3">
        <h2>Catégories</h2>
        <ul>
            <?php 
            $max = sizeof($include['datas']['rubriques']);
            for($i=0; $i<$max; $i++): ?>
                <li><a href='index.php?page=article&co_revue=<?= $include["datas"]["revue"]->getco_revue() ?>&rubrique_id=<?= $include['datas']['rubriques'][$i]['rubrique_id'] ?>'><?= $include['datas']['rubriques'][$i]['rub_nom'] ?> </a></li>
            <?php endfor ?>
        </ul>
    </div>
    <div id="infos" class="sm-col-12 md-col-4 lg-col-6">
    <h2>PLANETE N°<?= $revue->getRev_numero() ?></h2>
        <figure class="illustration">
            <figcaption>Date de parution : <?= $revue->getRev_moiscouverts() ?><?= $revue->getRev_dateparution() ?></figcaption>
            <img src="<?= $revue->getRev_couv() ?>" alt="">
        </figure>
    </div>
    <div id="auteurs" class="sm-col-12 md-col-4 lg-col-3">
        <h2>Auteurs</h2>
        <ul>
        <?php $max = sizeof($include['datas']['auteurs']); ?>
        <?php for($i=0; $i<$max; $i++): ?>
            <li><a href='index.php?page=article&co_revue=<?= $include["datas"]["revue"]->getco_revue() ?>&personne_id=<?= $include['datas']['auteurs'][$i]['personne_id'] ?>'><?= $include['datas']['auteurs'][$i]['per_nom'] ?></a></li>
        <?php endfor ?>
        </ul>
    </div>
    <!-- <div id="articles" class="sm-col-12">
            <h2>Articles</h2>
            <ul>
            <?php $max = sizeof($articles); ?>
                <?php for($i=0; $i<$max; $i++): ?>
                    <li><?= $articles[$i]['art_titre'] ?></li>
                <?php endfor ?>
            </ul>
        </div> -->
</section>
