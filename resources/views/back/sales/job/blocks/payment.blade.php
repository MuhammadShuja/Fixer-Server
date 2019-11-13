<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            @include('back.widgets.icon',[
                'type' => 'alert'
            ])
            <span class="caption-subject bold font-blue-ebonyclay">Payment pending</span>
        </div>
    </div>
    <div class="portlet-body">
        <form class="form-horizontal" id="newEntry" method="POST" action="/admin/customers/new" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-body">
                <table class="table">
                    <tr>
                        <td>
                            Service charges
                        </td>
                        <td>
                            {{ config('app.currency') }} {{ $job->payment->sub_total_price }}
                        </td>
                    </tr>
                    <tr style="border-top: 1px solid #eee">
                        <td>
                            Paid by customer
                        </td>
                        <td>
                            @if($job->payment->status == 'paid')
                                Rs. {{$job->payment->total_price}}
                            @else
                                Rs. 0
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
            <hr class="separator">
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-12">
                        @if($job->payment->status == 'paid')
                            <a class="btn-c btn-x pull-right" href='javascript:;' onclick="updatePayment('pending')">Mark as unpaid</a>
                        @else
                            <a class="btn-c btn-x pull-right" href='javascript:;' onclick="updatePayment('paid')">Mark as paid</a>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>