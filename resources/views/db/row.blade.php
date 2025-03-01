<tr>
    @foreach ($data as $datum)
        <td>{{ $datum }}</td>
    @endforeach
    <td><a><button :href=$table . "/" . $row . "/edit">Editar</button></a></td>
    <td><a><button hx-delete="{$table . '/' . $row . '/'}">Editar</button></a></td>
</tr>
