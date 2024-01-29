<?php
/*
Creare una web app con un bottone che genera e mostra una password di 16 caratteri casuali.

	1. Sarà necessario utilizzare un set di caratteri come questo sul quale iterare:
	$charset = [
	        'abcdefghijklmnopqrstuvwxyz', // Tutti i caratteri minuscoli
	        'ABCDEFGHIJKLMNOPQRSTUVWXYZ', // Tutti i caratteri maiuscoli
	        '0123456789', // Numeri da 0 a 9
	        '!@#$%^&*(){}[]', // Alcuni caratteri speciali
	    ];
	
	2. Bisognerà scegliere casualmente su quale set di caratteri iterare per ogni carattere.
	3. Una volta scelto il set, bisognerà prendere casualmente un carattere della stringa ed inserirlo nella password.
	4. Infine, mostrare la password di 16 caratteri a schermo.

*/

$charset = [
    'abcdefghijklmnopqrstuvwxyz', // Tutti i caratteri minuscoli
    'ABCDEFGHIJKLMNOPQRSTUVWXYZ', // Tutti i caratteri maiuscoli
    '0123456789', // Numeri da 0 a 9
    '!@#$%^&*(){}[]', // Alcuni caratteri speciali
];


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Generare la password
        $password = '';

        // Ciclo per il numero di carattare
        for ($i = 0; $i < 16; $i++) {
            
        $selected_set = random_int(0, 3); 

        $set_len = strlen($charset[$selected_set]);

        // Ciclo interno per il carattere random della stringa
        $password .=  $charset[$selected_set][random_int(0, $set_len -1)];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="css/app.css">
    <script src="js/app.js" defer></script>
</head>

<body>
    <div id="app" class="container flex flex-col items-center gap-2 mx-auto max-w-[800px] pt-5">
        <h1 class="text-3xl text-black font-semibold">Password Generator</h1>

        <form method="POST">
            <button type="submit" class="bg-sky-500 p-3 rounded">Generate Password</button>
        </form>

        <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                echo "Password generata: " . $password;
            }
        ?>
        
    </div>
</body>

</html>
