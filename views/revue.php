<section id="revue">
    <div id="categories">
        <h2>Catégories</h2>
    </div>
    <div id="infos">
        <h2>PLANETE N°<?= $include["datas"]["revue"]->getRev_numero() ?></h2>
        <figure class="illustration">
            <img src="<?= $include["datas"]["revue"]->getRev_couv() ?>" alt="">
        </figure>
    </div>
    <div id="auteurs">
        <h2>Auteurs</h2>
    </div>
</section>