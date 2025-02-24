<h2>{{ $tablename }}</h2>
<table>
    <x-table-heading :columns="$columns" />
    @foreach ($rows as $row)
    <x-table-row :row="$row" :tablename="$tablename" />
    @endforeach
</table>
