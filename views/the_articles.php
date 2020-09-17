<?php
var_dump($include['datas']);
$revue = $include['datas']['revue'];
$rubriques = $include['datas']['rubriques'] ?? null;
$auteurs = $include['datas']['auteurs'] ?? null;
$rubrique = $include['datas']['rubrique'] ?? null;
$auteur = $include['datas']['auteur'] ?? null;
$rubrique = $include['datas']['articles'] ?? null;
$auteur = $include['datas']['article'] ?? null;
?>
<section id="revue">
    <div id="categories">
        <h2>Catégories</h2>
        <ul>
            <?php if(isset($rubriques)): ?>
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
        
<?php $max = sizeof($include['datas']['auteur']); ?>
<?php for($i=0; $i<$max; $i++): ?>
    <li><a href='index.php?page=article&co_revue=<?= $include["datas"]["revue"]->getco_revue() ?>&personne_id=<?= $include['datas']['auteur'][$i]['personne_id'] ?>'><?= $include['datas']['auteur'][$i]['per_nom'] ?></a></li>
<?php endfor ?>
</ul>
    </div>
</section>
