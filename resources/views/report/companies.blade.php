<table>
    <thead>
    <tr>
        <th>Data</th>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Cidade</th>
        <th>Província</th>
        <th>Nº Trabalhadores</th>
    </tr>
    </thead>
    <tbody>
    @foreach($companies as $company)
        <tr>
            <td>{{ $company->created_at->format('d-m-Y H:i') }}</td>
            <td>{{ $company->name }}</td>
            <td>{{ $company->address }}</td>
            <td>{{ $company->city }}</td>
            <td>{{ $company->province->name }}</td>
            <td>{{ $company->employees->count() }}</td>
        </tr>
    @endforeach
    </tbody>
</table>