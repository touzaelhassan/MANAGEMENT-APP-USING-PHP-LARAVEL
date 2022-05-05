@csrf

<div class="form-group">
    <label for="title">عنوان المشروع</label>
    <input type="text" class="form-control" id="title" value="{{ $project->title }}" name="title" >
</div>

<div class="form-group">
    <label for="description">وصف المشروع</label>
    <textarea class="form-control" id="description" cols="30" rows="10" name="description">{{ $project->description }}</textarea>
</div>
