
@extends('layouts.master')

@section('pageTitle')
    Products
@endsection


@section('quick-tools')

@endsection

@section('scripts')

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>


    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/pages/datatables_basic.js') }}"></script>
    <!-- /theme JS files -->
@endsection
@section('content')
    <!-- Basic datatable -->
    <form action="{{ route('order.save.stock') }}" method="post">
        {{ csrf_field() }}
        <?php $i = 0?>
        <input type="hidden" name="orderId" value="{{ $id }}">
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Products</h5>
            <div class="heading-elements">

            </div>
        </div>

        <div class="panel-body">
            Select Stock You Would Like To Add To This Order
        </div>


          <table class="table datatable-basic">
              <thead>
              <tr>
                  <th>Selected</th>
                  <th>Generic Name</th>
                  <th>Item Name</th>
                  <th>Purchase Cost</th>
                  <th>Strength</th>
                  <th>Type</th>
                  <th>Quantity</th>
              </tr>
              </thead>
              <tbody>
              @foreach($stocks as $stock)

                  <tr>
                      <td>
                          <div class="checkbox">
                              <label>
                                  <input type="checkbox" class="styled" name="selected[{{ $i }}]">
                                  <input type="hidden" value="{{ $stock->id }}" name="item[{{ $i }}]">
                              </label>
                          </div>
                      </td>
                      <td>
                          {{ $stock->generic_Name }}
                      </td>

                      <td>
                          {{ $stock->brandName }}
                          <input type="hidden" name="name[{{ $i }}]" value="{{ $stock->brandName }}" class="form-control" >
                      </td>


                      <td>
                          {{ $stock->purchaseCost }}
                          <input type="hidden" name="purchaseCost[{{ $i }}]" value="{{ $stock->purchaseCost }}" class="form-control" >
                      </td>

                      <td>

                          <input type="text" name="strength[{{ $i }}]" value="{{ $stock->strength }}" class="form-control">
                      </td>
                      <td>
                          {{ $stock->typeName }}
                          <input type="hidden" name="type[{{ $i }}]" value="{{ $stock->typeName }}" class="form-control">
                      </td>
                      <td>
                          <input type="text" name="quantity[{{ $i }}]" class="form-control">
                      </td>
                  </tr>
                  <?php $i++ ?>
              @endforeach
              </tbody>
          </table>
        <button  type="submit" class="btn bg-teal-400 btn-labeled" style="margin-bottom: 10px; margin-left: 10px;">
              <b><i class="icon-plus22"></i></b>Add To Order
        </button>

    </div>
    <!-- /basic datatable -->
    </form>
@endsection