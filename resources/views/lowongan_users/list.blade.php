<table class='table table-striped table-bordered'>
    <thead>
        <tr>
            <th>Posisi</th>
            <th>Departemen</th>
            <th>Deskripsi</th>
            <th>Deadline</th>
            <th>Pelamar</th>
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
        <td>
            <table>
            @foreach ($lowongan_users as $lowongan_user)
                @if ($lowongan->id == $lowongan_user->lowongan_id)
                    @foreach ($users as $user)
                        @if ($lowongan_user->user_id == $user->id)
                            @foreach ($user_details as $detail)
                                @if ($user->id == $detail->user_id)
                                    <tr>
                                        <td>{!!$user->name!!}</td>
                                        <td><a href=" {{$detail->cv_path}} ">Download</a></td>
                                        @if ($lowongan_user->status_cv == 'Unread')
                                            <td>
                                                <form action=" {{route('lowongan_user.update', $lowongan_user->id)}} " method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}
                                                    <button type='submit' name='status_cv' value='accept' class="btn btn-primary btn-sm">ACCEPT</button>
                                                    <button type='submit' name='status_cv' value='reject' class="btn btn-danger btn-sm">REJECT</button>
                                                </form>
                                            </td>
                                        @else
                                            <td>
                                                {{$lowongan_user->status_cv }}
                                            </td>
                                        @endif
                                        
                                        <td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endforeach
            </table>
        </td>
    </tr>
@endforeach
    </tbody>
</table>