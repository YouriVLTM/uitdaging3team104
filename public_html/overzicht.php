<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Geocaching">
    <meta name="author" content="Youri Van Laer">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Overzicht pagina</title>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="css/yourivanlaer.css">


    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#818338">
    <meta name="msapplication-TileColor" content="#818338">
    <meta name="theme-color" content="#818338">


    <style>
    #mapid {
    width: 100%;
    height: 500px;
    margin: 0;
    }
    </style>
    <!--Maps-->
    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>

    <!-- Mapbox GL -->
    <link href="https://api.tiles.mapbox.com/mapbox-gl-js/v0.35.1/mapbox-gl.css" rel='stylesheet' />
    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v0.35.1/mapbox-gl.js"></script>

</head>
<body class="background-img">
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
                <li class="nav-item ">
                    <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Benodigdheden</a>
                </li>
                <li class="nav-item active">
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
<section class="background3-img mt-5">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1 class="vertical" style="color:white;margin-top:76px;margin-button:76px;">Vind al u geo plaatsen</h1>
            </div>
        </div>
    </div>
</section>
<section class="mt-4 bg-gray-100">
    <div class="container-fluid">
         <div id="mapid"></div>
     </div>
 </section>

 <!-- Container -->
<section class="py-6 bg-gray-100">
    <div class="container">

        <div class="row mt-5 mb-5">
            <div class="col">
                <h1>Overzicht:</h1>
            </div>
        </div>




        <div class="row">
            <?php

            // Read JSON file
            $json = file_get_contents('./data.json');

            //Decode JSON
            $json_data = json_decode($json,true);

            //Print data
            //var_dump($json_data);

            ?>
            <?php foreach ($json_data as $point): ?>
                <!-- blog item-->
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="card shadow border-0 h-100"><img src="img<?php echo $point["PictureUrl"];?>" alt="..." class="img-fluid card-img-top">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <h5><?php echo $point["Name"];?></h5>
                                </div>
                                <div class="float-right">
                                    <i class="fas fa-heart pr-2"></i><?php echo $point["visitors"];?>
                                </div>
                            </div>


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


                            <p class="my-2 text-muted text-sm"><?php echo substr($point["Description"],0,40) . "<br>" . "..."; ?></p>
                            <a href="<?php echo 'point.php?pointId=' . $point["Id"]; ?>"  class="btn btn-link pl-0">Lees meer<i class="fa fa-long-arrow-alt-right ml-2"></i></a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>
    </div>
</section>
<!--End Container-->




<!-- Footer -->
<footer class="page-footer font-small pt-4 bg-primary">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

        <!-- Grid row -->
        <div class="row">
            <div class="col-md-4 mt-md-0 mt-3">
                Geschreven door: Van Laer Youri
            </div>

            <!-- Grid column -->
            <div class="col-md-4 mt-md-0 mt-3 footer">

                <!-- Content -->
                <a href="https://school.yourivanlaer.be/skillstaak2/index.html" target="_blank" rel="noopener">Webbureau</a></br>
                <a href="https://www.thomasmore.be/campussen/campus-geel" target="_blank" rel="noopener" >Thomas More</a>
            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
        Geocachingengo
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->

<!--<div id="map"></div>-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/leaflet-mapbox-gl.js"></script>
<script>
    var map = L.map('mapid', {
        center: [51.142467, 5.080317],
        zoom: 13
    });

    var defaultIcon = L.icon({
        iconUrl: 'img/pot.png',
        iconSize: [15, 35],
        iconAnchor: [22, 94],
        popupAnchor: [-3, -76]
    });


    <?php foreach ($json_data as $point): ?>


L.marker([<?php echo $point["Location"]["Latitude"]; ?>, <?php echo $point["Location"]["Longitude"]; ?>],
    {icon: defaultIcon}
    )
    .bindPopup("<h3><?php echo $point["Name"]; ?></h3><br><img src='img<?php echo $point["PictureUrl"];?>' style='height:130px' /><br><br><a href='point.php?pointId=<?php echo $point["Id"]; ?>'>Lees meer</a>")
            .addTo(map);

        <?php endforeach; ?>

var gl = L.mapboxGL({
    accessToken: 'no-token',
    style: 'https://raw.githubusercontent.com/osm2vectortiles/mapbox-gl-styles/master/styles/bright-v9-cdn.json'
}).addTo(map);

</script>


</body>
</html>