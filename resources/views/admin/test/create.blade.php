@extends('admin/layout')
@section('title', 'Add Test')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Test
            <a href="{{ route('admin.test.index') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> View All </a> </h6>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <form id="myForm" method="POST" action="{{ route('admin.test.store') }}" enctype="multipart/form-data">
                    @csrf
                    <table id="inputTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th>Title</th>
                            <td><input required name="name" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                          <th>Fee</th>
                          <td><input required name="price" type="number" class="form-control"></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="text-center">

                          You must at least add a test and a normal range
                        </td>
                      </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                    <button type="button" class="btn btn-block btn-success" onclick="addInput()"> + Add Normal Range of tests</button><button type="submit" class="btn my-1 btn-block btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
    
      
      <script>
        let counter = 1;
        let maxFields = 11;
      
        function addInput() {
          if (counter < maxFields) {
            let inputTable = document.getElementById('inputTable').getElementsByTagName('tbody')[0];
            let newRow = inputTable.insertRow();
            
            let cell1 = newRow.insertCell(0);
            let cell2 = newRow.insertCell(1);
            let cell3 = newRow.insertCell(2);
      
            cell1.innerHTML ='<input type="text" class="form-control" placeholder="Enter Test Name" id="input' + counter + '" name="test' + counter + '">';
            cell2.innerHTML = '<input type="text" class="form-control" placeholder="Enter Normal Range" id="input' + counter + '" name="normalrange' + counter + '">';
            cell3.innerHTML = '<span class="btn btn-danger text-white" onclick="removeRow(this)">Remove</span>';

            counter++;
          } else {
            alert('Maximum limit reached (10 fields)');
          }
        }
        function removeRow(element) {
        let row = element.parentNode.parentNode;
        row.parentNode.removeChild(row);
        counter -= 1; // Decrement by 2 for two removed input fields
    }
      </script>
      
    @section('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endsection
@endsection

