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
            <li><?= $rubrique->getRub_nom() ?></li>
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
        <p>date de parution : <?= $include["datas"]["revue"]->getRev_moiscouverts() ?><?= $include["datas"]["revue"]->getRev_dateparution() ?></p>
        <figure class="illustration">
            <img src="<?= $include["datas"]["revue"]->getRev_couv() ?>" alt="">
        </figure>

        <div id="articles">
        <h2>Articles</h2>
            <ul>
            <?php if(isset($article)): ?>
                <li><?= $article->getArt_titre() ?></li>
            <?php else: ?>
                <?php $max = sizeof($articles); ?>
                <?php for($i=0; $i<$max; $i++): ?>
                    <li><?= $articles[$i]->getArt_titre() ?></li>
                <?php endfor ?>
            <?php endif ?>
            </ul>
        </div>
    </div>
    
    <div id="auteurs">
        <h2>Auteurs</h2>
        <ul>
        <?php if(isset($auteur)): ?>
            <li><?= $auteur->getPer_titre() ?><?= $auteur->getPer_nom() ?></li>
        <?php else: ?>
        <?php $max = sizeof($auteurs); ?>
            <?php for($i=0; $i<$max; $i++): ?>
                <li><a href='index.php?page=article&co_revue=<?= $revue->getco_revue() ?>&personne_id=<?= $auteurs[$i]->getPersonne_id() ?>'><?= $auteurs[$i]->getPer_titre() ?><?= $auteurs[$i]->getPer_nom() ?></a></li>
            <?php endfor ?>
        <?php endif ?>
        </ul>
    </div>
</section>
