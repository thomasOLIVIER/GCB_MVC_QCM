﻿ <div id="contenu">
    <h2>Mes Notes</h2>
    <h3>Date &agrave; s&eacute;lectionner : </h3>
    <form action="index.php?uc=etatFrais&action=voirEtatFrais" method="post">
        <div class="corpsForm">

            <p>

                <label for="lstMois" accesskey="n">Date : </label>
                <select id="lstMois" name="lstMois">
                    <?php
                    foreach ($lesMois as $unMois) {
                        $mois = $unMois['date'];
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