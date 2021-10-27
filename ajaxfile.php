<?php
$data = $_POST['data'];

    for ($i=0; $i < count($data); $i++) {
        $img = $data[$i]['imagem'];
        $extensao = $data[$i]['extensao'];
        generateImage($img, $i, $extensao);
    }

function generateImage($img, $i, $extensao)
{
    $folderPath = "img/";

    $image_parts = explode(";base64,", $img);

    $image_type_aux = explode("image/", $image_parts[0]);

    $image_type = $image_type_aux[1];

    $image_base64 = base64_decode($image_parts[1]);

    $file = $folderPath . uniqid() .'_00'.$i.'.'.$extensao;

    $extensaoFilter = ["jpg", "jpeg", "png"];

    if (in_array($extensao, $extensaoFilter)) {
        file_put_contents($file, $image_base64);
    }
}
