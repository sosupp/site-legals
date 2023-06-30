<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Site Info</title>
</head>
<body>
    <style>
        .custom-input{
            margin: 1rem 0;
        }
        .custom-input label{}
    </style>

    <h1>New Site Info Page</h1>
    <form action="{{route('site.info.store')}}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        {{$statuses}}
        <div class="custom-input">
            <label for="pageName">Page Name</label>
            <input type="text"
                name="page_name"
                placeholder="Enter page name">
        </div>

        <div class="custom-input">
            <label for="description">Brief Description</label>
            <input type="text"
                name="description"
                placeholder="Enter a brief description for the page">
        </div>

        <div class="custom-input">
            <label for="description">Status</label>
            <select name="status"
                id="status">
                <option>Select status</option>

                <option value="active">Publish</option>
                <option value="inactive">Disable</option>
            </select>
        </div>

        <div class="custom-input">
            <label for="description">Content</label>
            <textarea name="content"
                id="content"
                cols="30"
                rows="10"
                placeholder="Content for the page"></textarea>
        </div>

        <div class="custom-input">
            <button type="submit">add page</button>
        </div>
    </form>

</body>
</html>

