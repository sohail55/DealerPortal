<!DOCTYPE html>

<html lang="en" >
    <head>
        <meta charset="utf-8"/>
        <title>Admin Portal</title>
        <meta name="description" content="admin login page"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @include('ingredients.css')
        <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    </head>
    <body  class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column"  >
        @yield('page_content')
        @include('ingredients.js')
    </body>
</html>