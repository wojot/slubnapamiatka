<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Logowanie do panelu administratora</h2>
            </div>
        </div>
        <div class="row text-center">
            <?php

            $open = array(
                'class' => 'form-inline',
            );

            $nick = array(
                'name' => 'nick',
                'value' => $this->input->post('nick'),
                'placeholder' => 'Nick',
                'type' => 'text',
                'class' => 'form-control',
            );

            $password = array(
                'name' => 'password',
                'value' => $this->input->post('password'),
                'placeholder' => 'Hasło',
                'type' => 'password',
                'class' => 'form-control',
            );

            $submit = array(
                'name' => 'submit',
                'type' => 'submit',
                'class' => 'btn btn-success',
                'value' => 'Zaloguj',
            );


            echo form_open('', $open);

            ?>
            <br/>

            <div class="form-group">
                <?= form_input($nick); ?>
            </div>
            <div class="form-group">
                <?= form_input($password); ?>
            </div>
            <?= form_input($submit); ?>
            <?php
            echo form_close();
            ?>
            <br/>
            <?php echo validation_errors();
            if (isset($error)) {
                echo $error;
            }
            ?>

        </div>
    </div>
    </div>
</section>
