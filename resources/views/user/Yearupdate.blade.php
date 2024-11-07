@extends('layout.userlayout')
@section('contend')
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
                                        <li class="breadcrumb-item"><a href="#!">List of Task </a>
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

                                        <form action="/updatesubmitform" method="POST" enctype="multipart/form-data">
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
    </script>
@endsection
