@extends('layouts.app')
@section('content')



 
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="{{ asset('asset/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
</div>
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Overview</h1>
            <span>
              Administrator PT Mitra Kerinci 
            </span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
       
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $truk }}</h3>

                <p>Jumlah Truk</p>
              </div>
              <div class="icon"><i class="ion ion-person-add"></i>
              </div>
              <a href="{{route ('truk.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Total Berat</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        
       
        
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $afdel }}</h3>

                <p>Afdeling</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{route ('afdeling.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        
          <!-- LINE CHART -->
          {{-- <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Line Chart</h3>
              <i class="fas fa-char-line mr-1"></i>
             
            </div>
            <div class="card-body">
              <div class="chart">
                {!! $chart->container() !!}
              </div>
            </div> --}}
      </div>
    </section>
</div>
<script href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/chart.min.js" charset="utf-8"></script>
{{-- {!! $chart->script() !!} --}}


@endsection

