<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject bold font-blue-ebonyclay">Schedule</span>
        </div>
    </div>
    <div class="portlet-body">
        <span class="font-grey-mint">
            <div class="iq-info-block">
                <span class="heading bold font-blue-ebonyclay">Requested on</span>
                <span class="body">
                    {{ Carbon\Carbon::parse($job->schedule_date)->format('F d, Y') }}
                </span>
            </div>
            <div class="iq-info-block">
                <span class="heading bold font-blue-ebonyclay">During</span>
                <span class="body">
                    {{ $job->schedule_time }}
                </span>
            </div>
        </span>
    </div>
</div>