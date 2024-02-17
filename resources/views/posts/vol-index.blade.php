{{-- Volunteer Dashboard --}}

@extends('layouts.post-app')

  @section('title') index @endsection

  @section('content')

     <!--Search bar-->
     <nav class="navbar bg-light">
      <div class="container-fluid">
        <form class="d-flex" id="searchForm" method="GET" autocomplete="off" onsubmit="search(event)">
            <!-- Searching keyword -->
            <input class="form-control mx-2" type="text" name="keyword" id="keyword" placeholder="Search" aria-label="Search">
            <!-- Searching city -->
            <input class="form-control mx-2" list="cityOptions" id="city_searching" name="city_searching" placeholder="Search by City...">
            <datalist id="cityOptions">
                <option value="طرابلس">
                <option value="سبها">
                <option value="بنغازي">
            </datalist>
            <!-- Searching Category -->
            <input class="form-control mx-2" list="categoryOptions" id="category_searching" name="category_searching" placeholder="Search by Category...">
            <datalist id="categoryOptions">
                <option value="التعليم">
                <option value="البيئة">
                <option value="إنساني">
            </datalist>
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <!--check for erros in seach bar keyword
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
  -->
    <!--Show posts-->
    <div>
      <table class="table text-center mt-3 mx-3">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">City</th>
            <th scope="col">Category</th>
            <th scope="col">Posts By</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($posts as $post)
              @component('components.vol-post-component', ['post' => $post])@endcomponent
          @endforeach
        </tbody>
      </table>

    {{-- <div class="container ">

      {{ $posts->links()}}

    </div> --}}

    
    </div>

    <script>
      async function search(event) {

          event.preventDefault(); // Prevent the default form submission behavior

          // Access the input field directly
         let keyword = document.querySelector('#keyword').value;
         let city = document.querySelector('#city_searching').value;
         let category = document.querySelector('#category_searching').value;

          // Make the AJAX request
          let response = await fetch('{{ route('posts.search') }}?' + new URLSearchParams({keyword, city, category}) );

          // Check if the request was successful (status code 200)
          if (response.ok) {
              let data = await response.text();
              document.querySelector('tbody').innerHTML = data;
          } else {
              console.error('Error in AJAX request');
          }
      }
  </script>

  @endsection