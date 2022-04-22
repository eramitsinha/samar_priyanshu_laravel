<form action="upload_file" method="post" enctype="multipart/form-data">
    @csrf
    Upload File :
    <input type="file" name="f1">
    <br><br>
    <input type="submit" value="Upload">
</form>
