<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Overzicht pagina</title>
    <style>
        /* Always set the map height explicitly to define the size of the div
           * element that contains the map. */

        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

    </style>

</head>
<body>
<!--Nav-->

<!--END nav-->

<!-- Container -->
<section class="py-6 bg-gray-100 background-img">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-8">
                <h2>All locations</h2>
            </div>
            <div class="col-md-4 d-md-flex align-items-center justify-content-end"><a href="blog.html" class="text-muted text-sm">

                See all articles<i class="fas fa-angle-double-right ml-2"></i></a></div>
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
                <div class="card shadow border-0 h-100"><img src="https://d19m59y37dris4.cloudfront.net/directory/1-1/img/photo/photo-1512917774080-9991f1c4c750.jpg" alt="..." class="img-fluid card-img-top">
                    <div class="card-body">
                        <h5 class="my-2"><?php echo $point["Name"];?></h5>
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

                        <p>
                        <!--bereikbaarheid-->
                        <?php foreach($point["Quality"]["Reachability"] as $Reachability):?>
                            <a data-toggle="tooltip" data-placement="top" title="<?php echo $Reachability["Name"]; ?>"><i class="tooltipIcon <?php echo $Reachability["Icon"]; ?> fa-lg"></i></a>
                        <?php endforeach ?>
                        </p>


                        <p class="my-2 text-muted text-sm"><?php echo $point["Description"]; ?></p>
                        <a href="<?php echo 'point.php?pointId=' . $point["Id"]; ?>"  class="btn btn-link pl-0">Read more<i class="fa fa-long-arrow-alt-right ml-2"></i></a>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>


        </div>
    </div>
</section>
<!--End Container-->



<!--Footer-->

<!--END Footer-->

<!--<div id="map"></div>-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });

</script>
<script>


    var map;

    function initMap()
    {
        map = new google.maps.Map(document.getElementById('map'),
            {
                center:
                    {
                        lat: -34.397,
                        lng: 150.644
                    },
                zoom: 8
            });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9GAkK2CH8lMbGzycuo3EXIUZmErH99vs&callback=initMap" async defer></script>
</body>
</html>