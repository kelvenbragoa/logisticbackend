<table>
    <thead>
    <tr>
        <th>Data</th>
        <th>Nome do Recurso Afetado</th>
        <th>Tipo</th>
        <th>Feito por</th>
        <th>Parametros</th>
    </tr>
    </thead>
    <tbody>
    @foreach($audits as $audit)
        <tr>
            <td>{{ $audit->created_at->format('d-m-Y H:i') }}</td>
            <td>{{ $audit->subject_type }}</td>
            <td>{{ $audit->event }}</td>
            <td>{{ $audit->causer->name }}</td>
            <td>{{ $audit->properties}}</td>
            
        </tr>
    @endforeach
    </tbody>
</table>