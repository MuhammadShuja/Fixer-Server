<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject bold font-blue-ebonyclay">Notes </span>
        </div>
    </div>
    <div class="portlet-body">
        @if($job->job_notes)
        <span class="font-grey-mint">{{$job->job_notes}}</span>
        @else
        <span class="font-grey-mint">No notes from customer</span>
        @endif
    </div>
</div>