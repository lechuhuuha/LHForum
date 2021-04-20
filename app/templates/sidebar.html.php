            <!--strart col-md-3 (side bar)-->
            <aside class="col-md-3 sidebar97239">
                <div class="status-part3821">
                    <h4>stats</h4>
                    <a href="#"><i class="fa fa-question-circle" aria-hidden="true">
                            Question(<?= $totalQuest ?>)</i></a>
                    <i class="fa fa-comment" aria-hidden="true"> Answers(<?= $totalAnswer ?>)</i>
                </div>
                <div class="categori-part329">
                    <h4>Category</h4>
                    <ul>
                        <?php foreach ($categories as $category) : ?>
                            <li><a href="<?php echo URLROOT . 'quest/list?category=' . $category->id ?>"><?= $category->name ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!--             social part -->
                <div class="social-part2189">
                    <h4>Find us</h4>
                    <li class="rss-one">
                        <a href="#" target="_blank">
                            <strong>
                                <span>Subscribe</span>
                                <i class="fa fa-rss" aria-hidden="true"></i>

                                <br />
                                <small>To RSS Feed</small>
                            </strong>
                        </a>
                    </li>
                    <li class="facebook-two">
                        <a href="#" target="_blank">
                            <strong>
                                <span>Subscribe</span>
                                <i class="fa fa-facebook" aria-hidden="true"></i>

                                <br />
                                <small>To Facebook Feed</small>
                            </strong>
                        </a>
                    </li>
                    <li class="twitter-three">
                        <a href="#" target="_blank">
                            <strong>
                                <span>Subscribe</span>
                                <i class="fa fa-twitter" aria-hidden="true"></i>

                                <br />
                                <small>To twitter Feed</small>
                            </strong>
                        </a>
                    </li>
                    <li class="youtube-four">
                        <a href="#" target="_blank">
                            <strong>
                                <span>Subscribe</span>
                                <i class="fa fa-youtube" aria-hidden="true"></i>

                                <br />
                                <small>To youtube Feed</small>
                            </strong>
                        </a>
                    </li>
                </div>
                <!--login part-->
                <div class="login-part2389">
                    <h4>Login</h4>
                    <div class="input-group300">
                        <span><i class="fa fa-user" aria-hidden="true"></i></span>
                        <input type="text" class="namein309" placeholder="Username" />
                    </div>
                    <div class="input-group300">
                        <span><i class="fa fa-lock" aria-hidden="true"></i></span>
                        <input type="password" class="passin309" placeholder="Name" />
                    </div>
                    <a href="#">
                        <button type="button" class="userlogin320">Log In</button>
                    </a>
                    <div class="rememberme">
                        <label>
                            <input type="checkbox" checked="checked" /> Remember Me</label>
                        <a href="#" class="resbutton3892">Register</a>
                    </div>
                </div>
                <!--highest part-->
                <div class="highest-part302">
                    <h4>Highest Points</h4>
                    <div class="pints-wrapper">
                        <div class="left-user3898">
                            <a href="#"><img src="<?php echo URLROOT  ?>image/images.png" alt="Image" /></a>
                            <div class="imag-overlay39">
                                <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <span class="points-details938">
                            <a href="#">
                                <h5>Ahmed Hasan</h5>
                            </a>
                            <a href="#" class="designetion439">Pundit</a>
                            <p>206 points</p>
                        </span>
                    </div>
                    <hr />
                    <div class="pints-wrapper">
                        <div class="left-user3898">
                            <a href="#"><img src="<?php echo URLROOT  ?>image/images.png" alt="Image" /></a>
                            <div class="imag-overlay39">
                                <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <span class="points-details938">
                            <a href="#">
                                <h5>Ahmed Hasan</h5>
                            </a>
                            <a href="#" class="designetion439">Pundit</a>
                            <p>206 points</p>
                        </span>
                    </div>
                    <hr />
                    <div class="pints-wrapper">
                        <div class="left-user3898">
                            <a href="#"><img src="<?php echo URLROOT  ?>image/images.png" alt="Image" /></a>
                            <div class="imag-overlay39">
                                <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <span class="points-details938">
                            <a href="#">
                                <h5>Ahmed Hasan</h5>
                            </a>
                            <a href="#" class="designetion439">Pundit</a>
                            <p>206 points</p>
                        </span>
                    </div>
                    <hr />
                    <div class="pints-wrapper">
                        <div class="left-user3898">
                            <a href="#"><img src="<?php echo URLROOT  ?>image/images.png" alt="Image" /></a>
                            <div class="imag-overlay39">
                                <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <span class="points-details938">
                            <a href="#">
                                <h5>Ahmed Hasan</h5>
                            </a>
                            <a href="#" class="designetion439">Pundit</a>
                            <p>206 points</p>
                        </span>
                    </div>
                    <hr />
                    <div class="pints-wrapper">
                        <div class="left-user3898">
                            <a href="#"><img src="<?php echo URLROOT  ?>image/images.png" alt="Image" /></a>
                            <div class="imag-overlay39">
                                <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <span class="points-details938">
                            <a href="#">
                                <h5>Ahmed Hasan</h5>
                            </a>
                            <a href="#" class="designetion439">Pundit</a>
                            <p>206 points</p>
                        </span>
                    </div>
                </div>
                <!--               end of Highest points -->
                <!--          start tags part-->
                <div class="tags-part2398">
                    <h4>Tags</h4>
                    <ul>
                        <?php foreach ($tags as $tag) : ?>
                            <li><a href="<?php echo URLROOT . 'quest/list?tag=' . $tag->id ?>"> <?= $tag->name ?>
                                </a></li>
                        <?php endforeach; ?>

                    </ul>
                </div>
                <!--          End tags part-->
                <!--        start recent post  -->
                <div class="recent-post3290">
                    <h4>Recent Post</h4>
                    <?php foreach ($posts as $post) : ?>
                        <div class="post-details021">
                            <a href="<?php echo URLBLOG . "/posts/post/" . $post->id ?>">
                                <h5><?= $post->title ?></h5>
                            </a>
                            <p>
                                <?= $post->summary ?>
                            </p>
                            <small style="color: #848991"><?php $date = new DateTime($post->created_at);
                                                            echo $date->format('jS F Y') ?></small>
                        </div>
                        <hr />
                    <?php endforeach; ?>

                    <div class="post-details021">
                        <a href="#">
                            <h5>How much do web developers</h5>
                        </a>
                        <p>
                            I am thinking of pursuing web developing as a career & was ...
                        </p>
                        <small style="color: #848991">July 16, 2017</small>
                    </div>
                    <hr />
                    <div class="post-details021">
                        <a href="#">
                            <h5>How much do web developers</h5>
                        </a>
                        <p>
                            I am thinking of pursuing web developing as a career & was ...
                        </p>
                        <small style="color: #848991">July 16, 2017</small>
                    </div>
                </div>
                <!--       end recent post    -->
            </aside>
            </div>
            </div>
            </section>