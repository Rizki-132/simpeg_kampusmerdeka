@extends('admin.index')
@section('content')
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form input Pegawai</h5>

              <!-- General Form Elements -->
              <form>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">NIP</label>
                  <div class="col-sm-10">
                    <input type="text" name="nip" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Jabatan</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="jabatan_id" aria-label="Default select example">
                      <option selected>-- Plih Jabatan --</option>
                      @foreach ($ar_jabatan as $jab)
                      <option value="{{ $jab->id }}">{{ $jab->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Divisi</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="divisi_id" aria-label="Default select example">
                      <option selected>-- Plih Jabatan --</option>
                      @foreach ($ar_divisi as $div)
                      <option value="{{ $div->id }}">{{ $div->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                  <div class="col-sm-10">
                    @foreach ($ar_gender as $gender)
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" value="{{ $gender }}">
                      <label class="form-check-label" for="gridRadios1">
                        {{ $gender }}
                      </label>
                    </div>
                    @endforeach
                  </div>
                </fieldset>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" name="tmp_lahir" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" name="tgl_lahir" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Textarea</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="alamat" style="height: 100px"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control"  type="file" name="foto">
                  </div>
                </div>
               
             
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

@endsection