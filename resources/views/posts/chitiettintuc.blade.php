@extends('layout.layoutchinh')
@section('content')
<div class="sm:col-span-9 col-span-12 m-3 text-justify bg-white">
    <div class="grid grid-cols-12">

    </div>
    @if($chitiet)
        <p class="font-bold text-3xl text-justify ">{{ $chitiet->title }}</p>
            <div class="text-gray-600 font-bold font-inclined text-lg text-justify mt-2">{{ $chitiet->excerpt }}</div>
            <div>
                <img class="mt-2" src="/storage/baonoi.png"  alt="">
            </div>
            <p><img src="/storage/{{ $chitiet->thumbnail }}" alt="" class="w-full"></p>
        <p class=" text-lg mt-2  px-auto text-justify" >{!! $chitiet->content !!}</p>
        @foreach( $upload as $ul)
            @if( $ul->duoifile == 'jpg' || $ul->duoifile == 'png' )

            <img class="w-full" src="/{{$ul->link}}" alt="">
            @elseif ( $ul->duoifile == 'pdf' || $ul->duoifile == 'docx' )
            <a href="{{$ul->link}}" download><i class="fas fa-file-pdf text-red-700"></i></a>
            @else
            <video width="100%" loop muted autoplay>
                <source src="/{{$ul->link}}" type="video/mp4">
                Your browser does not support HTML video.
            </video> 
            @endif
        @endforeach
    @endif

    <h3 class="mt-4" style="border-left:2px solid blue;">&nbspTIN CÙNG CHUYÊN MỤC</h3>
    @foreach($tinlienquan as $p)
        <div class="col-span-12 grid grid-cols-12 mb-4 mt-2 border-b-2">
            <div class="sm:col-span-3 col-span-12 mt-2 p2">
                <img src="/storage/{{ $p->thumbnail }}" alt="" class="w-full">
            </div>
            <div class="sm:col-span-9  col-span-12 pl-2 pt-2">
                <p class="font-bold text-justify text-xl my-1 text-gray-800">
                    <a href="/chi-tiet-tin-tuc/{{$p['slug']}}">
                        {{ $p->title }}
                    </a> </p>
                <p class="text-base  text-justify text-gray-800">
                    {{ $p->excerpt }}
                </p>
            </div>
        </div>
    @endforeach

</div>

@endsection
