<?php
$revue = $include['datas']['revue'];
$rubriques = $include['datas']['rubriques'];
$auteur = $include['datas']['auteur'];
$articles = $include['datas']['articles'] ?? null;
$article = $include['datas']['article'] ?? null;
?>

<section id="revue">
    <div id="categories">
        <h2>Catégories</h2>
        <ul>
            <?php $max = sizeof($rubriques);
            for($i=0; $i<$max; $i++): ?>
                <li><a href='index.php?page=article&co_revue=<?= $revue->getco_revue() ?>&rubrique_id=<?= $rubriques[$i]->getRubrique_id() ?>&personne_id=<?= $auteur->getPersonne_id() ?>'><?= $rubriques[$i]->getRub_nom() ?> </a></li>
            <?php endfor ?>
        </ul>
    </div>
    <div id="infos">
        <h2>PLANETE N°<?= $include["datas"]["revue"]->getRev_numero() ?></h2>
        <p>Date de parution : <?= $include["datas"]["revue"]->getRev_moiscouverts() ?><?= $include["datas"]["revue"]->getRev_dateparution() ?></p>
        <figure class="illustration">
            <img src="<?= $include["datas"]["revue"]->getRev_couv() ?>" alt="">
        </figure>

        <div id="articles">
            <?php if(isset($article)): ?>
                <h2><?= $article->getArt_Titre() ?></h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, rem.</p> 
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab hic quae sequi illo tempora, mollitia, illum minus, ad debitis nisi quis delectus perferendis perspiciatis eius distinctio cum nostrum aut sit. Assumenda quam hic perspiciatis consequuntur temporibus nemo eveniet, dolorem, nulla consequatur, reiciendis iste eum sequi! Eaque quod nulla amet reprehenderit? Quaerat, repudiandae?</p>
            <?php else: ?>
                <h2>Articles</h2>
                <ul>
                <?php $max = sizeof($articles); ?>
                <?php for($i=0; $i<$max; $i++): ?>
                    <li><a href='index.php?page=article&co_revue=<?= $revue->getco_revue() ?>&personne_id=<?= $auteur->getPersonne_id() ?>&num_article=<?= $articles[$i]->getNum_article() ?>'><?= $articles[$i]->getArt_titre() ?></a></li>
                <?php endfor ?>
                </ul>
            <?php endif ?>
        </div>
    </div>
    
    <div id="auteurs">
        <h2>Auteurs</h2>
        <ul>
            <li><?= $auteur->getPer_titre() ?><?= $auteur->getPer_nom() ?></li>
        </ul>
    </div>
</section>
