<?php


$listChars = [
    'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
    '0123456789',
    '!?&%$<>^+-*/()[]{}@#_='
];

// se non è stata scelta una tipologia di caratteri l'array per l'estrazione è completo
// altrimenti assume il valore passato
$characters = $_GET['characters'] ?? [0,1,2];

require_once 'functions.php';

// se invio la lunghezza della psw
if(!empty($_GET['length'])){
    // controllo la lunghezza
    if($_GET['length'] < 8 || $_GET['length'] > 32){
        $output = "Errore! La lunghezza deve essere compresa fra 8 e 32";
    }else{
        // genero la psw
        // andrà in sessione....
        $password = generatePassword($_GET['length'], $listChars, $characters);
        $output = $password;
        session_start();
        $_SESSION['password'] = $password;
        header('Location: ./success.php');
    }
}else{
    // se non invio la lunghezza della psw
    $output = "Generare un password di lunghezza compresa fra 8 e 32";
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Strong Password Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div class="wrapper">

        <div class="container mb-3 pt-3">

            <div class="row justify-content-center">

                <div class="col-12 text-center">
                    <h1 class="text-white-50">Strong Password Generator</h1>
                    <h2 class="text-white">Genera una password sicura</h2>
                </div>

                
                    <div class="col-7">
                        <div class="alert alert-info" role="alert">
                            <?php echo htmlspecialchars($output) ?>
                        </div>
                    </div>
               

                <div class="col-7">
                    <form class="p-3 border border-1 rounded-2 bg-light" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                        <div class="row mb-3">
                            <label for="length" class="col-sm-7 col-form-label">Lunghezza password:</label>
                            <div class="col-sm-3">
                                <input type="number" name="length" id="length" class="form-control">
                            </div>
                        </div>
                        <fieldset class="row mb-3">

                            <legend class="col-form-label col-sm-7 pt-0">Consenti ripetizioni di uno o più caratteri:</legend>
                            <div class="col-sm-5">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="allow-duplicates" id="allow-duplicates" checked value="1">
                                    <label class="form-check-label" for="allow-duplicates">
                                        Sì
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="allow-duplicates" id="allow-duplicates2" value="0">
                                    <label class="form-check-label" for="allow-duplicates2">
                                        No
                                    </label>
                                </div>

                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <div class="col-sm-5 offset-sm-7">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="characters[]" id="characters1" value="0">
                                    <label class="form-check-label" for="characters1">
                                        Lettere
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="characters[]" id="characters2" value="1">
                                    <label class="form-check-label" for="characters2">
                                        Numeri
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="characters[]" id="characters3" value="2">
                                    <label class="form-check-label" for="characters3">
                                        Simboli
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="submit" value="submit" class="btn btn-primary">Invia</button>
                            <button type="reset" class="btn btn-secondary">Annulla</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>

</body>

</html>