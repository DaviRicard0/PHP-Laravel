<x-layout>
    <div class="container">
        <table id="table" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">CRM</th>
                <th scope="col">Número</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($medicos as $medico)
                    <tr onclick="window.location = '/medico/{{ $medico->id }}/edit'">
                        <th scope="row">
                            {{ $medico->id }}
                        </th>
                        <td>
                            {{ $medico->nome }}
                        </td>
                        <td>
                            {{ $medico->crm }}
                        </td>
                        <td>
                            {{ $medico->numero }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <x-slot:script>
      <script>
          let table = new DataTable('#table', {
              responsive: true,
              language: {
                  url:"https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
              },
              layout: {
                  topStart: {
                      buttons: [
                          {
                              text: '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16"><path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/></svg> Adicionar Médico',
                              className:'btn btn-primary',
                              action: function (e, dt, node, config) {
                                  window.location.href = '/medico/create';
                              }
                          }
                      ]
                  }
              }
          });
      </script>
    </x-slot:script>
</x-layout>