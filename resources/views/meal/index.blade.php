@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-danger text-light text-center ">القائمة</div>
                    <div class="card-body text-end ">
                        <ul class="list-group p-0">
                            <a href="{{ route('meal.index') }}" class="list-group-item list-group-item-action ">عرض
                                الوجبات</a>
                            <a href="{{ route('meal.create') }}" class="list-group-item list-group-item-action">إضافة
                                وجبة</a>
                            <a href="/home" class="list-group-item list-group-item-action">طلبات المستخدمين</a>

                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-danger text-light text-center ">جميع الوجبات

                    </div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table class="table table-bordered text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">صورة الوجبة</th>
                                <th scope="col">اسم الوجبة</th>
                                <th scope="col">الوصف</th>
                                <th scope="col">الصنف</th>
                                <th scope="col">السعر ($)</th>
                                <th scope="col">تعديل</th>
                                <th scope="col">حذف</th>

                            </tr>

                            </thead>
                            <tbody>

                            @if (count($meals) > 0)
                                @foreach ($meals as $meal)

                                    <tr class="align-middle">
                                        <th scope="row">{{$meal->id  }}</th>
                                        <td><img src="{{asset($meal->image) }}" width="80" alt=""></td>
                                        <td>{{$meal->name  }}</td>
                                        <td>{{$meal->description }}</td>
                                        <td>{{$meal->category }}</td>
                                        <td>{{$meal->price }}</td>

                                        <td><a href="{{ route('meal.edit',$meal->id) }}">
                                                <button class="btn btn-primary">تعديل</button>
                                            </a></td>


                                        <td>
                                            {{--                                            <a href="{{ route('meal.delete',$meal->id) }}" class="btn btn-danger"--}}
                                            {{--                                               id="delete">حذف</a>--}}

                                            <form action="{{ route('meal.delete',$meal->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"
                                                        id="delete">حذف
                                                </button>
                                            </form>

                                        </td>


                                    </tr>

                                @endforeach

                            @else
                                <p>لا يوجد وجبات </p>
                            @endif


                            </tbody>
                        </table>
                        <div dir="ltr" class="d-flex flex-row-reverse">
                            {{ $meals->links()  }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
