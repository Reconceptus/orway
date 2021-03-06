<?php

/* @var $this yii\web\View */
/* @var $page \common\models\Page */
/* @var $persons \common\models\Person[] */

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= \frontend\widgets\layout\Layout::widget(['viewName' => 'header']) ?>
    <div id="main" class="main dark-theme">
        <div class="section">
            <div class="about-head">
                <div class="bg-word moving-word">Our story</div>
                <div class="content content--sm">
                    <h1 class="page-title"><?= $page ? $page->name : 'About Us' ?></h1>
                </div>
            </div>
            <div class="about-text">
                <div class="content">
                    <div>
                        <? if ($page): ?>
                            <?= $page->text ?>
                        <? else: ?>
                            <p>Orway is a technology company founded by veterans of the biometric industry, which
                                brought
                                about the whole set of required competencies in R&D, market vision, and business
                                management.
                                Orway was established as a visionary response to the market's need for a biometric
                                authentication technology that is characterized by strong anti-spoofing protection and
                                the
                                highest level of identification. An early start gave Orway an important advance of 2 to
                                3
                                years to stay ahead of competitors. Enormous and unique expertise allows a response to
                                other
                                ongoing requests of the biometric market for new products and thus diversifies what
                                Orway
                                has to offer.</p>
                            <p>Orway was founded in 2017, but its history goes back to 1984, when work commenced on
                                creating
                                a theoretical tool that would make the building of computerized models of anything
                                possible,
                                the first step toward true AI. After 10 years of scientific research, a whole new and
                                unique
                                science was developed for this purpose. In 1994, practical implementation commenced on
                                the
                                development of biometric identification technologies. Several generations of technology
                                and
                                different commercial products were developed. After some mergers, acquisitions, and
                                exits,
                                Orway was born. It was based on a new generation of biometric technology that achieved
                                the
                                theoretical maximum of identification precision and overcame the supposedly impossible
                                problem of absolute anti-spoofing protection (liveness detection).</p>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="about-head team-head">
                <div class="bg-word moving-word">Our team</div>
                <div class="content content--sm">
                    <h1 class="page-title">Team</h1>
                </div>
            </div>
            <div class="about-team">
                <div class="content content--md">
                    <div class="about-team--list">
                        <? foreach ($persons as $person): ?>
                            <div class="about-team--item">
                                <div class="figure">
                                    <img src="<?= $person->image ?>" alt="<?= $person->name ?>">
                                </div>
                                <div class="about-team--person-name"><?= $person->name ?></div>
                                <div class="about-team--person-position"><?= $person->position ?></div>
                                <div class="about-team--person-text"><?= $person->description ?>
                                </div>
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?= \frontend\widgets\layout\Layout::widget(['viewName' => 'footer']) ?>