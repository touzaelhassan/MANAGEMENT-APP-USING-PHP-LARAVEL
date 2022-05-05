@extends('layouts/app')


@section('content')

<header class="d-flex justify-content-between align-items-center my-5" dir="rtl">

    <div class="h6 text-dark">
        <a href="/projects" class="text-dark text-decoration-none">المشاريع / {{ $project->title }}</a>
    </div>

    <div>
      <a href="/projects/{{$project->id}}/edit" class="btn btn-primary px-4" role="button">تعديل المشروع</a>
    </div>

</header>

<section class="row text-right" dir="rtl">

    <div class="col-lg-4">
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
                    {{ $project->description }}
                </div>

            </div>

            @include('projects.card-footer')

        </div>

        <div class="card mt-3">
            <div class="card-body">
                <form action="/projects/{{ $project->id }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <select class="select-custom form-control" name="status" onchange="this.form.submit()">
                        <option value="0" {{ ($project->status == 0) ? 'selected' : '' }} >قيد الإنجاز</option>
                        <option value="1" {{ ($project->status == 1) ? 'selected' : '' }} >مكتمل</option>
                        <option value="2" {{ ($project->status == 2) ? 'selected' : '' }} >ملغي</option>
                    </select>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="project-tasks">
            @foreach($project->tasks as $task)
            <div class="card">

                <div class={{ $task->done ? 'checked muted' : ''}}>
                    {{$task->body}}
                </div>

                <div>
                    <form action="/projects/{{$project->id}}/tasks/{{$task->id}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="checkbox"  {{ $task->done ? 'checked' : ''}} class="ml-4" name="done" onchange="this.form.submit()">
                    </form>
                </div>

            </div>
            @endforeach
        </div>

        <div class="add-task">
            <div class="card">
                <form action="/projects/{{$project->id}}/tasks" method="POST">
                    @csrf
                    <input type="text" class="form-control p-2 ml-2" name="body" placeholder="أضف مهمة جديدة">
                    <button type="submit" class="btn btn-primary">إضافة</button>
                </form>
            </div>
        </div>
    </div>

</section>

@endsection