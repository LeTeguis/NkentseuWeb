@extends("layouts.app")

@section("content")

	<h1>Tous les articles</h1>

	<p>
		<!-- Lien pour créer un nouvel article : "posts.create" -->
		<a href="{{ route('posts_create') }}" title="Créer un article" >Créer un nouveau post</a>
	</p>

	<!-- Le tableau pour lister les articles/posts -->
	<table border="1" >
		<thead>
			<tr>
				<th>Titre</th>
				<th colspan="2" >Opérations</th>
			</tr>
		</thead>
		<tbody>
			<!-- On parcourt la collection de Post -->
			@foreach ($posts as $post)
			<tr>
				<td>
					<!-- Lien pour afficher un Post : "posts.show" -->
					<a href="{{ route('posts_show', $post) }}" title="Lire l'article" >{{ $post->title }}</a>
				</td>
				<td>
					<!-- Lien pour modifier un Post : "posts.edit" -->
					<a href="{{ route('posts_edit', $post) }}" title="Modifier l'article" >Modifier</a>
				</td>
				<td>
					<!-- Formulaire pour supprimer un Post : "posts.destroy" -->
					<form method="POST" action="{{ route('posts_destroy', $post) }}" >
						<!-- CSRF token -->
						@csrf
						<!-- <input type="hidden" name="_method" value="DELETE"> -->
						@method("DELETE")
						<input type="submit" value="x Supprimer" >
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

@endsection
