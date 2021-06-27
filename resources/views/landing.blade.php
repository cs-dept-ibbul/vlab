<?php

use App\Http\Controllers\Api\StatsController;

$stats = new StatsController();
$learners = $stats->numberOfLeaners();
$courseCount = $stats->courseCount();
$courseExperiment = $stats->experimentCount();

?>

<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Our Results, 15, 65, 410, 7">
    <meta name="description" content="">
    <title>Vlab Stats</title>
    <link rel="stylesheet" href="https://website22174.nicepage.io/nicepage.css?version=4f0fc0fb-3ebe-483e-92a0-a2ec0aff5a46" media="screen">
    <script class="u-script" type="text/javascript" src="//static.nicepage.com/shared/assets/jquery-1.9.1.min.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="//capp.nicepage.com/48275668d8add8f020dd04c401264218ca36d074/nicepage.js" defer=""></script>
    <link id="u-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|roboto-slab|courier-new">
    <style class="u-style">
        .u-section-2 {
            background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url("//images01.nicepage.com/64/0b/640b80adc8a548eb5a4b91d9cafc8db3.jpeg");
            background-position: 50% 50%
        }

        .u-section-2 .u-sheet-1 {
            min-height: 573px;
            margin-top: 0;
            margin-bottom: 0
        }

        .u-section-2 .u-text-1 {
            font-size: 3.75rem;
            width: 611px;
            margin: 60px 265px 0
        }

        .u-section-2 .u-text-2 {
            letter-spacing: 2px;
            width: 611px;
            margin: 20px auto 0
        }

        .u-section-2 .u-layout-wrap-1 {
            margin: 40px auto 60px 0
        }

        .u-section-2 .u-layout-cell-1 {
            min-height: 200px
        }

        .u-section-2 .u-container-layout-1 {
            padding: 30px
        }

        .u-section-2 .u-text-3 {
            margin: 0
        }

        .u-section-2 .u-text-4 {
            text-transform: uppercase;
            font-size: 1.25rem;
            letter-spacing: 2px;
            margin: 20px 0 0
        }

        .u-section-2 .u-layout-cell-2 {
            min-height: 200px;
            background-image: none
        }

        .u-section-2 .u-container-layout-2 {
            padding: 30px
        }

        .u-section-2 .u-text-5 {
            width: 225px;
            margin: 0 auto
        }

        .u-section-2 .u-text-6 {
            text-transform: uppercase;
            font-size: 1.25rem;
            letter-spacing: 2px;
            width: 225px;
            margin: 20px auto 0
        }

        .u-section-2 .u-layout-cell-3 {
            min-height: 200px;
            background-image: none
        }

        .u-section-2 .u-container-layout-3 {
            padding: 30px
        }

        .u-section-2 .u-text-7 {
            margin: 0
        }

        .u-section-2 .u-text-8 {
            text-transform: uppercase;
            font-size: 1.25rem;
            letter-spacing: 2px;
            margin: 20px 0 0
        }

        .u-section-2 .u-layout-cell-4 {
            min-height: 200px;
            background-image: none
        }

        .u-section-2 .u-container-layout-4 {
            padding: 30px
        }

        .u-section-2 .u-text-9 {
            margin: 0
        }

        .u-section-2 .u-text-10 {
            text-transform: uppercase;
            font-size: 1.25rem;
            letter-spacing: 2px;
            margin: 20px 0 0
        }

        @media (max-width: 1199px) {
            .u-section-2 .u-sheet-1 {
                min-height: 472px
            }

            .u-section-2 .u-text-1 {
                position: relative;
                margin-right: 165px;
                margin-left: 165px
            }

            .u-section-2 .u-text-2 {
                position: relative
            }

            .u-section-2 .u-layout-wrap-1 {
                margin-right: initial;
                margin-left: initial
            }

            .u-section-2 .u-layout-cell-1 {
                min-height: 100px
            }

            .u-section-2 .u-text-3 {
                position: relative
            }

            .u-section-2 .u-text-4 {
                position: relative
            }

            .u-section-2 .u-layout-cell-2 {
                min-height: 100px
            }

            .u-section-2 .u-text-5 {
                width: 186px
            }

            .u-section-2 .u-text-6 {
                width: 186px
            }

            .u-section-2 .u-layout-cell-3 {
                min-height: 100px
            }

            .u-section-2 .u-text-7 {
                position: relative
            }

            .u-section-2 .u-text-8 {
                position: relative
            }

            .u-section-2 .u-layout-cell-4 {
                min-height: 100px
            }

            .u-section-2 .u-text-9 {
                position: relative
            }

            .u-section-2 .u-text-10 {
                position: relative
            }
        }

        @media (max-width: 991px) {
            .u-section-2 .u-sheet-1 {
                min-height: 362px
            }

            .u-section-2 .u-text-1 {
                margin-left: 55px;
                margin-right: 55px
            }

            .u-section-2 .u-text-5 {
                width: 142px
            }

            .u-section-2 .u-text-6 {
                width: 142px
            }
        }

        @media (max-width: 767px) {
            .u-section-2 .u-sheet-1 {
                min-height: 272px
            }

            .u-section-2 .u-text-1 {
                margin-left: auto;
                margin-right: auto;
                width: 540px
            }

            .u-section-2 .u-text-2 {
                width: 540px
            }

            .u-section-2 .u-container-layout-1 {
                padding-left: 10px;
                padding-right: 10px
            }

            .u-section-2 .u-container-layout-2 {
                padding-left: 10px;
                padding-right: 10px
            }

            .u-section-2 .u-text-5 {
                width: 133px
            }

            .u-section-2 .u-text-6 {
                width: 133px
            }

            .u-section-2 .u-container-layout-3 {
                padding-left: 10px;
                padding-right: 10px
            }

            .u-section-2 .u-container-layout-4 {
                padding-left: 10px;
                padding-right: 10px
            }
        }

        @media (max-width: 575px) {
            .u-section-2 .u-sheet-1 {
                min-height: 171px
            }

            .u-section-2 .u-text-1 {
                width: 340px
            }

            .u-section-2 .u-text-2 {
                width: 340px
            }
        }
    </style>
