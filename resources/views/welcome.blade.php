<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Theo Courier</title>
        <script>
            window.Laravel = <?php echo json_encode(['csrfToken'=> csrf_token()]); ?>
        </script>
        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="/css/vuetify/vuetify.min.css" />
        <link rel="stylesheet" type="text/css" href="/css/material-icons/material-design-icons.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <v-app id="app">
            <example></example>
        </v-app>
    <script src="{{asset('/js/app.js')}}"></script>
    </body>
</html>
