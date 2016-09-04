@extends('layouts.dashboard')

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">{{ trans('issues.latest') }}</h3>
    </div>

    @if (!count($issues))
    <div class="box-body">
        <p>{{ trans('issues.none') }}</p>
    </div>
    @else
    <div class="box-body table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ trans('app.date') }}</th>
                    <th>{{ trans('issues.title') }}</th>
                    <th>{{ trans('issues.author') }}</th>
                    <th>{{ trans('issues.project') }}</th>
                    <th>{{ trans('issues.commit') }}</th>
                    <th>{{ trans('issues.branch') }}</th>
                    <th>{{ trans('app.status') }}</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($issues as $issue)
                <tr id="deployment_{{ $issue->id }}">
                    <td>{{ $issue->id }}</td>
                    <td>{{ $issue->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        {{ $issue->title }}
                    </td>
                    <td>
                        {{ $issue->author->name }}
                    </td>
                    <td><a href="{{ route('projects', ['id' => $issue->project_id]) }}">{{ $issue->project->name }}</a></td>
                    <td>
                        @if ($issue->commit_url)
                        <a href="{{ $issue->commit_url }}" target="_blank">{{ $issue->short_commit_hash }}</a>
                        @else
                        {{ $issue->short_commit_hash }}
                        @endif
                    </td>
                    <td><a href="{{ $issue->branch_url }}" target="_blank"><span class="label label-default">{{ $issue->branch }}</span></a></td>
                    <td>
                        <span class="label label-{{ $issue->css_class }}"><i class="ion ion-{{ $issue->icon }}"></i> <span>{{ $issue->readable_status }}</span></span>
                    </td>
                    <td>
                        <div class="btn-group pull-right">
                            
                            <a href="{{ route('issues.show', ['id' => $issue->id]) }}" type="button" class="btn btn-default" title="{{ trans('app.details') }}"><i class="ion ion-information-circled"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $issues->render() !!}
    </div>
    @endif
    @include('issues._partials.dialog')
</div>
@stop



@section('right-buttons')
    <div class="pull-right">
        <button type="button" class="btn btn-success" title="{{ trans('projects.view_ssh_key') }}" data-toggle="modal" data-target="#issue"><span class="ion ion-ios-information"></span> 申请上线</button>
    </div>
@stop