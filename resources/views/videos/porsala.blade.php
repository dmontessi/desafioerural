<ul class="list-group list-group-flush">
    @foreach ($sala->videos as $video)
    <li class="list-group-item d-flex justify-content-around align-items-center px-0">
        <img width="auto" height="50" src="https://img.youtube.com/vi/{{ $video->id_youtube() }}/0.jpg" width="50px" height="100%">
        <div> https://youtu.be/{{ $video->id_youtube() }}</div>
        <div>
            <form action="{{ route('videos.destroy', $video->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                    </svg>
                    Remover
                </button>
            </form>
        </div>
    </li>
    @endforeach
</ul>