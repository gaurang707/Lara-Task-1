<a href="{{ route('projects.tasks.index', $row->id) }}" class="edit btn btn-primary btn-sm"
    style="color:darkgoldenrod;padding:2px;">All Task</a>

<a href="{{ route('projects.edit', $row->id) }}" class="edit btn btn-danger btn-sm"
    style="color:blue;padding:2px;">Edit</a>
<a href="{{ route('projects.show', $row->id) }}" class="edit btn btn-primary btn-sm"
    style="color:green;padding:2px;">View</a>

<form method="post" action="{{ route('projects.destroy', $row->id) }}">
    @csrf
    @method("delete")
    <button type="submit" class="button" style="color:red;">Delete</button>
</form>

