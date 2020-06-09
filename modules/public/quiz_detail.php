<?php 

$quizId = isset($_GET['quiz_id'])?$_GET['quiz_id']:0;
$quiz = new QuizQuestionAnswer();
$aList = $quiz->getQuiz($quizId); //$quiz->printR($aList);
$qz=$aList[0];
$quizTime = $qz->quiz_time/60;


$hours = floor($qz->quiz_time / 3600);
$mins = floor($qz->quiz_time / 60 % 60);
$secs = floor($qz->quiz_time % 60);

//***** Get Quiz Question and store in session */
$allQuestions = array();
$questions=$quiz->getQuizQuestionAnswer($quizId); //$quiz->printR($questions);
foreach($questions as $ques) {
    $allQuestions[] = array(
        "id"=>$ques->id,
        "question"=>$ques->question,
        "answer1"=>$ques->answer_1,
        "answer2"=>$ques->answer_2,
        "answer3"=>$ques->answer_3,
        "answer4"=>$ques->answer_4,
        "answer_correct"=>$ques->correct_answer,
        "answer_selected"=>0
    );
}

// $quiz->printR($allQuestions);
$_SESSION['USER']["QUIZ"] = $allQuestions;
// $quiz->printR($_SESSION['USER']["QUIZ"]);

?>
<div class="row">
        <div class="card-box table-responsive">
            <h4 class="m-t-0">
                <b>Quiz Detail</b>
            </h4>
        </div>
        <div class="col-lg-12">
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
                    <?php if($loggedInUserId >0) {?>
                    <a href="javascript:startQuiz()" class="quiz btn btn-primary m-t-20 btn-rounded btn-bordered waves-effect w-md waves-light">Start Now</a>
                    <?php }else {
                        echo "<p class='alert alert-danger'>You must login before Quiz start</p>";
                    } ?>
                    
                    <div style="margin-top: 10px;font-size:50px">
                        <span class="hour"><?php echo $hours;?></span>
                        <span>:</span>
                        <span class="min"><?php echo $mins;?></span>
                        <span>:</span>
                        <span class="sec"><?php echo $secs;?></span>
                    </div>
                    <p class="alert alert-danger time-finish" style="display: none;">Quiz time finish</p>
                </div>

            </div>
        </div> <!-- end col -->

        <div class="col-lg-12 quiz-question" style="display: none;">
            <div class="text-center card-box">
                <div class="member-card pt-2 pb-2">
                    <div class="">
                        <h4 class="m-b-5 question"></h4>
                        <div class="quizList" style="display: flex;">
                        <div class="answers">
                            <input style="margin-right: 10px" type="radio" id="answer1" name="answer"  value="1"/><p class="answer1"></p></span><br/>
                            <input style="margin-right: 10px" type="radio" id="answer2" name="answer"  value="2"/><p class="answer2"></p></span><br/>
                            <input style="margin-right: 10px" type="radio" id="answer3" name="answer"  value="3"/><p class="answer3"></p></span><br/>
                            <input style="margin-right: 10px" type="radio" id="answer4" name="answer"  value="4"/><p class="answer4"></p></span><br/>                            
                            <input type="hidden" id="questionId"  value="0"/>
                         </div>
                        </div>
                        <a href="javascript:nextQuestion()" class="btn btn-primary next">Next</a>
                        <a href="javascript:calculateScore()" class="btn btn-primary score" style="display: none;">Calculate Score</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var firstTimeLoad=true;
            var doneQuiz=false;
            function startQuiz() {
                startTimer();    
                $('div.quiz-question').show();
                $('a.quiz').hide();
                nextQuestion();
            }

            function startTimer() {
                var interval=setInterval(function(){
                    sec--;
                    if(sec<=0) { 
                        min--;
                        sec=60;
                        $('span.min').html(min);
                        if(hour <=0 && min <=0) {
                            $('p.time-finish').show();
                            $('a.next').hide();
                            $('a.score').show();                             
                            clearInterval(interval);                           
                            sec=0;
                        }                        
                    }
                    if(doneQuiz) clearInterval(interval);                    
                    
                    $('span.sec').html(sec);
                },1000);
                
            }

            function nextQuestion() {
                var selectedAnswer = $("input[name='answer']:checked"). val();                
                if(!firstTimeLoad && typeof selectedAnswer == 'undefined') {
                    alert('selected one');
                } else {                    
                    $.post("action.php",
                        {
                            task:'<?php echo base64_encode(P_ADMIN_QUIZ_QUESTION);?>',
                            subtask:'<?php echo  base64_encode('GET-RANDOM-QUESTION')?>',
                            data: { 
                                firstTimeLoad,
                                selectedAnswer,
                                questionId:$('input#questionId').val() 
                            }
                        },
                        function(resp){
                            firstTimeLoad=false;
                            var obj = JSON.parse(resp);
                            if(obj.status) {
                                $("input[name='answer']").prop("checked", false);
                                // console.log(obj);
                                $('input#questionId').val(obj.data.id);
                                $('h4.question').html(obj.data.question);
                                $('p.answer1').html(obj.data.answer1);
                                $('p.answer2').html(obj.data.answer2);
                                $('p.answer3').html(obj.data.answer3);
                                $('p.answer4').html(obj.data.answer4);

                            } else if(obj.data.done) {
                                $('h4.question').html('');
                                $('div.answers').html('');
                                $('a.next').hide();
                                $('a.score').show();
                                doneQuiz=true;
                            }
                        }
                    );
                }
            }

            function calculateScore() {
                $.post("action.php",
                        {
                            task:'<?php echo base64_encode(P_ADMIN_QUIZ_QUESTION);?>',
                            subtask:'<?php echo  base64_encode('CALCULATE-SCORE')?>',
                            data: {
                            }
                        },
                        function(resp){
                            var obj = JSON.parse(resp);
                            if(obj.status) {
                                $('a.score').hide();
                                $('h4.question').html('<div class="alert alert-success">Quiz Score</div>');
                                var scoreHtml = '<p><span>Total Questions: '+obj.data.countTotal+'<span></p>';
                                scoreHtml += '<p><span>Correct Answers: '+obj.data.countCorrect+'<span></p>';
                                $('div.answers').html(scoreHtml);
                            }
                        });                
            }

        </script>
</div>