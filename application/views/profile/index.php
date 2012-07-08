<h1>Manage Profile</h1>

<form method="POST">
    <fieldset>
        <div class="control-group <?= isset($errors['username']) ? 'error' : ''; ?>">
            <label class="control-label" for="username">Username</label>
            <div class="controls">
                <input type="text" id="username" name="username" value="<?= $post->username; ?>" />
                <span class="help-inline"><?= Arr::get($errors, 'username'); ?></span>
            </div>
        </div>
        <div class="control-group <?= isset($errors['email']) ? 'error' : ''; ?>">
            <label class="control-label" for="email">E-mail</label>
            <div class="controls">
                <input type="text" id="email" name="email" value="<?= $post->email; ?>" />
                <span class="help-inline"><?= Arr::get($errors, 'email'); ?></span>
            </div>
        </div>
        <div class="form-actions">
            <input class="btn btn-primary" type="submit" value="Update Profile" />
        </div>
    </fieldset>
</form>