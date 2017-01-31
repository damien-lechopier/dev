<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Demande de documentation</h2>
    <ul>
      <li><strong>Email</strong> : {{ $data['user']->email }}</li>
      <li><strong>Produit</strong> : {{ $data['product']->name }} - {!! $data['product']->reference !!}</li>
      <li><strong>Document demandé</strong> : {{ $data['file']->title }}</li>
    </ul>
  </body>
</html>