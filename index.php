<?php
require_once __DIR__ . '/vendor/autoload.php';

$data = new \Tugas\Dac\Repository\UserRepository(\Tugas\Dac\Config\Database::getConnection());
$sortScore = new \Tugas\Dac\Service\ScoreService();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tugas DAC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .avatar {
            font-size: 14px;
            width: 2em;
            height: 2em;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .avatar::after {
            content: attr(data-label);
            font-family: 'Radex Pro', sans-serif;
            color: white;
        }
    </style>

</head>
<body>

<div class="container-fluid">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                <use xlink:href="#bootstrap"/>
            </svg>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-dark">Home</a></li>
            <li><a href="#" class="nav-link px-2 link-secondary">Scores</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Event</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Forums</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Guide</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-secondary me-2">Login</button>
            <button type="button" class="btn btn-secondary">Sign-up</button>
        </div>
    </header>

    <div class="container-fluid px-5">
        <h5 class="">Period 2022</h5>
        <table class="table">
            <thead>
            <tr class="text-center">
                <th scope="col">Rank</th>
                <th scope="col">Name</th>
                <th scope="col">Score</th>
                <th scope="col">Time spent</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data->scoreJoinUser() as $key => $value) : ?>

                <tr 
                        class="<?php if ($key == 0) : ?> bg-warning bg-opacity-10 <?php endif; ?>
                               <?php if ($key == 1) : ?> bg-success bg-opacity-10 <?php endif; ?>
                               <?php if ($key == 2) : ?> bg-secondary bg-opacity-10 <?php endif; ?>">

                    <th scope="row" class="text-center"><?= $key + 1 ?></th>
                    <td>
                        <div class="avatar"
                             data-label="<?= $sortScore->nameSplitter($value->getName()) ?>"></div>&emsp;<?= $value->getName() ?>
                    </td>
                    <td class="text-center"><?= $value->getScore() ?></td>
                    <td class="text-center"><?= $value->getSpent() ?> hours</td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    const avatars = document.querySelectorAll(".avatar");
    avatars.forEach(a => {
        const charCodeRed = a.dataset.label.charCodeAt(0);
        const charCodeGreen = a.dataset.label.charCodeAt(1) || charCodeRed;

        const red = Math.pow(charCodeRed, 7) % 200;
        const green = Math.pow(charCodeGreen, 7) % 200;
        const blue = (red + green) % 200;

        a.style.background = `rgb(${red}, ${green}, ${blue})`;
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>
</html>