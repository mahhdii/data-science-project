@extends("guest.master")

@section('contents')


    <div class="campaigns container">
        <div class="row">
            <div class="col m12">
                <div class="card">
                    <div class="card-content">
                        <h5>All Campaigns</h5>
                        <div class="search">
                            <form method="get" action="{{route('search')}}">
                                <div class="input-field">
                                    <input type="search" id="search" name="q">
                                    <label for="search">Search for campaigns</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @include('guest.campaignList')

        {{$campaigns->links()}}
    </div> <!-- =================Campaigns ends ======================== -->


@endsection