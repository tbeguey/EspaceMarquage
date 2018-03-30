<?php header('Content-Type: text/html; charset=utf-8'); ?>

</br>

<div class="container">
    <div class="row">
        <div class="col s6" id="connection-div">
            <h2> Déjà inscrit ? </h2>
            <form action="<?php echo base_url(); ?>connexion/login/" method="post">
                <div class="col s6 offset-s3">
                    <label for="connection-mail">Adresse mail</label>
                    <input type="text" name="connection-mail"/>
                    <label for="connection-password">Mot de passe</label>
                    <input type="password" name="connection-password"/>
                </div>
                <div class="col s6 offset-s3">
                    <input type="checkbox" id="remember_checkbox" name="remember-checkbox"/>
                    <label for="remember_checkbox">Se souvenir de moi</label>
                </div>
                <div class="col s6 offset-s3" style="margin-bottom: 15px; margin-top: 15px;">
                    <a href="">Mot de passe oublié ?</a>
                </div>
                <div class="col s2 offset-s5">
                    <input class="btn waves-light waves-effect green" style="padding-top:9px;" type="submit" value="VALIDER"/>
                </div>
            </form>
        </div>
        <div class="col s6" id="inscription-div">
            <h2> Pas encore inscrit ? </h2>
            <h6>Vous n'avez juste qu'à remplir ce formulaire, nous étudirons votre requete et vous enverons un mail lorsque vous pourrez connecter.</h3>
            </br>
            <form action="<?php echo base_url(); ?>connexion/register/" method="post">
                <div class="col s6 offset-s3">
                    <label for="inscription-mail">Adresse mail</label>
                    <input type="text" name="inscription-mail"/>
                    <label for="inscription-password">Mot de passe</label>
                    <input type="password" name="inscription-password"/>
                    <label for="inscription-name">Enseigne</label>
                    <input type="text" name="inscription-name"/>
                </div>
                <div class="col s2 offset-s5">
                    <input class="btn waves-light waves-effect green" style="padding-top:9px;" type="submit" value="VALIDER"/>
                </div>
            </form>
        </div>
    </div>
</div>
