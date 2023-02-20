@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center bg-success text-light">{{__('app.main menu')}}</div>
                    <div class="card-body text-right">
                        <form action="" method="get">
                            <a class="list-group-item h4 list-group-item-action "
                               href="/home">{{ __('app.Homepage') }}</a>
                            @foreach ($categories as $category)
                                <input type="submit" value="{{ $category->name }}" name="category"
                                       class="list-group-item h5 list-group-item-action  ">
                            @endforeach
                        </form>
                    </div>
                </div>

                @if( auth()->user() != null && auth()->user()->is_admin == 0 )
                    <div class="card">
                        <div class="card-header text-center">الطلبات السابقة</div>
                        <div class="card-body text-right">
                            <form action="" method="get">
                                <a class="list-group-item list-group-item-action" href="{{route('order.index')}}">اظهار الطلبات
                                    السابقة</a>
                            </form>
                        </div>
                    </div>
                @endif


            </div>




            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>{{ $category_name }}</h4>
                        {{ __('order.The number of meals') }} ({{count($meals)}})
                    </div>
                    <div class="card-body">
                        <div class="row">


                            @forelse ($meals as $meal )
                                <div class="col-md-4 mt-3 text-center">
                                    <div class="card " style="border: 1px solid rgb(149, 212, 159) ;">
                                        <img src="{{ asset($meal->image) }}" class="img-thumbnail" style="width:100%;"
                                             alt="">
                                        <strong>{{ $meal->name }}</strong>
                                        <p>{{ $meal->description }}</p>
                                        <div>

                                            <a href="{{ route('meal.show',$meal->id) }}" class="btn btn-success"
                                               style="font-size:16px" title="Add Cart">
                                                <i class="fa fa-bell-slash-o"
                                                   style="font-size:16px;color:white">{{ __('order.Order now') }}
                                                </i>
                                            </a>

                                        </div>
                                        <br>
                                    </div>
                                </div>
                            @empty
                                <p>{{ __('meal.There are no meals available') }}</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
