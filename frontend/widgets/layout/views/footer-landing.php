<?php
/**
 * Created by PhpStorm.
 * User: borod
 * Date: 05.10.2018
 * Time: 9:32
 */
?>
<footer class="footer">
    <div class="content">
        <div class="footer--main">
            <?= \frontend\widgets\pages\Pages::widget() ?>
            <nav class="nav">
                <?= $this->render('_menu') ?>
                <div class="request">
                    <button class="btn btn--dark show-modal" data-modal="request" type="button">request</button>
                </div>
            </nav>
        </div>
    </div>
</footer>
</section>
</div>
