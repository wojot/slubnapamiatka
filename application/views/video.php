<!-- Portfolio Grid Section -->
<section id="video" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Filmy</h2>
                <h3 class="section-subheading text-muted">Poniżej widoczne są skróty ze ślubów i wesel. Pakiet z
                    kamerzystą zawiera także pełne - kilkugodzinne filmy</h3>
            </div>
        </div>
        <div class="row text-center">

            <?php

            foreach ($videos as $video) {
                ?>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class src="<?= $video->link;?>" allowfullscreen></iframe>
                </div><br>
            <?php
            }
            ?>
        </div>
    </div>
</section>