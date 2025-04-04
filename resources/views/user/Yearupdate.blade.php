@extends('layout.userlayout')
@section('contend')
    <style>
        .hide {
            display: none;
        }
    </style>
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets\css\component.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="pcoded-content" style="height: 92vh !important;">
        <div class="pcoded-inner-content" style="height: 100%;overflow-y: scroll;">
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-header start -->
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <div class="d-inline">
                                        <h4>Year Update of Tasks</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="index-1.htm"> <i class="feather icon-home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Task Manamgement </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">update of Task </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-body">

                        <div class="row">

                            <div class="col-sm-12">

                                <!-- Basic Form Inputs card start -->
                                <div class="card">

                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">

                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Year</th>
                                                        <th>KPI</th>
                                                        <th>Percentage( % ) </th>
                                                        <th>Upload Files</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($updates->isNotEmpty())
                                                        @foreach ($updates as $update)
                                                            <tr>
                                                                <td>{{ $update->year }}</td>
                                                                <td>{{ $update->KPI }}</td>
                                                                <td>{{ $update->percentage }}</td>
                                                                <td>
                                                                    <ul>
                                                                        @php
                                                                            $files = is_string($update->files)
                                                                                ? json_decode($update->files, true)
                                                                                : $update->files;
                                                                        @endphp
                                                                        @if (is_array($files) && !empty($files))
                                                                            @foreach ($files as $file)
                                                                                <li>
                                                                                    <a href="{{ url('storage/uploads/' . $file) }}"
                                                                                        target="_blank"
                                                                                        class="d-block mt-2">
                                                                                        {{ preg_replace('/^\d+_/', '', $file) }}
                                                                                    </a>
                                                                                </li>
                                                                            @endforeach
                                                                        @else
                                                                            <li>No files available</li>
                                                                        @endif
                                                                    </ul>


                                                                </td>

                                                                <td>


                                                                    <label class="label "
                                                                        onclick="editupdate({{ $update->id }})"
                                                                        style="display: inline-flex; align-items: center; justify-content: center; width: 20px; height: 20px; border-radius: 5px; margin: 5px; cursor: pointer; text-align: center; background-color: green;">
                                                                        <i class="icofont icofont-pencil-alt-5"
                                                                            style="font-size: 20px; color: white;"></i>
                                                                    </label>

                                                                    <label class="label "
                                                                        onclick="updateTaskdelete({{ $update->id }})"
                                                                        style="display: inline-flex; align-items: center; justify-content: center; width: 20px; height: 20px; border-radius: 5px; margin: 5px; cursor: pointer; text-align: center; background-color: red;">
                                                                        <i class="icofont icofont-ui-delete"
                                                                            style="font-size: 20px; color: white;"></i>
                                                                    </label>

                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="3">No updates available</td>
                                                        </tr>
                                                    @endif
                                                </tbody>

                                            </table>
                                        </div>

                                        <div class="form-group row">
                                            <div rows="5" cols="5" class="form-control form-control-danger"
                                                placeholder="Show review here." disabled style="text-align: left;">
                                                @if ($task->review)
                                                    <ul>

                                                        @foreach (json_decode($task->review, true) as $review)
                                                            <li>{{ $review[1] }}{{ !$loop->last ? "\n" : '' }}</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    No reviews available
                                                @endif
                                            </div>



                                        </div>

                                        <hr />


                                        <form action="/updatesubmitform/{{ $id }}" method="POST" id="updateform"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Select
                                                    Year</label>
                                                <div class="col-sm-10">
                                                    <select name="year" class="form-control">

                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        <option value="2028">2028</option>
                                                        <option value="2029">2029</option>
                                                        <option value="2030">2030</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">KPI</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="KPI" class="form-control"
                                                        placeholder="KPI value" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Competition percentage (%)</label>
                                                <div class="col-sm-10">
                                                    <input type="number" required name="percentage" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Upload File</label>
                                                <div class="col-sm-10">
                                                    <input type="file" id="fileInput" name="files[]" multiple
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <!-- Container to show the uploaded files -->
                                            <div id="fileListContainer"></div>


                                            <button class="btn btn-primary" type="submit">Submit</button>

                                        </form>


                                        <form action="/editupdatesubmitform" method="POST" id="editupdateform"
                                            class="hide" enctype="multipart/form-data">
                                            @csrf


                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <h4>Edit the updates</h4>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button class="btn" type="button" onclick="showAddForm()">Add
                                                        New</button>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Select
                                                    Year</label>
                                                <div class="col-sm-10">
                                                    <select name="edityear" id="edityear" class="form-control">

                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        <option value="2028">2028</option>
                                                        <option value="2029">2029</option>
                                                        <option value="2030">2030</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">KPI</label>
                                                <div class="col-sm-10">
                                                    <input type="edittext" name="editKPI" class="form-control"
                                                        id="editKPI" placeholder="KPI value" readonly>
                                                    <span class="text-danger">You can not change the KPI value</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Competition percentage (%)</label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="editpercentage" id="editpercentage"
                                                        class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Upload File</label>
                                                <div class="col-sm-10">
                                                    <input type="file" id="editfileInput" name="editfiles[]" multiple
                                                        class="form-control">
                                                    <span class="text-danger">You can not remove the previous uploaded
                                                        files</span>
                                                </div>
                                            </div>
                                            <input type="hidden" name="editid" id="editid">
                                            <!-- Container to show the uploaded files -->
                                            <div id="editfileListContainer"></div>


                                            <button class="btn btn-primary" type="submit">Update</button>

                                        </form>


                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- Page body end -->
                </div>
            </div>
        </div>
    </div>



    <!-- Script to Handle File Upload and Removal -->
    <script>
        const fileInput = document.getElementById('fileInput');
        const fileListContainer = document.getElementById('fileListContainer');

        let uploadedFiles = [];

        // Handle file selection
        fileInput.addEventListener('change', (event) => {
            console.log(uploadedFiles)
            const newFiles = Array.from(event.target.files);

            // Add selected files to the uploaded files array
            uploadedFiles = [...uploadedFiles, ...newFiles];

            // Clear the file input
            fileInput.value = '';

            // Render the list of files
            renderFileList();
        });

        // Function to render the file list with remove buttons
        function renderFileList() {
            // Clear the current file list
            fileListContainer.innerHTML = '';

            uploadedFiles.forEach((file, index) => {
                const fileItem = document.createElement('div');
                fileItem.classList.add('my-2');

                const fileName = document.createElement('span');
                fileName.textContent = file.name;

                const removeButton = document.createElement('button');
                removeButton.textContent = 'Remove';
                removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'ml-2');
                removeButton.onclick = () => removeFile(index);

                fileItem.appendChild(fileName);
                fileItem.appendChild(removeButton);
                fileListContainer.appendChild(fileItem);
            });
        }

        // Function to remove a file from the list
        function removeFile(index) {
            uploadedFiles.splice(index, 1);
            renderFileList();
        }

        document.querySelector('form').addEventListener('submit', (event) => {
            event.preventDefault();

            console.log(uploadedFiles);

            function fileListFrom(files) {
                const b = new ClipboardEvent("").clipboardData || new DataTransfer()
                for (const file of files) b.items.add(file)
                return b.files
            }

            const fileList = fileListFrom(uploadedFiles)

            var fileInputelement = document.getElementById('fileInput');
            fileInputelement.files = fileList;

            setTimeout(() => {
                event.target.submit();
            }, 500);
        });


        const editfileInput = document.getElementById('editfileInput');
        const editfileListContainer = document.getElementById('editfileListContainer');

        let edituploadedFiles = [];


        editfileInput.addEventListener('change', (event) => {
            console.log(edituploadedFiles)
            const newFiles = Array.from(event.target.files);
            edituploadedFiles = [...edituploadedFiles, ...newFiles];
            editfileInput.value = '';
            renderFileListedit();
        });


        function renderFileListedit() {
            editfileListContainer.innerHTML = '';
            edituploadedFiles.forEach((file, index) => {
                const fileItem = document.createElement('div');
                fileItem.classList.add('my-2');

                const fileName = document.createElement('span');
                fileName.textContent = file.name;

                const removeButton = document.createElement('button');
                removeButton.textContent = 'Remove';
                removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'ml-2');
                removeButton.setAttribute('type', 'button');
                removeButton.onclick = () => removeFileedit(index);

                fileItem.appendChild(fileName);
                fileItem.appendChild(removeButton);
                editfileListContainer.appendChild(fileItem);
            });
        }


        function removeFileedit(index) {
            console.log(edituploadedFiles)
            edituploadedFiles.splice(index, 1);
            renderFileListedit();
        }

        document.querySelector('#editupdateform').addEventListener('submit', (event) => {
            event.preventDefault();

            console.log(edituploadedFiles);

            function fileListFrom(files) {
                const b = new ClipboardEvent("").clipboardData || new DataTransfer()
                for (const file of files) b.items.add(file)
                return b.files
            }

            const fileList = fileListFrom(edituploadedFiles)

            var fileInputelement = document.getElementById('editfileInput');
            fileInputelement.files = fileList;

            setTimeout(() => {
                event.target.submit();
            }, 500);
        });

    </script>
