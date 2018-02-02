<div class="container">
<div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $this->lang->line('sign_in') ?></h3>
                    </div>
                    <div class="panel-body">
                        <?php 
                        $form_location = base_url() . 'dvilsf/submit_login';
                        echo validation_errors();
                         ?>
                        <form role="form" action="<?= $form_location ?>" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="<?= $this->lang->line('username') ?>" name="username" type="text" autofocus="" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="<?= $this->lang->line('password') ?>" name="password" type="password" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me"><?= $this->lang->line('remember') ?>
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="submit" value="Submit" class="btn btn-lg btn-success btn-block"><?= $this->lang->line('login') ?></button>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>