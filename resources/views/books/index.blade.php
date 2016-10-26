<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
       <a class="navbar-brand" href="{{ URL::to('api/book') }}">Book Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('api/book') }}">View All Books</a></li>
        <li><a href="{{ URL::to('api/book/create') }}">Create a Book</a>
    </ul>
</nav>

<h1>All the Books</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>text</td>
            <td>user_id</td>
            <td>date</td>
            <td>updated date</td>
        </tr>
    </thead>
    <tbody>
    @foreach($books as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->text }}</td>
            <td>{{ $value->user_id }}</td>
            <td>{{ $value->created_at }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the book (uses the destroy method DESTROY /books/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                {{ Form::open(array('url' => 'api/book/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this book', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
                
                
                <!-- show the book (uses the show method found at GET /books/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('api/book/' . $value->id) }}">Show this Book</a>

                <!-- edit this book (uses the edit method found at GET /books/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('api/book/' . $value->id . '/edit') }}">Edit this Book</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>