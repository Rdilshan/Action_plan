@extends('layout.userlayout')
@section('contend')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <div class="card">
                        <div class="card-header">
                            <h5>Funding Sources</h5>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="Fundingtable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Item</th>
                                            <th>Unit</th>
                                            <th>Unit Charge</th>
                                            <th>Amount (Rs.)</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <tr>
                                            <th scope="row">1</th>
                                            <td>name</td>
                                            <td>100</td>
                                            <td>10</td>
                                            <td class="fundingtotalvalue">1000</td>
                                            <td>
                                                <div class="btn-group btn-group-sm" style="float: none;">
                                                    <button type="button"
                                                        class="tabledit-delete-button btn btn-danger waves-effect waves-light active"
                                                        style="float: none;margin: 5px;">
                                                        <span class="icofont icofont-ui-delete"></span>
                                                    </button>
                                                </div>
                                            </td>

                                        </tr> --}}

                                        <tr>
                                            <td></td>
                                            <td><input class="tabledit-input form-control input-sm" type="text"
                                                    name="First" placeholder="Item"></td>
                                            <td><input class="tabledit-input form-control input-sm" type="number"
                                                    name="Last" placeholder="Unit"></td>
                                            <td><input class="tabledit-input form-control input-sm" type="number"
                                                    name="Charge" placeholder="Unit Charge"></td>
                                            <td></td>
                                            <td>
                                                <div class="btn-group btn-group-sm" style="float: none;">
                                                    <button type="button" class="btn btn-primary add-btn"
                                                        style="float: none;margin: 5px;background-color: #02b902;"
                                                        onclick="addRowdata()">
                                                        <span class="icofont icofont-ui-check"></span>
                                                    </button>

                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" style="text-align: right;"><strong>Total:</strong></td>
                                            <td id="Funding_totalAmount">0</td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <h5>Transport Details</h5>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="Transporttable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Transport</th>
                                            <th>No of Vehical</th>
                                            <th>Total KM</th>
                                            <th>Unit Cost</th>
                                            <th>Amount (Rs.)</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        <tr>
                                            <td></td>
                                            <td><input class="tabledit-input form-control input-sm" type="text"
                                                    name="Transport" placeholder="Transport"></td>
                                            <td><input class="tabledit-input form-control input-sm" type="number"
                                                    name="nfvehical" placeholder="No of Vehical"></td>
                                            <td><input class="tabledit-input form-control input-sm" type="number"
                                                    name="totalkm" placeholder="Total KM"></td>
                                            <td><input class="tabledit-input form-control input-sm" type="number"
                                                    name="unitcost" placeholder="Unit Cost"></td>
                                            <td></td>

                                            <td>
                                                <div class="btn-group btn-group-sm" style="float: none;">
                                                    <button type="button" class="btn btn-primary add-btn"
                                                        style="float: none;margin: 5px;background-color: #02b902;"
                                                        onclick="TransportaddRowdata()">
                                                        <span class="icofont icofont-ui-check"></span>
                                                    </button>

                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" style="text-align: right;"><strong>Total:</strong></td>
                                            <td id="Transport_totalAmount">0</td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>Accommodation Details</h5>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="Accommodationtable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Accommodation</th>
                                            <th>No. of persons/Units</th>
                                            <th>No. of days/hours</th>
                                            <th>Unit Cost</th>
                                            <th>Total (Rs.)</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <tr>
                                            <th scope="row">1</th>
                                            <td>name</td>
                                            <td>100</td>
                                            <td>10</td>
                                            <td class="fundingtotalvalue">1000</td>
                                            <td class="fundingtotalvalue">1000</td>

                                            <td>
                                                <div class="btn-group btn-group-sm" style="float: none;">
                                                    <button type="button"
                                                        class="tabledit-delete-button btn btn-danger waves-effect waves-light active"
                                                        style="float: none;margin: 5px;">
                                                        <span class="icofont icofont-ui-delete"></span>
                                                    </button>
                                                </div>
                                            </td>

                                        </tr> --}}

                                        <tr>
                                            <td></td>
                                            <td><input class="tabledit-input form-control input-sm" type="text"
                                                    name="Accommodation" placeholder="Accommodation"></td>
                                            <td><input class="tabledit-input form-control input-sm" type="number"
                                                    name="unit" placeholder="No. of persons/Units"></td>
                                            <td><input class="tabledit-input form-control input-sm" type="number"
                                                    name="noday" placeholder="No. of days/hours"></td>
                                            <td><input class="tabledit-input form-control input-sm" type="number"
                                                    name="accunitcost" placeholder="Unit Cost"></td>
                                            <td></td>
                                            <td>
                                                <div class="btn-group btn-group-sm" style="float: none;">
                                                    <button type="button" class="btn btn-primary add-btn"
                                                        style="float: none;margin: 5px;background-color: #02b902;"
                                                        onclick="AccommodationaddRowdata()">
                                                        <span class="icofont icofont-ui-check"></span>
                                                    </button>

                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" style="text-align: right;"><strong>Total:</strong></td>
                                            <td id="Accommodation_totalAmount">0</td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>Others Details</h5>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="Othertable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Others</th>
                                            <th>Quantity</th>
                                            <th>No. of days/hours</th>
                                            <th>Unit Cost</th>
                                            <th>Total (Rs.)</th>

                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <tr>
                                            <th scope="row">1</th>
                                            <td>name</td>
                                            <td>100</td>
                                            <td>10</td>
                                            <td class="fundingtotalvalue">1000</td>
                                            <td>
                                                <div class="btn-group btn-group-sm" style="float: none;">
                                                    <button type="button"
                                                        class="tabledit-delete-button btn btn-danger waves-effect waves-light active"
                                                        style="float: none;margin: 5px;">
                                                        <span class="icofont icofont-ui-delete"></span>
                                                    </button>
                                                </div>
                                            </td>

                                        </tr> --}}

                                        <tr>
                                            <td></td>
                                            <td><input class="tabledit-input form-control input-sm" type="text"
                                                    name="Others" placeholder="Others"></td>
                                            <td><input class="tabledit-input form-control input-sm" type="text"
                                                    name="Quantity" placeholder="Quantity"></td>
                                            <td><input class="tabledit-input form-control input-sm" type="text"
                                                    name="oNfhours" placeholder="No. of days/hours"></td>
                                            <td><input class="tabledit-input form-control input-sm" type="text"
                                                    name="oucost" placeholder="Unit Cost"></td>
                                            <td></td>
                                            <td>
                                                <div class="btn-group btn-group-sm" style="float: none;">
                                                    <button type="button" class="btn btn-primary add-btn"
                                                        style="float: none;margin: 5px;background-color: #02b902;"
                                                        onclick="OtheraddRowdata()">
                                                        <span class="icofont icofont-ui-check"></span>
                                                    </button>

                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" style="text-align: right;"><strong>Total:</strong></td>
                                            <td id="Others_totalAmount">0</td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>


                    <div class="card">

                        <div class="card-block">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Total Expenditure (Rs.)</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="totalexpend" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Note</label>
                                <div class="col-sm-10">
                                    <textarea rows="5" cols="5" class="form-control" placeholder="Default Note"></textarea>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="button" onclick="addAlldata()">Submit</button>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('scriptjs')
    {{-- page data management  --}}
    <script>
        //Funding Sources
        function addRowdata() {
            var table = document.getElementById("Fundingtable");
            var t1 = table.rows.length;

            var newItem = $('input[name="First"]').val();
            var newUnit = $('input[name="Last"]').val();
            var newCharge = $('input[name="Charge"]').val();
            // var newAmount = $('input[name="Amount"]').val();
            var newAmount = newUnit * newCharge;




            var newRow = table.insertRow(t1 - 2);
            newRow.insertCell(0).innerText = t1 - 2;
            newRow.insertCell(1).innerText = newItem;
            newRow.insertCell(2).innerText = newUnit;
            newRow.insertCell(3).innerText = newCharge;

            var amountCell = newRow.insertCell(4);
            amountCell.innerText = newAmount;
            amountCell.classList.add("fundingtotalvalue");


            newRow.insertCell(5).innerHTML = '<div class="btn-group btn-group-sm" style="float: none;">' +
                '<button type="button" class="tabledit-delete-button btn btn-danger waves-effect waves-light active" style="float: none;margin: 5px;" onclick="deleteRow(this,`fundingtotalvalue`,`Funding_totalAmount`)">' +
                '<span class="icofont icofont-ui-delete"></span></button></div>';



            $('input[name="First"]').val('');
            $('input[name="Last"]').val('');
            $('input[name="Charge"]').val('');
            $('input[name="Amount"]').val('');
            updateTotal("fundingtotalvalue", "Funding_totalAmount");
        }

        function deleteRow(btn, name, valueadd) {
            var row = btn.closest('tr');
            row.parentNode.removeChild(row);
            updateTotal(name, valueadd);
        }

        function updateTotal(name, valueadd) {
            var total = 0;
            var amountCells = document.querySelectorAll('.' + name);
            amountCells.forEach(function(cell) {
                var value = parseFloat(cell.innerText);
                console.log(value)
                if (!isNaN(value)) {
                    total += value;
                }
            });
            document.getElementById(valueadd).innerText = total;
            totalexpendics();
        }

        //Transport Details

        function TransportaddRowdata() {

            var table = document.getElementById("Transporttable");
            var t1 = table.rows.length;

            var Transport = $('input[name="Transport"]').val();
            var nfvehical = $('input[name="nfvehical"]').val();
            var totalkm = $('input[name="totalkm"]').val();
            var unitcost = $('input[name="unitcost"]').val();

            // var newAmount = $('input[name="Amount"]').val();
            var newAmount = totalkm * unitcost;



            var newRow = table.insertRow(t1 - 2);
            newRow.insertCell(0).innerText = t1 - 2;
            newRow.insertCell(1).innerText = Transport;
            newRow.insertCell(2).innerText = nfvehical;
            newRow.insertCell(3).innerText = totalkm;
            newRow.insertCell(4).innerText = unitcost;


            var amountCell = newRow.insertCell(5);
            amountCell.innerText = newAmount;
            amountCell.classList.add("Transporttabletotalvalue");


            newRow.insertCell(6).innerHTML = '<div class="btn-group btn-group-sm" style="float: none;">' +
                '<button type="button" class="tabledit-delete-button btn btn-danger waves-effect waves-light active" style="float: none;margin: 5px;" onclick="deleteRow(this,`Transporttabletotalvalue`,`Transport_totalAmount`)">' +
                '<span class="icofont icofont-ui-delete"></span></button></div>';



            $('input[name="Transport"]').val('');
            $('input[name="nfvehical"]').val('');
            $('input[name="totalkm"]').val('');
            $('input[name="unitcost"]').val('');

            updateTotal("Transporttabletotalvalue", "Transport_totalAmount");
            totalexpendics();

        }


        //Accommodation Details

        function AccommodationaddRowdata() {

            var table = document.getElementById("Accommodationtable");
            var t1 = table.rows.length;

            var Accommodation = $('input[name="Accommodation"]').val();
            var unit = $('input[name="unit"]').val();
            var noday = $('input[name="noday"]').val();
            var unitcost = $('input[name="accunitcost"]').val();


            // var newAmount = $('input[name="Amount"]').val();
            var newAmount = noday * unitcost;



            var newRow = table.insertRow(t1 - 2);
            newRow.insertCell(0).innerText = t1 - 2;
            newRow.insertCell(1).innerText = Accommodation;
            newRow.insertCell(2).innerText = unit;
            newRow.insertCell(3).innerText = noday;
            newRow.insertCell(4).innerText = unitcost;


            var amountCell = newRow.insertCell(5);
            amountCell.innerText = newAmount;
            amountCell.classList.add("Accommodationtabletotalvalue");


            newRow.insertCell(6).innerHTML = '<div class="btn-group btn-group-sm" style="float: none;">' +
                '<button type="button" class="tabledit-delete-button btn btn-danger waves-effect waves-light active" style="float: none;margin: 5px;" onclick="deleteRow(this,`Accommodationtabletotalvalue`,`Accommodation_totalAmount`)">' +
                '<span class="icofont icofont-ui-delete"></span></button></div>';



            $('input[name="Accommodation"]').val('');
            $('input[name="unit"]').val('');
            $('input[name="noday"]').val('');
            $('input[name="accunitcost"]').val('');

            updateTotal("Accommodationtabletotalvalue", "Accommodation_totalAmount");
            totalexpendics();

        }


        //Other Details

        function OtheraddRowdata() {

            var table = document.getElementById("Othertable");
            var t1 = table.rows.length;

            var Others = $('input[name="Others"]').val();
            var Quantity = $('input[name="Quantity"]').val();
            var oNfhours = $('input[name="oNfhours"]').val();
            var oucost = $('input[name="oucost"]').val();


            // var newAmount = $('input[name="Amount"]').val();
            var newAmount = oNfhours * oucost;



            var newRow = table.insertRow(t1 - 2);
            newRow.insertCell(0).innerText = t1 - 2;
            newRow.insertCell(1).innerText = Others;
            newRow.insertCell(2).innerText = Quantity;
            newRow.insertCell(3).innerText = oNfhours;
            newRow.insertCell(4).innerText = oucost;


            var amountCell = newRow.insertCell(5);
            amountCell.innerText = newAmount;
            amountCell.classList.add("othertabletotalvalue");


            newRow.insertCell(6).innerHTML = '<div class="btn-group btn-group-sm" style="float: none;">' +
                '<button type="button" class="tabledit-delete-button btn btn-danger waves-effect waves-light active" style="float: none;margin: 5px;" onclick="deleteRow(this,`othertabletotalvalue`,`Others_totalAmount`)">' +
                '<span class="icofont icofont-ui-delete"></span></button></div>';



            $('input[name="Others"]').val('');
            $('input[name="Quantity"]').val('');
            $('input[name="oNfhours"]').val('');
            $('input[name="oucost"]').val('');

            updateTotal("othertabletotalvalue", "Others_totalAmount");
            totalexpendics();

        }


        function totalexpendics() {
            var Transport_totalAmount = document.getElementById("Transport_totalAmount").innerText;
            var Accommodation_totalAmount = document.getElementById("Accommodation_totalAmount").innerText;
            var Others_totalAmount = document.getElementById("Others_totalAmount").innerText;


            var totalExpend = parseInt(Transport_totalAmount) + parseInt(Accommodation_totalAmount) + parseInt(
                Others_totalAmount);
            document.getElementById("totalexpend").value = totalExpend;
        }
    </script>


    <script>
        async function addAlldata() {
            const data = {
                fname: document.getElementById('fname').value,
                lname: document.getElementById('lname').value,
                username: document.getElementById('username').value,
                email: document.getElementById('email').value,
                selectrole: document.getElementById('selectrole').value,
                password: document.getElementById('password').value,

            };

            const response = await fetch('/addnewtask/final', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (response.ok) {
                Swal.fire({
                    title: 'success!',
                    text: "successfully add the user",
                    icon: 'success',
                    confirmButtonColor: 'rgba(0, 146, 255, 0.8)',
                    timer: 1500,
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    window.location.href = "/";
                })
            } else {

                Swal.fire({
                    title: 'Errror!',
                    text: JSON.stringify(result.error),
                    icon: 'error',
                    confirmButtonColor: 'rgba(0, 146, 255, 0.8)',
                    timer: 1500,
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    window.location.href = "/useradding";

                })
            }
        }
    </script>


@endsection
