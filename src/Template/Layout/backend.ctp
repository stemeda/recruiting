<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $this->fetch('title') ?></title>
        <?= $this->Html->meta('icon') ?>

        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('bootstrap-theme.min.css') ?>
        <?= $this->Html->css('backend.css') ?>

        <?= $this->Html->script('jquery.min.js') ?>
        <?= $this->Html->script('bootstrap.min.js') ?>

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
                    <a class="navbar-brand" href="#">Bewerbermanagement</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php if (isset($userSession) && is_array($userSession) && isset($userSession['type']) && ($userSession['type'] === 'admin' || $userSession['type'] === 'recruiter')): ?>
                    <ul class="nav navbar-nav">
                        
                        <li class="active"><a href="#">Settings</a></li>
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Stellen <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Anzeigen</a></li>
                                <li><a href="#">hinzufügen</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Noch was</a></li>
                            </ul>
                        </li>
                        <?php if (isset($userSession['type']) && $userSession['type'] === 'admin'): ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recruiter <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><?= $this->Html->link(__('show'), ['controller' => 'recruiter', 'action' => 'index', 'prefix' => 'backend/administration'])?></li>
                                <li><?= $this->Html->link(__('add'), ['controller' => 'recruiter', 'action' => 'add', 'prefix' => 'backend/administration'])?></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bewerber <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><?= $this->Html->link(__('show'), ['controller' => 'candidate', 'action' => 'index', 'prefix' => 'backend/administration'])?></li>
                                <li><?= $this->Html->link(__('add'), ['controller' => 'candidate', 'action' => 'add', 'prefix' => 'backend/administration'])?></li>
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <?php endif; ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><?= $this->Html->link('Frontend', ['controller' => false, 'action' => false, 'prefix' => false])?></li>
                        <?php if (isset($userSession) && is_array($userSession)): ?>
                        <li><?= $this->Html->link(__('logout'), [
                'controller' => 'User',
                'action' => 'logout',
                'prefix' => 'backend'
            ])?></li>
                        <?php endif; ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?= $this->fetch('title') ?>
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div>
            </div>
        </div>
    </body>
</html>