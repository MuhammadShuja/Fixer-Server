<style>
    .error-class{
        color: red;
    }
</style>
<article class="hentry">
    <div class="entry-content">
        <div class="woocommerce">
            <div class="customer-login-form">
                <div class="coll-full">
                    <div class="col-md-offset-3 col-md-6">
                        <h2>Welcome! Please login to continue.</h2>
                        <form method="post" class="login" action="/login">
                            {{csrf_field()}}
                            <p class="form-row form-row-wide">
                                <label for="username">Email address<span class="required">*</span></label>
                                <input type="text" class="input-text" name="email" value="{{ old('email') }}" autofocus/>
                                @if($errors->has('email'))
                                    <span class="error-class">{{ $errors->first('email') }}</span>
                                @endif
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="password">Password<span class="required">*</span></label>
                                <input class="input-text" type="password" name="password"/>
                                @if($errors->has('password'))
                                    <span class="error-class">{{ $errors->first('password') }}</span>
                                @endif
                            </p>
                            <p class="form-row">
                                <input class="button btn-block" type="submit" value="Login" name="login">
                            </p>
                        </form>
                    </div>

                </div><!-- .col-1 -->                    
            </div><!-- /.customer-login-form -->
        </div><!-- .woocommerce -->
    </div><!-- .entry-content -->

</article><!-- #post-## -->