<table class='table table-striped table-bordered'>
    <thead>
        <tr>
            <th>Posisi</th>
            <th>Departemen</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
@foreach ($posisis as $posisi)
    <tr>
        <td>{!!$posisi->posisi!!}</td>
        <td>{!!$posisi->departemen!!}</td>
        <td>
            <a href="{{route('posisi.edit', $posisi->id)}}"><button class="btn btn-primary btn-sm">
                <i class="fas fa-cog"></i> ubah
            </button></a>
        </td>
        <td><form action=" {{route('posisi.destroy', $posisi->id)}} " method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type='submit' class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i> Hapus
            </button></a>
        </td>
    </tr>
@endforeach
    </tbody>
</table>