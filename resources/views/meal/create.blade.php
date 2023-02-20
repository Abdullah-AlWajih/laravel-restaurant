@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row gy-3">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-danger text-light text-center">القائمة</div>
                    <div class="card-body text-end">
                        <ul class="list-group p-0">
                            <a href="{{ route('category.show') }}" class="list-group-item list-group-item-action">إضافة
                                صنف</a>
                            <a href="{{ route('meal.index') }}" class="list-group-item list-group-item-action">عرض
                                الوجبات</a>

                            <a href="" class="list-group-item list-group-item-action">طلبات
                                المستخدمين</a>

                        </ul>
                    </div>
                </div>
                @if (count($errors) > 0)
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p> {{ $error }}
                                    <p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-danger text-center text-light">الوجبة</div>

                    <form action="{{ route('meal.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group mb-2">
                                <label for="name">اسم الوجبة </label>
                                <input id="name" type="text" class="form-control" name="name" placeholder="اسم الوجبة">
                            </div>
                            <div class="form-group mb-2">
                                <label for="description">وصف الوجبة</label>
                                <textarea id="description" class="form-control" name="description"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="price">سعر الوجبة($)</label>
                                <input id="price" type="number" name="price" class="form-control"
                                       placeholder="سعر الوجبة">
                            </div>
                            <div class="form-group mb-2">
                                <label for="category">اختر صنف *</label>
                                <select id="category" name="category" class="form-control" required="">
                                    <option value="" selected="" disabled="">اختر صنف</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label>صورة الوجبة</label>
                                <input type="file" name="image" class="form-control mb-2" id="formFile">
                                <img id="frame" src="{{ url('upload/no_image.png') }}"
                                     class="w-25" alt="">
                            </div>
                            <div class="text-center mb-2">
                                <button class="btn btn-danger" type="submit">حفظ</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

@endsection
