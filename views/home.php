<section class="sm-col lg-row bg-light">
     <div class="form sm-col-12 lg-col-6">
        <h2>Inscrivez-vous</h2>
   
        <form class="sm-col" action="index.php?page=insert_user" method="POST">
            <div class="sm-row">
                <label> Pseudo </label>
                <input type='text' id='pseudo' name='pseudo' placeholder="Votre pseudo">
            </div>
            <div class="sm-row">
                <label> Mot de Passe </label>
                <input type='password' id='password' name='password' placeholder="Votre mot de passe" required='required'>
            </div>
            <div class="sm-row">
                <label> Mot de Passe </label>
                <input type='password' id='password2' name='password2' placeholder="confirmez Votre mot de passe" required='required'>
            </div>
            <div class="sm-row">
                <input type='submit' id='valider' value='Soumettre'>
            </div>
        </form>
    </div>
     
    <div class="form sm-col-12 lg-col-6">
        <h2>Se connecter</h2>

        <form class="sm-col" action="index.php?page=connect_user" method="POST">
            <div class="sm-row">
                <label> Pseudo </label>
                <input type='text' id='pseudo' name='pseudo' placeholder="Votre pseudo">
            </div>
            <div class="sm-row">
                <label> Mot de Passe </label>
                <input type='password' id='password' name='password' placeholder="Votre mot de passe" required='required'>
            </div>
            
            <div class="sm-row">
                <input type='submit' id='connexion' value='Connexion'>
            </div>
        </form>
    </div>

</section>
        
       