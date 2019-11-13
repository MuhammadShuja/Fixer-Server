<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject bold font-blue-ebonyclay">Customer</span>
        </div>
    </div>
    <div class="portlet-body">
        <a class="btn" href="/admin/customers/{{$job->customer->id}}" style="padding: 0px;">{{$job->customer->name}}</a>
        <p style="font-size: 13px;">{{count($job->customer->jobs)}} job(s)</p>
        <hr class="separator">
        <p class="font-blue-ebonyclay bold uppercase">Contact information</p>
        {{$job->customer->email}}
        <br/>
        {{$job->customer->defaultAddress()->phone}}
        <hr class="separator">
        <p class="font-blue-ebonyclay bold uppercase">Job address</p>
        {{$job->customer->defaultAddress()->name}}
        <br/>
        {{$job->customer->defaultAddress()->address}}
    </div>
</div>