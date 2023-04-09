@extends('layouts.employee')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($documents as $document )
            <div class="col-3 p-3">
            <div class="card" >
                <img src="/storage/{{ $document->path }}" class="card-img-top img-thumbnail"  alt="...">
                <div class="card-body">
                  <h5 class="card-title">عدد الكتاب : {{ $document->document_number }}</h5>
                  <p class="card-text">تاريخ الكتاب : {{ $document->doc_date }}</p>
                  <a href="{{ route('DocumentShow',[
                    'EmpId'=>request()->route('EmpId'),
                    'group'=>request()->route('group'),
                    'type'=>request()->route('type'),
                    'documentgroup'=>request()->route('documentgroup'),
                    'DocumentId'=>$document->id,
                    ]) }}" class="btn btn-primary">تفاصيل الكتاب</a>
                </div>
              </div>
            </div>

            @endforeach

        </div>
    </div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
      const searchInput = document.querySelector("input[type='search']");
      const cards = document.querySelectorAll(".col-3");

      searchInput.addEventListener("keyup", filterCards);

      function filterCards() {
        const searchTerm = searchInput.value.toLowerCase();

        cards.forEach(card => {
          const cardTitle = card.querySelector(".card-title").textContent.toLowerCase();
          const cardText = card.querySelector(".card-text").textContent.toLowerCase();

          if (cardTitle.includes(searchTerm) || cardText.includes(searchTerm)) {
            card.style.display = "block";
          } else {
            card.style.display = "none";
          }
        });
      }
    });
    </script>
