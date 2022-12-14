@extends("layouts.app")

@section('content')

	<h1>Tous les utilisateurs</h1>

	<!-- Le tableau pour lister les utilisateur -->
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">delete</th>
            <th scope="col">update</th>
            <th scope="col">new user</th>
          </tr>
        </thead>
        <tbody>
            <!-- On parcourt la collection d'Utilisateur -->
            @php $i = 1 @endphp
			@foreach($users as $user)
			<tr>
                <th scope="row">@php echo $i @endphp</th>
				<td> {{ $user->name }} </td>
                <td> {{ $user->email }} </td>
                <td>
                    <!-- Formulaire pour supprimer un Utilisateur : "users.destroy" -->
					<form method="POST" action="{{ route('users_delete', ['user' => $user]) }}" >
						<!-- <input type="hidden" name="_method" value="DELETE"> -->
						@method("DELETE")
                        <!-- CSRF token -->
					    @csrf
						<input type="submit" value="x Supprimer" >
					</form>
                </td>
                <td>
                    <a href="{{ route('users_edit', ['user' => $user]) }}" title="Modifier" >Modifier</a>
                </td>
                <td>
					<a href="{{ route('users_create') }}" title="Nouveau" >Nouveau</a>
                </td>
			</tr>
            @php $i = $i + 1 @endphp
			@endforeach
        </tbody>
      </table>
@endsection
