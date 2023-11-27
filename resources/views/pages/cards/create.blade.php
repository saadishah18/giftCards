<x-app-layout>
    <div class="page-header">
        <h3 class="page-title"> Cards </h3>
        <button type="submit" class="btn btn-gradient-primary me-2">+ Add Card</button>

    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Card</h4>
                    <form class="forms-sample">
                        <div class="row">
                            <div class="col-9">
                                <div class="form-group">
                                    <label for="exampleInputName1">Card Title</label>
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <br><br>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input"> Display on Card </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-9">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Business Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <br>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <br><br>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input"> Display on Card </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-9">
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Price</label>
                                    <input type="number" min="0" class="form-control" id="exampleInputPassword4"
                                           placeholder="Password">
                                </div>
                            </div>
                            <br>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <br><br>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input"> Display on Card </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label for="exampleInputPassword4">Choose Card</label>
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="col-1">
                                    <input type="radio" class="form-check-input" name="optionsRadios"
                                           id="optionsRadios1" value="">
                                </div>
                                <br>
                                <br>
                                <div class="col-11">
                                    <div class="card bg-gradient-danger card-img-holder text-white">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-9">
                                                    <img src="/assets/images/dashboard/circle.svg"
                                                         class="card-img-absolute"
                                                         alt="circle-image"/>
                                                    <h4 class="font-weight-normal mb-3">Business Title
                                                    </h4>
                                                    <h5 class="mb-5">Price: $ 15,0000</h5>
                                                    <h6 class="card-text">Message will be displayed</h6>
                                                </div>
                                                <div class="col-2">
                                                    <img src="/assets/images/tes-qr.png" width="80px" height="80px"
                                                         alt="circle-image"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="col-1">
                                    <input type="radio" class="form-check-input" name="optionsRadios"
                                           id="optionsRadios1" value="">
                                </div>
                                <br>
                                <br>
                                <div class="col-11">
                                    <div class="card bg-gradient-info card-img-holder text-white">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-9">
                                                    <img src="/assets/images/dashboard/circle.svg"
                                                         class="card-img-absolute"
                                                         alt="circle-image"/>
                                                    <h4 class="font-weight-normal mb-3">Business Title
                                                    </h4>
                                                    <h5 class="mb-5">Price: $ 15,0000</h5>
                                                    <h6 class="card-text">Message will be displayed</h6>
                                                </div>
                                                <div class="col-2">
                                                    <img src="/assets/images/tes-qr.png" width="80px" height="80px"
                                                         alt="circle-image"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="col-1">
                                    <input type="radio" class="form-check-input" name="optionsRadios"
                                           id="optionsRadios1" value="">
                                </div>

                                <div class="col-11">
                                    <div class="card bg-gradient-success card-img-holder text-white">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-9">
                                                    <img src="/assets/images/dashboard/circle.svg"
                                                         class="card-img-absolute"
                                                         alt="circle-image"/>
                                                    <h4 class="font-weight-normal mb-3">Business Title
                                                    </h4>
                                                    <h5 class="mb-5">Price $ 15,0000</h5>
                                                    <h6 class="card-text">Message will be displayed</h6>
                                                </div>
                                                <div class="col-2">
                                                    <img src="/assets/images/tes-qr.png" width="80px" height="80px"
                                                         alt="circle-image"/>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="exampleSelectGender">Gender</label>--}}
                        {{--                            <select class="form-control" id="exampleSelectGender">--}}
                        {{--                                <option>Male</option>--}}
                        {{--                                <option>Female</option>--}}
                        {{--                            </select>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label>File upload</label>--}}
                        {{--                            <input type="file" name="img[]" class="file-upload-default">--}}
                        {{--                            <div class="input-group col-xs-12">--}}
                        {{--                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">--}}
                        {{--                                <span class="input-group-append">--}}
                        {{--                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>--}}
                        {{--                          </span>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="exampleInputCity1">City</label>--}}
                        {{--                            <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="exampleTextarea1">Textarea</label>--}}
                        {{--                            <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>--}}
                        {{--                        </div>--}}
                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    {{--    <script src="../../assets/js/file-upload.js"></script>--}}

</x-app-layout>
