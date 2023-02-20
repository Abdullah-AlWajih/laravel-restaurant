@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row gy-4">
            <div class="col-md-4 ">
                <div class="card">
                    <div class="card-header">{{ __('category.Add a new category') }}</div>
                    <form action="{{ route('category.store') }}" method="post">
                        @csrf
                        <div class="card-body">

                            <label class="form-label" for="name">{{__('category.category_name')}}</label>

                            <input id="name" type="text" class="form-control" name="name"
                                   placeholder="{{__('category.category_name')}}">
                            <div class="col-auto text-center mt-2">
                                <button class="btn btn-success">{{__('app.save')}}</button>
                            </div>


                        </div>

                    </form>


                </div>
            </div>
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header text-center">
                        {{__('category.categories')}}
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                            <tr class="align-middle">
                                <th class="col-1"> {{__('app.id')}}</th>
                                <th class="col"> {{__('category.category_name')}}</th>
                                <th class="col-2"> {{__('app.edit')}}</th>
                                <th class=" col-2"> {{__('app.delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $key=> $category)
                                <tr class="align-middle">
                                    <th scope="row">{{$key +=1}}</th>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"
                                                data-bs-whatever='{"id": "{{  $category->id}}", "name": "{{  $category->name}}"}'>
                                            {{__('app.edit')}}
                                        </button>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('category.destroy', $category) }}">
                                            {{ csrf_field() }}
                                            <input type="submit" class="btn btn-danger delete-category"
                                                   value="{{__('app.delete')}}">
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                            {{ method_field('DELETE') }}
                                        </form>

                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('category.edit_category')}}</h5>

                </div>
                <form action="{{route('category.update')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="category-name" class="col-form-label">{{__('category.category_name')}}</label>
                            <input type="text" class="form-control" id="category-name" name="name">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{__('app.cancel')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('app.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
