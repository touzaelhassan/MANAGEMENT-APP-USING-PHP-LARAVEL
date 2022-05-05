@extends('layouts/app')

@section('content')

<header class="d-flex justify-content-between align-items-center my-5" dir="rtl">
    <div class="h6 text-dark">
        <a href="/projects" class="text-dark text-decoration-none">المشاريع</a>
    </div>

    <div>
      <a href="/projects/create" class="btn btn-primary px-4" role="button">مشروع جديد</a>
    </div>
</header>

<section>
    <div class="row">
    @forelse($projects as $project)

        <div class="col-4 mb-4">
            <div class="card">
                <div class="card-body text-end">

                    <div class="status">
                        @switch($project->status)
                        @case(1)
                            <span class="text-success">مكتمل</span>
                        @break
                        @case(2)
                            <span class="text-danger">ملغي</span>
                        @break
                        @default
                            <span class="text-warning">قيد الإنجاز</span>
                        @endswitch
                    </div>

                    <h5 class="card-title font-weight-bold">
                        <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                    </h5>

                    <div class="card-text mt-4">
                        {{ Str::limit($project->description, 150) }}
                    </div>

                </div>

                @include('projects.card-footer')

            </div>
        </div>

        @empty
        <div class="align-content-center m-auto text-center">
            <p>ليس لديك أي مشروع في لوحة إدارة المشاريع</p>
            <div class="mt-5">
                <a href="./projects/create" class="btn btn-primary btn-lg d-inline-flex align-items-center" role="button">أنشئ مشروعا جديدا</a>
            </div>
        </div>

    @endforelse
    </div>
</section>

@endsection