<?php
/*
Template Name: allAdvicePage
*/
?>
<?php get_header(); ?>
<div id="wrapper">
    <div class="all-advice-page">
        <div class="all-advice-wrapper">
            <div class="all-advice-item">
                <a href="#">
                    <div class="all-advice-item-img" style="background-image: url('<?php echo wp_upload_dir()['baseurl'] . "/img/speziaBig.jpg"?> ')">
                    </div>
                    <div class="all-advice-item-descr">
                        <h2 class="all-advice-name"> Факты о специях </h2>
                        <p class="all-advice-text"> Но что ты знаешь о специях, которые добавляешь 
                        в мясо или овощи? Мы решили подробнее изучить эту тему
                        и поделиться найденными фактами. </p>
                    </div>
                </a>
            </div>
            <div class="all-advice-item">
                <a href="#">
                    <div class="all-advice-item-img" style="background-image: url('<?php echo wp_upload_dir()['baseurl'] . "/img/vinovino.jpg"?> ')">
                    </div>
                    <div class="all-advice-item-descr">
                        <h2 class="all-advice-name">  Как выбрать вино ? </h2>
                        <p class="all-advice-text"> На что обращать внимание при выборе вина? 
                        Советы, которые сделают вас настоящим знатоком </p>
                    </div>
                </a>
            </div>
            <div class="all-advice-item">
                <a href="#">
                    <div class="all-advice-item-img" style="background-image: url('<?php echo wp_upload_dir()['baseurl'] . "/img/coldBig.jpg"?> ')">
                    </div>
                    <div class="all-advice-item-descr">
                        <h2 class="all-advice-name"> Согреваемся в непогоду </h2>
                        <p class="all-advice-text">  Что лучше съесть, чтобы согреться? И такое бывает? 
                        Да! И речь не о блюдах, пышущих жаром. </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>