
<!doctype html>
<html lang="en">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Laravel: Modular Filtering System</title>

    <!-- Bootstrap core CSS -->
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <a href="/" class="text-dark"><p><i class="fas fa-search fa-9x"></i></p></a>
        <h2>Modular Filtering System</h2>
        <p class="lead">A robust filtering system created in Laravel. Instead of using conditional statements and repetitive code, it uses modules for filtering and sorting which results in having a scalable application and clean code.</p>
      </div>

      <div class="row">
        <div class="col-md-3">
            <div class="card card-body bg-white mb-2 ">
                <h4>Categories</h4>
                <div class="filterBox" data-filter="category">
                    <ul class="list-unstyled">
                    @foreach ($categories as $category)
                        <li><a href="javascript:;" data-value="{{$category->id}}" class="filter-link {{request()->has('category') && request()->input('category')==$category->id ? 'selected' : ''}} text-dark">&raquo; {{$category->name}} <span class="text-secondary">({{$category->total_books}})</span></a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="card card-body bg-white mb-2">
                <h4>Authors</h4>
                <div class="filterBox" data-filter="author">
                    <ul class="list-unstyled">
                    @foreach ($authors as $author)
                        <li><a href="javascript:;" data-value="{{$author->id}}" class="filter-link {{request()->has('author') && request()->input('author')==$author->id ? 'selected' : ''}} text-dark">&raquo; {{$author->name}} <span class="text-secondary">({{$author->total_books}})</span></a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="card card-body bg-white mb-2">
                <h4>Price</h4>
                <div class="filterBox" data-filter="price">
                    <ul class="list-unstyled">
                    @foreach ($price_ranges as $price_range)
                        <li><a href="javascript:;" data-value="{{$price_range->range}}" class="filter-link {{request()->has('price') && request()->input('price')==$price_range->range ? 'selected' : ''}} text-dark">&raquo; {{$price_range->range}} <span class="text-secondary">({{$price_range->total_books}})</span></a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="card card-body bg-white mb-2">
                <h4>Availability</h4>
                <div class="filterBox" data-filter="availability">
                    <ul class="list-unstyled">
                    @foreach ($availabilities as $availability)
                        <li><a href="javascript:;" data-value="{{$availability->id}}" class="filter-link {{request()->has('availability') && request()->input('availability')==$availability->id ? 'selected' : ''}} text-dark">&raquo; {{$availability->name}} <span class="text-secondary">({{$availability->total_books}})</span></a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 pl-md-0 "  id="results">
            <div class="card card-body bg-white">
                <div class="row">
                  <div class="col-md-6">
                    <h2 class="float-left">Books List</h2>
                  </div>
                  <div class="col-md-6 text-right">
                  <span>Showing {{$books->firstItem()}} to {{$books->lastItem()}} of {{$books->total()}}</span>
                      <select class="ml-2" id="sorting">
                        <option value="price_asc" {{request()->input('sort_by') == 'price' && request()->input('sort_order') == 'asc' ? 'selected="selected"' : ''}}>Price - Low to High</option>
                        <option value="price_desc" {{request()->input('sort_by') == 'price' && request()->input('sort_order') == 'desc' ? 'selected="selected"' : ''}}>Price - High to Low</option>
                      </select>
                    
                  </div>
                </div>
                <hr>
                <div>
                @if ( ! empty($books) )
                    @foreach ($books as $book)
                    <div>
                        <h4 class="text-info">{{$book->title}} <i class="fa fa-check-circle {{$book->availability->name =='In Stock' ? 'text-success' : 'text-muted'}}" title="{{$book->availability->name}}"></i></h4>
                        <p><b>&dollar;{{$book->price}}</b><br>
                        <span class="text-secondary">By</span> <a href="{{url('/?author='.$book->author->id)}}" class="text-dark">{{$book->author->name}}</a></p>
                        <p>{{$book->description}}</p>
                        <p><span class="text-secondary">Category:</span> <a href="{{url('/?category='.$book->category->id)}}" class="text-dark">{{$book->category->name}}</a></p>
                        <hr>
                    </div>
                    @endforeach
                    {{$books->appends(request()->input())->render("pagination::bootstrap-4")}}
                @endif
                </div>
            </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>
      csrf_token = '<?php echo csrf_token() ?>';
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
  </body>
</html>
