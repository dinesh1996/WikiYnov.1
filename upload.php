<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
require 'uploding.php';


if (isset($_POST['upload'])) {
// create a whitelist of the extensions
    $allowedExts = array('gif', 'jpeg', 'jpg', 'png', 'pdf', 'avi', 'mp4');
// obtain the extension of the uploaded file and storeit in a variable
    $explode = explode('.', $_FILES['file']['name']);
    $extension = mb_strtolower(end($explode));


//echo finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['file']['tmp_name']);
// validate the content-type header of uploaded file
    if ((($_FILES['file']['type'] == 'image/gif')
            || ($_FILES['file']['type'] == 'image/jpeg')
            || ($_FILES['file']['type'] == 'image/jpg')
            || ($_FILES['file']['type'] == 'image/pjpeg')
            || ($_FILES['file']['type'] == 'image/x-png')

            || ($_FILES['file']['type'] == 'image/png')
            || ($_FILES['file']['type'] == 'video/x-msvideo')
            || ($_FILES['file']['type'] == 'video/mp4')
            || ($_FILES['file']['type'] == 'application/pdf'))
        && ($_FILES['file']['size'] < 1000000000)
// validate file extension
        && in_array($extension, $allowedExts)
// check file content and derive the actual content-type, the validate it with the allowed content-types
        && (finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['file']['tmp_name']) == 'image/gif'
            || finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['file']['tmp_name']) == 'image/jpeg'
            || finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['file']['tmp_name']) == 'image/jpg'
            || finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['file']['tmp_name']) == 'image/pjpeg'
            || finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['file']['tmp_name']) == 'image/x-png'
            || finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['file']['tmp_name']) == 'image/png'
            || finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['file']['tmp_name']) == 'video/x-msvideo'
            || finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['file']['tmp_name']) == 'application/pdf')
    ) {


        if (!file_exists('upload/' . $_FILES['file']['name'])) {

            move_uploaded_file($_FILES['file']['tmp_name'], "upload/" . time() . "idUsers=" . "." . $extension);//recup id user
            echo 'votre fichier a bien été uploadé merci ';
            $uploding = new uploding();
            $uploding->setNamefile(time() . "idUsers=" . "." . $extension);
            $uploding->Add($uploding);

        } else {


            echo $_FILES['file']['name'] . '    existe déjà. ';
        }
    } else {


        echo 'Erreur :  votre fichier ne respectes pas les régles d\' upload  . . <br>';
    }


}

?>


<html>
<head>
    <title>File Uploading Form</title>
</head>
<body>
<h3 align='center'>File Upload:</h3>
<p align='center'>Select a file to upload:</p>
<!– encryption type is added to tell that the form input is a file –>
<div align='center'>
    <form action='upload.php' method='post' enctype='multipart/form-data'>
        <input type='file' name='file' size='50'/>
        <p></p>
        <input type='submit' name="upload" value='Upload File'/>
    </form>
    <div>
</body>
</html>

