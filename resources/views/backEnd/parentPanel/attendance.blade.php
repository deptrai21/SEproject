@extends('backEnd.master')
@section('mainContent')
<style>
    th{
        padding: .5rem !important;
        font-size: 10px !important;
    }
    td{
        padding: .3rem !important;
        font-size: 9px !important;  
    }
</style>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('lang.attendance')</h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('lang.dashboard')</a>
                <a href="{{route('student_my_attendance')}}">@lang('lang.attendance')</a>
            </div>
        </div>
    </div>
</section>
<section class="student-details mb-40">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="student-meta-box">
                    <div class="student-meta-top"></div>
                    <img class="student-meta-img img-100" src="{{asset($student_detail->student_photo)}}" alt="">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-5 col-md-6">
                                <div class="single-meta mt-20">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @lang('lang.name')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                {{$student_detail->full_name}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @lang('lang.mobile')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                {{$student_detail->mobile}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @lang('lang.category')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                {{$student_detail->category !=""?$student_detail->category->category_name:""}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offset-lg-2 col-lg-5 col-md-6">
                                <div class="single-meta mt-20">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @lang('lang.class_section')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @if($student_detail->className !="" && $student_detail->section !="")
                                                {{$student_detail->className->class_name .'('.$student_detail->section->section_name.')'}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @lang('lang.admission_no')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                {{$student_detail->admission_no}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @lang('lang.roll_no')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                {{$student_detail->roll_no}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
            
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30">@lang('lang.select_criteria') </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        @if(session()->has('message-success'))
                        <div class="alert alert-success">
                            {{ session()->get('message-success') }}
                        </div>
                        @elseif(session()->has('message-danger'))
                        <div class="alert alert-danger">
                            {{ session()->get('message-danger') }}
                        </div>
                        @endif
                    <div class="white-box">
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'parent_attendance_search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student']) }}
                            <div class="row">
                                <input type="hidden" name="url" id="url" value="{{URL::to('/')}}">
                                <input type="hidden" name="student_id" id="student_id" value="{{$student_detail->id}}">
                                
                                
                                <div class="col-lg-6 mt-30-md">
                                    <select class="w-100 niceSelect bb form-control{{ $errors->has('month') ? ' is-invalid' : '' }}" name="month">
                                        <option data-display="Select Month *" value="">@lang('lang.select_month') *</option>
                                        <option value="01" {{isset($month)? ($month == "01"? 'selected': ''): ''}}>@lang('lang.january')</option>
                                        <option value="02" {{isset($month)? ($month == "02"? 'selected': ''): ''}}>@lang('lang.february')</option>
                                        <option value="03" {{isset($month)? ($month == "03"? 'selected': ''): ''}}>@lang('lang.march')</option>
                                        <option value="04" {{isset($month)? ($month == "04"? 'selected': ''): ''}}>@lang('lang.april')</option>
                                        <option value="05" {{isset($month)? ($month == "05"? 'selected': ''): ''}}>@lang('lang.may')</option>
                                        <option value="06" {{isset($month)? ($month == "06"? 'selected': ''): ''}}>@lang('lang.june')</option>
                                        <option value="07" {{isset($month)? ($month == "07"? 'selected': ''): ''}}>@lang('lang.july')</option>
                                        <option value="08" {{isset($month)? ($month == "08"? 'selected': ''): ''}}>@lang('lang.august')</option>
                                        <option value="09" {{isset($month)? ($month == "09"? 'selected': ''): ''}}>@lang('lang.september')</option>
                                        <option value="10" {{isset($month)? ($month == "10"? 'selected': ''): ''}}>@lang('lang.october')</option>
                                        <option value="11" {{isset($month)? ($month == "11"? 'selected': ''): ''}}>@lang('lang.november')</option>
                                        <option value="12" {{isset($month)? ($month == "12"? 'selected': ''): ''}}>@lang('lang.december')</option>
                                    </select>
                                    @if ($errors->has('month'))
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong>{{ $errors->first('month') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <select class="niceSelect w-100 bb form-control {{$errors->has('year') ? 'is-invalid' : ''}}" name="year" id="year">
                                        <option data-display="Select Year *" value="">@lang('lang.select_year') *</option>
                                        @foreach ($academic_years as $academic_year)
                                            <option value="{{$academic_year->year}}">{{$academic_year->year}}[{{$academic_year->title}}]</option>
                                       
                                        @endforeach
                                        
                                       
                                    </select>
                                    @if ($errors->has('year'))
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small fix-gr-bg">
                                        <span class="ti-search pr-2"></span>
                                        @lang('lang.search')
                                    </button>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
    </div>
</section>
@if(isset($attendances))

<section class="student-attendance">
    <div class="container-fluid p-0">
        <div class="row mt-40">
            <div class="col-lg-12">
                <a href="{{url('my-child-attendance/print/'.@$student_detail->id.'/'.@$month.'/'.@$year)}}" class="primary-btn small fix-gr-bg pull-right" target="_blank"><i class="ti-printer"> </i> @lang('lang.print')</a>
            </div>
        </div>
        <div class="row mt-40">
            <div class="col-lg-4 no-gutters">
                <div class="main-title">
                    <h3 class="mb-0">@lang('lang.attendance_result')</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="3%">P</th>
                            <th width="3%">L</th>
                            <th width="3%">A</th>
                            <th width="3%">H</th>
                            <th width="3%">F</th>
                            <th width="2%">%</th>
                            @for($i = 1;  $i<=@$days; $i++)
                            <th width="3%" class="{{($i<=18)? 'all':'none'}}">
                                {{$i}} <br>
                                @php
                                    @$date = @$year.'-'.@$month.'-'.$i;
                                    @$day = date("D", strtotime(@$date));
                                    echo @$day;
                                @endphp
                            </th>
                            @endfor
                        </tr>
                    </thead>
                    
                    <tbody>
                        @php @$total_attendance = 0; @endphp
                        @php @$count_absent = 0; @endphp
                        <tr>
                            <td>
                                @php $p = 0; @endphp
                                @foreach($attendances as $value)
                                    @if(@$value->attendance_type == 'P')
                                        @php $p++; @$total_attendance++; @endphp
                                    @endif
                                @endforeach
                                {{$p}}
                            </td>
                            <td>
                                @php $l = 0; @endphp
                                @foreach($attendances as $value)
                                    @if(@$value->attendance_type == 'L')
                                        @php $l++; @$total_attendance++; @endphp
                                    @endif
                                @endforeach
                                {{$l}}
                            </td>
                            <td>
                                @php $a = 0; @endphp
                                @foreach($attendances as $value)
                                    @if(@$value->attendance_type == 'A')
                                        @php $a++; @$count_absent++; @$total_attendance++; @endphp
                                    @endif
                                @endforeach
                                {{$a}}
                            </td>
                            <td>
                                @php $h = 0; @endphp
                                @foreach($attendances as $value)
                                    @if(@$value->attendance_type == 'H')
                                        @php $h++; @$total_attendance++; @endphp
                                    @endif
                                @endforeach
                                {{$h}}
                            </td>
                            <td>
                                @php $f = 0; @endphp
                                @foreach($attendances as $value)
                                    @if(@$value->attendance_type == 'F')
                                        @php $f++; @$total_attendance++; @endphp
                                    @endif
                                @endforeach
                                {{$f}}
                            </td>
                            <td>  
                            @php
                                @$total_present = @$total_attendance - @$count_absent;
                                if(@$count_absent == 0){
                                    echo '100%';
                                }else{
                                    @$percentage = @$total_present / @$total_attendance * 100;
                                    echo number_format((float)@$percentage, 2, '.', '').'%';
                                }
                            @endphp

                            </td>
                            @for($i = 1;  $i<=@$days; $i++)
                                @php
                                    @$date = @$year.'-'.@$month.'-'.$i;
                                @endphp
                                <td width="3%" class="{{($i<=18)? 'all':'none'}}">
                                    @foreach($attendances as $value)
                                        @if(strtotime(@$value->attendance_date) == strtotime(@$date))
                                            {{@$value->attendance_type}}
                                        @endif
                                    @endforeach
                                </td>
                            
                            @endfor
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endif


@endsection
