@extends('layout')
@section('content')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
                      </div>
                      <div class="tab-content tab-transparent-content">
                        <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                          <div class="row">
                            <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                              <div class="card">
                                <div class="card-body">
                                  <h4 class="mb-2 text-dark text-center font-weight-normal">Total Antrian Semua Poli</h4>
                                  <h2 class="mb-4 text-dark text-center font-weight-bold">{{$antrian}}</h2>
                                  <p class="mt-4 mb-0">Data Antrian Cancel</p>
                                  <p class="mb-0 font-weight-bold mt-2 text-dark">{{$antrian_cancel}}</p>
                                  <p class="mt-4 mb-0">Data Antrian Pending</p>
                                  <p class="mb-0 font-weight-bold mt-2 text-dark">{{$antrian_pending}}</p>
                                  <p class="mt-4 mb-0">Data Antrian Sukses</p>
                                  <p class="mb-0 font-weight-bold mt-2 text-dark">{{$antrian_sukses}}</p>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                              <div class="card">
                                <div class="card-body">
                                  <h4 class="mb-2 text-dark text-center font-weight-normal">Total Antrian Hari Ini</h4>
                                  <h2 class="mb-4 text-dark text-center font-weight-bold">{{$antrian_today}}</h2>
                                  <p class="mt-4 mb-0">Data Antrian Cancel</p>
                                  <p class="mb-0 font-weight-bold mt-2 text-dark">{{$antrian_today_cancel}}</p>
                                  <p class="mt-4 mb-0">Data Antrian Pending</p>
                                  <p class="mb-0 font-weight-bold mt-2 text-dark">{{$antrian_today_pending}}</p>
                                  <p class="mt-4 mb-0">Data Antrian Sukses</p>
                                  <p class="mb-0 font-weight-bold mt-2 text-dark">{{$antrian_today_sukses}}</p>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-3  col-lg-6 col-sm-6 grid-margin stretch-card">
                              <div class="card">
                                <div class="card-body">
                                  <h4 class="mb-2 text-dark text-center font-weight-normal">Total Antrian Poli Gigi</h4>
                                  <h2 class="mb-4 text-dark text-center font-weight-bold">{{$antrian_gigi}}</h2>
                                  <p class="mt-4 mb-0">Data Antrian Cancel</p>
                                  <p class="mb-0 font-weight-bold mt-2 text-dark">{{$antrian_gigi_cancel}}</p>
                                  <p class="mt-4 mb-0">Data Antrian Pending</p>
                                  <p class="mb-0 font-weight-bold mt-2 text-dark">{{$antrian_gigi_pending}}</p>
                                  <p class="mt-4 mb-0">Data Antrian Sukses</p>
                                  <p class="mb-0 font-weight-bold mt-2 text-dark">{{$antrian_gigi_sukses}}</p>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                              <div class="card">
                                <div class="card-body">
                                  <h4 class="mb-2 text-dark text-center font-weight-normal">Total Antrian Poli Umum</h4>
                                  <h2 class="mb-4 text-dark text-center font-weight-bold">{{$antrian_umum}}</h2>
                                  <p class="mt-4 mb-0">Data Antrian Cancel</p>
                                  <p class="mb-0 font-weight-bold mt-2 text-dark">{{$antrian_umum_cancel}}</p>
                                  <p class="mt-4 mb-0">Data Antrian Pending</p>
                                  <p class="mb-0 font-weight-bold mt-2 text-dark">{{$antrian_umum_pending}}</p>
                                  <p class="mt-4 mb-0">Data Antrian Sukses</p>
                                  <p class="mb-0 font-weight-bold mt-2 text-dark">{{$antrian_umum_sukses}}</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
                <!-- content-wrapper ends -->
@endsection