@extends('layouts.dashboard')

@section('content')
<div class="user-dashboard bc-user-dashboard">
            <div class="dashboard-outer">
                <div class="upper-title-box">
                    <h3>Bonjour, {{auth()->user()->name}} !</h3>
                    <div class="text">Simplifiez votre processus de recrutement et accélérez vos embauches</div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="ui-item ui-yellow">
                            <div class="left">
                                <i class="icon la la-comment-o"></i>
                            </div>
                            <div class="right">
                                <h4>0</h4>
                                <p>Total messages</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="ui-item ui-green">
                            <div class="left">
                                <i class="icon la la-bookmark-o"></i>
                            </div>
                            <div class="right">
                                <h4>0</h4>
                                <p>Total favoris</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-7">
                        <!-- Graph widget -->
                        <div class="graph-widget ls-widget">
                            <div class="tabs-box">
                                <div class="widget-title">
                                    <h4>Nombre de vues de votre profil</h4>
                                    <div id="reportrange"
                                        style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                                        <i class="fa fa-calendar"></i>&nbsp;
                                        <span></span> <i class="fa fa-caret-down"></i>
                                    </div>
                                </div>

                                <div class="widget-content">
                                    <canvas id="earning_chart"></canvas>
                                    <script>
                                    var views_chart_data = {
                                        "labels": ["23\/10\/2023", "24\/10\/2023", "25\/10\/2023", "26\/10\/2023"],
                                        "datasets": [{
                                            "label": "Views",
                                            "backgroundColor": "transparent",
                                            "borderColor": "#1967D2",
                                            "borderWidth": "1",
                                            "data": [0, 0, 0, 0],
                                            "pointRadius": 3,
                                            "pointHoverRadius": 3,
                                            "pointHitRadius": 10,
                                            "pointBackgroundColor": "#1967D2",
                                            "pointHoverBackgroundColor": "#1967D2",
                                            "pointBorderWidth": "2"
                                        }]
                                    };
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <!-- Notification Widget -->
                        <div class="notification-widget ls-widget">
                            <div class="widget-title">
                                <h4>Notifications</h4>
                            </div>
                            <div class="widget-content">
                                <ul class="notification-list">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
