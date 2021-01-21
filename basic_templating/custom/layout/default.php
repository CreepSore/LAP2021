<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITL - Aufgabe 1</title>
    <link rel="stylesheet" type="text/css" href="static/css/<?=$this->name?>.css">
    <script type="text/javascript" src="static/js/jquery.js"></script>
    <script type="text/javascript" src="static/js/<?=$this->name?>.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="pb-3" role="navbar">
        <ul class="nav navbar-dark bg-primary">
            <li class="nav-item"><a class="nav-link text-white" href="?page=home">Home</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="?page=personenanmeldung">Personenanmeldung</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="?page=suche">Suche</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Views</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="?page=view&viewnr=1">Anzahl Lehrberufe pro Schule</a>
                    <a class="dropdown-item" href="?page=view&viewnr=2">Keinen Lehrberuf</a>
                    <a class="dropdown-item" href="?page=view&viewnr=3">BS Schüler > 2</a>
                </div>
            </li>
        </ul>
    </nav>
    <div class="container">
        <?php include(implode('/', [__DIR__, "{$this->name}.php"])); ?>
    </div>
</body>
</html>