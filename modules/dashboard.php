<?php

?>
<div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="header-title mb-4">Overview</h4>

                            <div class="row">
                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <a href="?p=">
                                <div class="card-box widget-flat border-custom bg-custom text-white">
                                    <i class="fi-tag"></i>
                                    <h3 class="m-b-10"><?php  ?></h3>
                                    <p class="text-uppercase m-b-5 font-13 font-600">Quiz</p>
                                </div>
                                </a>
                            </div>
            

                            <div class="col-sm-6 col-lg-6 col-xl-3">
                            <a href="?p=">
                                <div class="card-box bg-danger widget-flat border-danger text-white">                                
                                    <i class="fi-tag"></i>
                                    <h3 class="m-b-10"><?php ?></h3>
                                    <p class="text-uppercase m-b-5 font-13 font-600">Users</p>
                                </div>
                                </a>
                            </div>

                            <div class="col-sm-6 col-lg-6 col-xl-3">
                            <a href="?p=">
                            <div class="card-box widget-flat border-success bg-success text-white">
                                    <i class="fi-tag"></i>
                                    <h3 class="m-b-10"><?php  ?></h3>
                                    <p class="text-uppercase m-b-5 font-13 font-600">Courses</p>
                                </div>
                                </a>
                            </div>

                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <a href="?p=">
                                <div class="card-box bg-primary widget-flat border-primary text-white">
                                    <i class="fi-tag"></i>
                                    <h3 class="m-b-10"><?php ?></h3>
                                    <p class="text-uppercase m-b-5 font-13 font-600">Exercise</p>
                                </div>
                                </a>
                            </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card-box">
                            <h4 class="header-title mb-3">Latest Quiz Score</h4>

                            <div class="table-responsive">
                                <table class="table table-hover table-centered m-0">

                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Client</th>
                                        <th>Rate</th>
                                        <th>IDGB No</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>   
                                        <?php
                                        foreach($latestAdv as $ad) {
                                            echo '
                                            <tr>
                                                <td>'.$ad->ads_date.'</td>
                                                <td>'.$ad->Client.'</td>
                                                <td>'.$ad->rate.'</td>
                                                <td>'.$ad->order_no.'</td>
                                                <td>'.$ad->total_amount.'</td>
                                                <td>'.$ad->paid_status.'</td>
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