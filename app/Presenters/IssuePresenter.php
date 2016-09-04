<?php

/*
 * This file is part of Fixhub.
 *
 * Copyright (C) 2016 Fixhub.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fixhub\Presenters;

use Illuminate\Support\Facades\Config;
use McCool\LaravelAutoPresenter\BasePresenter;
use Fixhub\Models\Project;
use Fixhub\Models\Issue;

/**
 * The view presenter for a issue class.
 */
class IssuePresenter extends BasePresenter
{
    /**
     * Gets the translated project status string.
     *
     * @return string
     */
    public function readable_status()
    {
        return "111";
        if ($this->wrappedObject->status === Issue::COMPLETED) {
            return trans('projects.finished');
        } elseif ($this->wrappedObject->status === Issue::APPROVING) {
            return trans('projects.deploying');
        } elseif ($this->wrappedObject->status === Issue::FAILED) {
            return trans('projects.failed');
        } elseif ($this->wrappedObject->status === Issue::PENDING) {
            return trans('projects.pending');
        } elseif ($this->wrappedObject->status === Issue::REJECTED) {
            return trans('projects.pending');
        }

        return trans('projects.not_deployed');
    }

    /**
     * Gets the CSS icon class for the project status.
     *
     * @return string
     */
    public function icon()
    {
        if ($this->wrappedObject->status === Issue::COMPLETED) {
            return 'checkmark-round';
        } elseif ($this->wrappedObject->status === Issue::APPROVING) {
            return 'load-c fixhub-spin';
        } elseif ($this->wrappedObject->status === Issue::FAILED) {
            return 'alert';
        } elseif ($this->wrappedObject->status === Issue::PENDING) {
            return 'clock';
        } elseif ($this->wrappedObject->status === Issue::REJECTED) {
            return 'clock';
        }

        return 'help';
    }

    /**
     * Gets the CSS class for the project status.
     *
     * @return string
     */
    public function css_class()
    {
        if ($this->wrappedObject->status === Issue::COMPLETED) {
            return 'success';
        } elseif ($this->wrappedObject->status === Issue::APPROVING) {
            return 'warning';
        } elseif ($this->wrappedObject->status === Issue::FAILED) {
            return 'danger';
        } elseif ($this->wrappedObject->status === Issue::PENDING) {
            return 'info';
        } elseif ($this->wrappedObject->status === Issue::REJECTED) {
            return 'info';
        }

        return 'primary';
    }
}
