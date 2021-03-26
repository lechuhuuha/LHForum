<!--    breadcumb of category -->
<section class="header-descriptin329">
    <div class="container">
        <h3>All tags</h3>
        <ol class="breadcrumb breadcrumb839">
            <li><a href="#">Home</a></li>
            <li class="active">Tags Type</li>
        </ol>
        <h3 style="color:white">A tag is a keyword or label that categorizes your question with other, similar questions. <br> Using the right tags makes it easier for others to find and answer your question.</p>
            <div class="form-style8292">
                <form action="" method="post">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil-square" aria-hidden="true"></i></span>
                        <input type="text" class="form-control form-control8392" placeholder="Search any category and you be sure find your answer ?">
                        <span class="input-group-addon"><a href="#">Search Now</a></span>
                    </div>
                </form>
            </div>
            <br>
    </div>
</section>
<?php include 'container.html.php' ?>
<div class="col-md-9">
    <?php if (!empty($tags)) : ?>

        <section class="category2781">
            <?php foreach ($tags as $tag) : ?>
                <div class="question-type2033">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="left-user12923 left-user12923-repeat">
                                <a href="#"><img src="<?php echo URLROOT  ?>image/images.png" alt="image" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="right-description893">
                                <div id="que-hedder2983">
                                    <h3>
                                        <a href="<?php echo URLROOT . 'quest/list?tag=' . $tag->id ?>"><?php echo htmlspecialchars($tag->name, ENT_QUOTES, 'UTF-8')  ?></a>
                                    </h3>
                                </div>
                                <div class="ques-details10018">
                                    <p>
                                        <?php echo htmlspecialchars($tag->summary, ENT_QUOTES, 'UTF-8');  ?>
                                    </p>
                                </div>
                                <hr />
                                <div class="ques-icon-info3293">
                                    <a href="#"><i class="fa fa-star" aria-hidden="true"> 5 </i>
                                    </a>
                                    <?php if ($tag->updated_at) :  ?>
                                        <a href="#"><i class="fa fa-calendar-plus-o" aria-hidden="true">
                                                <?php $dateUp = new DateTime($tag->updated_at);
                                                echo $dateUp->format('jS F Y') ?></i></a>
                                    <?php else : ?>
                                        <a href="#"><i class="fa fa-calendar-minus-o" aria-hidden="true">
                                                <?php $date = new DateTime($tag->created_at);
                                                echo $date->format('jS F Y') ?></i></a>
                                    <?php endif; ?>

                                    <a href="#"><i class="fa fa-tags" aria-hidden="true">
                                            Tags</i></a>
                                    <a href="#"><i class="fa fa-bug" aria-hidden="true">
                                            Report</i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="ques-type302">
                                <a href="#">
                                    <button type="button" class="q-type238">
                                        <i class="fa fa-question-circle" aria-hidden="true">
                                            <?php echo ($tag->getQuests()['totalQuestInTag']) ?></i>
                                    </button>
                                </a>

                                <!-- edit and delete form -->
                                <a class="q-type238" href="<?php echo URLROOT . 'tag/edit?id=' . $tag->id ?>">Edit</a>
                                <form action="<?php echo URLROOT . 'tag/delete' ?>" method="POST">
                                    <input type="hidden" name="id" value="<?= $tag->id ?>">
                                    <input class="q-type238" type="submit" value="Delete">
                                </form>
                                <!-- !edit and delete form -->
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </section>
    <?php else : ?>
        <section id="content1">
            <!--Most Response Content Section -->
            <div class="question-type2033">
                <div class="row">
                    <h2>Sorry there is currenly no tag has been added.Come back later</h2>
                </div>
            </div>
        </section>
    <?php endif; ?>

</div>
<!-- end of col-md-9 -->