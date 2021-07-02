<?php
include "Data.php";

$datas = (new Data)->sort()->get();

function convertDate($date) {
    return date("l, dS \of F Y g:i a", strtotime($date));
}

function generateReadMore($link) {
    return '<a href="'.$link.'" target="_blank" class="stretched-link">Read More</a>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://osky.com.au/wp-content/themes/osky/assets/dist/img/favicon/apple-icon-57x57.png">
    <title>Osky Assignment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <style>
        .content img {
            margin: 1.5rem 1.5rem 0 0;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-12 mb-4">
                <h1>Amirul Naim Bin Mohd Solong</h1>
                <p>Note: The data is taken from <?php echo $datas->_curl ? 'URL (https://test.osky.dev/101/data.json)' : 'data.json file'; ?></p>
            </div>
            <?php foreach($datas->_json as $data) { ?>
            <div class="col-lg-6 d-none news">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h2 class="mb-0 font-bold">
                            <?php echo $data->title; ?>
                        </h2>
                        <p class="mb-1 text-muted fst-italic">
                            <?php echo convertDate($data->pubDate); ?>
                        </p>
                        <div class="mb-auto lh-md content">
                            <?php echo $data->description; ?>
                        </div>
                        <?php
                        if(gettype($data->link) === "array") {
                            foreach($data->link as $link) {
                                if (strpos(strtoupper($link), 'URN') === false && strpos(strtoupper($link), 'URC') === false ) {
                                    echo generateReadMore($link);
                                }
                            }
                        } else if(gettype($data->link) === "string") {
                            echo generateReadMore($data->link);
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".news").each(function(i) {
                var news = $(this);
                setTimeout(function(){ news.removeClass("d-none").addClass("animate__animated animate__fadeInUpBig"); }, i*500);
            })
        })
    </script>
</body>
</html>