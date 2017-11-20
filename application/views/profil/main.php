<section id="profil" class="bg-light-gray profil">
    <div class="container">
        <div class="row">
        <?php
        if ($profil[0]->photo_link!="brak") {
            ?>
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Zdjęcia</h2>

                <h4 class="section-subheading text-muted">Aby zobaczyć wszystkie zdjęcia ze ślubu i wesela, kliknij na
                    poniższe zdjęcie.</h4><br>

                <a href="<?= $profil[0]->photo_link; ?>"><img
                        src="<?= base_url(); ?>uploads/customers/<?= $profil[0]->photo_name; ?>.jpg"
                        class="img img-thumbnail"/></a>
                <br><br>
                <h4 class="section-subheading text-muted">Zdjęcia dostepne na chmurze do 30.01.2018r.</h4><br>
            </div>
        </div>
        <br><br>
       <?php } ?>

        <?php
        if ($profil[0]->video_link!="brak") {
            ?>
            <div class="row">

                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Skrót video</h2>

                    <h4 class="section-subheading text-muted">Kliknij w poniższy film aby zobaczyc skrót.</h4><br>

                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="<?= $profil[0]->video_link; ?>"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>

        <?php } ?>


    </div>
</section>

