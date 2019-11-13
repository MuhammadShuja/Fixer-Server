<style>
    .error-class{
        color: red;
    }
</style>
<article class="page type-page status-publish hentry">
    <header class="entry-header">
        <h1 class="entry-title" itemprop="name">Track your order</h1>
    </header><!-- .entry-header -->
    <div class="entry-content" itemprop="mainContentOfPage">
        <div class="woocommerce">
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <p>To track your order please enter your Order Reference ID in the box below and press the "Track" button. This was given to you on your receipt.</p>
                </div>
                <div class="col-md-offset-3 col-md-6" style="padding-top: 30px;">
                    <form action="/track-order" method="post" class="track_order">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input class="input-text" type="text" name="order_reference_id" placeholder="Order reference ID" value="{{ old('order_reference_id') }}" />
                            @if($errors->has('order_reference_id'))
                                <span class="error-class">{{ $errors->first('order_reference_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group" style="text-align: center;">
                            <input type="submit" class="button" name="track" value="Track" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .entry-content -->
</article><!-- #post-## -->