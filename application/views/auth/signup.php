<h1>Signup</h1>

<form method="POST" autocomplete="off">
    <fieldset>
        <div class="control-group <?= isset($errors['username']) ? 'error' : ''; ?>">
            <label class="control-label" for="username">Username</label>
            <div class="controls">
                <input type="text" id="username" name="username" value="<?= HTML::chars(Arr::get($_POST, 'username')); ?>" />
                <span class="help-inline"><?= Arr::get($errors, 'username'); ?></span>
            </div>
        </div>
        <div class="control-group <?= isset($errors['email']) ? 'error' : ''; ?>">
            <label class="control-label" for="email">E-mail</label>
            <div class="controls">
                <input type="text" id="email" name="email" value="<?= HTML::chars(Arr::get($_POST, 'email')); ?>" />
                <span class="help-inline"><?= Arr::get($errors, 'email'); ?></span>
            </div>
        </div>
        <div class="control-group <?= isset($errors['_external']['password']) ? 'error' : ''; ?>">
            <label class="control-label" for="password">Password</label>
            <div class="controls">
                <input type="password" id="password" name="password" />
                <span class="help-inline"><?= Arr::path($errors, '_external.password'); ?></span>
            </div>
        </div>
        <div class="control-group <?= isset($errors['_external']['password_confirm']) ? 'error' : ''; ?>">
            <label class="control-label" for="password_confirm">Confirm Password</label>
            <div class="controls">
                <input type="password" id="password_confirm" name="password_confirm" />
                <span class="help-inline"><?= Arr::path($errors, '_external.password_confirm'); ?></span>
            </div>
        </div>
        <div class="form-actions">
            <input class="btn btn-primary" type="submit" value="Signup" />
        </div>
    </fieldset>
</form>