<?= $this->tag->form(['session/start']) ?>
<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<title>Đăng nhập</title>
<style>
fieldset {
    
    margin-left: 10px;
    
}
</style>
    <fieldset>
        <div>
            <label for="email">
                Username
            </label>

            <div>
                <?= $this->tag->textField(['email']) ?>
            </div>
        </div>

        <div>
            <label for="password">
                Password
            </label>

            <div>
                <?= $this->tag->passwordField(['password']) ?>
            </div>
        </div>
         <?php
            if (isset($wrong)){ 
                $this->flash->error(
                    "Sai mật khẩu hoặc user"
                );
            }
            ?>

        </br>
        <div>
            <button  class="btn btn-success" >Đăng nhập</button>
        </div>
    </fieldset>
<?= $this->tag->endform() ?>