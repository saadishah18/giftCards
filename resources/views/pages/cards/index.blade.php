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
                            <th>Card Title</th>
                            <th>Business Name</th>
                            <th>Price</th>
                            <th>Display Title</th>
                            <th>Display Business</th>
                            <th>Display Price</th>
                            <th>QR code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cards as $key => $card)
                        <tr id="{{$key}}">
                            <td>{{$card->title}}</td>
                            <td>{{$card->business_name}}</td>
                            <td>{{$card->price}} $</td>
                            <td>{{$card->display_title == 1 ? 'Yes' : 'No'}}</td>
                            <td>{{$card->display_business == 1 ? 'Yes' : 'No'}}</td>
                            <td>{{$card->display_price == 1 ? 'Yes' : 'No'}}</td>
                            <td>{{$card->is_active == 1 ? 'Active' : 'Inactive'}}</td>
                            <td><i class="mdi mdi-36px mdi-tooltip-edit"></i><i class="mdi mdi-36px mdi mdi-delete"></i></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
