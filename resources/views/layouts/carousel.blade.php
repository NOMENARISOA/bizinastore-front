<div id="carouselExampleIndicators" style="max-height: 300px" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @php
        $i = 0;
    @endphp
    @foreach (App\Models\carousel::all() as $carousel )
        <li data-target="#carouselExampleIndicators @if($i == 0) active @endif " data-slide-to="{{ $i }}" class="active"></li>
        @php
            $i ++;
        @endphp
    @endforeach
    </ol>
    <div class="carousel-inner">
        @php
            $i = 0;
        @endphp
        @foreach (App\Models\carousel::all() as $carousel )
            <div class="carousel-item @if($i == 0)active @endif">
                <img class="d-block w-100" style="max-height: 300px" src="{{ route('file.open',['carousel',$carousel->url])}}" alt="Second slide">
            </div>
            @php
                $i ++;
            @endphp
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
  </div>
