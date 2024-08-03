<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Action
    </button>
    <ul class="dropdown-menu p-2">
        <li>
            <form action="{{ route($data."."."destroy",$model->id) }}" method="post" onclick="return confirm('از کار خود مطمئن هستید ؟')">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger w-100 rounded-3">
                    Delete
                </button>
            </form>
        </li>
        <li class="mt-1">
            <form action="{{ route($data."."."edit",$model->id) }}" method="get">
                <button type="submit" class="btn btn-success w-100 rounded-3">
                    Edit
                </button>
            </form>
        </li>
        @if($data === "posts" or $data == "comments")
            <li class="mt-1">
                <form action="{{ route($data."."."show",$model->id) }}" method="get">
                    <button type="submit" class="btn btn-warning w-100 rounded-3">
                        see
                    </button>
                </form>
            </li>
        @endif
        @if($data === "comments")
            @if($model->verification == null)
                <li class="mt-1">
                    <form action="{{ route($data."."."confirm",$model->id) }}" method="get">
                        <button type="submit" class="btn btn-azure w-100 rounded-3">
                            confirm
                        </button>
                    </form>
                </li>
            @else
                <li class="mt-1">
                    <form action="{{ route($data."."."reject",$model->id) }}" method="get">
                        <button type="submit" class="btn btn-dark w-100 rounded-3">
                            reject
                        </button>
                    </form>
                </li>
            @endif
        @endif
    </ul>
</div>
