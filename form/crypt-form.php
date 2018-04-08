<?php
$dir_nom = 'musiques/'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
$fichier= array(); // on déclare le tableau contenant le nom des fichiers
$dossier= array(); // on déclare le tableau contenant le nom des dossiers

while($element = readdir($dir)) {
    if($element != '.' && $element != '..') {
        if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
        else {$dossier[] = $element;}
    }
}

closedir($dir);
?>
<form method="POST" action="traitement-cryptage.php" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000000000" />
    <div class="form-group">
        <label for="message">Text à cacher</label>
        <textarea class="form-control" id="message" name="message" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="musique">Musique</label><br>
        <select id="musique" name="musique">
            <?php
            if(!empty($fichier)){
                sort($fichier);// pour le tri croissant, rsort() pour le tri décroissant
                foreach($fichier as $lien) {
                    ?>
                    <option value="<?php echo $lien;?>"><?php echo $lien;?></option>
                    <?php
                }
            }
            ?>
        </select>
    </div>
    <input type="submit" name="cacher" value="Cacher" class="btn btn-primary">
</form>