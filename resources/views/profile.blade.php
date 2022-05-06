@extends('layouts/app')

@section('title', 'الملف الشخصي')

@section('content')

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="text-center">
                <img src="{{ asset('storage/' . auth()->user()->image) }}" width="82px" height="82px">
                <h3>{{ auth()->user()->name}}</h3>
            </div>
            <div class="card-body" dir="rtl">
                <form action="/profile" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="name">الإسم</label>
                        <input type="text" class="form-control " value="{{ auth()->user()->name }}" name="name">
                        @error('name')
                        <div class="text-danger"><small>{{ $message }}</small></div>    
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <input type="email" class="form-control" value="{{ auth()->user()->email }}" name="email">
                        @error('email')
                        <div class="text-danger"><small>{{ $message }}</small></div>    
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">كلمة المرور</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                        <div class="text-danger"><small>{{ $message }}</small></div>    
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirmation">تأكيد كلمة المرور</label>
                        <input type="password" class="form-control" name="password-confirmation">
                        @error('password-confirmation')
                        <div class="text-danger"><small>{{ $message }}</small></div>    
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">تغير الصورة الشخصية</label>
                        <div class="custom-file">
                            <input type="file" id="file" class="custom-file-input form-control" name="image">
                            <label for="image" id="image-label" class="custom-file-label text-left"></label>
                            @error('image')
                            <div class="text-danger"><small>{{ $message }}</small></div>    
                            @enderror
                        </div>
                    </div>

                    <div class="form-group d-flex justify-content-between mt-4">
                      <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                      <button type="submit" class="btn btn-light" form="logout">تسجيل الخروج</button>
                    </div>

                </form>

                <form action="/logout" method="POST" id="logout">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    document.getElementById('image').onchange = uploadOnChange; 

    function uploadOnChange(){

        let filename = this.value;
        let lastIndex = filename.lastIndexOf("\\");

        if (lastIndex >= 0){

            filename = filename.substring(lastIndex + 1); 
            document.getElementById('image-label').innerHTML = filename;
        }
      }
</script>

@endsection