<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

if (!empty($_GET['search'])) {
    $category = $_GET['search'];
    $filteredHotels = [];
    foreach ($hotels as $hotel) {
        if ($hotel['parking']) {
            $filteredHotels[] = $hotel;
        }
    }
} else {
    $filteredHotels = $hotels;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="mt-5 d-flex justify-content-between container">
            <h1>Scegli il tuo Hotel!</h1>
            <div>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                    <label for="search" class="me-2">Filtra per..</label>
                    <select name="search" id="search" class="me-2">
                        <option value="">Tutti</option>
                        <option value="true">Con parcheggio</option>
                    </select>
                    <button type="submit">Cerca</button>
                </form>
            </div>
        </div>

    </header>
    <main class="container">
    <table class="table text-center mt-4">
        <thead>
            <tr>
                <th scope="col">Hotel</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parcheggio</th>
                <th scope="col">Voto</th>
                <th scope="col">Distanza dal centro</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($filteredHotels as $hotel) { ?>
                <tr>
                    <td><?php echo $hotel['name'] ?></td>
                    <td><?php echo $hotel['description'] ?></td>
                    <td><?php
                        if ($hotel['parking']) {
                            echo 'Sì';
                        } else {
                            echo 'No';
                        } ?>
                    </td>
                    <td><?php echo $hotel['vote'] ?></td>
                    <td><?php echo $hotel['distance_to_center'] ?></td>


                </tr>
            <?php } ?>
        </tbody>
    </table>
    </main>
    
</body>

</html>