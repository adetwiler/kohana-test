<h1>Login</h1>

<form method="POST">
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="username">Username</label>
            <div class="controls">
                <input type="text" id="username" name="username" value="<?= HTML::chars(Arr::get($_POST, 'username')); ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="password">Password</label>
            <div class="controls">
                <input type="password" id="password" name="password" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="remember">
                <input type="checkbox" id="remember" name="remember" value="1" /> Remember Me
            </label>
        </div>
        <div class="form-actions">
            <input class="btn btn-primary" type="submit" value="Login" />
        </div>
    </fieldset>
</form>