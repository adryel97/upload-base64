<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>


    <style type="text/css">
        #preview img{
            margin: 5px;
        }

        .sortable { list-style-type: none; margin: 0; padding: 0; width: 450px; }
        .sortable li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 100px; height: auto; font-size: 4em; text-align: center; }
    </style>
</head>
<body>
    <form method='post' id="formularioFiles" enctype="multipart/form-data">
        <input type="file" id='files' name="files[]" multiple><br>
        <input type="button" id="submit" value='Upload'>
        <button class="cancelar">cancelar</button>
    </form>
    <!-- Preview -->
    <ul  id='preview' class="sortable"></ul>
    <script src="script.js?v=<?=time()?>"></script>
</body>
</html>