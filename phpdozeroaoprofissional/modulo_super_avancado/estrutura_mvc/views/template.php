<!DOCTYPE html>
<head>
    <head>
        <meta charset = "utf-8" />
        <title>Meu site</title>
        <link rel = "stylesheet" type = "text/css" href = "<?= BASE_URL ?>assets/css/style.css" />
        <script type = "text/javascript" src="<?= BASE_URL ?>assets/js/script.js"> </script>
    </head>

    <body>
        <h1>Esse é o meu topo</h1>
        <a href = "<?= BASE_URL; ?> ">Home</a>
        <a href = "<?= BASE_URL; ?>galeria" >Galeria</a>
        ...
        <hr />

        <?= $this -> loadViewInTemplate($viewName, $viewData); ?>
    </body>
</head>
