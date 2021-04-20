<section class="header-descriptin329">
    <div class="container">
        <h3>Post Details</h3>
        <ol class="breadcrumb breadcrumb839">
            <li><a href="#">Home</a></li>
            <li><a href="#">Post Details</a></li>
            <li class="active"><a href="<?= URLROOT . 'quest/detail?id=' . $quest->id ?>"><?= $quest->title ?></a></li>
        </ol>
    </div>
</section>
<?php include 'container.html.php' ?>

<div class="col-md-9">
    <div class="post-details">
        <div class="details-header923">
            <div class="row">
                <div class="col-md-8">
                    <div class="post-title-left129">
                        <h3><?= htmlspecialchars($quest->title, ENT_QUOTES, 'UTF-8') ?></h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="post-que-rep-rihght320">
                        <a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i>
                            Question</a>
                        <a href="#" class="r-clor10">Report</a>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="post-details-info1982">
            <?= $quest->content ?>
            <hr />
            <div class="post-footer29032">
                <div class="l-side2023">
                    <i class="fa fa-check check2" aria-hidden="true"> solved</i>
                    <a href="#"><i class="fa fa-star star2" aria-hidden="true"> 5</i></a>
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
                    <a href="#"><i class="fa fa-commenting commenting2" aria-hidden="true">
                            5 answer</i></a>
                    <i class="fa fa-user user2" aria-hidden="true"> <?= $quest->views ?></i>
                </div>
                <div class="l-rightside39">
                    <button type="button" class="tolltip-button thumbs-up2" data-toggle="tooltip" data-placement="bottom" title="Like">
                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="tolltip-button thumbs-down2" data-toggle="tooltip" data-placement="bottom" title="Dislike">
                        <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                    </button>
                    <span class="single-question-vote-result">+22</span>
                </div>
            </div>
        </div>
    </div>
    <div class="share-tags-page-content12092">
        <div class="l-share2093">
            <i class="fa fa-share" aria-hidden="true"> Share</i>
        </div>
        <div class="R-tags309">
            <i class="fa fa-tags" aria-hidden="true">
                Wordpress, Question, Developer</i>
        </div>
    </div>
    <div class="author-details8392">
        <div class="author-img202l">
            <img src="image/images.png" alt="image" />
            <div class="au-image-overlay text-center">
                <a href="#"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
            </div>
        </div>
        <span class="author-deatila04re">
            <h5>About the Author</h5>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                viverra auctor neque. Nullam lobortis, sapien vitae lobortis
                tristique.
            </p>
        </span>
    </div>
    <div class="related3948-question-part">
        <h3>Related questions</h3>
        <hr />
        <p>
            <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>This Is My Second Poll Question</a>
        </p>
        <p>
            <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>This is my third Question</a>
        </p>
        <p>
            <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>This is my fourth Question</a>
        </p>
        <p>
            <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>This is my fifth Question</a>
        </p>
    </div>
    <div class="comment-list12993">
        <div class="container">
            <div class="row">
                <div class="comments-container">
                    <ul id="comments-list" class="comments-list comments">
                        <?= $answers ?>

                    </ul>
                    <span id="showComment" onclick="showCommentForm()"><a href="javascript:void(0)">Add an comment</a></span>
                </div>
            </div>
        </div>
    </div>
    <div class="write_comment" style="display: none;" id="comment289" data-comment-id="-1">
        <form method="POST" action="<?= URLROOT ?>quest/answer">
            <input name="quest[id]" type="hidden" value="<?php echo $_GET['id'] ?>">
            <input name="quest[parent_id]" type="hidden" value="-1">
            <input name="quest[username]" type="text" placeholder="Your Name" required>
            <textarea name="quest[content]" placeholder="Write your comment here..." required></textarea>
            <button type="submit">Submit Comment</button>
        </form>
    </div>
</div>
<!--                end of col-md-9 -->
<script>
    function showCommentForm() {
        let btn = document.querySelector("#comment289");
        if (btn.style.display == 'none') {
            btn.style.display = "block";
        } else {
            btn.style.display = 'none';
        }
    }
    document.querySelectorAll('.comments .reply_answer_btn').forEach(element => {
        element.addEventListener('click', () => {
            document.querySelectorAll(".component").forEach(element => {
                element.style.display = 'none';
                console.log(element.getAttribute('data-comment-id'));

            })
            document.querySelector("div[data-comment-id='" + element.getAttribute("data-answer-id") + "']").style.display = 'block';

        })
    })
</script>