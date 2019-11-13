<style>
    .error-class{
        color: red;
    }
</style>
<article class="hentry">
    <div class="entry-content">
        <div class="woocommerce">
            <div class="customer-login-form">
                    <div class="col-full">
                        <div class="col-md-offset-3 col-md-6">
                            <h2>Register to avail exclusive services.</h2>
                            <form method="post" class="register" action="/register">
                                {{csrf_field()}}
                                <p class="form-row form-row-wide">
                                    <label>Name<span class="required">*</span></label>
                                    <input type="text" class="input-text" name="name" value="{{ old('name') }}" autofocus />
                                    @if($errors->has('name'))
                                        <span class="error-class">{{ $errors->first('name') }}</span>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label>Phone number<span class="required">*</span></label>
                                    <input type="text" class="input-text" name="phone" value="{{ old('phone') }}" />
                                    @if($errors->has('phone'))
                                        <span class="error-class">{{ $errors->first('phone') }}</span>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label>Email<span class="required">*</span></label>
                                    <input type="email" class="input-text" name="email" value="{{ old('email') }}" />
                                    @if($errors->has('email'))
                                        <span class="error-class">{{ $errors->first('email') }}</span>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label>Password<span class="required">*</span></label>
                                    <input type="password" class="input-text" name="password" value="" />
                                    @if($errors->has('password'))
                                        <span class="error-class">{{ $errors->first('password') }}</span>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label>Confirm password<span class="required">*</span></label>
                                    <input type="password" class="input-text" name="password_confirmation" value="" />
                                    @if($errors->has('password_confirmation'))
                                        <span class="error-class">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </p>
                                <p class="form-row"><input type="submit" class="button btn-block" name="register" value="Register" /></p>
                                <div class="register-benefits">
                                    <h3>Sign up today and you will be able to :</h3>
                                    <ul>
                                        <li>Speed your way through checkout</li>
                                        <li>Track your orders easily</li>
                                        <li>Keep a record of all your purchases</li>
                                    </ul>
                                </div>

                            </form>
                        </div>
                    </div><!-- .col-2 -->
                </div><!-- .col2-set -->
            </div><!-- /.customer-login-form -->
        </div><!-- .woocommerce -->
    </div><!-- .entry-content -->
</article><!-- #post-## -->