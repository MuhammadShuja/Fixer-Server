<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <div class="caption">
                @if($job->job_status_id == \App\Models\JobStatus::completed())
                    @include('back.widgets.icon',[
                        'type' => 'success'
                    ])
                    
                @elseif($job->job_status_id == \App\Models\JobStatus::cancelled()
                    || $job->job_status_id == \App\Models\JobStatus::rejected()
                    || $job->job_status_id == \App\Models\JobStatus::failed())
                    @include('back.widgets.icon',[
                        'type' => 'danger'
                    ])
                @else
                    @include('back.widgets.icon',[
                        'type' => 'alert'
                    ])
                @endif
                <span class="caption-subject bold font-blue-ebonyclay">Current status: {{$job->status->label}}</span>
            </div>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                @if($job->service)
                <div class="iq-info-block">
                    <span class="heading bold font-blue-ebonyclay">Requested service</span>
                    <span class="body">
                        <a class="btn" href="/admin/s/services/{{$job->service->id}}" style="padding: 0px">
                            {{$job->service->name}}
                        </a>
                    </span>
                </div>
                @endif
                <div class="iq-info-block">
                    <span class="heading bold font-blue-ebonyclay">Service type</span>
                    <span class="body">
                        <a class="btn" href="/admin/s/categories/{{$job->category->id}}" style="padding: 0px">
                            {{$job->category->name}}
                        </a>
                    </span>
                </div>
                @if($job->job_status_id == \App\Models\JobStatus::pending()
                    || $job->job_status_id == \App\Models\JobStatus::assigned())
                <hr class="separator">
                <a class="btn-c btn-x pull-right" href='javascript:;' onclick="updateStatus('reject', {{\App\Models\JobStatus::rejected()}})">Reject this job</a>
                @endif
            </div>
            <div class="col-md-12">
                <form class="form-horizontal" id="updateStatus" method="POST" action="/admin/jobs/{{$job->id}}/update-status">
                    {{csrf_field()}}
                    @if($job->job_status_id == \App\Models\JobStatus::pending()
                        || $job->job_status_id == \App\Models\JobStatus::assigned())
                    <div class="form-body">
                        @include('back.form-controls.select.status', [
                            'control_name' => 'job_status_id',
                            'control_title' => 'Status',
                            'data' => $statuses,
                            'initial' => false,
                            'control_value' => $job->job_status_id,
                        ])
                    </div>
                    <hr class="separator">
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn-c btn-p btn-save-form pull-right">Update status</button>
                            </div>
                        </div>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>