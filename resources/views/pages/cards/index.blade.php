<x-app-layout>
    <div class="page-header">
        <h3 class="page-title"> Cards </h3>
        <a href="{{route('cards.create')}}" class="btn btn-gradient-primary me-2">+ Add Card</a>

    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Card Details</h4>
{{--                    <p class="card-description"> Add class <code>.table</code>--}}
                    </p>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Business Name</th>
                            <th>Card Title</th>
                            <th>Card Message</th>
                            <th>Card Logo</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Jacob</td>
                            <td>53275531</td>
                            <td>12 May 2017</td>
                            <td><label class="badge badge-danger">Pending</label></td>
                            <td><label class="badge badge-danger">Pending</label></td>
                            <td><i class="mdi mdi-36px mdi-tooltip-edit"></i><i class="mdi mdi-36px mdi mdi-delete"></i></td>
                        </tr>
                        <tr>
                            <td>Jacob</td>
                            <td>53275531</td>
                            <td>12 May 2017</td>
                            <td><label class="badge badge-danger">Pending</label></td>
                            <td><label class="badge badge-danger">Pending</label></td>
                            <td><i class="mdi mdi-36px mdi-tooltip-edit"></i><i class="mdi mdi-36px mdi mdi-delete"></i></td>

                        </tr>
                        <tr>
                            <td>Jacob</td>
                            <td>53275531</td>
                            <td>12 May 2017</td>
                            <td><label class="badge badge-danger">Pending</label></td>
                            <td><label class="badge badge-danger">Pending</label></td>
                            <td><i class="mdi mdi-36px mdi-tooltip-edit"></i><i class="mdi mdi-36px mdi mdi-delete"></i></td>

                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
