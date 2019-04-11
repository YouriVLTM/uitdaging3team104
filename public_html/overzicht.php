<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
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
<section class="py-6 bg-gray-100">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-8">
                <h2>All locations</h2>
            </div>
            <div class="col-md-4 d-md-flex align-items-center justify-content-end"><a href="blog.html" class="text-muted text-sm">

                See all articles<i class="fas fa-angle-double-right ml-2"></i></a></div>
        </div>
        <div class="row">
            <!-- blog item-->
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card shadow border-0 h-100"><a href="post.html"><img src="https://d19m59y37dris4.cloudfront.net/directory/1-1/img/photo/photo-1512917774080-9991f1c4c750.jpg" alt="..." class="img-fluid card-img-top"></a>
                    <div class="card-body"><a href="#" class="text-uppercase text-muted text-sm letter-spacing-2">Travel </a>
                        <h5 class="my-2"><a href="post.html" class="text-dark">Autumn fashion tips and tricks          </a></h5>
                        <p class="text-gray-500 text-sm my-3"><i class="far fa-clock mr-2"></i>January 16, 2016</p>
                        <p class="my-2 text-muted text-sm">Pellentesque habitant morbi tristique senectus. Vestibulum tortor quam, feugiat vitae, ultricies ege...</p><a href="post.html" class="btn btn-link pl-0">Read more<i class="fa fa-long-arrow-alt-right ml-2"></i></a>
                    </div>
                </div>
            </div>
            <!-- blog item-->
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card shadow border-0 h-100"><a href="post.html"><img src="https://d19m59y37dris4.cloudfront.net/directory/1-1/img/photo/photo-1522771739844-6a9f6d5f14af.jpg" alt="..." class="img-fluid card-img-top"></a>
                    <div class="card-body"><a href="#" class="text-uppercase text-muted text-sm letter-spacing-2">Living </a>
                        <h5 class="my-2"><a href="post.html" class="text-dark">Newest photo apps          </a></h5>
                        <p class="text-gray-500 text-sm my-3"><i class="far fa-clock mr-2"></i>January 16, 2016</p>
                        <p class="my-2 text-muted text-sm">ellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibu...</p><a href="post.html" class="btn btn-link pl-0">Read more<i class="fa fa-long-arrow-alt-right ml-2"></i></a>
                    </div>
                </div>
            </div>
            <!-- blog item-->
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card shadow border-0 h-100"><a href="post.html"><img src="https://d19m59y37dris4.cloudfront.net/directory/1-1/img/photo/photo-1522771739844-6a9f6d5f14af.jpg" alt="..." class="img-fluid card-img-top"></a>
                    <div class="card-body"><a href="#" class="text-uppercase text-muted text-sm letter-spacing-2">Living </a>
                        <h5 class="my-2"><a href="post.html" class="text-dark">Newest photo apps          </a></h5>
                        <p class="text-gray-500 text-sm my-3"><i class="far fa-clock mr-2"></i>January 16, 2016</p>
                        <p class="my-2 text-muted text-sm">ellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibu...</p><a href="post.html" class="btn btn-link pl-0">Read more<i class="fa fa-long-arrow-alt-right ml-2"></i></a>
                    </div>
                </div>
            </div>
            <!-- blog item-->
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card shadow border-0 h-100"><a href="post.html"><img src="https://d19m59y37dris4.cloudfront.net/directory/1-1/img/photo/photo-1482463084673-98272196658a.jpg" alt="..." class="img-fluid card-img-top"></a>
                    <div class="card-body"><a href="#" class="text-uppercase text-muted text-sm letter-spacing-2">Travel </a>
                        <h5 class="my-2"><a href="post.html" class="text-dark">Best books about Photography          </a></h5>
                        <p class="text-gray-500 text-sm my-3"><i class="far fa-clock mr-2"></i>January 16, 2016</p>
                        <p class="my-2 text-muted text-sm">Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.  Mauris placerat eleif...</p><a href="post.html" class="btn btn-link pl-0">Read more<i class="fa fa-long-arrow-alt-right ml-2"></i></a>
                    </div>
                </div>
            </div>
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