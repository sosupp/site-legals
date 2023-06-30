<style>
    .custom-input{
        margin: 1rem 0;
    }
    .custom-input label{}
</style>

<h1>Update: {{$page->page_name}}</h1>
<form action="{{route('site.info.update', $page->id)}}"
    method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="custom-input">
        <label for="pageName">Page Name</label>
        <input type="text"
            name="page_name"
            placeholder="Enter page name"
            value="{{$page->page_name}}">
    </div>

    <div class="custom-input">
        <label for="description">Brief Description</label>
        <input type="text"
            name="description"
            placeholder="Enter a brief description for the page"
            value="{{$page->description}}">
    </div>

    <div class="custom-input">
        <label for="description">Status</label>
        <select name="status"
            id="status">
            <option value="{{$page->status}}">
                {{$page->status == 'active' ? 'Publish' : 'Disable'}}
            </option>

            <option value="{{$page->status == 'active' ? 'inactive' : 'active'}}">
                {{$page->status == 'active' ? 'Publish' : 'Disable'}}
            </option>
        </select>
    </div>

    <div class="custom-input">
        <label for="description">Content</label>
        <textarea name="content"
            id="content"
            cols="30"
            rows="10"
            placeholder="Content for the page"
            >{{$page->content}}</textarea>
    </div>

    <div class="custom-input">
        <button type="submit">add page</button>
    </div>
</form>
