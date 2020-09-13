<?php
class Livre extends DbConnect {

    private $co_revue;
    private $rev_numero;
    private $rev_moiscouverts;
    private $rev_dateparution;
    private $num_article;
    private $art_page;
    private $art_titre;
    private $rubrique_id;
    private $rub_nom;
    private $srubrique_id;
    private $srub_nom;
    private $ssrubrique_id;
    private $ssrub_nom;
    private $genre_id;
    private $gen_nom;
    private $personne_id;
    private $per_nom;
    private $per_titre;

    public function getCo_revue() {
        return $this->co_revue;
    }
     public function setCo_revue($co_revue) {
        $this->co_revue = $co_revue;
    }
     public function getRev_numero() {
        return $this->rev_numero;
    }
     public function setRev_numero($rev_numero) {
        $this->rev_numero = $rev_numero;
    }
    public function getRRev_moiscouverts() {
        return $this->rev_moiscouverts;
    }
     public function setRev_moiscouverts($rev_moiscouverts) {
        $this->rev_moiscouverts = $rev_moiscouverts;
    }
    public function getRev_dateparution() {
        return $this->rev_dateparution;
    }
     public function setRev_dateparution($rev_dateparution) {
        $this->rev_dateparution = $rev_dateparution;
    }
    public function getNum_article() {
        return $this->num_article;
    }
     public function setNum_article($num_article) {
        $this->num_article = $num_article;
    }
     public function getArt_page() {
        return $this->art_page;
    }
     public function setArt_page($art_page) {
        $this->art_page = $art_page;
    }
    public function getArt_titre() {
        return $this->art_titre;
    }
     public function setArt_titre($art_titre) {
        $this->art_titre = $art_titre;
    }
    public function getRubrique_id() {
        return $this->rubrique_id;
    }
     public function setRubrique_id($rubrique_id) {
        $this->rubrique_id = $rubrique_id;
    }
    public function getRub_nom() {
        return $this->rub_nom;
    }
     public function setRub_nom($rub_nom) {
        $this->rub_nom = $rub_nom;
    }
     public function getSrubrique_id() {
        return $this->srubrique_id;
    }
     public function setSrubrique_id($srubrique_id) {
        $this->srubrique_id = $srubrique_id;
    }
    public function getSrub_nom() {
        return $this->srub_nom;
    }
     public function setSrub_nom($srub_nom) {
        $this->srub_nom = $srub_nom;
    }
    public function getSsrubrique_id() {
        return $this->ssrubrique_id;
    }
     public function setSsrubrique_id($ssrubrique_id) {
        $this->ssrubrique_id = $ssrubrique_id;
    }
    public function getSsrub_nom() {
        return $this->ssrub_nom;
    }
     public function setSsrub_nom($ssrub_nom) {
        $this->ssrub_nom = $ssrub_nom;
    }
     public function getGenre_id() {
        return $this->genre_id;
    }
     public function setGenre_id($genre_id) {
        $this->genre_id = $genre_id;
    }
    public function getGen_nom() {
        return $this->gen_nom;
    }
     public function setGen_nom($gen_nom) {
        $this->gen_nom = $gen_nom;
    }
    public function getPersonne_id() {
        return $this->personne_id;
    }
     public function setPersonne_id($personne_id) {
        $this->personne_id = $personne_id;
    }
    public function getPer_nom() {
        return $this->per_nom;
    }
     public function setPer_nom($per_nom) {
        $this->per_nom = $per_nom;
    }
     public function getPer_titre() {
        return $this->per_titre;
    }
     public function setPer_titre($per_titre) {
        $this->per_titre = $per_titre;
    }

     function selectAll(){

    }
     function insert(){

    }
     function select(){

    }
     function update(){

    }
     function delete(){

    }

}