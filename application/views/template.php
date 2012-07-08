<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Kohana Test - <?=$title?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="<?=URL::base()?>assets/bootstrap/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="<?=URL::base()?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=URL::base()?>assets/css/style.css">
</head>
<body>
<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?=URL::base()?>">Kohana Test</a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li><a href="<?=URL::base()?>">Home</a></li>
                </ul>
                <ul class="nav pull-right">
                    <?php if (!Auth::instance()->logged_in()): ?>
                        <li><a href="<?=URL::base()?>auth/login">Login</a></li>
                        <li><a href="<?=URL::base()?>auth/signup">Create Account</a></li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=Auth::instance()->get_user()->username?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?=URL::base()?>profile">Manage Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="<?=URL::base()?>auth/logout">Logout</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <?=Notify::render()?>
        <?=$content?>
    </div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="<?=URL::base()?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>