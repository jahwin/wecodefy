<!DOCTYPE html>
<html lang=en>

<head>
    <meta charset=utf-8>
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name=viewport content="width=device-width,initial-scale=1">
    <meta name="app-url" content="<?=$this->app_url?>">
    <link rel=icon href=<?=$this->app_url?>assets/images/favicon.ico>
    <title>Dev UI - Wecodefy</title>
    <link href=<?=$this->app_url?>system/dev/views/vue/dist/css/app.css rel=preload as=style>
    <link href=<?=$this->app_url?>system/dev/views/vue/dist/css/chunk-vendors.css rel=preload as=style>
    <link href=<?=$this->app_url?>system/dev/views/vue/dist/js/app.js rel=preload as=script>
    <link href=<?=$this->app_url?>system/dev/views/vue/dist/js/chunk-vendors.js rel=preload as=script>
    <link href=<?=$this->app_url?>system/dev/views/vue/dist/css/chunk-vendors.css rel=stylesheet>
    <link href=<?=$this->app_url?>system/dev/views/vue/dist/css/app.css rel=stylesheet>
</head>

<body>
    <noscript>
      <strong>
          We're sorry but dev doesn't work properly without JavaScript enabled. Please enable it to continue.
      </strong>
    </noscript>
    <div id=app></div>
    <script src=<?=$this->app_url?>system/dev/views/vue/dist/js/chunk-vendors.js>
    </script>
    <script src=<?=$this->app_url?>system/dev/views/vue/dist/js/app.js>
    </script>
</body>

</html>
