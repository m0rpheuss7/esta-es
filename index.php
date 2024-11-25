!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estação do Ano</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        .station-image {
            max-width: 300px;
            height: auto;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Descubra a Estação do Ano</h1>
    <form method="POST">
        <label for="date">Selecione uma data:</label><br>
        <input type="date" id="date" name="date" required><br><br>
        <button type="submit">Ver Estação</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['date'])) {
        // Obtém a data inserida pelo usuário
        $inputDate = $_POST['date'];
        $date = strtotime($inputDate);
        $day = (int)date('d', $date);
        $month = (int)date('m', $date);

        $season = '';
        $image = '';

        // Define as estações do ano
        if (($month == 12 && $day >= 21) || $month == 1 || $month == 2 || ($month == 3 && $day < 20)) {
            $season = 'Verão';
            $image = 'https://i.pinimg.com/736x/08/d4/d2/08d4d22f7186f791d374a2620984b8f7.jpg';
        } elseif (($month == 3 && $day >= 20) || $month == 4 || $month == 5 || ($month == 6 && $day < 21)) {
            $season = 'Outono';
            $image = 'https://i.pinimg.com/736x/b5/a0/74/b5a07463d15817f1be2d266cd662a962.jpg';
        } elseif (($month == 6 && $day >= 21) || $month == 7 || $month == 8 || ($month == 9 && $day < 23)) {
            $season = 'Inverno';
            $image = 'https://i.pinimg.com/736x/48/3e/60/483e6071f6aeb39fca48560cd17b709e.jpg';
        } elseif (($month == 9 && $day >= 23) || $month == 10 || $month == 11 || ($month == 12 && $day < 21)) {
            $season = 'Primavera';
            $image = 'https://i.pinimg.com/736x/05/3c/87/053c879de8111a65f3e15ca8fd3352bb.jpg';
        }

        // Exibe o resultado
        echo "<h2>Estação do Ano: $season</h2>";
        echo "<img src='$image' alt='$season' class='station-image'>";
    }
    ?>
</body>
</html>