<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="copyright">Copyright &copy; WojoT
                    <?php
                    $time = time();
                    echo mdate('%Y', $time);
                    ?>
                </span>
            </div>
            <div class="col-md-2">
                <ul class="list-inline social-buttons">
                    <li><a href="http://www.wojot.pl"><i class="fa fa-camera"></i></a>
                    </li>
                    <li><a href="https://www.facebook.com/wojotfotografia/"><i class="fa fa-facebook"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="list-inline quicklinks">
                    <li>
                        <a class="page-scroll" href="<?= base_url();?>#photos">Zdjęcia</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?= base_url();?>#video">Filmy</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?= base_url();?>#album">Album i płyty</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?= base_url();?>#about">O nas</a>
                    </li>
<!--                    <li>-->
<!--                        <a class="page-scroll" href="--><?//= base_url();?><!--#prices">Cennik</a>-->
<!--                    </li>-->
                    <li>
                        <a class="page-scroll" href="<?= base_url();?>#contact">Kontakt</a>
                    </li>
                    <li><a href="<?=base_url();?>admin">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>





<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>


<!-- Lightbox 2 -->
<script src="<?= base_url();?>js/lightbox.js"></script>


<!-- Contact Form JavaScript -->
<script src="<?= base_url();?>js/jqBootstrapValidation.js"></script>
<script src="<?= base_url();?>js/contact_me.js"></script>

<script src="<?= base_url();?>js/dropzone.js"></script>

<!-- Theme JavaScript -->
<script src="<?= base_url();?>js/agency.min.js"></script>

<script>
$('.carousel').carousel({
  interval: 3000,
  pause: null
})
</script>

</body>

</html>
