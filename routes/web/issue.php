<?php

/*
 * This file is part of Fixhub.
 *
 * Copyright (C) 2016 Fixhub.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

Route::group([
        'middleware' => ['web', 'auth', 'jwt'],
        'namespace'  => 'Dashboard',
    ], function () {
        $actions = [
            'only' => ['index', 'show', 'create', 'store', 'update', 'destroy'],
        ];
        Route::resource('issues', 'IssueController', $actions);
    });
