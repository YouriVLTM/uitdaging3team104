<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="css/yourivanlaer.css">
    <title>1ITF Sass BS4 project</title>
</head>
<body class="background2-img">

<!--Nav-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="logo/logo.svg" alt="" style="height:50px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Benodigdheden</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="overzicht.php">Overzicht</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="extreem.html">extreem geocaching</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nieuws</a>
                </li>

            </ul>
        </div>
    </div>
</nav>


<!--END nav-->

<?php if(isset($_GET["pointId"])): ?>

    <?php
    $Id = $_GET["pointId"];

    // Read JSON file
    $json = file_get_contents('./data.json');

    //Decode JSON
    $json_data = json_decode($json,true);
    //kijken of json $Id bestaat


    if($Id>=0 && sizeof($json_data)>$Id):

        $key = array_search($Id, array_column($json_data, 'Id'));
        $point = $json_data[$key];

    ?>

    <!-- Container -->
    <section class="py-6 bg-gray-100 mt-7 mb-5">
        <div class="container">
            <div class="card shadow border-0 h-100">
                <div class="card-body">

                    <div class="clearfix">
                        <div class="float-left">
                            <a href="overzicht.php"><i class="fa fa-long-arrow-alt-left mr-2"></i>Back to</a>
                        </div>
                        <div class="float-right">
                            <i class="fas fa-heart pr-2"></i><?php echo $point["visitors"];?>
                        </div>
                    </div>

            <div class="row mt-3">
                <div class="col-sm-12 col-md-4 ">
                    <img class="rounded img-fluid" src="img/<?php echo $point["PictureUrl"];?>" alt="">
                </div>
                <div class="col-sm-12 col-md-8 ">
                    <div class="d-flex flex-row bd-highlight mb-3 align-items-center">
                        <div class="p-2 bd-highlight">
                            <img src="img/pot.png" alt="" style="height:50px">
                        </div>
                        <div class="p-2 bd-highlight">
                            <h2><?php echo $point["Name"]; ?> </h2>
                        </div>
                    </div>


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

                    <?php if($point["Quality"]["Categorie"] == "easy"): ?>
                        <p>Categorie : <span class="badge badge-pill badge-success"><?php echo $point["Quality"]["Categorie"];?></span></p>
                    <?php else: ?>
                        <p>Categorie : <span class="badge badge-pill badge-danger"><?php echo $point["Quality"]["Categorie"];?></span></p>
                    <?php endif; ?>

                    <p>
                        <!--bereikbaarheid-->
                        <?php foreach($point["Quality"]["Reachability"] as $Reachability):?>
                            <a data-toggle="tooltip" data-placement="top" title="<?php echo $Reachability["Name"]; ?>"><i class="tooltipIcon <?php echo $Reachability["Icon"]; ?> fa-lg"></i></a>
                        <?php endforeach ?>
                    </p>

                </div>



            </div>



            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <h2>Locatie</h2>
                    <hr>

                    <div class="d-flex flex-row bd-highlight mb-2">
                        <div class="p-2 bd-highlight">
                            <p><code><?php echo $point["Location"]["Latitude"]; ?>, <?php echo $point["Location"]["Longitude"]; ?></code></p>
                        </div>
                        <div class="p-2 bd-highlight">
                            <p><?php echo $point["Location"]["Stad"]; ?> </p>
                        </div>
                    </div>


                </div>
            </div>

           <div class="row">
               <div class="col-sm-12 col-md-8">
                   <h2>Reviews</h2>
                   <hr>
                    <div class="row">
                        <div class="col-sm-2 col-lg-1">
                            <p><i class="fas fa-user-circle fa-3x"></i></p>
                        </div>
                        <div class="col-sm-10 col-lg-11">
                            <p>Youri Van Laer <span>2 min geleden</span></p>
                            <p>Deze gelogd tijdens het rondje Nature & Adventure</p>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-2 col-lg-1">
                            <p><i class="fas fa-user-circle fa-3x"></i></p>
                        </div>
                        <div class="col-sm-10 col-lg-11">
                            <p>Youri Van Laer <span>2 min geleden</span></p>
                        </div>
                    </div>
                </div>
           </div>

                </div>
            </div>
        </div>

    </section>
    <!--End Container-->


    <?php else: ?>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Error</h1>
                <p class="lead">Sorry deze pagina is niet gevonden!</p>
            </div>
        </div>

    <?php endif; ?>

<?php else: ?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Error</h1>
            <p class="lead">Sorry get request is niet gevonden!</p>
        </div>
    </div>


<?php endif; ?>








<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });

</script>
<!--custom scripts-->
</body>
</html>