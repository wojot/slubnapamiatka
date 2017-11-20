<body>
<section id="photos" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Zdjęcia</h2>
            </div>
            <div class="text-center" style="margin-top:50px;">
                <a href="javascript:void(0);" class="btn btn-success reorder_link" id="save_reorder">Zmień kolejność</a>
                <div id="reorder-helper" class="light_box" style="display:none;">1. Przesuń zdjęcia w odpowiedniej
                    kolejności.<br>2. Kliknij 'zapisz kolejnośc' by zapamiętać kolejnośc wyświetlania zdjęć.
                </div>
                <div class="gallery">
                    <ul class="reorder_ul reorder-photos-list">
                        <?php

                        foreach ($photos as $photo): ?>

                            <li id="image_li_<?= $photo->id_photo; ?>" class="ui-sortable-handle">
                                <a href="<?= base_url(); ?>admin/delete/<?= $photo->name; ?>"
                                   class="btn btn-danger button_remove"><span class="glyphicon glyphicon-remove"
                                                                              aria-hidden="true"></span> Usuń
                                    zdjęcie</a>
                                <a href="javascript:void(0);" style="float:none;" class="image_link">
                                    <img class="img-thumbnail"
                                         src="<?= base_url() . 'uploads/' . $photo->name . '_thumb.jpg'; ?>" alt=""></a>
                            </li>


                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
</section>

<section id="add_photos">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 text-center">

                <h2 class="section-heading">Dodaj zdjęcia:</h2><br/>
            </div>
        </div>

        <div id="dropzone">
            <form action="<?php echo site_url('/admin/upload'); ?>" class="dropzone needsclick">

                <div class="dz-message needsclick">
                    <p>Przeciągnij tutaj zdjęcia, lub kliknij by otworzyć eksplorator.</p>
                </div>

            </form>
        </div>
    </div>
</section>


<section id="add_customer">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 text-center">

                <h2 class="section-heading">Dodaj klienta:</h2><br/>
            </div>
        </div>


        <?php

        $open_customer = array(
            'class' => '',
        );
        $customer_name = array(
            'type' => 'text',
            'name' => 'name',
            'placeholder' => 'Nazwa',
            'class' => 'form-control '
        );
        $customer_photo_link = array(
            'type' => 'text',
            'name' => 'photo_link',
            'placeholder' => 'Link do zdjęć',
            'class' => 'form-control '
        );
        $customer_video_link = array(
            'type' => 'text',
            'name' => 'video_link',
            'placeholder' => 'Link do filmu',
            'class' => 'form-control '
        );
        $customer_file = array(
            'type' => 'file',
            'name' => 'photo',
            'style'=>'display: none;'
        );
        $button_customer = array(
            'type' => 'submit',
            'class' => 'btn btn-success btn-block',
            'value' => 'Dodaj klienta',
        );


        echo form_open_multipart('admin/new_customer', $open_customer);
        ?>
        <div class="row">
            <div class="col-md-2">
                <?= form_input($customer_name); ?>
            </div>
            <div class="col-md-3">
                <?= form_input($customer_photo_link); ?>
            </div>
            <div class="col-md-3">
                <?= form_input($customer_video_link); ?>
            </div>
            <div class="col-md-2">
                <label class="btn btn-default btn-file btn-block">
                    Zdjęcie <?= form_upload($customer_file); ?>
                </label>

            </div>
            <div class="col-md-2">
                <?= form_submit($button_customer); ?>
            </div>
        </div>
        <?php
        echo form_close();
        ?>

    </div>
</section>




<section id="add_videos">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 text-center">

                <h2 class="section-heading">Dodaj filmy:</h2><br/>
            </div>
        </div>


        <?php
        foreach ($videos as $video) {

            ?>
            <div class="col-md-6 video_admin">
                <a href="admin/delete_video/<?= $video->id_video; ?>" class="btn btn-danger button_remove">Usuń film</a>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="<?= $video->link; ?>"></iframe>
                </div>
            </div>
            <?php
        }

        $open_new = array(
            'class' => '',
        );
        $new_video = array(
            'type' => 'text',
            'name' => 'link',
            'placeholder' => 'Wklej link do nowego filmu...',
            'class' => 'form-control '
        );
        $button_new = array(
            'type' => 'submit',
            'class' => 'btn btn-success btn-block',
            'value' => 'Dodaj nowy film',
        );

        echo form_open('admin/new_video', $open_new);
        ?>
        <div class="row">
            <div class="col-md-8">
                <?= form_input($new_video); ?>
            </div>
            <div class="col-md-4">
                <?= form_submit($button_new); ?>
            </div>
        </div>
        <?php
        echo form_close();
        ?>


        <h3 class="section-subheading text-muted text-center">Jesteś w panelu admina. <a
                href="<?= base_url() ?>admin/logout" class="btn btn-danger">Wyloguj</a></h3>
    </div>
</section>


<!--    drag and drop images reorder-->
<script type="text/javascript" src="<?= base_url(); ?>js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>js/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.reorder_link').on('click', function () {
            $("ul.reorder-photos-list").sortable({tolerance: 'pointer'});
            $('.reorder_link').html('Zapisz kolejność');
            $('.button_remove').fadeOut();
            $('.reorder_link').attr("id", "save_reorder");
            $('#reorder-helper').slideDown('slow');
            $('.image_link').attr("href", "javascript:void(0);");
            $('.image_link').css("cursor", "move");
            $("#save_reorder").click(function (e) {
                if (!$("#save_reorder i").length) {
                    $(this).html('').prepend('<img src="<?= base_url()?>img/refresh-animated.gif"/>');
                    $("ul.reorder-photos-list").sortable('destroy');
                    $("#reorder-helper").html("Zapisywanie...").removeClass('light_box').addClass('notice notice_error');

                    var h = [];
                    $("ul.reorder-photos-list li").each(function () {
                        h.push($(this).attr('id').substr(9));
                    });
                    $.ajax({
                        type: "POST",
//                        url: "order_update.php",
                        url: "<?= base_url()?>admin/reorder",
                        data: {ids: " " + h + ""},
                        success: function (html) {
                            window.location.reload();
                            /*$("#reorder-helper").html( "Reorder Completed - Image reorder have been successfully completed. Please reload the page for testing the reorder." ).removeClass('light_box').addClass('notice notice_success');
                             $('.reorder_link').html('reorder photos');
                             $('.reorder_link').attr("id","");*/
                        }

                    });
                    return false;
                }
                e.preventDefault();
            });
        });

    });
</script>
