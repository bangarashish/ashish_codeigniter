 <!-- <form action="uploadimg" method="POST"  enctype="multipart/form-data"> -->
 <?= form_open_multipart('uploadimg') ?>
    <div class="form-group"> 
        <label> APP LOGO </label>
        <input type="file" name="image" class="form-control">
    </div>
    <input type="submit" name="submit" class="btn btn-primary">
</form>  




