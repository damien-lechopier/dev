<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Demande de contact</h2>
    <ul>
     {!! isset($data['id_civilite']) && $data['id_civilite']!=''  ? '<li><strong>Civilité</strong> : '.Config::get('ref_list_civilites.fr')[$data['id_civilite']].'</li>' : '' !!}
      <li><strong>Nom</strong> : {{ $data['nom'] }}</li>
      <li><strong>Prénom</strong> : {{ $data['prenom'] }}</li>
       <li><strong>Fonction</strong> : {{ $data['fonction'] }}</li>
      <li><strong>Email</strong> : {{ $data['email'] }}</li>
      <li><strong>Téléphone</strong> : {{ $data['telephone'] }}</li>
      <li><strong>Entreprise</strong> : {{ $data['entreprise'] }}</li>
      <li><strong>Adresse</strong> : {{ $data['adresse'] }}</li>
      <li><strong>Code postal</strong> : {{ $data['cp'] }}</li>
      <li><strong>Ville</strong> : {{ $data['ville'] }}</li>
      <li><strong>Pays</strong> : {{ $data['id_pays'] }}</li>
      {!! isset($data['id_sujet']) && $data['id_sujet']!=''  ? '<li><strong>Sujet</strong> : '.Config::get('ref_list_sujets.fr')[$data['id_sujet']].'</li>' : '' !!}
      <li><strong>Message</strong> : {{ $data['message'] }}</li>
      {!! isset($data['id_provenance']) && $data['id_provenance']!='' ? '<li><strong>Provenance</strong> : '.Config::get('ref_list_provenances.fr')[$data['id_provenance']].'</li>' : '' !!}
    </ul>
  </body>
</html>