@extends(Auth::user()->role_as == '1' ? 'layouts.template' : 'layoutss.template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0"><b>Edit File Release</b></h2>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('release.update', $release->id_release) }}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put" />

                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label class="form-label" for="judul_release">Judul Release</label>
                                <input type="text" name="judul_release" id="judul_release" class="form-control"
                                    value="{{ $release->judul_release }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="isi_release">Isi Release</label>
                                <textarea name="isi_release" id="isi_release" class="form-control" required>{{ $release->isi_release }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="file">File Release (PDF, PPTX, DOC, DOCX, ZIP, RAR |
                                    max: 10MB)</label>
                                @if ($release->file)
                                    <a href="{{ Storage::url($release->file) }}" target="_blank">[ Lihat
                                        File ]</a>
                                @else
                                    Tidak ada file
                                @endif
                                <input type="file" name="file" id="file" class="form-control">
                            </div>


                            <br>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('release.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .text-right-custom {
        text-align: right;
    }
</style>
