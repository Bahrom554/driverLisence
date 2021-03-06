@extends('app')
@section('head')
<style>
        .pay{
    position: relative;
    overflow: hidden;

}
.cost{
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    transform: translateY(100%);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.5s ease;

}
.pay:hover{
    color: transparent;
}
.pay:hover .cost{
    transform: translateY(0);
}
    </style>
    @endsection
@section('main_content')
    @include('modals')
    <div class=" emp-profile position-relative mx-2">
        <a href="{{route('driver.index')}}" class="closer"><i class="far fa-times-circle fa-3x"></i></a>
        <div class="row mainn">
            <div class="col-lg-2  mt-2">
                <div class="profile-img">
                    <img src="{{asset('svg/download.png')}}" alt=""/>

                </div>
            </div>
            <div class="col-lg-3  mt-2 ">
                <div class="profile-head">
                    <h5 style="text-transform: uppercase">
                        {{$driver->driver}}
                    </h5>
                    <h6>
                        {{$driver->tel_d}}
                    </h6>
                    <p class="proile-rating">INN: <span>{{$driver->inn}}</span></p>
                    <p class="proile-rating">INPS: <span>{{$driver->inps}}</span></p>
                    <p class="proile-rating">Holati:<span class=" p-1 bg-success
                            @if( $driver-> l_end < (\Carbon\Carbon::now()->addDays(5)) || $driver->paid_cost >= 0 && (\Carbon\Carbon::parse($driver->l_start)->day) === (\Carbon\Carbon::now()->addDays(3)->day) ||
                                                                                                       (\Carbon\Carbon::parse($driver->l_start)->day) === (\Carbon\Carbon::now()->addDays(2)->day) ||
                                                                                                       (\Carbon\Carbon::parse($driver->l_start)->day) === (\Carbon\Carbon::now()->addDays(1)->day))
                              bg-warning
                            @endif
                           @if($driver-> l_end < (\Carbon\Carbon::now()) || $driver->paid_cost < 0)
                              bg-danger text-white
                            @endif
                          ">
                           @if($driver-> l_end > (\Carbon\Carbon::now()) && $driver-> l_end < (\Carbon\Carbon::now()->addDays(5)) )
                                L yaqin!
                                <br>
                            @elseif($driver-> l_end < (\Carbon\Carbon::now()) )
                                L tugagan!!!
                                <br>
                            @endif

                            @if($driver->paid_cost < 0 )
                                Qarzdor!!!
                            @elseif($driver->paid_cost >= 0 && (\Carbon\Carbon::parse($driver->l_start)->day) === (\Carbon\Carbon::now()->addDays(3)->day) ||
                                                               (\Carbon\Carbon::parse($driver->l_start)->day) === (\Carbon\Carbon::now()->addDays(2)->day) ||
                                                               (\Carbon\Carbon::parse($driver->l_start)->day) === (\Carbon\Carbon::now()->addDays(1)->day))
                                T yaqin!
                            @endif
                        </span>
                    </p>
                    <h5>{{$driver->company}}</h5>
                </div>
            </div>
            <div class=" col-lg-5 ">
                <ul class="nav nav-tabs mb-3 flex-nowrap " id="myTab" role="tablist">
                    <li class="nav-item flex-shrink-1">
                        <a class="nav-link active " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Qisqacha</a>
                    </li>
                    <li class="nav-item flex-shrink-1">
                        <a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Vaqtlar</a>
                    </li>
                    <li class="nav-item flex-shrink-1">
                        <a class="nav-link " id="pay-tab" data-toggle="tab" href="#pay" role="tab" aria-controls="profile" aria-selected="false">To'lovlar</a>
                    </li>
                </ul>
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-6 ">
                                <label>Avtomobil Rusumi</label>
                            </div>
                            <div class="col-6">
                                <p>{{$driver->car}}</p>
                            </div>
                            <div class="col-6 ">
                                <label>Avtomobil Davlat Raqami</label>
                            </div>
                            <div class="col-6">
                                <p>{{$driver->car_number}}</p>
                            </div>
                            <div class="col-6 ">
                                <label>Avtomobil Egasi</label>
                            </div>
                            <div class="col-6">
                                <p>{{$driver->owner}}</p>
                            </div>
                            <div class="col-6 ">
                                <label>Telfon nomeri</label>
                            </div>
                            <div class="col-6">
                                <p>{{$driver->tel_o}}</p>
                            </div>
                            <div class="col-6 ">
                                <label>INN</label>
                            </div>
                            <div class="col-6">
                                <p>{{$driver->inn_o}}</p>
                            </div>
                            <div class="col-6 ">
                                <label>INPS</label>
                            </div>
                            <div class="col-6">
                                <p>{{$driver->inps_o}}</p>
                            </div>


                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-6 ">
                                <label>Litsenziya berilgan Sana</label>
                            </div>
                            <div class="col-6">
                                <p>{{$driver->l_start}}</p>
                            </div>
                            <div class="col-6 ">
                                <label>Litsenziya tugash sanasi</label>
                            </div>
                            <div class="col-6">
                                <p>{{$driver->l_end}}</p>
                            </div>
                            <div class="col-6 ">
                                <label>Shartnoma Tuzilgan Sana</label>
                            </div>
                            <div class="col-6">
                                <p>{{$driver->c_start}}</p>
                            </div>
                            <div class="col-6 ">
                                <label>Shartnoma  tugash sanasi</label>
                            </div>
                            <div class="col-6">
                                <p>{{$driver->c_end}}</p>
                            </div>
                        </div>



                    </div>
                    <div class="tab-pane fade" id="pay" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-6 ">
                                <label>Litsenziya uchun to'lov </label>
                            </div>
                            <div class="col-6">
                                <p>{{number_format($driver->l_cost,0,',',' ')}} so'm</p>
                            </div>
                            <div class="col-6 ">
                                <label>Oylik To'lov</label>
                            </div>
                            <div class="col-6">
                                <p>
                                     {{number_format($driver->total_cost,0,',',' ')}} so'm</p>
                            </div>
                            <div class="col-6 ">
                                <label>Balans</label>
                            </div>
                            <div class="col-6">
                                <p>{{number_format($driver->paid_cost,0,',',' ')}} so'm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 d-flex flex-column justify-content-around">

                <a href="#paymentModal" class="btn btn-success d-block py-3  my-1"  data-toggle="modal">To'lov Qilish</a>
                <a href="#editModal" class=" btn btn-warning  d-block py-3 my-1" data-toggle="modal">Tahrirlash</a>
                <a href="#deleteModal" class="btn btn-danger d-block py-3 my-1" data-toggle="modal">O'chirish</a>


            </div>
        </div>
        <hr>
        <h2 class="text-center mt-md-5">To'lovlar Tarixi</h2>

        <div class="row ">
            <div class="col-2 col-md-1 table--col ">
                <table class="table--history ml-auto my-5">
                    <tr class="heading--tr">
                        <th class="heading--table bg-success "> Sana</th>
                    </tr>
                    <tr class="heading--tr">
                        <th class="heading--table bg-success ">To'lov</th>
                    </tr>
                </table>
            </div>
            <div class="col-10 col-md-11 table--col">
                <div class="overflow-auto">
                    <table class="table--history my-5" >
                        <tr>

                        @foreach($payments as $payment)
                            <td style="white-space: nowrap"> {{$payment->created_at->format('Y-m-d')}}</td>
                            @endforeach

                        </tr>
                        <tr>

                            @foreach($payments as $payment)
                                <td class="pay text-truncate"  > {{number_format($payment->payment,0,',',' ')}} sum
                                    <form id="delete-form-{{$payment->id}}" action="{{route('payment.destroy',$payment->id)}}" method="post"  style="display: none">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                    </form>

                                    <span class="cost"><a href=""  onclick="
                                            if(confirm('Chindan ham O\'chirmoqchimisz?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{$payment->id}}').submit();}
                                            else{
                                            event.preventDefault();}"><i class="far fa-trash fa-2x text-danger"></i></a></span>
                                </td>
                            @endforeach

                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
