<table class='table table-striped table-bordered'>
    <thead>
        <tr>
            <th>Posisi</th>
            <th>Departemen</th>
            <th> Deskripsi</th>
            <th>Deadline</th>
            <th>Pengalaman Minimal</th>
            <th>Pendidikan Minimal</th>
            <th>Nilai Minimal</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
@foreach ($lowongans as $lowongan)
    <tr>
        @foreach ($posisis as $posisi)
            @if ($posisi->id == $lowongan->posisi_id)
                <td>{!!$posisi->posisi!!}</td>
                <td>{!!$posisi->departemen!!}</td>
            @endif
        @endforeach
        <td>{!!$lowongan->deskripsi!!}</td>
        <td>{!!$lowongan->deadline!!}</td>
        <td>{!!$lowongan->pengalaman_minimal!!}</td>
        <td>{!!$lowongan->pendidikan_minimal!!}</td>
        <td>{!!$lowongan->nilai_minimal!!}</td>
        <td>
            <a href="{{route('lowongan.edit', $lowongan->id)}}"><button class="btn btn-primary btn-sm">
                <i class="fas fa-cog"></i> ubah
            </button></a>
        </td>
        <td><form action=" {{route('lowongan.destroy', $lowongan->id)}} " method="POST">
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