<tr>
    @foreach ($row as $datum)
    <td>{{ $datum }}</td>
    @endforeach
    <td>
        <button hx-get="{{ $tablename }}/{{ $row['id'] }}/edit">Editar</button>
    </td>
    <td>
        <button hx-delete="{{ $tablename }}/{{ $row['id'] }}">Borrar</button>
    </td>
</tr>
