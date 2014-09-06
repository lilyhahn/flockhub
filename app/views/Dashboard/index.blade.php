@extends('template')
@section('title')
Dashboard
@stop
@section('content')
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div @if($analyze->numerical_change > 0) class="small-box bg-green" @else class="small-box bg-red"@endif>
        <div class="inner">
            <h3>
                {{$analyze->numerical_change}}
            </h3>
            <p>
                @if($analyze->numerical_change > 0)
                New 
                @else
                Lost
                @endif
                Followers
            </p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">
            {{$analyze->percent_change}}
        </a>
    </div>
</div>
@stop