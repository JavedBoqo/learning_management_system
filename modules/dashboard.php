<?php

$quiz=new Quiz();
$countQuiz = count($quiz->getQuiz());

$course=new Course();
$countCourse = count($course->getCourse());

$video=new Video();
$countVideo = count($video->getVideo());

$exercise=new Exercise();
$countExercise = count($exercise->getExercise());

$quizLatest = $quiz->getLatestQuiz(0);
// $quiz->printR($quizLatest);
?>

<div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            
                            <div class="row">
                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <a href="?p=">
                                <div class="card-box widget-flat border-custom bg-custom text-white">
                                    <i class="fi-tag"></i>
                                    <h3 class="m-b-10"><?php  echo $countQuiz;?></h3>
                                    <p class="text-uppercase m-b-5 font-13 font-600">Quiz</p>
                                </div>
                                </a>
                            </div>
            

                            <div class="col-sm-6 col-lg-6 col-xl-3">
                            <a href="?p=">
                                <div class="card-box bg-danger widget-flat border-danger text-white">                                
                                    <i class="fi-tag"></i>
                                    <h3 class="m-b-10"><?php echo $countVideo;?></h3>
                                    <p class="text-uppercase m-b-5 font-13 font-600">Videos</p>
                                </div>
                                </a>
                            </div>

                            <div class="col-sm-6 col-lg-6 col-xl-3">
                            <a href="?p=">
                            <div class="card-box widget-flat border-success bg-success text-white">
                                    <i class="fi-tag"></i>
                                    <h3 class="m-b-10"><?php echo $countCourse; ?></h3>
                                    <p class="text-uppercase m-b-5 font-13 font-600">Courses</p>
                                </div>
                                </a>
                            </div>

                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <a href="?p=">
                                <div class="card-box bg-primary widget-flat border-primary text-white">
                                    <i class="fi-tag"></i>
                                    <h3 class="m-b-10"><?php echo $countExercise;?></h3>
                                    <p class="text-uppercase m-b-5 font-13 font-600">Exercise</p>
                                </div>
                                </a>
                            </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card-box">
                            <h4 class="header-title mb-3">Latest Quiz Score</h4>

                            <div class="table-responsive">
                                <table class="table table-hover table-centered m-0">

                                <thead>
                                    <tr>
                                        <th>Quiz Title</th>
                                        <th>Quiz Time</th>
                                        <th>Quiz Total Questions</th>
                                    </tr>
                                    </thead>
                                    <tbody>   
                                        <?php
                                        foreach($quizLatest as $qz) {
                                            echo '
                                            <tr>
                                                <td>'.$qz->quiz_name.'</td>
                                                <td>'.$qz->quiz_time.'</td>
                                                <td>'.$qz->question_count.'</td>                                                
                                            </tr>';
                                        }
                                        ?>                                 
                                    

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <!-- <div class="col-xl-4">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">Total Wallet Balance</h4>


                            <div id="donut-chart">
                                <div id="donut-chart-container" class="flot-chart mt-5" style="height: 340px;">
                                </div>
                            </div>

                        </div>

                    </div> -->
                </div>
                <!-- end row -->