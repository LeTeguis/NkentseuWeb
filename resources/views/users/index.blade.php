@extends("layouts.app")

@section('content')

	<h1>Tous les utilisateurs</h1>

	<!-- Le tableau pour lister les utilisateur -->
	<table>
		<thead>
			<tr>
				<th style="width: 200px">Nom</th>
				<th style="width: 200px">Email</th>
                <th style="width: 200px">Delete</th>
                <th style="width: 200px">Update</th>
                <th style="width: 200px">Show</th>
                <th colspan="0"  style="width: 200px">Email</th>
			</tr>
		</thead>
		<tbody>
            <!-- On parcourt la collection de Post -->
			@foreach($users as $user)
			<tr>
				<td>
                    {{ $user->name }}
				</td>
                <td>
                    {{ $user->email }}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

@endsection
