<div class="row">
        <div class="card-box table-responsive">
            <h4 class="m-t-0">
                <b>Quiz List</b>
            </h4>
        </div>
   
<?php 
$quiz = new Quiz();
$aList = $quiz->getQuiz(0); //$quiz->printR($aList);
foreach($aList as  $qz) {
    $quizTime = $qz->quiz_time/60;
?>

        <div class="col-lg-4">
            <div class="text-center card-box">
                <div class="member-card pt-2 pb-2">
                    <div class="">
                        <h4 class="m-b-5"><?php echo $qz->quiz_name;?></h4>
                        <p class="text-muted"><a href="#"><?php echo $qz->dep_name;?></a> <span>|</span> <span><?php echo $quizTime;?> M</span></p>
                    </div>
                    <div class="mt-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="mt-3">
                                    <h4 class="m-b-5"><?php echo $qz->question_count;?></h4>
                                    <p class="mb-0 text-muted">Total Questions</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="./index.php?p=<?php echo P_QUIZ_DETAIL;?>&quiz_id=<?php echo $qz->id;?>" class="btn btn-primary m-t-20 btn-rounded btn-bordered waves-effect w-md waves-light">Entroll Now</a>
                </div>

            </div>
        </div> <!-- end col -->
<?php } ?>
</div>