<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png"
          href="img/icons/truck.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title> Invoice Preview </title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Light Bootstrap Dashboard core CSS -->
    <link href="css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <!-- CSS for Demo Purpose, don't include it in your project -->
    <link href="css/demo.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Fonts and icons -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!--<link href="css/pe-icon-7-stroke.css" rel="stylesheet" />-->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <script src="ajax/common.js" type="application/javascript"></script>
    <script src="ajax/validations.js" type="application/javascript"></script>


    <style>
        html, body {
            margin: 0px;
            padding: 0px;
            min-height: 100%;
            height: 100%;
        }

        #wrapper {
            background-color: #e3f2fd;
            min-height: 100%;
            height: auto !important;
            margin-bottom: -50px; /* the bottom margin is the negative value of the footer's total height */
        }

        #wrapper:after {
            content: "";
            display: block;
            height: 50px; /* the footer's total height */
        }

        #content {
            height: 100%;
        }

        #footer {
            height: 50px; /* the footer's total height */
        }

        #footer-content {
            background-color: #f3e5f5;
            border: 1px solid #ab47bc;
            height: 32px; /* height + top/bottom paddding + top/bottom border must add up to footer height */
            padding: 8px;
        }
    </style>
</head>
<body>


<div class="wrapper" style="padding-top: 0;margin-top: 0;">
    <!--Start Content-->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="col-md-12">
                        <img src="img/letterhead.jpg" class="img"
                             style="margin-top:0pt;padding-left: 2pt;padding-bottom: 10pt ">
                    </div>

                    <table border="0" width="100%">
                        <tr>
                            <td width="50%">
                                <h6 class="text-left" style="margin: 0;padding-left: 15pt;vertical-align: text-bottom">
                                    Customer : {{$Invoice->User->name}} | {{$Invoice->section}}</h6>
                            </td>
                            <td width="50%">
                                <h6 class="text-right" style="margin: 0;padding-right: 20pt;vertical-align: text-top">
                                    DATE-TIME : {{$current_date}}</h6>
                                <h6 class="text-right" style="margin: 0;padding-right: 20pt;vertical-align: text-top">
                                    USER : {{\Illuminate\Support\Facades\Auth::user()->name}}</h6>

                            </td>
                    </table>


                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="content table-full-width">
                            <table class="table table-hover table-striped">
                                <thead style="font-size: 10pt;">
                                <th colspan="2">Descriptions</th>
                                <th colspan="2">Transport Info</th>

                                <th class="text-right">Chargers</th>
                                <th class="text-right">Amount</th>

                                </thead>
                                <tbody style="font-size:9pt;">
                                @foreach($Transports as $Transport)
                                    <tr>
                                        <td style="text-align: right;vertical-align: text-top;">
                                            Date : <br>
                                            Vehilce No : <br>
                                            Vehilce Size : <br>
                                            Referance No : <br>
                                            Transport Type : <br>
                                            Gate Pass No : <br>
                                        </td>
                                        <td style="text-align: left;vertical-align: text-top;">
                                            {{$Transport->date}}<br>

                                            {{$Transport->Vehicles->vehicle_number}}<br>{{$Transport->size}}<br> {{$Transport->referrence_number}}<br>
                                            {{$Transport->transport_type}}<br>

                                            <!-- <td style="vertical-align: text-top;">-->
                                            {{$Transport->gate_pass}}<br>

                                        </td>
                                        <td style="text-align: right;vertical-align: text-top;">
                                            FROM :<br>
                                            To : <br>
                                            In Time : <br>
                                            Out Time : <br>

                                            Total Hours : <br> Free Hours : <br> Demourage Hours : <br> </td>
                                        <td style="text-align: left;vertical-align: text-top;">
                                            {{$Transport->destination_from}}<br>
                                            {{$Transport->destination_to}}<br>
                                            {{$Transport->in_date}}:{{$Transport->in_time}}<br>
                                            {{$Transport->out_date}}:{{$Transport->out_time}}<br>

                                            {{$Transport->total_hrs}} Hours <br> {{$Transport->free_hrs}} Hours <br>
                                            {{$Transport->demurrage_hrs}} Hours <br>

                                        </td>


                                        <td style="text-align: right;vertical-align: text-top;">
                                            Transport Charge :<br>
                                        </td>
                                        <td style="text-align: right;margin-top: 0;vertical-align: text-top;">
                                            {{$Transport->total}} LKR <br>

                                        </td>


                                    </tr>
                                @endforeach



                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-md-6 pull-right" style="padding-top: 0pt">

                    <h6 style="text-align: right;padding-right: 20pt">{{$Invoice->total}} LKR</h6>
                    <h6 style="text-align: right;padding-right: 20pt">{{$Invoice->paid}} LKR</h6>
                    <h6 style="text-align: right;padding-right: 20pt">{{$Invoice->unpaid}} LKR</h6>


                </div>

                <div class="col-md-6 pull-right" style="padding-top: 0pt">

                    <h6 style="text-align: right;padding-right: 10pt">Total Amount :</h6>
                    <h6 style="text-align: right;padding-right: 10pt">Paid Amount :</h6>
                    <h6 style="text-align: right;padding-right: 10pt">Due Amount :</h6>


                </div>


            </div>

        </div>

    </div>
</div>

<!--End Content -->


</body>


<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="js/jquery.validate.min.js"></script>
<!-- Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="js/moment.min.js"></script>
<!-- Date Time Picker Plugin is included in this js file -->
<script src="js/bootstrap-datetimepicker.js"></script>
<!-- Select Picker Plugin -->
<script src="js/bootstrap-selectpicker.js"></script>
<!-- Checkbox, Radio, Switch and Tags Input Plugins -->
<script src="js/bootstrap-checkbox-radio-switch-tags.js"></script>
<!-- Charts Plugin -->
<script src="js/chartist.min.js"></script>
<!-- Notifications Plugin -->
<script src="js/bootstrap-notify.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="js/sweetalert2.js"></script>
<!-- Vector Map plugin -->
<script src="js/jquery-jvectormap.js"></script>
<!-- Google Maps Plugin -->
<!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->
<!-- Wizard Plugin -->
<script src="js/jquery.bootstrap.wizard.min.js"></script>
<!-- Bootstrap Table Plugin -->
<script src="js/bootstrap-table.js"></script>
<!-- Plugin for DataTables.net -->
<script src="js/jquery.datatables.js"></script>
<!-- Full Calendar Plugin -->
<script src="js/fullcalendar.min.js"></script>
<!-- Light Bootstrap Dashboard Core javascript and methods -->
<script src="js/light-bootstrap-dashboard.js"></script>
<!-- Sharrre Library -->
<script src="js/jquery.sharrre.js"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="js/demo.js"></script>
<script src="js/my_alerts.js"></script>
<script>
    window.print();
</script>

</html>
