@extends('layouts.master')


@section('pageTitle')
    System Configuration
@endsection



@section('content')
   <div class="row">
       <div class="panel panel-flat">
           <div class="panel-heading">
              System Sections
           </div>
           <div class="panel-body">
               <div class="col-md-6">
                   <div class="category-content">
                       <button class="btn bg-teal-300 btn-block btn-float btn-float-lg" type="button"  data-toggle="modal" data-target="#stockConfigModal">
                           <i class="icon-pie-chart7"></i> <span>Stock Configurations</span>
                       </button>
                       <button class="btn bg-teal-400 btn-block btn-float btn-float-lg" type="button"><i class="icon-cash4"></i> <span>Sales Configurations</span></button>
                   </div>
               </div>

               <div class="col-md-6">
                   <div class="category-content">
                       <button class="btn bg-teal-600 btn-block btn-float btn-float-lg" type="button"><i class="icon-drawer-in"></i> <span>Suppliers Configurations</span></button>
                       <a href="{{ route('config-roles') }}" class="btn bg-teal-700 btn-block btn-float btn-float-lg" type="button"><i class="icon-lock4"></i> <span>Roles and Permissions</span></a>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <div class="row">
       <div class="panel panel-flat">
           <div class="panel-heading">
               <h6 class="panel-title">Pharmacy Configurations</h6>
               <div class="heading-elements">
                   <ul class="icons-list">
                       <li><a data-action="collapse"></a></li>
                       <li><a data-action="reload"></a></li>
                       <li><a data-action="close"></a></li>
                   </ul>
               </div>
           </div>

           <div class="panel-body">
               <div class="tabbable">
                   <ul class="nav nav-tabs nav-tabs-bottom bottom-divided nav-justified">
                       <li class="active"><a href="#bottom-justified-divided-tab1" data-toggle="tab">General</a></li>
                       <li><a href="#bottom-justified-divided-tab2" data-toggle="tab">Receipt</a></li>

                   </ul>

                   <form>
                       <div class="tab-content">

                           <div class="tab-pane active" id="bottom-justified-divided-tab1">
                               <div class="form-group" >
                                   <label>Pharmacy Name:</label>
                                   <input type="text" name="pharmacyName" class="form-control" placeholder="Pharmacy Name">
                               </div>

                               <div class="form-group" >
                                   <label>Phone Number:</label>
                                   <input type="number" name="phoneNumber" class="form-control" placeholder="Phone Number">
                               </div>

                               <div class="form-group">
                                   <label>Address:</label>
                                   <textarea name="address" class="form-control" placeholder="Address"></textarea>
                               </div>
                           </div>
                           <div class="tab-pane" id="bottom-justified-divided-tab2">
                               Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid laeggin.
                           </div>

                       </div>
                       <div class="text-right">
                           <button type="submit" class="btn btn-primary">Save Config <i class="icon-arrow-right14 position-right"></i></button>
                       </div>
                   </form>

               </div>
           </div>
           <div class="panel-footer">

           </div>
       </div>
   </div>

   <!-- /tabs with bottom line -->

@endsection

@include('partials.modals.configPageModals')