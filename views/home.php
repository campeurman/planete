<h2>Inscrivez-vous</h2>

 <section class="row bg-light">
     <div class="col-6">
        <form action="index.php?page=insert_user" method="POST">
            <div>
                <label> Pseudo </label>
                <input type='text' id='pseudo' name='pseudo' placeholder="Votre pseudo">
            </div>
            <div>
                <label> Mot de Passe </label>
                <input type='password' id='password' name='password' placeholder="Votre mot de passe" required='required'>
            </div>
            <div>
                <label> Mot de Passe </label>
                <input type='password' id='password2' name='password2' placeholder="confirmez Votre mot de passe" required='required'>
            </div>
            <div>
                <input type='submit' id='valider' value='Soumettre'>
            </div>
        </form>
    </div>
     
<br>

<h2>Se connecter</h2>

     <form action="index.php?page=connect_user" method="POST">
        <div>
            <label> Pseudo </label>
            <input type='text' id='pseudo' name='pseudo' placeholder="Votre pseudo">
        </div>
        <div>
            <label> Mot de Passe </label>
            <input type='password' id='password' name='password' placeholder="Votre mot de passe" required='required'>
        </div>
        
        <div>
            <input type='submit' id='connexion' value='Connexion'>
        </div>
      </form>

    </section>
        
       