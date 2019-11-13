<?php $user = auth('web')->user(); ?>
<style>
    .error-class{
        color: red;
    }
    .row{
        padding: 5px 0px;
    }
    .separator{
        content: '';
        border-top: 1px dotted #D9D9D9;
        margin: 20px 0px;
    }
    input[type=text],
    input[type=password],
    input[type=submit],    
    textarea.input-text,
    .input-text{
        padding: 0.5em 1.214em;
    }
    label{
        margin-bottom: 0px;
        margin-top: 0.5em;
    }
    .form-block{
        background: #F6FBF9;
        border-radius: 1.571em;
        padding: 0.5em 1.214em;
    }
</style>
<div class="woocommerce-MyAccount-content">
    <div class="row" style="padding: 0px">
        <div class="col-md-6 col-sm-12" style="padding: 0em 0.5em 0.5em 0.5em;">
            <form class="form-block" method="POST" action="/account/profile">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <label>name</label>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <input type="text" value="{{auth()->user()->defaultAddress()->first_name}}" class="input-text " name="name">
                        @if($errors->has('name'))
                            <span class="error-class">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <label>Phone Number</label>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <input type="text" value="{{auth()->user()->defaultAddress()->phone}}" class="input-text " name="phone">
                        @if($errors->has('phone'))
                            <span class="error-class">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <label>Address</label>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <textarea cols="5" rows="2" class="input-text " name="address">{{auth()->user()->defaultAddress()->address}}</textarea>
                        @if($errors->has('address'))
                            <span class="error-class">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 col-sm-12">
                        <input type="submit" class="btn btn-primary btn-block" value="Update Particular">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6 col-sm-12" style="padding: 0em 0.5em 0.5em 0.5em;">
            <form class="form-block" method="POST" action="/account/update-password">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <label>Old Password</label>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <input type="password" value="" class="input-text " name="old_password">
                        @if($errors->has('old_password'))
                            <span class="error-class">{{ $errors->first('old_password') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <label>New Password</label>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <input type="password" value="" class="input-text " name="password">
                        @if($errors->has('password'))
                            <span class="error-class">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <label>Confirm</label>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <input type="password" value="" class="input-text " name="password_confirmation">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 col-sm-12">
                        <input type="submit" class="btn btn-primary btn-block" value="Update Password">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>