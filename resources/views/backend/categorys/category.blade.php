@extends('backend.admin')
@section('content')

    <div class="main-content">

        <div class="main-content-inner">
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>Categories</h3>
                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                        <li>
                            <a href="{{route('backend.deshboard')}}">
                                <div class="text-tiny">Dashboard</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <div class="text-tiny">Categories</div>
                        </li>
                    </ul>
                </div>

                <div class="wg-box">
                    <div class="flex items-center justify-between gap10 flex-wrap">
                        <div class="wg-filter flex-grow">
                            <form class="form-search">
                                <fieldset class="name">
                                    <input type="text" placeholder="Search here..." class="" name="name" tabindex="2"
                                        value="" aria-required="true" required="">
                                </fieldset>
                                <div class="button-submit">
                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <a class="tf-button style-1 w208" href="{{route('category.add')}}"><i class="icon-plus"></i>Add new</a>
                    </div>
                    <div class="wg-table table-all-user">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Products</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($categories as $Categorie)
                                <tbody>
                                    <tr>
                                        <td>{{$Categorie->id}}</td>
                                        <td class="pname">
                                            <div class="image">
                                                <img src="1718066463.html" alt="" class="image">
                                            </div>
                                            <div class="name">
                                                <a href="#" class="body-title-2">{{$Categorie->name}}</a>
                                            </div>
                                        </td>
                                        <td>{{$Categorie->slug}}</td>
                                        <td><a href="#" target="_blank">{{$Categorie->parent_id}}</a></td>
                                        <td>
                                            <div class="list-icon-function">
                                                <a href="{{route('category.edit', $Categorie->id)}}">
                                                    <div class="item edit">
                                                        <i class="icon-edit-3"></i>
                                                    </div>
                                                </a>
                                                <form action="{{route('category.delete', $Categorie->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="item text-danger delete">
                                                        <i class="icon-trash-2"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            @endforeach

                        </table>
                    </div>
                    <div class="divider"></div>
                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

                    </div>
                </div>
            </div>
        </div>


        <div class="bottom-page">
            <div class="body-text">Copyright © 2024 SurfsideMedia</div>
        </div>
    </div>
@endsection