@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="bg-warning  mb-3 p-2 rounded-2 text-center">
                    {{__('Customer orders')}}
                </div>
                <div class="card  ">
                    <div class="card-header ">
                        <a href="{{ route('category.index') }}" class="btn btn-success ms-2">
                            {{__('category.Add a new category')}}
                        </a>
                        <a href="{{ route('meal.create') }}" class="btn btn-danger ms-2">
                            {{ __('order.Add a meal') }}
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-info ">
                            {{ __('order.Show meals') }}
                        </a>
                    </div>
                    <div class="card-body text-center table-responsive">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">{{ __('app.Name') }}</th>
                                <th scope="col">{{ __('app.Email') }}</th>
                                <th scope="col">{{__('app.Phone')}}</th>
                                <th scope="col">{{__('app.Date')}}</th>
                                <th scope="col">{{__('app.Time')}}</th>
                                <th scope="col">{{__('meal.name of the meal')}}</th>
                                <th scope="col">{{__('app.Quantity')}}</th>
                                <th scope="col">{{__('meal.meal price')}}($)</th>
                                <th scope="col">{{__('app.Total')}} ($)</th>
                                <th scope="col">{{__('app.Address')}}</th>
                                <th scope="col">{{__('app.Status')}}</th>
                                <th scope="col">{{__('app.Address')}}</th>
                                <th scope="col">{{__('app.Reject')}}</th>
                                <th scope="col">{{__('app.Complete')}}</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->user->email }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->date }}</td>
                                    <td>{{ $order->time }}</td>

                                    <td>{{ $order->meal->name }}</td>
                                    <td>{{ $order->qty }}</td>
                                    <td>${{ $order->meal->price }}</td>
                                    <td>${{ $order->meal->price * $order->qty }}</td>
                                    <td>{{ $order->address }}</td>


                                    @if ($order->status == __('order.The request is being reviewed'))

                                        <td class="text-light bg-secondary">{{ $order->status }}</td>

                                    @endif

                                    @if ($order->status == __('app.Reject'))

                                        <td class="text-light bg-danger">{{ $order->status }}</td>

                                    @endif

                                    @if ($order->status == __('app.Accept'))

                                        <td class="text-light bg-primary">{{ $order->status }}</td>

                                    @endif

                                    @if ($order->status == __('app.Complete'))

                                        <td class="text-light bg-success">{{ $order->status }}</td>

                                    @endif


                                    <form action="{{ route('order.update', $order->id) }}" method="post">
                                        @method('PUT')
                                        @csrf


                                        <td>
                                            <input name="status" type="submit" value="{{__('app.Accept')}}"
                                                   class="btn btn-primary btn-sm">
                                        </td>

                                        <td>
                                            <input name="status" type="submit" value="{{__('app.Reject')}}"
                                                   class="btn btn-danger btn-sm">
                                        </td>
                                        <td>
                                            <input name="status" type="submit" value="{{__('app.Complete')}}"
                                                   class="btn btn-success btn-sm">
                                        </td>

                                    </form>


                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
