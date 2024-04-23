<table>
    <thead>
    <tr>
        <th>Data</th>
        <th>Nome</th>
        <th>Nº Dispositivos</th>
    </tr>
    </thead>
    <tbody>
    @foreach($typedevices as $typedevice)
        <tr>
            <td>{{ $typedevice->created_at->format('d-m-Y H:i') }}</td>
            <td>{{ $typedevice->name }}</td>
            <td>{{ $typedevice->devices->count() }}</td>  
        </tr>
    @endforeach
    </tbody>
</table>