<?php
/* Задание
1 Позвольте загружать только файлы размером меньше 8Мб. 
Сделайте это с помощью сравнения с $_FILES['attachment']['size'].

2 Разрешите загружать картинки 
с шириной не более 1280px и высотой не более 720px.
*/
if (!empty($_FILES['attachment'])) {
    $file = $_FILES['attachment'];

    $srcFileName = $file['name'];
    $newFilePath = __DIR__ . '/uploads/' . $srcFileName;
    $maxWidth = 960;   
    $maxHeight = 1280; 

    $sizeImage = getimagesize($file['tmp_name']);
    if ($sizeImage) {
        $fileWidth = $sizeImage[0];   
        $fileHeight = $sizeImage[1];
    } else {
        $error = 'Не удаось получить размер изображения';
    }
     
    $allowedExtensions = ['jpg', 'png', 'gif'];
    $extension = pathinfo($srcFileName, PATHINFO_EXTENSION);
    if (!in_array($extension, $allowedExtensions)) {
        $error = 'Загрузка файлов с таким расширением запрещена!';
    } elseif ($file['error'] !== UPLOAD_ERR_OK) {
        $error = 'Ошибка при загрузке файла. ' . $file['error'];
    } elseif (file_exists($newFilePath)) {
        $error = 'Файл с таким именем уже существует';
    } elseif ($file['size'] >= 8388608) {
        $error = 'Размер файла больше 8Мб';
    } elseif ($fileHeight > $maxHeight || $fileWidth > $maxWidth) {
        $error = 'Размер изображения превышает разрешённый';
    } elseif (!move_uploaded_file($file['tmp_name'], $newFilePath)) {
        $error = 'Ошибка при загрузке файла';
    } else {
        $result = 'http://myproject.loc/workingWithFiles/uploads/' . $srcFileName;
    }
}

?>
<html>
<head>
    <title>Загрузка файла</title>
</head>
<body>
<?php if (!empty($error)): ?>
    <?= $error ?>
<?php elseif (!empty($result)): ?>
    <?= $result ?>
<?php endif; ?>
<br>
<form action="/workingWithFiles/upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="attachment">
    <input type="submit">
</form>
</body>
</html>