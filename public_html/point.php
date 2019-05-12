<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="css/yourivanlaer.css">
    <title>1ITF Sass BS4 project</title>

    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#818338">
    <meta name="msapplication-TileColor" content="#818338">
    <meta name="theme-color" content="#818338">

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
                <li class="nav-item">
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



                        <div class="row" id="locatie">
                            <div class="col-sm-12 ">
                                <h2>Locatie</h2>
                                <hr>

                                <div class="row bg-secondary">
                                    <div class="col-12 col-md-6 pt-2">
                                        <div class="col-12">
                                            <?php if($point["Location"]["Startpunt"] != null): ?>
                                                <h3>Startpunt</h3>
                                                <p><?php echo $point["Location"]["Startpunt"]["Description"]; ?></p>
                                                <div class="d-flex flex-row bd-highlight mb-2">
                                                    <div class="p-2 bd-highlight">
                                                        <p><code><?php echo $point["Location"]["Startpunt"]["Latitude"]; ?>, <?php echo $point["Location"]["Startpunt"]["Longitude"]; ?></code></p>
                                                    </div>
                                                    <div class="p-2 bd-highlight">
                                                        <p><?php echo $point["Location"]["Startpunt"]["Stad"]; ?> </p>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 pt-2">
                                        <div class="col-12">
                                            <?php if($point["Location"]["MiddenPunt"] != null): ?>
                                                <h3>Midden punt</h3>
                                                <p><?php echo $point["Location"]["MiddenPunt"]["Description"]; ?></p>
                                                <div class="d-flex flex-row bd-highlight mb-2">
                                                    <div class="p-2 bd-highlight">
                                                        <p><code><?php echo $point["Location"]["MiddenPunt"]["Latitude"]; ?>, <?php echo $point["Location"]["MiddenPunt"]["Longitude"]; ?></code></p>
                                                    </div>
                                                    <div class="p-2 bd-highlight">
                                                        <p><?php echo $point["Location"]["MiddenPunt"]["Stad"]; ?> </p>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 pt-2">
                                        <div class="col-12">
                                            <h3>Geocach</h3>
                                            <p><?php echo $point["Location"]["Description"]; ?></p>
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
                                </div>

                            </div>
                        </div>

                        <?php if($point["Needs"] != null): ?>
                        <div class="row mt-3" id="benodigdheden">
                            <div class="col-sm-12 col-md-8">
                                <h2>Benodigdheden</h2>
                                <hr>
                                <ul class="list-group">
                                    <?php foreach($point["Needs"] as $need): ?>
                                    <li class="list-group-item"><?php echo $need; ?></li>
                                    <?php endforeach ?>
                                </ul>

                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="row mt-3" id="reviews">
                            <div class="col-sm-12 col-md-8">
                                <h2>Reviews</h2>
                                <hr>

                                <div class="list-reviews">

                                    <?php if($point["Reviews"] != null or $point["Reviews"].sizeof() > 0): ?>



                                        <?php foreach($point["Reviews"] as $review): ?>
                                            <div class="row pt-2 pb-2">
                                                <div class="col-sm-2 col-lg-1">
                                                    <p><i class="fas fa-user-circle fa-3x"></i></p>
                                                </div>
                                                <div class="col-sm-10 col-lg-11">
                                                    <p><?php echo $review["name"] ?> <span><?php echo $review["datum"] ?></span></p>
                                                    <p><?php echo $review["text"] ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach ?>


                                    <?php endif ?>

                                    <div class="row">
                                        <div class="col-sm-2 col-lg-1">
                                            <p><i class="fas fa-user-circle fa-3x"></i></p>
                                        </div>
                                        <div class="col-sm-10 col-lg-11">

                                            <div class="contact-form border-right-2 text-left ml-2 pr-4">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="naam">Naam</label>
                                                        <input type="naam" class="form-control" id="naam" placeholder="Naam">
                                                    </div>
                                                    <!--<div class="form-group col-md-6">
                                                        <label for="inputPassword4">Leeg</label>
                                                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                                                    </div>-->
                                                </div>

                                                <div class="form-group">
                                                    <label for="comment">Bericht:</label>
                                                    <textarea class="form-control" rows="5" id="comment" name="comment" placeholder="Schrijf uw bericht" required=""></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-outline-primary btn-default btn-block review-send">verzenden</button>
                                                </div>
                                                <div class="error alert alert-danger d-none" role="alert">
                                                </div>

                                            </div>

                                        </div>

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
        //tooltip
        $('[data-toggle="tooltip"]').tooltip();

        $('.review-send').click(function(){
            //console.log($(this));
            naam = $('#naam').val();
            text = $('#comment').val();

            if(naam == "" && text ==""){
                messageError = "Geen naam en text";
            }else if(naam == ""){
                messageError = "Geen naam";
            }else if(text ==""){
                messageError = "Geen text";
            }else{
                messageError ="";
            }
            if(messageError != ""){
                $(this).parent().parent().children().last().text(messageError);
                $(this).parent().parent().children().last().removeClass('d-none');
            }else{
                if(!$(this).parent().parent().children().last().hasClass('d-none')){
                    $(this).parent().parent().children().last().addClass('d-none');
                }

                $('.list-reviews').prepend(" <div class=\"row border-reviews\">\n"+
                    "                                            <div class=\"col-sm-2 col-lg-1 pt-2 pb-2\">\n"+
                    "                                                <p><i class=\"fas fa-user-circle fa-3x\"></i></p>\n"+
                    "                                            </div>\n"+
                    "                                            <div class=\"col-sm-10 col-lg-11\">\n"+
                    "                                                <p>" + naam + "<span> Juist</span></p>\n"+
                    "                                                <p>"+ text + "</p>\n"+
                    "                                            </div>\n"+
                    "                                        </div>\n"+
                    "                                        <hr>")
            }




        })
    });

</script>
<!--custom scripts-->
</body>
</html>