<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="https://img.icons8.com/ios/452/api.png">

  <title>Api Projects</title>

  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/6f9aed7b97.js" crossorigin="anonymous"></script>

</head>

<body class="text-center">

  <div class="container">
    <header class="mt-5 noselect">
      <h1> Api Projects </h1>
      <p class="lead">Esse é um sistema construido para requisições http.</p>
    </header>

    <?php

    use Illuminate\Support\Facades\Route;

    class NewEndpoint
    {
      public $method, $url,  $action, $middleware;
    }

    $routes = array();
    foreach (Route::getRoutes() as $route) {
      if (str_contains(json_encode($route->action['middleware']), 'api') !== false) {
        $routes[] = $route;
      }
    }
    ?>

    <h2 class="mt-5 noselect">
      <p> # Enpoints </p>
    </h2>

    <table id="routes-table" class="table table-striped table-bordered table-dark ">
      <thead class="thead-light noselect">
        <tr>
          <th>Name</th>
          <th>Url</th>
          <th>Method</th>
          <th>Middleware</th>
          <th>Function for API</th>
          <th>Response</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php foreach ($routes as $route) {
            if (!strpos(json_encode($route->action['prefix']), 'admin')) {

              $searches = array('\\ \\', '"', '[', ']', '\\/');
              $replacements = array('', '', '', '', '/');

              echo '<tr>' .
                '<th>' . str_replace($searches, $replacements, json_encode($route->action['as'])) . '</th>' .
                '<th>' . '/' . str_replace($searches, $replacements, json_encode($route->uri)) . '</th>' .
                '<th>' . str_replace($searches, $replacements,  json_encode($route->methods)) . '</th>' .
                '<th>' . str_replace($searches, $replacements, json_encode($route->action['middleware'])) . '</th>' .
                '<th>' . str_replace($searches, $replacements,  json_encode($route->getActionMethod())) . '</th>' .
                '<th>  <a  href="' . str_replace($searches, $replacements,  json_encode($route->uri)) . '" type="button" class="btn action" target="_blank"><i class="far fa-eye"></i></a> </th>' .
                '</tr>';
            }
          } ?>
        </tr>
      </tbody>
    </table>

    <p class="fixed-bottom">Developed by <a href="https://josielfaria.com/">Devjo Tecnologia</a>, 2021.

  </div>

  <style>
    body {
      height: 100vh;
      font-family: "Brush Script MT", cursive;
      color: white;
      background: linear-gradient(140deg, rgba(88, 174, 255, 1) 24%, rgba(0, 255, 209, 1) 100%);
      font-size: 14px;
    }

    .btn {
      color: white;
      transition: ease-in 2ms;
    }

    .btn:hover {
      color: aquamarine;
      transform: scale(1.05);
    }

    .noselect {
      -moz-user-select: none;
      -webkit-user-select: none;
      -ms-user-select: none;
      -o-user-select: none;
      user-select: none;
    }
  </style>
</body>

</html>
