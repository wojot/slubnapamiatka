<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Kontakt</h2>
                <h3 class="section-subheading text-primary">Skontaktuj się poprzez formularz, lub bezpośrednio przez
                    e-mail lub telefon.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <?php


                $name = array(
                    'name' => 'name',
                    'type' => 'text',
                    'placeholder' => 'Imię',
                    'class' => 'form-control',
                    'value' => $this->input->post('name')
                );

                $email = array(
                    'name' => 'email',
                    'type' => 'email',
                    'placeholder' => 'Twój email',
                    'class' => 'form-control',
                    'value' => $this->input->post('email')
                );

                $phone = array(
                    'name' => 'phone',
                    'type' => 'text',
                    'placeholder' => 'Nr telefonu (opcjonalnie)',
                    'class' => 'form-control',
                    'value' => $this->input->post('phone')
                );

                $date = array(
                    'name' => 'date',
                    'type' => 'text',
                    'placeholder' => 'Data ślubu',
                    'class' => 'form-control',
                    'value' => $this->input->post('date')
                );

                $message = array(
                    'name' => 'message',
                    'type' => 'text',
                    'placeholder' => 'Treść wiadomości...',
                    'class' => 'form-control',
                    'value' => $this->input->post('message')
                );

                $photo_box = array(
                    'fotoreportaz' => 'Fotoreportaż',
                    'foto_poprawiny' => '4 godziny fotografowania na poprawinach',
                    'foto_makijaz' => 'Zdjęcia z makijażu',
                    'foto_plener' => 'Plener w inny dzień'
                );

                $video_box = array(
                    'videoreportaz' => 'Videoreportaż',
                    'video_poprawiny' => '4 godziny filmowania na poprawinach',
                    'video_makijaz' => 'Filmowanie u kosmetyczki',
                    'video_podziekowania' => 'Podziękowania dla rodziców w formie videoklipu'
                );

                $submit = array(
                    'class' => 'btn btn-xl btn-block',
                    'name' => 'submit',
                    'value' => 'Wyślij'
                );
                $link = base_url() . '#contact';
                echo form_open(base_url() . '#contact');
                ?>

                <div class="row">
                    <div class="col-md-12 checkboxes">
                        <p>Możesz zaznaczyć czego dotyczy zapytanie:</p>
                    </div>
                </div>

                <div class="row">
                    <?php
                    foreach ($photo_box as $k => $v) {
                        $data = array(
                            'name' => $k,
                            'id' => $k,
                            'value' => $k,
                            'checked' => FALSE
                        );

                        ?>
                        <div class="col-md-3 checkboxes">
                            <label class="checkbox-inline checkbox_contact">
                                <?php
                                echo form_checkbox($data);
                                echo $v;
                                ?>
                            </label>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <br>

                <div class="row">
                    <?php
                    foreach ($video_box as $k => $v) {
                        $data = array(
                            'name' => $k,
                            'id' => $k,
                            'value' => $k,
                            'checked' => FALSE
                        );

                        ?>
                        <div class="col-md-3 checkboxes">
                            <label class="checkbox-inline checkbox_contact">
                                <?php
                                echo form_checkbox($data);
                                echo $v;
                                ?>
                            </label>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <br><br>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo form_input($name);
                            echo form_error('name', '<p class="help-block text-danger">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_input($date);
                            echo form_error('date', '<p class="help-block text-danger">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_input($email);
                            echo form_error('email', '<p class="help-block text-danger">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <?= form_input($phone); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo form_textarea($message);
                            echo form_error('message', '<p class="help-block text-danger">', '</p>'); ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 text-center">

                        <?= form_submit($submit); ?>
                    </div>
                </div>
                <br/>
                <br/>
                <?php
                echo form_close();
                ?>
                <!--            </div>-->
                <!--  </div>-->
                <!--  </div>-->
                <!--</section>-->
                <!-- jQuery -->
                <script src="<?= base_url(); ?>vendor/jquery/jquery.min.js"></script>
