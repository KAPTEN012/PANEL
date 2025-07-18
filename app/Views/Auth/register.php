<?php

include('conn.php');
include('mail.php');

// For Credits
$sql = "SELECT * FROM credit where id=1";
$result = mysqli_query($conn, $sql);
$credit = mysqli_fetch_assoc($result);

?>

<?= $this->extend('Layout/Starter') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center pt-5">
    <div class="col-lg-4">
        <?= $this->include('Layout/msgStatus') ?>

             <div class="card shadow-sm mb-5">
             <div class="card-header text-white"style="background: url('https://c.wallhere.com/photos/36/5d/anime_anime_girls_Honkai_Star_Rail_Kafka_Honkai_Star_Rail_purple_hair_purple_eyes_looking_at_viewer_gloves-2274356.jpg!s1');">
                𝐑𝐄𝐆𝐈𝐒𝐓𝐄𝐑 - <i class="bi bi-exclamation-triangle"></i> Don't Use Space  <i class="bi bi-exclamation-triangle"></i>
            </div>
            <div class="card-body">
                <div class="card-body" style="background-image: url('https://c.wallhere.com/photos/a0/7c/Honkai_Star_Rail_artwork_Bronya_Zaychik_fan_art_anime_anime_girls_silver_hair_brown_eyes-2262148.jpg!s1'); background-position: center; background-size: cover;">

            <div class="card-body">
                <?= form_open() ?>

                <div class="form-group mb-3">
                    <label for="email">ᴇ-ᴍᴀɪʟ</label>
                    <input type="email" class="form-control mt-2" name="email" id="email" aria-describedby="help-email" placeholder="Enter Your Current Mail" minlength="13" maxlength="40" value="<?= old('email') ?>" required>
                    <?php if ($validation->hasError('email')) : ?>
                        <small id="help-email" class="form-text text-danger"><?= $validation->getError('email') ?></small>
                    <?php endif; ?>
                </div>
                <div class="form-group mb-3">
                    <label for="username">ᴜsᴇʀɴᴀᴍᴇ</label>
                    <input type="text" class="form-control mt-2" name="username" id="username" aria-describedby="help-username" placeholder="Your username" minlength="4" maxlength="24" value="<?= old('username') ?>" required>
                    <?php if ($validation->hasError('username')) : ?>
                        <small id="help-username" class="form-text text-danger"><?= $validation->getError('username') ?></small>
                    <?php endif; ?>
                </div>
                <div class="form-group mb-3">
                    <label for="fullname">ғᴜʟʟɴᴀᴍᴇ</label>
                    <input type="text" class="form-control mt-2" name="fullname" id="fullname" aria-describedby="help-fullname" placeholder="Your fullname" minlength="4" maxlength="24" value="<?= old('fullname') ?>" required>
                    <?php if ($validation->hasError('fullname')) : ?>
                        <small id="help-fullname" class="form-text text-danger"><?= $validation->getError('fullname') ?></small>
                    <?php endif; ?>
                </div>
                <div class="form-group mb-3">
                    <label for="password">ᴘᴀssᴡᴏʀᴅ</label>
                    <input type="password" class="form-control mt-2 fa fa-fw fa-eye field_icon toggle-password" name="password" id="password" aria-describedby="help-password" placeholder="𝐸𝑛𝑡𝑒𝑟 𝑃𝑎𝑠𝑠𝑤𝑜𝑟𝑑" minlength="6" maxlength="24" required>
                    <?php if ($validation->hasError('password')) : ?>
                        <small id="help-password" class="form-text text-danger"><?= $validation->getError('password') ?></small>
                    <?php endif; ?>
                </div>
                <div class="form-group mb-3">
                    <label for="password2">ᴄᴏɴғɪʀᴍ ᴘᴀssᴡᴏʀᴅ</label>
                    <input type="password" name="password2" id="password2" class="form-control mt-2 fa fa-fw fa-eye field_icon toggle-password2" placeholder="Confirm password" aria-describedby="help-password2" minlength="6" maxlength="24" required>
                    <?php if ($validation->hasError('password2')) : ?>
                        <small id="help-password2" class="form-text text-danger"><?= $validation->getError('password2') ?></small>
                    <?php endif; ?>
                </div>
                <div class="form-group mb-3">
                    <label for="referral">ʀᴇғᴇʀʀᴀʟ ᴄᴏᴅᴇ</label>
                    <input type="text" name="referral" id="referral" class="form-control mt-2" placeholder="𝑌𝑜𝑢𝑟 𝑅𝑒𝑓𝑒𝑟𝑎𝑙 𝐶𝑜𝑑𝑒" aria-describedby="help-referral" value="<?= old('referral') ?>" maxlength="25" required>
                    <?php if ($validation->hasError('referral')) : ?>
                        <small id="help-referral" class="form-text text-danger"><?= $validation->getError('referral') ?></small>
                    <?php endif; ?>
                </div>
              <!---->
                <div class="form-group mb-3">
                    <label for="ip" class="form-label">ɪᴘ ᴀᴅᴅʀᴇss</label>
                    <input type="text" id="ip" class="form-control" placeholder="<?php echo $user_ip ?>" readonly>
                </div>
                <!---->
                
                <div class="form-group mb-2">
                    <button type="submit" class="btn btn-outline-warning text-dark" onclick="popup()"><i class="bi bi-box-arrow-in-right"></i>𝐑𝐄𝐆𝐈𝐒𝐓𝐄𝐑</button>
                </div>
                <?= form_close() ?>



            </div>
        </div>
        </div>
        </div>
        </div>
        <p class="text-center text-danger after-card">
            <small class="px-auto p-2 rounded">
                Already have an account?
                <a href="<?= site_url('login') ?>" class="text-danger">Login here</a>
            </small>
            <br><br><br>
        </p>
    </div>
  <br><br>
</div>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script> 
    $(document).on('click', '.toggle-password', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#password");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
});
$(document).on('click', '.toggle-password2', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#password2");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
});
</script> 
<?= $this->endSection() ?>