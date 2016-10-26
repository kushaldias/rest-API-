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

<h1>Edit {{ $book->name }}</h1>

<!-- if there are creation errors, they will show here -->


{{ Form::model($book, array('route' => array('api.book.update', $book->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('text', 'Text') }}
        {{ Form::text('text', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the book!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>