</head>

<body class="u-body">
    <section class="u-align-center u-clearfix u-image u-shading u-section-2" src="" id="sec-63ea">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">


            <h2 class="u-custom-font u-font-roboto-slab u-text u-text-1">Our Results</h2>
            <h5 class="u-custom-font u-font-courier-new u-text u-text-2">HOW ABOUT SOME FUN FACTS ABOUT VLAB?</h5>
            <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-row">
                        <div class="u-align-center u-container-style u-layout-cell u-left-cell u-size-15 u-size-30-md u-layout-cell-1">
                            <div class="u-container-layout u-valign-top u-container-layout-1">
                                <h1 class="u-custom-font u-font-roboto-slab u-text u-title u-text-3" data-animation-name="counter" data-animation-event="scroll" data-animation-duration="3000"><?php echo $courseCount; ?></h1>
                                <p class="u-custom-font u-font-courier-new u-text u-text-4">Total courses</p>
                            </div>
                        </div>
                        <div class="u-align-center u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-2">
                            <div class="u-container-layout u-valign-top u-container-layout-2">
                                <h1 class="u-custom-font u-font-roboto-slab u-text u-title u-text-5" data-animation-name="counter" data-animation-event="scroll" data-animation-duration="3000"><?php echo $courseExperiment; ?></h1>
                                <p class="u-custom-font u-font-courier-new u-text u-text-6">Total Experiments</p>
                            </div>
                        </div>
                        <div class="u-align-center u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-3">
                            <div class="u-container-layout u-valign-top u-container-layout-3">
                                <h1 class="u-custom-font u-font-roboto-slab u-text u-title u-text-7" data-animation-name="counter" data-animation-event="scroll" data-animation-duration="3000"><?php echo $learners; ?></h1>
                                <p class="u-custom-font u-font-courier-new u-text u-text-8">Total Learners</p>
                            </div>
                        </div>
                        <div class="u-align-center u-container-style u-layout-cell u-right-cell u-size-15 u-size-30-md u-layout-cell-4">
                            <div class="u-container-layout u-valign-top u-container-layout-4">
                                <h1 class="u-custom-font u-font-roboto-slab u-text u-title u-text-9" data-animation-name="counter" data-animation-event="scroll" data-animation-duration="3000"><?php echo $learners; ?></h1>
                                <p class="u-custom-font u-font-courier-new u-text u-text-10">Total Pageview</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>