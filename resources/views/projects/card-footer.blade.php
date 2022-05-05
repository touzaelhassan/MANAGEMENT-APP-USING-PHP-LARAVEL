<div class="card-footer d-flex justify-content-between align-items-center" dir="rtl">

    <div class="d-flex">
      <div class="d-flex align-items-center">
          <img src="/images/clock.svg" class="ms-2">
          <div>{{ $project->created_at->diffForHumans() }}</div>
      </div>
    </div>

    <div class="d-flex">
      <div class="d-flex align-items-center">
          <div class="ms-2"> {{ count($project->tasks) }} </div>
          <img src="/images/list-check.svg">
      </div>
    </div>

    <div class="d-flex align-items-center mr-auto">
        <form action="/projects/{{$project->id}}" method="POST">
            @method('DELETE')
            @csrf
            <input type="submit" class="btn-delete" value="">
        </form>
    </div>

</div>