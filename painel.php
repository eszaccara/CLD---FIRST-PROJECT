<?php
require_once 'php/connect.php';

session_start();

if (isset($_SESSION["username"])) {
    $dadosNome = ($_SESSION["username"]);
}
if (!isset($_SESSION["username"])) {
    header("Location: /cld/index.php");
    exit();
}
if (isset($_GET["sair"])) {
    session_destroy();
    header("Location: /cld/index.php");
    exit();
}
$sql = "SELECT * FROM bd_" . $dadosNome['cld_id'];
$stmt = $pdo->query($sql);
if ($stmt->rowCount() > 0) {
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/painel.css">
        <title>Panel:
            <?php echo $dadosNome['cld_name'] . " " . $dadosNome['cld_surname'] ?>
        </title>
    </head>

    <body>
        <header>
            <div class="container-header">
                <div class="container-left">
                    <img class="logo" src="images/logo.png">
                    <h1 class="name">Welcome,
                        <?php echo $dadosNome['cld_name'] ?>.
                    </h1>
                </div>
                <div class="container-right">
                    <div class="button-upload">
                        <i class="fa-solid fa-upload"></i>
                        <a>Upload</a>
                    </div>
                    <a href="config.php"><i class="fa-solid fa-gear config"></i></a>
                </div>
            </div>
        </header>
        <main>



            <?php

            echo '<div class="divimg">';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                //echo "ID: " . $row["fileid"] . "<br>";
                //echo "Nome: " . basename($row["filepath"]) . "<br>";
                //echo "Caminho: " . $row["fileupdate"] . "<br>";
                //echo '<img class="img" src="uploadImgs/' . $dadosNome['cld_id'] . '/' . basename($row['filepath']) . '">';
                echo '<img class="img" data-fileid="' . $row["fileid"] . '" src="uploadImgs/' . $dadosNome['cld_id'] . '/' . basename($row['filepath']) . '">';
            }
            echo '</div>';

            ?>



            <div class="focus-img">
                <i class="img-close fa-regular fa-circle-xmark"></i>
            </div>
            <div class="upload-hide">
                <div class="upload-form">
                    <i class="upload-close fa-regular fa-circle-xmark"></i>
                    <form class="form" method="post" action="/cld/php/uploadImg.php" enctype="multipart/form-data"
                        name="imagem">
                        <input type="file" class="input-upload" name="imagem" required>
                        <input type="submit" class="input-submit">
                    </form>
                </div>
            </div>
        </main>
        <footer>
            <div class="logout">
                <p><a href="?sair=1">Logout</a></p>
            </div>
        </footer>
        <script>
            uploadClose = document.querySelector('.upload-close');
            uploadClose.addEventListener('click', () => {
                formUpload = document.querySelector('.upload-form');
                formUpload.classList.remove('upload-form-active');
            });
            upload1 = document.querySelector('.button-upload');
            upload1.addEventListener('click', () => {
                formUpload = document.querySelector('.upload-form');
                formUpload.classList.add('upload-form-active');
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            imgs = document.querySelectorAll('.img');
            imgs.forEach(img => {
                img.addEventListener('contextmenu', (event) => {
                    event.preventDefault();
                    var imgSrc = img.getAttribute('src');
                    var imgId = img.getAttribute('data-fileid');

                    // Solicitação assíncrona para excluir a imagem
                    $.ajax({
                        url: 'deleteImage.php',
                        method: 'POST',
                        data: { imgId: imgId, imgSrc: imgSrc },
                        success: function (response) {
                            console.log(response); // Exibir a resposta do servidor (opcional)
                            img.remove(); // Remover a imagem do DOM após a exclusão bem-sucedida
                        },
                        error: function (xhr, status, error) {
                            console.log("Erro na solicitação AJAX: " + error);
                        }
                    });
                });
            });
        </script>
        <script src="https://kit.fontawesome.com/8aaf02057a.js" crossorigin="anonymous"></script>
        <script src="js/painel.js"></script>
    </body>

    </html>
    <?php
} else {
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/painel.css">
        <title>Panel:
            <?php echo $dadosNome['cld_name'] . " " . $dadosNome['cld_surname'] ?>
        </title>
    </head>

    <body>
        <header>
            <div class="container-header">
                <div class="container-left">
                    <img class="logo" src="images/logo.png">
                    <h1 class="name">Welcome,
                        <?php echo $dadosNome['cld_name'] ?>.
                    </h1>
                </div>
                <div class="container-right">
                    <div class="button-upload">
                        <i class="fa-solid fa-upload"></i>
                        <a>Upload</a>
                    </div>
                    <a href="config.php"><i class="fa-solid fa-gear config"></i></a>
                </div>
            </div>
        </header>
        <main>
            <div class="upload">
                <svg class="animated" id="freepik_stories-image-upload" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 500 500" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    xmlns:svgjs="http://svgjs.com/svgjs">
                    <style>
                        svg#freepik_stories-image-upload:not(.animated) .animable {
                            opacity: 0;
                        }

                        svg#freepik_stories-image-upload.animated #freepik--Character--inject-2 {
                            animation: 3s Infinite linear floating;
                            animation-delay: 0s;
                        }

                        @keyframes floating {
                            0% {
                                opacity: 1;
                                transform: translateY(0px);
                            }

                            50% {
                                transform: translateY(-10px);
                            }

                            100% {
                                opacity: 1;
                                transform: translateY(0px);
                            }
                        }
                    </style>
                    <g id="freepik--background-simple--inject-2" class="animable"
                        style="transform-origin: 250.899px 250.402px;">
                        <path
                            d="M368.44,167.79C327.25,123.86,264.79,98,205.81,118.61c-49.06,17.12-89.63,59.53-111.69,106.79C78.6,258.66,70,301.75,79.45,338c8.2,31.44,34.4,45.42,64.36,47.66,47.38,3.55,94.93-1.59,142.34-.68,33.65.64,85,13.09,115-6.89,28.35-18.88,26.58-60,23.47-90.17C420,242.91,398.72,200.1,368.44,167.79Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 250.899px 250.402px;" id="els0ivvr4ytbb"
                            class="animable"></path>
                        <g id="el2an3in7ru98">
                            <path
                                d="M368.44,167.79C327.25,123.86,264.79,98,205.81,118.61c-49.06,17.12-89.63,59.53-111.69,106.79C78.6,258.66,70,301.75,79.45,338c8.2,31.44,34.4,45.42,64.36,47.66,47.38,3.55,94.93-1.59,142.34-.68,33.65.64,85,13.09,115-6.89,28.35-18.88,26.58-60,23.47-90.17C420,242.91,398.72,200.1,368.44,167.79Z"
                                style="fill: rgb(255, 255, 255); opacity: 0.7; transform-origin: 250.899px 250.402px;"
                                class="animable"></path>
                        </g>
                    </g>
                    <g id="freepik--Arrows--inject-2" class="animable" style="transform-origin: 246.507px 275.264px;">
                        <path
                            d="M119.27,313.61h-22a.5.5,0,0,1-.5-.5v-33.7H90.24a.49.49,0,0,1-.45-.28.51.51,0,0,1,0-.53l18-22.72a.51.51,0,0,1,.78,0l18,22.72a.5.5,0,0,1-.39.81h-6.56v33.7A.5.5,0,0,1,119.27,313.61Zm-21.48-1h21v-33.7a.5.5,0,0,1,.5-.5h6l-17-21.41-17,21.41h6a.5.5,0,0,1,.5.5Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 108.197px 284.654px;" id="elxbez9m5uuxc"
                            class="animable"></path>
                        <path
                            d="M340.11,313.61h-22a.5.5,0,0,1-.5-.5v-33.7h-6.56a.5.5,0,0,1-.39-.81l18.05-22.72a.51.51,0,0,1,.78,0l18.05,22.72a.5.5,0,0,1-.39.81h-6.56v33.7A.5.5,0,0,1,340.11,313.61Zm-21.48-1h21v-33.7a.5.5,0,0,1,.5-.5h6l-17-21.41-17,21.41h6a.5.5,0,0,1,.5.5Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 329.1px 284.654px;" id="eloxo3lyaozf"
                            class="animable"></path>
                        <path
                            d="M395.83,369.56h-22a.5.5,0,0,1-.5-.5v-33.7H366.8a.5.5,0,0,1-.39-.81l18-22.71a.51.51,0,0,1,.78,0l18,22.71a.5.5,0,0,1-.39.81h-6.56v33.7A.5.5,0,0,1,395.83,369.56Zm-21.47-1h21v-33.7a.5.5,0,0,1,.5-.5h6l-17-21.41-17,21.41h6a.51.51,0,0,1,.5.5Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 384.8px 340.609px;" id="el2k8shxjak5g"
                            class="animable"></path>
                        <path
                            d="M373,238.88H351a.5.5,0,0,1-.5-.5v-33.7h-6.56a.49.49,0,0,1-.45-.29.51.51,0,0,1,.06-.53l18-22.71a.52.52,0,0,1,.79,0l18,22.71a.51.51,0,0,1-.39.82h-6.56v33.7A.5.5,0,0,1,373,238.88Zm-21.47-1h21v-33.7a.5.5,0,0,1,.5-.5h6l-17-21.42-17,21.42h6a.5.5,0,0,1,.5.5Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 361.944px 209.924px;" id="elxtx6jb44ryk"
                            class="animable"></path>
                        <path
                            d="M165.16,242.81h-22a.5.5,0,0,1-.5-.5v-33.7h-6.55a.5.5,0,0,1-.4-.81l18.05-22.72a.51.51,0,0,1,.78,0l18.05,22.72a.5.5,0,0,1-.39.81h-6.56v33.7A.5.5,0,0,1,165.16,242.81Zm-21.48-1h21v-33.7a.5.5,0,0,1,.5-.5h6l-17-21.41-17,21.41h6a.5.5,0,0,1,.5.5Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 154.15px 213.854px;" id="ela13755ydw9u"
                            class="animable"></path>
                        <path
                            d="M200.16,369.56h-22a.5.5,0,0,1-.5-.5v-33.7h-6.56a.5.5,0,0,1-.39-.81l18.05-22.71a.51.51,0,0,1,.78,0l18.05,22.71a.5.5,0,0,1-.4.81h-6.55v33.7A.5.5,0,0,1,200.16,369.56Zm-21.48-1h21v-33.7a.5.5,0,0,1,.5-.5h6l-17-21.41-17,21.41h6a.5.5,0,0,1,.5.5Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 189.15px 340.609px;" id="elkystqo6ejfj"
                            class="animable"></path>
                    </g>
                    <g id="freepik--Floor--inject-2" class="animable" style="transform-origin: 254px 418.83px;">
                        <ellipse cx="254" cy="418.83" rx="102" ry="11.83"
                            style="fill: rgb(38, 50, 56); transform-origin: 254px 418.83px;" id="el59hyl7dhmf4"
                            class="animable"></ellipse>
                        <g id="elf8bh2cd5bym">
                            <ellipse cx="254" cy="418.83" rx="102" ry="11.83"
                                style="fill: rgb(255, 255, 255); opacity: 0.5; transform-origin: 254px 418.83px;"
                                class="animable"></ellipse>
                        </g>
                    </g>
                    <g id="freepik--Cloud--inject-2" class="animable" style="transform-origin: 240.181px 121.738px;">
                        <path
                            d="M319.27,134.91a37.65,37.65,0,0,0-57.94-38.24A50.8,50.8,0,0,0,163.55,116c0,.63,0,1.25,0,1.87a33.07,33.07,0,0,0,4.52,64.56v.35H317.65a24,24,0,0,0,1.62-47.86Z"
                            style="fill: rgb(38, 50, 56); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 240.181px 123.988px;"
                            id="el9ufaonh9e6t" class="animable"></path>
                        <path
                            d="M319.27,130.41a37.65,37.65,0,0,0-57.94-38.24,50.8,50.8,0,0,0-97.78,19.32c0,.63,0,1.25,0,1.87a33.07,33.07,0,0,0,4.52,64.56v.35H317.65a24,24,0,0,0,1.62-47.86Z"
                            style="fill: rgb(38, 50, 56); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 240.181px 119.483px;"
                            id="elch2hwntza3u" class="animable"></path>
                    </g>
                    <g id="freepik--Character--inject-2" class="animable animator-active"
                        style="transform-origin: 266.053px 267.513px;">
                        <path
                            d="M267.4,264.46l-6.29,3.3s-6.89,3-11.39,5.39-26.67,19.48-26.67,19.48l-4.49.3-2.7,1.8s-4.5.9-4.5,1.8.9,1.19,1.8,1.19a17.74,17.74,0,0,0,3.9-1.49s-3.05,4.46-1.85,4.46a46.7,46.7,0,0,1,5.17.83,58.66,58.66,0,0,1,6-.8c1.5,0,5.09-8.09,5.09-8.09s25.77-10.19,29.07-12.59,12.88-8.39,12.88-8.39Z"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 242.39px 282.99px;"
                            id="elo8v8fnx61e" class="animable"></path>
                        <polygon points="291.59 239.84 263.5 265.36 271.6 274.95 287.18 268.96 292.57 240.19 291.59 239.84"
                            style="fill: rgb(38, 50, 56); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 278.035px 257.395px;"
                            id="elj5vqptayb5k" class="animable"></polygon>
                        <polygon points="267.25 261.96 263.5 265.36 271.6 274.95 276.43 273.09 267.25 261.96"
                            style="fill: rgb(38, 50, 56); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 269.965px 268.455px;"
                            id="elu5aaze0fcwr" class="animable"></polygon>
                        <path
                            d="M340.62,399.53s8.92,9.28,9.83,13.83-1.27,8.56-4.91,7.46-6.92-12.37-7.83-14.37-2-4.19-2-4.19S338.44,398.62,340.62,399.53Z"
                            style="fill: rgb(38, 50, 56); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 343.183px 410.194px;"
                            id="elyllogophvy8" class="animable"></path>
                        <path
                            d="M350.53,413.85c.66,4.34-1.49,8-5,7-1.27-.37-2.49-2-3.58-4C344.33,413,348.16,413.21,350.53,413.85Z"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 346.299px 417.251px;"
                            id="elo7mkzplu4to" class="animable"></path>
                        <path
                            d="M340.71,414.22c2,2.73,4.54,5.66,6.46,5.15s2.93-4.12,3.28-6c.9,4.54-1.28,8.52-4.91,7.43C343.76,420.29,342.08,417.34,340.71,414.22Z"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 345.681px 417.176px;"
                            id="elddu2il1qryq" class="animable"></path>
                        <path d="M338.8,404.63s4-2.19,4.19-1.46-3.82,2.73-4.37,2.73S337.71,405.72,338.8,404.63Z"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; stroke-width: 0.5px; transform-origin: 340.545px 404.461px;"
                            id="el01p09mbi9hzt" class="animable"></path>
                        <path d="M339.71,405.9s4-2.18,4.19-1.45-3.82,2.73-4.37,2.73S338.62,407,339.71,405.9Z"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; stroke-width: 0.5px; transform-origin: 341.455px 405.74px;"
                            id="elhxgpbg6x5m7" class="animable"></path>
                        <path d="M340.62,407.18s4-2.19,4.19-1.46-3.82,2.73-4.37,2.73S339.53,408.27,340.62,407.18Z"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; stroke-width: 0.5px; transform-origin: 342.365px 407.011px;"
                            id="elhv50p120db6" class="animable"></path>
                        <path d="M341.53,408.45s4-2.18,4.19-1.46-3.82,2.73-4.37,2.73S340.44,409.54,341.53,408.45Z"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; stroke-width: 0.5px; transform-origin: 343.275px 408.282px;"
                            id="elvubtli8klbk" class="animable"></path>
                        <path
                            d="M268.75,407.88s3.48,4.85,3.79,7.6-2,2.82-4.94,2.51-6.45,1.86-10.59,1.75-8.93-1.92-6.63-3.89,8.3-3.59,9.6-4.72a22.53,22.53,0,0,0,2.18-2.19Z"
                            style="fill: rgb(38, 50, 56); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 261.175px 413.812px;"
                            id="eljqa71ypghwr" class="animable"></path>
                        <path
                            d="M250.38,415.85a11.87,11.87,0,0,1,2.64-1.57,8.8,8.8,0,0,1,4.34,5.46H257C252.86,419.63,248.08,417.82,250.38,415.85Z"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 253.571px 417.01px;"
                            id="eldxkory0n6o" class="animable"></path>
                        <path d="M260.36,410.49s4.27,2.23,3.19,2.67S259.23,411.1,260.36,410.49Z"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; stroke-width: 0.5px; transform-origin: 261.925px 411.851px;"
                            id="el92745deid3p" class="animable"></path>
                        <path d="M258.7,410.94s4.27,2.23,3.19,2.67S257.57,411.55,258.7,410.94Z"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; stroke-width: 0.5px; transform-origin: 260.265px 412.301px;"
                            id="el0raxjg7w5u2l" class="animable"></path>
                        <path d="M257.74,411.6s4.27,2.23,3.19,2.67S256.61,412.21,257.74,411.6Z"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; stroke-width: 0.5px; transform-origin: 259.305px 412.961px;"
                            id="elf1t3t9g361k" class="animable"></path>
                        <path d="M256,412.4s4.27,2.23,3.19,2.67S254.85,413,256,412.4Z"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; stroke-width: 0.5px; transform-origin: 257.561px 413.761px;"
                            id="eltxsbz6zqvd" class="animable"></path>
                        <path
                            d="M249.9,416.46a13.36,13.36,0,0,0,9.93,1.47,61.29,61.29,0,0,1,9.52-1.32,11.86,11.86,0,0,0,3.21-.54c-.08,2.17-2.24,2.21-5,1.92-2.94-.32-6.45,1.86-10.59,1.75C253.29,419.64,249.09,418.18,249.9,416.46Z"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 261.179px 417.907px;"
                            id="elf2l8oofgmdu" class="animable"></path>
                        <path
                            d="M312.48,301s-2.1,29.24-.83,36.33,4.4,28.2,4.4,28.2,4.74,3.46,9.47,11.1,15.1,22.93,15.1,22.93.37,2.73-2.91,3.64c0,0-1.64.73-2.55,0s-32-29.48-35.67-35.48-8.55-42.92-8.55-42.92l-4.73-.91-20,38.22,3.48,46.46s.27,1.6-2,2.25-4.1.88-5.46-.29-11.89-52.05-11-53.87,21.07-51.84,21.07-51.84l1.63-4.18s19.11,2.18,27.66.54S311.76,298.24,312.48,301Z"
                            style="fill: rgb(38, 50, 56); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 295.905px 355.377px;"
                            id="eltpg0q1c8d3g" class="animable"></path>
                        <line x1="286.21" y1="323.86" x2="275.83" y2="320.77"
                            style="fill: none; stroke: rgb(255, 255, 255); stroke-linecap: round; stroke-linejoin: round; transform-origin: 281.02px 322.315px;"
                            id="elm694gj4j27s" class="animable"></line>
                        <line x1="285.11" y1="324.41" x2="270.92" y2="322.77"
                            style="fill: none; stroke: rgb(255, 255, 255); stroke-linecap: round; stroke-linejoin: round; transform-origin: 278.015px 323.59px;"
                            id="elfjjvjdm2abu" class="animable"></line>
                        <path d="M309.22,306.66s-7.68,4.9,0,8.17"
                            style="fill: none; stroke: rgb(255, 255, 255); stroke-linecap: round; stroke-linejoin: round; transform-origin: 307.513px 310.745px;"
                            id="elwm05ahlupq" class="animable"></path>
                        <polyline points="287.48 308.66 286.3 313.38 283.14 316.54 287.08 320.08"
                            style="fill: none; stroke: rgb(255, 255, 255); stroke-linecap: round; stroke-linejoin: round; transform-origin: 285.31px 314.37px;"
                            id="el5d66i1wxs0x" class="animable"></polyline>
                        <path
                            d="M332.47,252.72c-7-5.68-15.69-12.54-15.69-12.54s-18.43-.42-25.19-.34l-9.5,30.32s-8.73,30.2-8.37,31.48,6.56,4.18,20.39,5.82,19.65-4.18,20-6a15.08,15.08,0,0,0-.36-4.92l4.73-8.37,15.65-25.74A7.49,7.49,0,0,0,332.47,252.72Z"
                            style="fill: rgb(38, 50, 56); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 304.469px 273.789px;"
                            id="elofkye7pqaw" class="animable"></path>
                        <path
                            d="M327,248.29c-5.36-4.3-10.19-8.11-10.19-8.11s-6.12-.14-12.59-.24c-1.64,3.74-4.47,11.38-2.14,15.16C304.92,259.76,314.31,261.15,327,248.29Z"
                            style="fill: rgb(38, 50, 56); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 314.098px 249.184px;"
                            id="elvi74kn73ve" class="animable"></path>
                        <path
                            d="M318.67,209s-5.27,1.46-7.46,4.73-8.55,22.39-8.37,24,8.37,0,8.37,0-5.64,11.83-5.64,13.83,2.55,3.1,5.82,2.37S325.83,234,325.83,234s3.31,3.84,5.4,2.52c2.4-1.51,1.64-4.55-.18-4.55s5.09-7.46,2.73-12.37S320.86,207.37,318.67,209Z"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 318.557px 231.462px;"
                            id="eldcv3woiz1g5" class="animable"></path>
                        <path
                            d="M316.67,203.19s-10.19,0-10.74,4.91,4.74,7.1,10.56,6.19,11.1-.55,11.83.36-7.1,2.73-5.28,4a5.88,5.88,0,0,0,3.64,1.1s-2.55.72-2.37,2.54,1.77,9.86,3,9.86,3.7-.16,3.7-.16a23,23,0,0,0,6.19-4.55c2.73-2.91,3.45-9.1,0-12.73s-6.19-7.16-8.92-10.07-5.28-6-10.74-6.73S309.21,199.36,316.67,203.19Z"
                            style="fill: rgb(38, 50, 56); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 322.708px 214.96px;"
                            id="elas7u239ql9o" class="animable"></path>
                        <path d="M337.92,222a11.53,11.53,0,0,1,.11,3.23"
                            style="fill: none; stroke: rgb(255, 255, 255); stroke-linecap: round; stroke-linejoin: round; transform-origin: 338.008px 223.615px;"
                            id="elq4akzldy509" class="animable"></path>
                        <path d="M319.22,208.93s-11.17,1.09-7,3.22,10.68-1.86,18.81,1.36a10.43,10.43,0,0,1,6.11,5.86"
                            style="fill: none; stroke: rgb(255, 255, 255); stroke-linecap: round; stroke-linejoin: round; transform-origin: 324.214px 214.15px;"
                            id="elldqn8i8b6o" class="animable"></path>
                        <path d="M326,217.41s7.63,3.73,8.64,9.15"
                            style="fill: none; stroke: rgb(255, 255, 255); stroke-linecap: round; stroke-linejoin: round; transform-origin: 330.32px 221.985px;"
                            id="el2et4j1usgi2" class="animable"></path>
                        <path d="M311.21,237.76s8.74-.54,11.1-2.54"
                            style="fill: none; stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 316.76px 236.49px;"
                            id="el0qy93spasr1n" class="animable"></path>
                        <path d="M308.48,230.48s6.37,1.82,8.19-2"
                            style="fill: none; stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 312.575px 229.697px;"
                            id="elu9bcmvwv8mq" class="animable"></path>
                        <line x1="315.58" y1="227.75" x2="318.31" y2="228.85"
                            style="fill: none; stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 316.945px 228.3px;"
                            id="elyebsvpaqp8r" class="animable"></line>
                        <path d="M310.48,222.11s-5.64.73-5.64,1.64,3.64,3.46,3.64,3.46"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 307.66px 224.66px;"
                            id="elfeqot6tyyaq" class="animable"></path>
                        <path
                            d="M311.2,220.36c-.26.79-.79,1.32-1.19,1.19s-.5-.87-.23-1.66.79-1.32,1.19-1.19S311.47,219.58,311.2,220.36Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 310.49px 220.125px;" id="elzbieoifpbh8"
                            class="animable"></path>
                        <path
                            d="M316,222.79c-.27.79-.8,1.32-1.19,1.19s-.5-.88-.24-1.66.8-1.32,1.19-1.19S316.25,222,316,222.79Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 315.283px 222.555px;" id="elsv2l41k31od"
                            class="animable"></path>
                        <path d="M316.25,217.62s2.76.25,2.5,4Z"
                            style="fill: rgb(38, 50, 56); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 317.509px 219.62px;"
                            id="elbw8t95vkeqb" class="animable"></path>
                        <path d="M313.75,215.87s-1.51-2-3.51.75Z"
                            style="fill: rgb(38, 50, 56); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 311.995px 215.894px;"
                            id="elafyhwx41non" class="animable"></path>
                        <polygon
                            points="263.53 149.31 237.19 116.16 210.86 149.31 221.16 149.31 221.16 199.22 253.23 199.22 253.23 149.31 263.53 149.31"
                            style="fill: rgb(38, 50, 56); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 237.195px 157.69px;"
                            id="elocn9rcf4dgr" class="animable"></polygon>
                        <polygon
                            points="263.53 147.16 237.19 114.01 210.86 147.16 221.16 147.16 221.16 197.07 253.23 197.07 253.23 147.16 263.53 147.16"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 237.195px 155.54px;"
                            id="el7ipbnq3d1zc" class="animable"></polygon>
                        <rect x="181.45" y="191.44" width="107.11" height="107.11"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 235.005px 244.995px;"
                            id="elo1iqlfr44yl" class="animable"></rect>
                        <rect x="186.43" y="196.42" width="97.15" height="97.15"
                            style="fill: rgb(38, 50, 56); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 235.005px 244.995px;"
                            id="eluwbxs2w2at" class="animable"></rect>
                        <path
                            d="M261.05,229.13l-22.66,23.68-17.64-4.94a6,6,0,0,0-5.13.92L186.43,270v23.61h97.15v-50l-13.9-14.49A6,6,0,0,0,261.05,229.13Z"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 235.005px 260.452px;"
                            id="elp5ja7754wwa" class="animable"></path>
                        <g id="elm857zkhwvxh">
                            <circle cx="222.46" cy="222.57" r="12.26"
                                style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 222.46px 222.57px; transform: rotate(-67.68deg);"
                                class="animable"></circle>
                        </g>
                        <path
                            d="M319.09,257.35l-26.77,27.52-40.8,11.24s-3.64-4.23-6.26-4.26-11.06,3-11.06,3-1.07,2.62,1,2.64a36.81,36.81,0,0,0,6.31-1l-11.57,2h0a3.77,3.77,0,0,0,3.69,3.18l5.21,0,8.91,1.13,8.43-2.55s39.94-4.35,42.05-4.86,36-29.6,36-29.6,3.83-3.37,2.37-7.28-8.93-6.68-8.93-6.68"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 283.436px 277.315px;"
                            id="elecn7934awiu" class="animable"></path>
                        <path
                            d="M314.26,260.22l-20.41,20.47L309,291.62l26.32-24.79a7.71,7.71,0,0,0,1.35-9.58l-.09-.14a19.42,19.42,0,0,0-7.72-7"
                            style="fill: rgb(38, 50, 56); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 315.805px 270.865px;"
                            id="elhisiclpat1e" class="animable"></path>
                        <polygon points="309.04 291.62 312.6 288.26 297.37 277.16 293.85 280.69 309.04 291.62"
                            style="fill: rgb(38, 50, 56); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 303.225px 284.39px;"
                            id="el2dyj21z39na" class="animable"></polygon>
                        <polygon points="211.36 296.53 215.21 300.69 218.94 301.1 213.15 296.14 211.36 296.53"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 215.15px 298.62px;"
                            id="elsh0wu6kva7o" class="animable"></polygon>
                        <polygon points="218.6 296.53 222.45 300.69 226.17 301.1 220.38 296.14 218.6 296.53"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 222.385px 298.62px;"
                            id="elyhl8ayd5mt" class="animable"></polygon>
                        <polygon points="218.94 301.1 214.59 295.52 217.28 295.52 222.66 301.1 220.38 301.52 218.94 301.1"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 218.625px 298.52px;"
                            id="elaak1quimdoc" class="animable"></polygon>
                        <polygon points="209.84 296.97 211.7 300.48 215.21 300.69 211.36 296.53 209.84 296.97"
                            style="fill: rgb(255, 255, 255); stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; transform-origin: 212.525px 298.61px;"
                            id="elgx555kffgtr" class="animable"></polygon>
                    </g>
                    <defs>
                        <filter id="active" height="200%">
                            <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>
                            <feFlood flood-color="#32DFEC" flood-opacity="1" result="PINK"></feFlood>
                            <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>
                            <feMerge>
                                <feMergeNode in="OUTLINE"></feMergeNode>
                                <feMergeNode in="SourceGraphic"></feMergeNode>
                            </feMerge>
                        </filter>
                        <filter id="hover" height="200%">
                            <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>
                            <feFlood flood-color="#ff0000" flood-opacity="0.5" result="PINK"></feFlood>
                            <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>
                            <feMerge>
                                <feMergeNode in="OUTLINE"></feMergeNode>
                                <feMergeNode in="SourceGraphic"></feMergeNode>
                            </feMerge>
                            <feColorMatrix type="matrix"
                                values="0   0   0   0   0                0   1   0   0   0                0   0   0   0   0                0   0   0   1   0 ">
                            </feColorMatrix>
                        </filter>
                    </defs>
                </svg>
                <p>Upload your images</p>
            </div>
            <div class="upload-hide">
                <div class="upload-form">
                    <i class="upload-close fa-regular fa-circle-xmark"></i>
                    <form class="form" method="post" action="/cld/php/uploadImg.php" enctype="multipart/form-data"
                        name="imagem">
                        <input type="file" class="input-upload" name="imagem" required>
                        <input type="submit" class="input-submit">
                    </form>
                </div>
            </div>
        </main>
        <footer>
            <div class="logout">
                <p><a href="?sair=1">Logout</a></p>
            </div>
        </footer>
        <script>
            upload2 = document.querySelector('.upload');
            upload1 = document.querySelector('.button-upload');
            upload1.addEventListener('click', () => {
                formUpload = document.querySelector('.upload-form');
                formUpload.classList.add('upload-form-active');
            });
            upload2.addEventListener('click', () => {
                formUpload = document.querySelector('.upload-form');
                formUpload.classList.add('upload-form-active');
            });
            uploadClose = document.querySelector('.upload-close');
            uploadClose.addEventListener('click', () => {
                formUpload = document.querySelector('.upload-form');
                formUpload.classList.remove('upload-form-active');
            });
        </script>
        <script src="https://kit.fontawesome.com/8aaf02057a.js" crossorigin="anonymous"></script>
        <script src="js/painel.js"></script>
    </body>

    </html>

    <?php
}
?>