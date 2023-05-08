
@extends('main.layout.main')
@section('content')


<!-- ======= Appointment Section ======= -->
<section id="appointment" class="appointment">
  <div class="container" data-aos="fade-up" style="margin-top: 25vh;">

    <div class="section-title">
      <h2>Make an Appointment</h2>
      <p>Isi data diri anda pada form dibawah berikut. Silahkan tunggu konfirmasi dari kami lewat Whatsapp.</p>
    </div>

    <form action="/appointment" method="POST" role="form" enctype="multipart/form-data" data-aos="fade-up" data-aos-delay="100" autocomplete="off">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-6 form-group mt-3 ">
          <label for="exampleFormControlInput1">  Nama</label>
          <input type="text" name="nama_pasien" class="form-control" value="{{ old('nama_pasien') }}" required>
          @error('nama_pasien')
          <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
            {{ $message }}
        </div>
        @enderror
        </div>
        <div class="col-md-6 form-group mt-3 ">
          <label for="exampleFormControlInput1">  Email</label>
          <input type="email" class="form-control" name="email_pasien" value="{{ old('email_pasien') }}" required>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 form-group mt-3 ">
          <label for="exampleFormControlInput1">  No Telepon</label>
          <input type="number" class="form-control" name="no_hp_pasien" value="62{{ old('no_hp_pasien') }}" required>
          @error('no_hp_pasien')
          <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                {{ $message }}
          </div>
          @enderror
        </div>
        <div class="col-md-6 form-group mt-3 ">
          <label for="exampleFormControlInput1">  Tanggal Janji</label>
          <input type="datetime-local" name="tanggal_janji" class="form-control datepicker" value="{{ old('tanggal_janji') }}" required>
          @error('tanggal_janji')
          <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 form-group mt-3">
          <label for="exampleFormControlInput1">  Alamat</label>
          <textarea class="form-control" name="alamat_pasien" rows="5"  value="{{ old('alamat_pasien') }}" ></textarea>
            @error('alamat_pasien')
            <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                  {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-md-6 form-group mt-3">
          <label for="exampleFormControlInput1">  Keluhan</label>
          <textarea class="form-control" name="keluhan_pasien" rows="5" value="{{ old('keluhan_pasien') }}" ></textarea>
          @error('keluhan_pasien')
          <div id="defaultFormControlHelp" class="form-text bg-warning text-black">
                {{ $message }}
          </div>
          @enderror
        </div>
        <div class="col-12">
          <div class="mb-3">
              <div class="text-start">
                  <button class="btn btn-primary btn-block" type="submit">
                      <span class="align-middle">Simpan</span>
                  </button>
              </div>
          </div>
      </div>
      </div>   
                  
      <!-- <div class="my-3">
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
      </div> -->
     
      
    </div>
  </form>

  
</div>
</section><!-- End Appointment Section -->
@endsection