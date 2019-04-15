@extends('itemview.front')

@section('content')
    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="portfolio">
        <div class="container">
            <h2 class="text-center text-uppercase text-secondary mb-0">Items</h2>
            <hr class="star-dark mb-5">
            <div class="row">

                <div class="col-md-12">
                    {!! Form::open(array('method' =>'POST',
                                    'role'=>"form",
                                    'id'=>'search-frm',
                                    'files' => true)) !!}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Item Name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" maxlength=20>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Type</label>
                                    <select class="form-control" name="type" id="status" placeholder="type">
                                        <option value="">Select</option>
                                        @foreach($types as $Key => $type)
                                        <option value="{{$type->id}}">{{$type->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Item Price</label>
                                    <input type="text" class="form-control" placeholder="Price" name="price" id="price" onkeypress="return isNumberKey(event)">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Status</label><br/>
                                    <button type="submit" class="btn btn-info btn-margin">Search
                                    </button>
                                    <button type="submit" class="btn btn-danger btn-margin" id="reset_data">Reset
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                <div class="col-md-12">
                <table class="table table-striped table-bordered" id="dataTableBuilder" style="width: 100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Item Name</th>
                        <th>Item Type</th>
                        <th>Price($)</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                </table>
                </div>
            </div>

        </div>
    </section>



@endsection

@section('javascript')
    <script>



        var datatable = $('#dataTableBuilder').DataTable({
            bProcessing: true,
            bServerSide: true,
            processing: true,
            serverSide: true,
            "searching": false,
            order: [0, 'desc'],
            ajax: {
                url: '{{route('itemlist')}}?datatable=yes',
                data: function (d) {
                    d.name  = $('input[name=name]').val();
                    d.type  = $('select[name=type]').val();
                    d.price = $('input[name=price]').val();
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'type', name: 'type'},
                {data: 'us_price', name: 'us_price'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        function isNumberKey(event){
            if(event.which == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46)
                return true;

            else if((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57))
                event.preventDefault();
        }


        $(document).ready(function(){
            $('#search-frm').on('submit', function(e) {
                datatable.draw();
                e.preventDefault();
            });

            $('#reset_data').click(function(){
                $('#search-frm').trigger('reset');
            });
        });

    </script>
@endsection
