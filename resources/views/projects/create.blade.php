@extends('layouts/app')

@section('title', 'إنشاء مشروع جديد')

@section('content')

<div class="row justify-content-center text-right">
    <div class="col-10">
        <h3 class="pb-5 font-weight-bold text-center">مشروع جديد</h3>

        <form action="/projects" method="POST" dir="rtl">

             @include('projects.form', ['project' => new App\Models\Project()])

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">إنشاء</button>
                <a href="/projects" class="btn btn-light">إلغاء</a>
            </div>

        </form>
    </div>
</div>

@endsection