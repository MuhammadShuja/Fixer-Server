<?php $user = auth('web')->user(); ?>
<div class="woocommerce-MyAccount-content">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="account-content">
                <span class="content-title">Profile</span>
                <div class="acc-card">
                    <span class="acc-card-title">{{$user->defaultAddress()->first_name}}</span>
                    @if($user->email)
                        <span class="acc-card-info">{{$user->email}}</span>
                    @endif
                    @if($user->phone)
                        <span class="acc-card-info">{{$user->phone}}</span>
                    @endif
                    <hr class="separator">
                    <span class="acc-card-title">
                        Lifetime Orders: {{count($user->orders)}}
                        <a class="acc-action" href="/account/orders">View</a>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="account-content long">
                <span class="content-title">Address Book
                </span>
                <div class="row">
                    @if($user->defaultAddress())
                        <div class="col-md-6 col-sm-12">
                            <div class="acc-card">
                                <span class="acc-card-header">Default Shipping Address</span>
                                <span class="acc-card-title">{{$user->defaultAddress()->first_name}}</span>
                                <span class="acc-card-info">{{$user->defaultAddress()->address}}</span>
                                <span class="acc-card-info">
                                    {{$user->defaultAddress()->outlet}}
                                </span>
                                <span class="acc-card-info">{{$user->defaultAddress()->phone}}</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 card-separator">
                            <div class="acc-card">
                                <span class="acc-card-header">Default Billing Address</span>
                                <span class="acc-card-title">{{$user->defaultAddress()->first_name}}</span>
                                <span class="acc-card-info">{{$user->defaultAddress()->address}}</span>
                                <span class="acc-card-info">
                                    {{$user->defaultAddress()->outlet}}
                                </span>
                                <span class="acc-card-info">{{$user->defaultAddress()->phone}}</span>
                            </div>
                        </div>
                    @else
                        <div class="acc-empty">
                            <span>
                                You have not set your default shipping and billing addresses yet.
                            </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
        