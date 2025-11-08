<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Slike</title>
</head>

<body>
    <h1>Upload Slike</h1>
    <form method="POST" action="upload.php" enctype="multipart/form-data">
        <input type="file" name="profileImage" required />
        <button type="submit">Upload</button>
    </form>
</body>

</html>
