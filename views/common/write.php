<div class="write">
                            <div class="user">
                                <a href="profile.php?user_id=<?php echo htmlspecialchars($view_write['user_id']); ?>">
                                    <img src="<?php  echo buildImagePath($view_write['user_image_name'], 'user'); ?>" alt="">
                                </a>
                            </div>
                            <div class="content">
                                <div class="name">
                                    <a href="profile.php?user_id=<?php echo htmlspecialchars($view_write['user_id']); ?>">
                                        <span class="nickname"><?php echo htmlspecialchars($view_write['user_nickname']); ?></span>
                                        <span class="user_name">@<?php echo htmlspecialchars($view_write['user_name']); ?> ・<?php echo convertToDayTimeAgo ($view_write['tweet_created_at']); ?></span>
                                    </a>
                                </div>
                                <p><?php echo $view_write['tweet_body'] ?></p>
                                <?php if (isset($view_write['tweet_image_name'])): ?>
                                    <img src="<?php echo buildImagePath($view_write['tweet_image_name'], 'tweet'); ?>" alt="" class="post_image">
                                <?php endif;?>

                            </div>
                        </div>
