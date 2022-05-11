<x-common.app page-title="Tickets comprados">
  <x-common.header>
		Tickets comprados
	</x-common.header>

  <main>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Id usuario</th>
          <th scope="col">Nombre usuario</th>
          <th scope="col">Id película</th>
          <th scope="col">Nombre película</th>
          <th scope="col">Número de entradas</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tickets as $ticket)
          <tr>
            <td>{{ $ticket->user_id }}</td>
            <td>{{ $ticket->user->name }}</td>
            <td>{{ $ticket->film_id }}</td>
            <td>{{ $ticket->film->name }}</td>
            <td>{{ $ticket->amount }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </main>
</x-common.app>