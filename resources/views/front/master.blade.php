
<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @yield('title')
        @yield('meta')

        <link rel="apple-touch-icon" sizes="180x180" href="/storage/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/storage/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/storage/favicon/favicon-16x16.png">
        <link rel="manifest" href="/storage/favicon/site.webmanifest">
        <link rel="mask-icon" href="/storage/favicon/safari-pinned-tab.svg" color="#F1F5F9">
        <meta name="msapplication-TileColor" content="#F1F5F9">
        <meta name="theme-color" content="#ffffff">
        
        {!!Html::style('css/front/bootstrap.min.css')!!}
        {!!Html::style('css/front/font-awesome.min.css')!!}
        {!!Html::style('css/front/animate.min.css')!!}
        {!!Html::style('css/front/font-electro.css')!!}
        {!!Html::style('css/front/owl-carousel.css')!!}
        {!!Html::style('css/front/style.css')!!}
        {!!Html::style('css/front/colors/blue.css')!!}

        @yield('styles')
        <style>
            .site-header{
                /*padding: 2em 0 !important;*/
            }
        </style>

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic' rel='stylesheet' type='text/css'>

        <link rel="shortcut icon" href="assets/images/fav-icon.png">
    </head>


    @yield('body')

        {!!Html::script('js/front/jquery.min.js')!!}
        {!!Html::script('js/front/tether.min.js')!!}
        {!!Html::script('js/front/bootstrap.min.js')!!}
        {!!Html::script('js/front/bootstrap-hover-dropdown.min.js')!!}
        {!!Html::script('js/front/owl.carousel.min.js')!!}
        {!!Html::script('js/front/echo.min.js')!!}
        {!!Html::script('js/front/wow.min.js')!!}
        {!!Html::script('js/front/jquery.easing.min.js')!!}
        {!!Html::script('js/front/jquery.waypoints.min.js')!!}
        {!!Html::script('js/front/electro.js')!!}

        @yield('scripts')
        <script>
            function showMessage(message){
                jQuery('#main').prepend('<div class="woocommerce-message">'+message+'</div>');
                setTimeout(function(){
                    jQuery('.woocommerce-message').fadeOut();
                }, 3000);
            }
        </script>

    </body>
</html>