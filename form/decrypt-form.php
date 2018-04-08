<form method="POST" action="traitement-decryptage.php" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
    <div class="form-group">
        <label for="musique">Musique</label>
        <input type="file" class="form-control-file" id="musique" name="musique">
    </div>
    <input type="submit" name="decrypter" value="Decrypt" class="btn btn-primary">
</form>