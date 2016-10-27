<?php
use App\Model\Entity\User;
?>

<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>

        <?= $this->Html->css('frontend/bootstrap.css') ?>
        <?= $this->Html->css('bootstrap-datetimepicker.min.css') ?>
        <?= $this->Html->css('backend.css') ?>
        <?= $this->Html->css('/attachments/css/FileUpload.css') ?>

        <?= $this->Html->script('jquery.min.js') ?>
        <?= $this->Html->script('bootstrap.min.js') ?>
        <?= $this->Html->script('tmpl.min.js') ?>
        <?= $this->Html->script('moment.js') ?>
        <?= $this->Html->script('bootstrap-datetimepicker.min.js') ?>

        <?php if(isset($this->FrontendBridge)) {
            $this->FrontendBridge->init($frontendData);
            $this->FrontendBridge->addAllControllers();
            echo $this->FrontendBridge->run();
        } ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>

        <?= $this->CKEditor->loadJs(); ?>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?= $this->Html->link('Bewerbermanagement', ['controller' => 'start', 'action' => 'index', 'prefix' => false], ['class' => 'navbar-brand'])?>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php if (User::checkCandidate($userSession)): ?>
                        <ul class="nav navbar-nav">
                            <li><?= $this->Html->link('Stellenanzeigen', ['controller' => 'start', 'action' => 'index'])?></li>
                            <li><?= $this->Html->link('Meine Bewerbungen', ['controller' => 'start', 'action' => 'open_applications'])?></li>
                        </ul>
                    <?php endif; ?>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if (User::checkCandidate($userSession)): ?>
                            <li><?=
                            $this->Html->link(__('logout'), [
                                'controller' => 'candidate',
                                'action' => 'logout',
                            ])
                            ?></li>
                        <?php else: ?>
                            <li><?=
                            $this->Html->link(__('login'), [
                                'controller' => 'candidate',
                                'action' => 'login',
                            ])
                            ?></li>
                            <li><?=
                            $this->Html->link(__('register'), [
                                'controller' => 'candidate',
                                'action' => 'register',
                            ])
                            ?></li>
                        <?php endif; ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div>
            </div>
        </div>
    </body>
</html>
