<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Demande de calcul de puissance</h2>
    
    <h3>Procédé - Cuve - Température</h3>
    		
    	<h4>Procédé</h4>	
    	
    	<ul>
		      {!! $data['vref']!='' ? '<li><strong>V/réf</strong> : '.$data['vref'].'</li>' : '' !!}
	    	{!! $data['produit_chauffe']!='' ? '<li><strong>Produit chauffé</strong> : '.$data['produit_chauffe'].'</li>' : '' !!}
	    	{!! $data['composition_chimique']!='' ? '<li><strong>Composition chimique</strong> : '.$data['composition_chimique'].'</li>' : '' !!}
	    	{!! $data['ph']!='' ? '<li><strong>pH</strong> : '.$data['ph'].'</li>' : '' !!}
	    </ul>
	    
	    <h4>Cuve</h4>	
    	
    	<ul>
		    {!! isset($data['cuve_stockage']) ? '<li><strong>Cuve de stockage</strong> : '.$data['cuve_stockage'].' </li>' : '' !!}
		    {!! isset($data['horizontalite']) ? '<li><strong>Position</strong> : '.$data['horizontalite'].' </li>' : '' !!}
	    	{!! $data['type_cuve']!='' ? '<li><strong>Type de cuve</strong> : '.$data['type_cuve'].'</li>' : '' !!}
	    	
	    	@if($data['type_cuve']!='' && $data['type_cuve']=='Rectangulaire')
	    		
	    		{!! $data['type_cuve_rectangulaire_longueur']!='' ? '<li><strong>Longueur</strong> : '.$data['type_cuve_rectangulaire_longueur'].' mm</li>' : '' !!}
	    		{!! $data['type_cuve_rectangulaire_largeur']!='' ? '<li><strong>Largeur</strong> : '.$data['type_cuve_rectangulaire_largeur'].' mm</li>' : '' !!}
	    		{!! $data['type_cuve_rectangulaire_hauteur']!='' ? '<li><strong>Hauteur</strong> : '.$data['type_cuve_rectangulaire_hauteur'].' mm</li>' : '' !!}
	    	
	    	@elseif($data['type_cuve']!='' && $data['type_cuve']=='Cylindrique')
	    		
	    		{!! $data['type_cuve_cylindrique_hauteur']!='' ? '<li><strong>Hauteur</strong> : '.$data['type_cuve_cylindrique_hauteur'].' mm</li>' : '' !!}
	    		{!! $data['type_cuve_cylindrique_diametre']!='' ? '<li><strong>Diamètre</strong> : '.$data['type_cuve_cylindrique_diametre'].' mm</li>' : '' !!}
	    	
	    	@endif
	    	
	    	{!! isset($data['couvercle']) ? '<li><strong>Couvercle</strong> : '.$data['couvercle'].' </li>' : '' !!}
		    {!! $data['matiere']!='' ? '<li><strong>Matière</strong> : '.$data['matiere'].'</li>' : '' !!}
		    {!! $data['epaisseur']!='' ? '<li><strong>Epaisseur</strong> : '.$data['epaisseur'].' mm</li>' : '' !!}
		    {!! $data['isolation']!='' ? '<li><strong>Isolation</strong> : '.$data['isolation'].'</li>' : '' !!}
		    
		    @if($data['isolation']!='' && $data['isolation']=='Oui')
	    		
	    		{!! $data['isolation_matiere']!='' ? '<li><strong>Matière</strong> : '.$data['isolation_matiere'].' mm</li>' : '' !!}
	    		{!! $data['isolation_epaisseur']!='' ? '<li><strong>Epaisseur</strong> : '.$data['isolation_epaisseur'].' mm</li>' : '' !!}
	    	
	    	@endif
		    
		    {!! $data['implantation']!='' ? '<li><strong>Implantée en</strong> : '.$data['implantation'].'</li>' : '' !!}
		    {!! $data['exposition']!='' ? '<li><strong>Exposition au vent</strong> : '.$data['exposition'].'</li>' : '' !!}
		    {!! $data['niveau_liquide_minimum']!='' ? '<li><strong>Niveau de liquide maximum</strong> : '.$data['niveau_liquide_minimum'].' mm</li>' : '' !!}
		    {!! $data['niveau_liquide_maximum']!='' ? '<li><strong>Niveau de liquide minimum</strong> : '.$data['niveau_liquide_maximum'].' mm</li>' : '' !!}
		</ul>
    
    	 <h4>Température</h4>	
    	
    	<ul>
		    {!! $data['temperature_ambiante_mini']!='' ? '<li><strong>Température ambiante mini</strong> : '.$data['temperature_ambiante_mini'].' °C</li>' : '' !!}
		    {!! $data['type_calcul']!='' ? '<li><strong>Type de calcul</strong> : '.$data['type_calcul'].'</li>' : '' !!}
			
			@if($data['type_calcul']!='' && $data['type_calcul']=='Montée en température')
	    		
	    		{!! $data['type_calcul_montee_temperature_initiale']!='' ? '<li><strong>Température liquide initiale</strong> : '.$data['type_calcul_montee_temperature_initiale'].' °C</li>' : '' !!}
	    		{!! $data['type_calcul_montee_temperature_travail']!='' ? '<li><strong>Température de travail</strong> : '.$data['type_calcul_montee_temperature_travail'].' °C</li>' : '' !!}
	    		{!! $data['type_calcul_montee_temps_montee']!='' ? '<li><strong>Temps de montée désiré</strong> : '.$data['type_calcul_montee_temps_montee'].' hrs</li>' : '' !!}
	    	
	    	@elseif($data['type_calcul']!='' && $data['type_calcul']=='Maintien en température')
	    		
	    		{!! $data['type_calcul_maintien_temperature']!='' ? '<li><strong>Température à maintenir</strong> : '.$data['type_calcul_maintien_temperature'].' °C</li>' : '' !!}
	    	
	    	@endif
		
		</ul>
    
    <h3>Alimentation électrique - Disposition du chauffage - Régulation et surveillance</h3>
    
    	<h4>Alimentation électrique</h4>	
    	
    	<ul>
    		{!! $data['tension_electrique']!='' ? '<li><strong>Tension d\'alimentation</strong> : '.$data['tension_electrique'].' V</li>' : '' !!}
		    {!! isset($data['type_alimentation']) ? '<li><strong>Type d\'alimentation</strong> : '.$data['type_alimentation'].' </li>' : '' !!}
		</ul>
    	
    	
    	<h4>Disposition du chauffage</h4>	
    	
    	<ul>
    		{!! isset($data['disposition_chauffage']) ? '<li><strong>Disposition</strong> : '.$data['disposition_chauffage'].' </li>' : '' !!}
		</ul>
    
    	<h4>Régulation et surveillance</h4>	
    
    	<ul>
    		{!! isset($data['regulation_temperature']) ? '<li><strong>Régulation de la température</strong> : '.$data['regulation_temperature'].' </li>' : '' !!}
    		{!! $data['points_consigne']!='' ? '<li><strong>Points de consigne</strong> : '.$data['points_consigne'].'</li>' : '' !!}
    		{!! isset($data['regulation_niveau']) ? '<li><strong>Régulation de niveau</strong> : '.$data['regulation_niveau'].' </li>' : '' !!}
    		{!! $data['points_commutation']!='' ? '<li><strong>Points de commutation</strong> : '.$data['points_commutation'].'</li>' : '' !!}
    		{!! isset($data['limitation_temperature']) ? '<li><strong>limitation de température</strong> : '.$data['limitation_temperature'].' </li>' : '' !!}
    		{!! isset($data['surveillance_niveau']) ? '<li><strong>Surveillance de niveau</strong> : '.$data['surveillance_niveau'].' </li>' : '' !!}
    	</ul>
    	
    <h3>Autres informations</h3>
    	
    	<h4>Production en continu</h4>	
    	
    	<ul>
    		{!! $data['materiau']!='' ? '<li><strong>Matériau</strong> : '.$data['materiau'].' </li>' : '' !!}
    		{!! $data['debit_matiere']!='' ? '<li><strong>Débit de matière à traiter</strong> : '.$data['debit_matiere'].' Kg/h</li>' : '' !!}
    		{!! $data['temperature_entree_prod_continu']!='' ? '<li><strong>Température d\'entrée</strong> : '.$data['temperature_entree_prod_continu'].' °C</li>' : '' !!}
    	</ul>
    	
    	<h4>Renouvellement du bain en continu </h4>	
    	
    	<ul>
    		{!! $data['debit_renouvellement']!='' ? '<li><strong>Débit de renouvellement</strong> : '.$data['debit_renouvellement'].' </li>' : '' !!}
    		{!! $data['temperature_entree_renouvellement']!='' ? '<li><strong>Température d\'entrée</strong> : '.$data['temperature_entree_renouvellement'].' °C</li>' : '' !!}
    	</ul>
    	
    	
    <h3>Coordonnées</h3>
    <ul>
	    <li><strong>Civilité</strong> : {{ Config::get('ref_list_civilites.fr')[$data['id_civilite']] }}</li>
	      <li><strong>Nom</strong> : {{ $data['nom'] }}</li>
	      <li><strong>Prénom</strong> : {{ $data['prenom'] }}</li>
	      {!! $data['fonction']!='' ? '<li><strong>Fonction</strong> : '.$data['fonction'].'</li>' : '' !!}
	      <li><strong>Email</strong> : {{ $data['email'] }}</li>
	      <li><strong>Téléphone</strong> : {{ $data['telephone'] }}</li>
	      {!! $data['fax']!='' ? '<li><strong>Fax</strong> : '.$data['fax'].'</li>' : '' !!}
	      <li><strong>Entreprise</strong> : {{ $data['entreprise'] }}</li>
	      <li><strong>Adresse</strong> : {{ $data['adresse'] }}</li>
	      <li><strong>Code postal</strong> : {{ $data['cp'] }}</li>
	      <li><strong>Ville</strong> : {{ $data['ville'] }}</li>
	      <li><strong>Pays</strong> : {{ $data['id_pays'] }}</li>
	      <li><strong>Message</strong> : {{ $data['message'] }}</li>
      
    </ul>
  </body>
</html>