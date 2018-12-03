@extends('home.layouts.master')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-4">
                <!-- Files -->
                {{--@auth()--}}
                <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h4 class="card-header-title">
                                    动态({{$actives->count()}})
                                </h4>

                            </div>
                        </div> <!-- / .row -->
                    </div>

                    <div class="card-body">

                        <!-- List group -->

                            <div class="list-group list-group-flush my--3">
                                @if($actives->count()!=0)
                                @foreach($actives as $active)
                                    @if($active['log_name']=='article')
                                        @include('home.layouts._article')
                                    @elseif($active['log_name']=='comment')
                                        @include('home.layouts._comment')
                                    @endif
                                @endforeach
                                @else
                                <p class="text-muted text-center">暂无评论</p>
                                @endif
                            </div>

                    </div>
                    <!-- List -->

                </div>
                {{--@endauth--}}
                {{$actives->links()}}

            </div>
            <div class="col-8">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{asset ('org/images')}}/1.jpg">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{asset ('org/images')}}/2.jpg">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{asset ('org/images')}}/t01ad48eb0945669efd.jpg">
                        </div>
                    </div>
                    <!-- 如果需要分页器 -->
                    <div class="swiper-pagination"></div>
                    <!-- 如果需要导航按钮 -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <style>
        .swiper-container {
            width: 800px;
            height: 300px;
        }
    </style>
    <script>
        require(['hdjs'], function (hdjs) {
            hdjs.swiper('.swiper-container', {
                loop: true,
                //自动轮换
                autoplay: {
                    delay: 1000,
                },
                //如果需要分页器
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                },
                //如果需要前进后退按钮
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            })
        })
    </script>
   @endpush
