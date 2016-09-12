

@extends('applicant.layout')
@section('css')

@stop

@section('content')
        <div class="container container-alt" style="margin-top:7em">
                    <div class="block-header">
                        <h2>Find Employers
                        </h2>
                    </div>

                    <div class="card">
                        <div class="action-header clearfix">

                            <div class="card">
                                <div class="card-header">
                                    <div class="btn-demo  pull-right">
                                        <button class="btn btn-info btn-icon waves-effect waves-circle waves-float" type="button" data-toggle="collapse"
                                                data-target="#searchMatch" aria-expanded="false"
                                                aria-controls="searchMatch">
                                            <i class="zmdi zmdi-search "></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body card-padding">
                                    <div class="collapse m-t-10" id="searchMatch">
                                        <div class="card-body card-padding">
                                                <form class="row" role="form" action="{{ asset('') }}" method="get">
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <div class="fg-line">
                                                                <div class="select">
                                                                    <select name="location" class="form-control">
                                                                        @foreach($location as $loc)
                                                                            <option value="{{ $loc['regionid'] }}">{{ $loc['location'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <div class="fg-line">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Salary</option>
                                                                        <option>Option 1</option>
                                                                        <option>Option 2</option>
                                                                        <option>Option 3</option>
                                                                        <option>Option 4</option>
                                                                        <option>Option 5</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <div class="fg-line">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Year of Experience</option>
                                                                        <option>Option 1</option>
                                                                        <option>Option 2</option>
                                                                        <option>Option 3</option>
                                                                        <option>Option 4</option>
                                                                        <option>Option 5</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <div class="fg-line">
                                                                <div class="select">
                                                                    <select name="jobtype" class="form-control">
                                                                        @foreach($jobtype as $type)
                                                                            <option value="{{ $type['jobtypeid'] }}">{{ $type['description'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <div class="fg-line">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Capacity</option>
                                                                        <option>Full Time</option>
                                                                        <option>Part Time</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <div class="fg-line">
                                                                <div class="select">
                                                                    <select class="form-control">
                                                                        <option>Education Level</option>
                                                                        <option>Elementary</option>
                                                                        <option>High School</option>
                                                                        <option>College Level</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="f-500 c-black m-b-5">Services</p>
                                                    <div class="col-sm-2">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="">
                                                                <i class="input-helper"></i>
                                                                Cooking
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="">
                                                                <i class="input-helper"></i>
                                                                Gardening
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="">
                                                                <i class="input-helper"></i>
                                                                Grocery
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="">
                                                                <i class="input-helper"></i>
                                                                House Cleaning
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="">
                                                                <i class="input-helper"></i>
                                                                Tutoring
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="">
                                                                <i class="input-helper"></i>
                                                                Laundry
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class=" row">
                                                        <div class=" col-sm-7 pull-right">
                                                            <button type="submit" class="btn btn-primary btn-lg" href="{{ asset('helpers') }}">Find Match</button>
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <div class="card-body card-padding">

                            <div class="contacts clearfix row">
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="{{asset('public/template/img/contacts/1.jpg')}}" alt="">
                                        </a>

                                        <div class="c-info text-left ">
                                            <strong>Cathy Shelton</strong>

                                            <a href="#"><small class="c-yellow f-19">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                    <i class="zmdi zmdi-star-outline"></i>
                                                </small></a>
                                            <div class="card-body ">
                                                <div class="pmo-contact">
                                                    <ul class="text-left">
                                                        <li class="ng-binding"> <small><i class="zmdi zmdi-search"></i> Nanny</small></li>
                                                        <li class="ng-binding"> <small><i class="zmdi zmdi-tag"></i> &#8369; Salary</small></li>
                                                        <li class="ng-binding"> <small><i class="zmdi zmdi-book"></i> 2 Experience</small></li>

                                                        <li>
                                                            <small> <i class="zmdi zmdi-pin"></i>
                                                                <address class="m-b-0 ng-binding">
                                                                    44-46 Morningside Road <br>
                                                                    Edinburgh <br>
                                                                    Scotland
                                                                </address></small>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="c-footer">
                                            <button class="waves-effect btn-primary"><i class="zmdi zmdi-person-add"></i> Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="{{asset('public/template/img/contacts/2.jpg')}}" alt="">
                                        </a>

                                        <div class="c-info text-left ">

                                            <strong>Cathy Shelton</strong>
                                            <a href="#"><small class="c-yellow f-19">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                    <i class="zmdi zmdi-star-outline"></i>
                                                </small></a>
                                            <div class="card-body ">
                                                <div class="pmo-contact">
                                                    <ul class="text-left">
                                                        <li class="ng-binding"> <small><i class="zmdi zmdi-search"></i> Nanny</small></li>
                                                        <li class="ng-binding"> <small><i class="zmdi zmdi-tag"></i> &#8369; Salary</small></li>
                                                        <li class="ng-binding"> <small><i class="zmdi zmdi-book"></i> 2 Experience</small></li>

                                                        <li>
                                                            <small> <i class="zmdi zmdi-pin"></i>
                                                                <address class="m-b-0 ng-binding">
                                                                    44-46 Morningside Road <br>
                                                                    Edinburgh <br>
                                                                    Scotland
                                                                </address></small>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="c-footer">
                                            <button class="waves-effect btn-primary"><i class="zmdi zmdi-person-add"></i> Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="{{asset('public/template/img/contacts/3.jpg')}}" alt="">
                                        </a>

                                        <div class="c-info text-left ">

                                            <strong>Cathy Shelton</strong>
                                            <a href="#"><small class="c-yellow f-19">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                    <i class="zmdi zmdi-star-outline"></i>
                                                </small></a>
                                            <div class="card-body ">
                                                <div class="pmo-contact">
                                                    <ul class="text-left">
                                                        <li class="ng-binding"> <small><i class="zmdi zmdi-search"></i> Nanny</small></li>
                                                        <li class="ng-binding"> <small><i class="zmdi zmdi-tag"></i> &#8369; Salary</small></li>
                                                        <li class="ng-binding"> <small><i class="zmdi zmdi-book"></i> 2 Experience</small></li>

                                                        <li>
                                                            <small> <i class="zmdi zmdi-pin"></i>
                                                                <address class="m-b-0 ng-binding">
                                                                    44-46 Morningside Road <br>
                                                                    Edinburgh <br>
                                                                    Scotland
                                                                </address></small>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="c-footer">
                                            <button class="waves-effect btn-primary"><i class="zmdi zmdi-person-add"></i> Add
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="" class="ci-avatar">
                                            <img src="{{asset('public/template/img/contacts/4.jpg')}}" alt="">
                                        </a>

                                        <div class="c-info text-left ">

                                            <strong>Cathy Shelton</strong>
                                            <a href="#"><small class="c-yellow f-19">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                    <i class="zmdi zmdi-star-outline"></i>
                                                </small></a>
                                            <div class="card-body ">
                                                <div class="pmo-contact">
                                                    <ul class="text-left">
                                                        <li class="ng-binding"> <small><i class="zmdi zmdi-search"></i> Nanny</small></li>
                                                        <li class="ng-binding"> <small><i class="zmdi zmdi-tag"></i> &#8369; Salary</small></li>
                                                        <li class="ng-binding"> <small><i class="zmdi zmdi-book"></i> 2 Experience</small></li>

                                                        <li>
                                                            <small> <i class="zmdi zmdi-pin"></i>
                                                                <address class="m-b-0 ng-binding">
                                                                    44-46 Morningside Road <br>
                                                                    Edinburgh <br>
                                                                    Scotland
                                                                </address></small>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="c-footer">
                                            <button class="waves-effect btn-primary"><i class="zmdi zmdi-person-add"></i> Add
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="load-more">
                                    <a href=""><i class="zmdi zmdi-refresh-alt"></i> Load More...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-loader">
                        <div class="preloader pls-blue">
                            <svg class="pl-circular" viewBox="25 25 50 50">
                                <circle class="plc-path" cx="50" cy="50" r="20" />
                            </svg>

                            <p>Please wait...</p>
                        </div>
                    </div>
                    </div>
        </div>
@stop

@section('js')

@stop