<?php include 'welcome.html.php' ?>
<?php include 'container.html.php' ?>
<div class="col-md-9">
    <div id="main">
        <input id="tab1" type="radio" name="tabs" checked />
        <label for="tab1">Recent Question</label>
        <input id="tab2" type="radio" name="tabs" />
        <label for="tab2">Most Response</label>
        <input id="tab3" type="radio" name="tabs" />
        <label for="tab3">Recently Answered</label>
        <input id="tab4" type="radio" name="tabs" />
        <label for="tab4">No Answer</label>
        <input id="tab5" type="radio" name="tabs" />
        <label for="tab5">Recent Post</label>
        <?php if (!empty($quests)) : ?>
            <?php foreach ($quests as $quest) : ?>
                <section id="content1">
                    <!--Recent Question Content Section -->
                    <div class="question-type2033">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="left-user12923 left-user12923-repeat">
                                    <a href="#"><img src="<?php echo URLROOT  ?>image/images.png" alt="image" />
                                    </a>
                                    <a href="#"><i class="fa fa-check" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="right-description893">
                                    <div id="que-hedder2983">
                                        <h3>
                                            <a href="<?php echo URLROOT . 'quest/detail?id=' . $quest->id ?>" target="_blank"><?php echo $quest->title ?></a>
                                        </h3>
                                    </div>
                                    <div class="ques-details10018">
                                        <p>
                                            <?= htmlspecialchars($quest->summary, ENT_QUOTES, 'UTF-8') ?>
                                        </p>
                                    </div>
                                    <hr />
                                    <div class="ques-icon-info3293">
                                        <a href="#"><i class="fa fa-star" aria-hidden="true"> 5 </i>
                                        </a>
                                        <?php foreach ($quest->getCategory() as $item) : ?>
                                            <a href="<?php echo URLROOT . 'quest/list?category=' . $item->id ?>"><i class="fa fa-folder" aria-hidden="true"><?= htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8') ?>
                                                </i></a>
                                        <?php endforeach; ?>
                                        <?php if ($quest->updated_at) :  ?>
                                            <a href="#"><i class="fa fa-calendar-plus-o" aria-hidden="true">
                                                    <?php $dateUp = new DateTime($quest->updated_at);
                                                    echo $dateUp->format('jS F Y') ?></i></a>
                                        <?php else : ?>
                                            <a href="#"><i class="fa fa-calendar-minus-o" aria-hidden="true">
                                                    <?php $date = new DateTime($quest->created_at);
                                                    echo $date->format('jS F Y') ?></i></a>
                                        <?php endif; ?>


                                        <a href="#"><i class="fa fa-question-circle-o" aria-hidden="true">
                                                Question</i></a>
                                        <a href="#"><i class="fa fa-bug" aria-hidden="true">
                                                Report</i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="ques-type302">
                                    <a href="#">
                                        <button type="button" class="q-type238">
                                            <i class="fa fa-comment" aria-hidden="true">
                                                333335 answer</i>
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button type="button" class="q-type23 button-ques2973">
                                            <i class="fa fa-user-circle-o" aria-hidden="true">
                                                <?= $quest->views ?></i>
                                        </button>
                                    </a>
                                    <!-- edit and delete form -->
                                    <a class="q-type238" href="<?php echo URLROOT . 'quest/edit?id=' . $quest->id ?>">Edit</a>
                                    <form action="<?php echo URLROOT . 'quest/delete' ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $quest->id ?>">
                                        <input class="q-type238" type="submit" value="Delete">
                                    </form>
                                    <!-- !edit and delete form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endforeach; ?>

            <!--  End of content-1------>

            <section id="content2">
                <!--Most Response Content Section -->
                <div class="question-type2033">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="left-user12923 left-user12923-repeat">
                                <a href="#"><img src="<?php echo URLROOT  ?>image/images.png" alt="image" />
                                </a>
                                <a href="#"><i class="fa fa-check" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="right-description893">
                                <div id="que-hedder2983">
                                    <h3>
                                        <a href="post-deatils.html" target="_blank">This is my first Question</a>
                                    </h3>
                                </div>
                                <div class="ques-details10018">
                                    <p>
                                        Duis dapibus aliquam mi, eget euismod sem
                                        scelerisque ut. Vivamus at elit quis urna adipiscing
                                        iaculis.Duis dapibus aliquam mi, eget euismod sem
                                        scelerisque ut. Vivamus at elit quis urna adipiscing
                                        iaculis.
                                    </p>
                                </div>
                                <hr />
                                <div class="ques-icon-info3293">
                                    <a href="#"><i class="fa fa-check" aria-hidden="true">
                                            solved</i></a>
                                    <a href="#"><i class="fa fa-star" aria-hidden="true"> 5</i>
                                    </a>
                                    <a href="#"><i class="fa fa-folder" aria-hidden="true">
                                            wordpress</i></a>
                                    <a href="#"><i class="fa fa-clock-o" aria-hidden="true">
                                            4 min ago</i></a>
                                    <a href="#"><i class="fa fa-comment" aria-hidden="true">
                                            5 answer</i></a>
                                    <a href="#"><i class="fa fa-user-circle-o" aria-hidden="true">
                                            70 view</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="ques-type302">
                                <a href="#">
                                    <button type="button" class="q-type238">
                                        <i class="fa fa-comment" aria-hidden="true">
                                            333335 answer</i>
                                    </button>
                                </a>
                                <a href="#">
                                    <button type="button" class="q-type23 button-ques2973">
                                        <i class="fa fa-user-circle-o" aria-hidden="true">
                                            70 view</i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!----end of content-2----->

            <section id="content3">
                <!--Recently answered Content Section -->
                <div class="question-type2033">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="left-user12923 left-user12923-repeat">
                                <a href="#"><img src="<?php echo URLROOT  ?>image/images.png" alt="image" />
                                </a>
                                <a href="#"><i class="fa fa-check" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="right-description893">
                                <div id="que-hedder2983">
                                    <h3>
                                        <a href="post-deatils.html" target="_blank">This is my first Question</a>
                                    </h3>
                                </div>
                                <div class="ques-details10018">
                                    <p>
                                        Duis dapibus aliquam mi, eget euismod sem
                                        scelerisque ut. Vivamus at elit quis urna adipiscing
                                        iaculis.Duis dapibus aliquam mi, eget euismod sem
                                        scelerisque ut. Vivamus at elit quis urna adipiscing
                                        iaculis.
                                    </p>
                                </div>
                                <hr />
                                <div class="ques-icon-info3293">
                                    <a href="#"><i class="fa fa-check" aria-hidden="true">
                                            solved</i></a>
                                    <a href="#"><i class="fa fa-star" aria-hidden="true"> 5</i>
                                    </a>
                                    <a href="#"><i class="fa fa-folder" aria-hidden="true">
                                            wordpress</i></a>
                                    <a href="#"><i class="fa fa-clock-o" aria-hidden="true">
                                            4 min ago</i></a>
                                    <a href="#"><i class="fa fa-comment" aria-hidden="true">
                                            5 answer</i></a>
                                    <a href="#"><i class="fa fa-user-circle-o" aria-hidden="true">
                                            70 view</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="ques-type302">
                                <a href="#">
                                    <button type="button" class="q-type238">
                                        <i class="fa fa-comment" aria-hidden="true">
                                            333335 answer</i>
                                    </button>
                                </a>
                                <a href="#">
                                    <button type="button" class="q-type23 button-ques2973">
                                        <i class="fa fa-user-circle-o" aria-hidden="true">
                                            70 view</i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question-type2033">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="left-user12923 left-user12923-repeat">
                                <a href="#"><img src="<?php echo URLROOT  ?>image/images.png" alt="image" />
                                </a>
                                <a href="#"><i class="fa fa-check" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="right-description893">
                                <div id="que-hedder2983">
                                    <h3>
                                        <a href="post-deatils.html" target="_blank">This is my first Question</a>
                                    </h3>
                                </div>
                                <div class="ques-details10018">
                                    <p>
                                        Duis dapibus aliquam mi, eget euismod sem
                                        scelerisque ut. Vivamus at elit quis urna adipiscing
                                        iaculis.Duis dapibus aliquam mi, eget euismod sem
                                        scelerisque ut. Vivamus at elit quis urna adipiscing
                                        iaculis.
                                    </p>
                                </div>
                                <hr />
                                <div class="ques-icon-info3293">
                                    <a href="#"><i class="fa fa-check check-color329" aria-hidden="true">
                                            solved</i></a>
                                    <a href="#"><i class="fa fa-star" aria-hidden="true"> 5</i>
                                    </a>
                                    <a href="#"><i class="fa fa-folder" aria-hidden="true">
                                            wordpress</i></a>
                                    <a href="#"><i class="fa fa-clock-o" aria-hidden="true">
                                            4 min ago</i></a>
                                    <a href="#"><i class="fa fa-comment" aria-hidden="true">
                                            5 answer</i></a>
                                    <a href="#"><i class="fa fa-user-circle-o" aria-hidden="true">
                                            70 view</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="ques-type302">
                                <a href="#">
                                    <button type="button" class="q-type238">
                                        <i class="fa fa-comment" aria-hidden="true">
                                            333335 answer</i>
                                    </button>
                                </a>
                                <a href="#">
                                    <button type="button" class="q-type23 button-ques2973">
                                        <i class="fa fa-user-circle-o" aria-hidden="true">
                                            70 view</i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End content-3 -->

            <section id="content4">
                <!--No answered Content Section -->
                <div class="question-type2033">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="left-user12923 left-user12923-repeat">
                                <a href="#"><img src="<?php echo URLROOT  ?>image/images.png" alt="image" />
                                </a>
                                <a href="#"><i class="fa fa-check" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="right-description893">
                                <div id="que-hedder2983">
                                    <h3>
                                        <a href="post-deatils.html" target="_blank">This is my first Question</a>
                                    </h3>
                                </div>
                                <div class="ques-details10018">
                                    <p>
                                        Duis dapibus aliquam mi, eget euismod sem
                                        scelerisque ut. Vivamus at elit quis urna adipiscing
                                        iaculis.Duis dapibus aliquam mi, eget euismod sem
                                        scelerisque ut. Vivamus at elit quis urna adipiscing
                                        iaculis.
                                    </p>
                                </div>
                                <hr />
                                <div class="ques-icon-info3293">
                                    <a href="#"><i class="fa fa-check check-color329" aria-hidden="true">
                                            solved</i></a>
                                    <a href="#"><i class="fa fa-star" aria-hidden="true"> 5</i>
                                    </a>
                                    <a href="#"><i class="fa fa-folder" aria-hidden="true">
                                            wordpress</i></a>
                                    <a href="#"><i class="fa fa-clock-o" aria-hidden="true">
                                            4 min ago</i></a>
                                    <a href="#"><i class="fa fa-comment" aria-hidden="true">
                                            5 answer</i></a>
                                    <a href="#"><i class="fa fa-user-circle-o" aria-hidden="true">
                                            70 view</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="ques-type302">
                                <a href="#">
                                    <button type="button" class="q-type238">
                                        <i class="fa fa-comment" aria-hidden="true">
                                            333335 answer</i>
                                    </button>
                                </a>
                                <a href="#">
                                    <button type="button" class="q-type23 button-ques2973">
                                        <i class="fa fa-user-circle-o" aria-hidden="true">
                                            70 view</i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of content-4-->
            </section>

            <section id="content5">
                <!--Recent Question Content Section -->
                <div class="question-type2033">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="left-user12923 left-user12923-repeat">
                                <a href="#"><img src="<?php echo URLROOT  ?>image/images.png" alt="image" />
                                </a>
                                <a href="#"><i class="fa fa-check" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="right-description893">
                                <div id="que-hedder2983">
                                    <h3>
                                        <a href="post-deatils.html" target="_blank">This is my first Question</a>
                                    </h3>
                                </div>
                                <div class="ques-details10018">
                                    <p>
                                        Duis dapibus aliquam mi, eget euismod sem
                                        scelerisque ut. Vivamus at elit quis urna adipiscing
                                        iaculis.Duis dapibus aliquam mi, eget euismod sem
                                        scelerisque ut. Vivamus at elit quis urna adipiscing
                                        iaculis.
                                    </p>
                                </div>
                                <hr />
                                <div class="ques-icon-info3293">
                                    <a href="#"><i class="fa fa-star" aria-hidden="true"> 5 </i>
                                    </a>
                                    <a href="#"><i class="fa fa-folder" aria-hidden="true">
                                            wordpress</i></a>
                                    <a href="#"><i class="fa fa-clock-o" aria-hidden="true">
                                            4 min ago</i></a>
                                    <a href="#"><i class="fa fa-question-circle-o" aria-hidden="true">
                                            Question</i></a>
                                    <a href="#"><i class="fa fa-bug" aria-hidden="true">
                                            Report</i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="ques-type302">
                                <a href="#">
                                    <button type="button" class="q-type238">
                                        <i class="fa fa-comment" aria-hidden="true">
                                            333335 answer</i>
                                    </button>
                                </a>
                                <a href="#">
                                    <button type="button" class="q-type23 button-ques2973">
                                        <i class="fa fa-user-circle-o" aria-hidden="true">
                                            70 view</i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of content-5-->
            </section>
        <?php else : ?>
            <section id="content1">
                <!--Most Response Content Section -->
                <div class="question-type2033">
                    <div class="row">
                        <h2>Sorry there is currenly no questions has been asked in this category.Come back later</h2>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </div>
</div>
<!--end of col-md-9 -->