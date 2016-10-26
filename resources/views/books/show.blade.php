<!DOCTYPE html>
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

<h1>Showing {{ $book->text }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $book->text }}</h2>
        <p>
            <strong>Email:</strong> {{ $book->user_id }}<br>
            <strong>Level:</strong> {{ $book->created_at }}
        </p>
    </div>

</div>
</body>
</html>