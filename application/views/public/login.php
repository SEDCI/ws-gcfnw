    <header>
        <div class="container">
            <div class="intro-text" style="padding-top: 100px; padding-bottom: 100px;">
                <h1>Log In</h1>
            </div>
        </div>
    </header>

    <section id="events" class="bg-light-gray" align="center" style="padding-top:50px">
        <div class="container">
            <div class="col-sm-4 col-sm-offset-4">
<?php echo $validation_errors; ?>
                <div class="well">
                    <?php echo form_open('login/auth'); ?>
                        <div class="form-group">
                            <label for="useremail">Username:</label>
                            <input type="text" class="form-control" id="useremail" name="useremail" />
                        </div>
                        <div class="form-group">
                            <label for="userpass">Password:</label>
                            <input type="password" class="form-control" id="userpass" name="userpass" />
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
