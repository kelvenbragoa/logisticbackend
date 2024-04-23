<table>
    <thead>
    <tr>
        <th>Data</th>
        <th>Usuario</th>
        <th>Dispositivo</th>
        <th>Tipo de Operacao</th>
        <th>Trabalhador</th>
        <th>Tempo de Uso</th>
        <th>Empresa</th>
    </tr>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
        <tr>
            <td>{{ $transaction->created_at->format('d-m-Y H:i') }}</td>
            <td>{{ $transaction->user->name }}</td>
            <td>{{ $transaction->device->name }}</td>
            <td>{{ $transaction->operation->name }}</td>
            <td>{{ $transaction->employee->name }}</td>
            <td>
                @if ($transaction->operation_id == 1)
                    -----
                @else
                    <?php 
                        $created_at = strtotime($transaction->delivery->created_at);
                        $closed_at = strtotime($transaction->created_at);
                        $diff = $closed_at - $created_at;
                    ?>
                    {{round($diff/3600,1);}} Horas ({{round($diff/60,1);}} Minutos)
                @endif
            </td>
            <td>{{ $transaction->employee->company->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>