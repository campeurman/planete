
<section id="revue">
    <div id="categories">
        <h2>Catégories</h2>
        <ul>
            <?php 
            $max = sizeof($include['datas']['rubriques']);
            for($i=0; $i<$max; $i++): ?>
                <li><a href='index.php?page=article&co_revue=<?= $include["datas"]["revue"]->getco_revue() ?>&rubrique_id=<?= $include['datas']['rubriques'][$i]['rubrique_id'] ?>'><?= $include['datas']['rubriques'][$i]['rub_nom'] ?> </a></li>
            <?php endfor ?>
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
        
<?php $max = sizeof($include['datas']['auteurs']); ?>
<?php for($i=0; $i<$max; $i++): ?>
    <li><a href='index.php?page=article&co_revue=<?= $include["datas"]["revue"]->getco_revue() ?>&personne_id=<?= $include['datas']['auteurs'][$i]['personne_id'] ?>'><?= $include['datas']['auteurs'][$i]['per_nom'] ?></a></li>
<?php endfor ?>
</ul>
    </div>
</section>