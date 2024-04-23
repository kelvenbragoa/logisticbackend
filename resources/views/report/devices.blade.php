<table>
    <thead>
    <tr>
        <th>Data</th>
        <th>Nome</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Serial</th>
        <th>Tipo</th>
        <th>Estado</th>
        <th>Disponibilidade</th>
    </tr>
    </thead>
    <tbody>
    @foreach($devices as $device)
        <tr>
            <td>{{ $device->created_at->format('d-m-Y H:i') }}</td>
            <td>{{ $device->name }}</td>
            <td>{{ $device->make }}</td>
            <td>{{ $device->model }}</td>
            <td>{{ $device->serial }}</td>  
            <td>{{ $device->typedevice->name }}</td>  
            <td>{{ $device->devicestatus->name }}</td>  
            <td>{{ $device->deviceavailability->name }}</td>  
        </tr>
    @endforeach
    </tbody>
</table>