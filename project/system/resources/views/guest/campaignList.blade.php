<div class="row">
    @foreach($campaigns as $camp)
        <div class="col m4">
            <div class="card">
                <div class="card-content">
                    <div class="profile-pic" style="height: 180px; width: 180px; border-radius: 50%; overflow: hidden">
                        @if($camp->profile_pic)
                        <img src="{{asset("storage/".$camp->profile_pic)}}"  alt="" class=" responsive-img">
                         @else
                        <img src="{{asset("storage/profile_pictures/avatar.png")}}"  alt="" class=" responsive-img">
                        @endif
                    </div>
                    <span class="card-title">{{substr($camp->campaign_name,0,30)}}</span>
                    <div class="campaign-meta">
                        <table class="browser-default">
                            <tr>
                                <th>Promoted By</th>
                                <td>{{$camp->first_name }} {{$camp->last_name}}</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td>{{  date('M d, Y',strtotime($camp->created_at)) }}</td>
                            </tr>
                            <tr>
                                <th>Amount</th>
                                <td>N{{$camp->amount}}</td>
                            </tr>
                            <tr>
                                <th>Amount Raised</th>
                                <td>N{{$camp->amount_raised}}</td>
                            </tr>
                            {{--<tr>--}}
                            {{--<th>Status</th>--}}
                            {{----}}
                            {{----}}
                            {{--<td class="green-text">Verified</td>--}}
                            {{--</tr>--}}
                        </table>
                    </div>
                </div>
                <div class="card-action right-align">
                    <button class="btn blue waves-effect pay-btn" data-title="{{$camp->campaign_name}}" data-id="{{$camp->id}}">Donate</button>
                </div>
            </div>
        </div>
    @endforeach



</div>