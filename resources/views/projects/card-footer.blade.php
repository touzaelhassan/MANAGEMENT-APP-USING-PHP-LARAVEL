<div class="card-footer">

    <div class="d-flex">
      <div class="d-flex align-items-center">
          <img src="/images/clock.svg">
          <div class="mr-2">{{ $project->created_at->diffForHumans() }}</div>
      </div>
    </div>

    <div class="d-flex">
      <div class="d-flex align-items-center">
          <img src="/images/list-check.svg">
          <div class="mr-2">3</div>
      </div>
    </div>

    <div class="d-flex align-items-center mr-auto">
        <form action="projects/{project}" method="POST">
            @method('DELETE')
            @csrf
            <input type="submit" value="">
        </form>
    </div>

</div>