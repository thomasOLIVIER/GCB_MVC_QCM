 <div id="contenu">
    <h2>Les thèmes</h2>
    <h3>Thème &agrave; s&eacute;lectionner : </h3>
    <form action="index.php?uc=gererQcm&action=saisirQcm" method="post">
        <div class="corpsForm">

            <p>

                <label for="lstMois" accesskey="n">Thèmes : </label>
                <select id="lstMois" name="lstMois">
                    <?php
                    foreach ($lesThemes as $unTheme) {
                        $libelle = $unTheme['libelle'];
                        $id = $unTheme['identifiant'];
                        if ($mois == $moisASelectionner) {
                            ?>
                            <option selected="selected" value="<?php echo $mois ?>"><?php echo $numMois . "/" . $numAnnee ?> </option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $mois ?>"><?php echo $numMois . "/" . $numAnnee ?> </option>
                            <?php
                        }
                    }
                    ?>    

                </select>
            </p>
        </div>
        <div class="piedForm">
            <p>
                <input id="ok" type="submit" value="Valider" size="20" />
                <input id="annuler" type="reset" value="Effacer" size="20" />
            </p> 
        </div>

    </form>