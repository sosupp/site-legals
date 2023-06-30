<h1>From package: Your Site Info Pages</h1>
<a href="{{route('site.info.create')}}">Add New Info Page</a>

<ol>
    @foreach ($pages as $page)

    <li>
        {{$page->page_name}}

        <a href="{{route('site.info.edit', $page->id)}}">EDIT</a>

        <a href="{{route('site.info.show', $page->id)}}">VIEW</a>

        <a href="{{route('public.site.info.show', $page->slug)}}">public VIEW</a>

        <form action="{{route('site.info.destroy', $page->id)}}"
            method="POST">
            @method('DELETE')
            <button type="submit">delete</button>
        </form>
    </li>
    @endforeach

</ol>