@endsection


@section('scriptjs')
    <script>
        async function updateTaskdelete(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then(async (result) => { // Make this callback async
                if (result.isConfirmed) {
                    const response = await fetch(`/updatedeletetask/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });

                    if (response.ok) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "The user has been deleted.",
                            icon: "success"
                        }).then(() => {
                            location.reload(); // Reload the page to reflect the changes
                        });
                    } else {
                        const result = await response.json();
                        Swal.fire({
                            title: 'Error!',
                            text: result.error || 'Failed to delete the user',
                            icon: 'error',
                            confirmButtonColor: '#3085d6',
                            timer: 1500,
                            confirmButtonText: 'Okay'
                        });
                    }
                }
            });
        }

        async function editupdate(id) {
            const form = document.getElementById('updateform');
            form.classList.add("hide");

            const editform = document.getElementById('editupdateform');
            editform.classList.remove("hide");

            const response = await fetch(`/gettheoneedit/${id}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            if (response.ok) {
                const data = await response.json();
                document.getElementById('edityear').value = data.year;
                document.getElementById('editKPI').value = data.KPI;
                document.getElementById('editid').value = data.id;
                document.getElementById('editpercentage').value = data.percentage;
            }

        }

        async function showAddForm() {
            const form = document.getElementById('updateform');
            form.classList.remove("hide");

            const editform = document.getElementById('editupdateform');
            editform.classList.add("hide");
        }
    </script>
@endsection
