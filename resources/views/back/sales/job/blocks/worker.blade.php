@if($job->worker)
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                @include('back.widgets.icon',[
                    'type' => 'success'
                ])
                <span class="caption-subject bold font-blue-ebonyclay">Assigned</span>
                <span class="caption-helper">to <a class="btn" href="/admin/s/workers/{{$job->worker->id}}" style="padding: 0px">{{$job->worker->name}}</a></span>
            </div>
        </div>
        <div class="portlet-body">
            <form class="form-horizontal" id="newEntry" method="POST" action="/admin/jobs/{{$job->id}}/update-worker" enctype="multipart/form-data">
                {{csrf_field()}}
                @if($job->job_status_id == \App\Models\JobStatus::pending()
                    || $job->job_status_id == \App\Models\JobStatus::assigned())
                <div class="form-body">
                    @include('back.form-controls.select.single', [
                        'control_name' => 'worker_id',
                        'control_title' => 'Assign to',
                        'data' => $workers,
                        'option_value_source' => 'id',
                        'option_content_source' => 'name',
                        'control_value' => $job->worker->id,
                    ])
                </div>
                <hr class="separator">
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn-c btn-p btn-save-form pull-right">Change worker</button>
                        </div>
                    </div>
                </div>
                @endif
            </form>
        </div>
    </div>
@else
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                @include('back.widgets.icon',[
                    'type' => 'danger'
                ])
                <span class="caption-subject bold font-blue-ebonyclay">Not assigned</span>
            </div>
        </div>
        <div class="portlet-body">
            <form class="form-horizontal" id="newEntry" method="POST" action="/admin/jobs/{{$job->id}}/update-worker" enctype="multipart/form-data">
                {{csrf_field()}}
                @if($job->job_status_id == \App\Models\JobStatus::pending()
                    || $job->job_status_id == \App\Models\JobStatus::assigned())
                <div class="form-body">
                    @include('back.form-controls.select.single', [
                        'control_name' => 'worker_id',
                        'control_title' => 'Assign to',
                        'data' => $workers,
                        'option_value_source' => 'id',
                        'option_content_source' => 'name',
                    ])
                </div>
                <hr class="separator">
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn-c btn-p btn-save-form pull-right">Assign now</button>
                        </div>
                    </div>
                </div>
                @endif
            </form>
        </div>
    </div>
@endif