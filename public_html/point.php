<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <title>1ITF Sass BS4 project</title>
</head>
<body>


<?php if(isset($_GET["pointId"])): ?>
    <h1>request ok</h1>
    <!-- Container -->
    <section class="py-6 bg-gray-100">
        <div class="container">


            <?php
            $Id = $_GET["pointId"];

            // Read JSON file
            $json = file_get_contents('./data.json');

            //Decode JSON
            $json_data = json_decode($json,true);
            $point = $json_data[$Id];

            ?>

            <div class="row">
                <div class="col-4">
                    <img src="img/test.jpg" alt="" style="width:100%">
                </div>
                <div class="col-8">
                    <h2><?php echo $point["Name"]; ?> </h2>
                    <p><?php echo $point["Description"]; ?> </p>
                    <hr>

                    <p class="text-gray-500 text-sm my-3"><i class="far fa-clock mr-2"></i><?php echo $point["Date"]["LastVisited"]; ?></p>

                    <div class="row">
                        <div class="col-4">Moeilijk : </div>
                        <div class="col-8 p-1">
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $point["Quality"]["Difficult"]*10;?>%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="10"><?php echo $point["Quality"]["Difficult"];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">Size : </div>
                        <div class="col-8 p-1">
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $point["Quality"]["Size"]*10;?>%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="10"><?php echo $point["Quality"]["Size"];?></div>
                            </div>
                        </div>
                    </div>

                    <p>kategorie : <span class="text-success"><?php echo $point["Quality"]["Categorie"];?></span></p>


                </div>



            </div>
        </div>
    </section>
    <!--End Container-->




<?php else: ?>
    <h1>Sorry de pagina is niet ok!</h1>


<?php endif; ?>








<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<!--custom scripts-->
</body>
</html>