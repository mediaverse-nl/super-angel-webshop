@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.dashboard') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-users"></i>
                    </div>
                    <div class="mr-5">{!! \App\User::count() !!} - users</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.user.index') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-secondary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-barcode"></i>
                    </div>
                    <div class="mr-5">{!! \App\Product::count() !!} - products</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.category.index') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-dark o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-search"></i>
                    </div>
                    <div class="mr-5">seo </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.seo-manager.index') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-white o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5">{!! \App\Category::count()!!} - categories </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.category.index') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-cubes"></i>
                    </div>
                    <div class="mr-5">{!! \App\Detail::count() !!} - details</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.category.index') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning-orange o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-file"></i>
                    </div>
                    <div class="mr-5">File manager</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.file-manager.index') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-inbox"></i>
                    </div>
                    <div class="mr-5">{!! \App\Order::where('status', '=', 'paid')->count() !!} - new orders!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.order.index') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-question"></i>
                    </div>
                    <div class="mr-5">F.A.Q. items</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.faq.index') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Orders
                </div>
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div id="mysecondchart" class="chartjs-render-monitor" style="height: 250px;"></div>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Registered Users
                </div>
                <div class="card-body">
                    <div id="myfirstchart" style="height: 250px;"></div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Order Methods
                </div>
                <div class="card-body chartjs-size-monitor">
                    <div id="donutExample" style="height: 250px;"></div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>
    </div>

@endsection

@push('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

<!-- Custom styles for this template-->
<link href="/css/admin/sb-admin.css" rel="stylesheet">
    <style>
        .bg-white{
            background-color: #4a2bff !important;
        }
        .bg-warning-orange{
            background-color: #ff8e1b !important;
        }
    </style>
@endpush

@push('scripts')
 {{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>--}}
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
{{--<script src="/vendor/chart.js/Chart.min.js"></script>--}}

<script>
    new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'myfirstchart',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: [
            { year: '2008', value: 20 },
            { year: '2009', value: 10 },
            { year: '2010', value: 5 },
            { year: '2011', value: 5 },
            { year: '2012', value: 20 }
        ],
        // The name of the data record attribute that contains x-values.
        xkey: 'year',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['value'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Value']
    });

    new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'mysecondchart',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: [
            { year: '2008', value: 20 },
            { year: '2009', value: 10 },
            { year: '2010', value: 5 },
            { year: '2011', value: 5 },
            { year: '2012', value: 20 }
        ],
        // The name of the data record attribute that contains x-values.
        xkey: 'year',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['value'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Value']
    });


    new Morris.Donut({
        element: 'donutExample',
        data: [
            {label: "Ideal", value: 12},
            {label: "Paypal", value: 30},
            {label: "Visa", value: 20},
            {label: "Anders", value: 2}
        ]
    });
</script>
@endpush
