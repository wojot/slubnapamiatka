<!-- Header -->

<!--<div id="contact_msg" class="alert alert-success contact_msg" role="alert">Formularz wysłany pomyslnie!</div>-->
<header>
    <div class="container">
        <div id="carousel-example-generic" class="carousel slide slider" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators hidden">

                <?php $counter = 0;
                foreach ($photos as $photo) {
                    ?>

                    <li data-target="#carousel-example-generic"
                        data-slide-to="<?= $counter; ?>"<?php if ($counter == 0) {
                        echo ' class="active"';
                    }
                    $counter++;
                    ?>></li>

                <?php } ?>

            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

                <?php $counter = 0;
                foreach ($photos as $photo) {
                    ?>
                    <div class="item<?php if ($counter == 0) {
                        echo ' active';
                        $counter++;
                    }
                    ?>">
                        <img src="<?= base_url(); ?>uploads/<?= $photo->name; ?>.jpg"
                             alt="Zdjęcie ślubne <?= $photo->id_photo; ?>">
                    </div>
                <?php } ?>

            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
</header>
