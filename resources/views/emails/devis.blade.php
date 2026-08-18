<h2>Nouvelle demande via l'assistant Tafely.GR</h2>
<p><strong>Nom :</strong> {{ $data['nom'] }}</p>
<p><strong>Email :</strong> {{ $data['email'] }}</p>
<p><strong>Type de projet :</strong> {{ $data['type_projet'] }}</p>
<p><strong>Description :</strong></p>
<p>{{ $data['description_projet'] }}</p>
<p><strong>Prix proposé :</strong> {{ $data['prix_propose'] }}</p>
@if(!empty($data['rdv_souhaite']))
    <p><strong>Rendez-vous souhaité :</strong> {{ $data['rdv_souhaite'] }}</p>
@endif
<hr>
<p style="color:#888;font-size:12px;">Message généré automatiquement par l'assistant IA du site Tafely.GR.</p>