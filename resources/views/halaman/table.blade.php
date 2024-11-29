@extends('layout.master')
@section('title')
    Table
@endsection

@push('scripts')
<script src="{{asset('templating/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('templating/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
@endpush

@push('styles')
    <link rel="stylesheet" type="text/css" 
    href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
@endpush

@section('content')
<table class="table table-bordered">
    <thead>                  
      <tr>
        <th style="width: 10px">#</th>
        <th>Task</th>
        <th>Progress</th>
        <th style="width: 40px">Label</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1.</td>
        <td>Update software</td>
        <td>
          <div class="progress progress-xs">
            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
          </div>
        </td>
        <td><span class="badge bg-danger">55%</span></td>
      </tr>
      <tr>
        <td>2.</td>
        <td>Clean database</td>
        <td>
          <div class="progress progress-xs">
            <div class="progress-bar bg-warning" style="width: 70%"></div>
          </div>
        </td>
        <td><span class="badge bg-warning">70%</span></td>
      </tr>
      <tr>
        <td>3.</td>
        <td>Cron job running</td>
        <td>
          <div class="progress progress-xs progress-striped active">
            <div class="progress-bar bg-primary" style="width: 30%"></div>
          </div>
        </td>
        <td><span class="badge bg-primary">30%</span></td>
      </tr>
      <tr>
        <td>4.</td>
        <td>Fix and squish bugs</td>
        <td>
          <div class="progress progress-xs progress-striped active">
            <div class="progress-bar bg-success" style="width: 90%"></div>
          </div>
        </td>
        <td><span class="badge bg-success">90%</span></td>
      </tr>
    </tbody>
  </table>
@endsection