@extends('dashboard.parent')
@section('content')
    <!--begin::Input group-->
    <form action="{{route('contact.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
       <x-alert />
        <div class="form-floating mb-7">
            <input type="name" class="form-control" id="address" name="address" placeholder="please inter address" />
            <label for="name">Your address</label>
        </div>
        <div class="form-floating mb-7">
            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="please inter mobile" />
            <label for="name">Your mobile </label>
        </div>
        <div class="form-floating mb-7">
            <input type="email" class="form-control" id="email" name="email" placeholder="please inter email" />
            <label for="name">Your email</label>
        </div>
        <div class="form-floating mb-7">
            <input type="name" class="form-control" id="website" name="website" placeholder="please inter website" />
            <label for="name">Your website</label>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
    </form>
    <br>
@endsection
