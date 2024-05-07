@extends('layouts.main')

@section('content')
    <div class="container-fluid text-color">
      <div class="text-center my-3">
        <h1 class="fw-bold pt-3 display-3">CHOOSE BODY PARTS</h1>
      </div>

      <div class="row my-2 py-2 d-flex flex-column justify-content-center align-content-center">
          <div class="card mb-3 text-bg-dark" style="max-width: 720px;">
            <div class="px-2 pt-2 card-title fw-bold text-center card-header border-light">
              <h4>FRONT</h4>
            </div>
            <div class="row card-body">
              <div class="d-flex align-items-center d-flex justify-content-center">
                <ul class="form-check container-fluid list-group list-group-flush ">
                  <li class="text-bg-dark d-flex flex-col-reverse container-fluid mb-2 list-group-item w-100">
                    <div class="li-hover py-1 btn-group-vertical container-fluid" data-toggle="buttons" role="group" aria-label="Basic radio toggle button group">
                      <label class="label-li w-100 d-flex justify-content-between align-items-center flex-row-reverse">
                        <input type="checkbox" autocomplete="off">Chest
                      </label>
                    </div>
                  </li>
                  <li class="text-bg-dark d-flex flex-col-reverse container-fluid mb-2 list-group-item w-100">
                    <div class="li-hover py-1 btn-group-vertical container-fluid" data-toggle="buttons" role="group" aria-label="Basic radio toggle button group">
                      <label class="label-li w-100 d-flex justify-content-between align-items-center flex-row-reverse">
                        <input type="checkbox" autocomplete="off">Abdomen
                      </label>
                    </div>
                  </li>
                  <li class="text-bg-dark d-flex flex-col-reverse container-fluid mb-2 list-group-item w-100">
                    <div class="li-hover py-1 btn-group-vertical container-fluid" data-toggle="buttons" role="group" aria-label="Basic radio toggle button group">
                      <label class="label-li w-100 d-flex justify-content-between align-items-center flex-row-reverse">
                        <input type="checkbox" autocomplete="off">Obliques
                      </label>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-6 card mb-3 text-bg-dark" style="max-width: 720px;">
            <div class="px-2 pt-2 card-title fw-bold text-center card-header border-light">
              <h4>BACK</h4>
            </div>
            <div class="row card-body">
              <div class="d-flex align-items-center d-flex justify-content-center">
                <ul class="form-check container-fluid list-group list-group-flush ">
                  <li class="text-bg-dark d-flex flex-col-reverse container-fluid mb-2 list-group-item w-100">
                    <div class="li-hover py-1 btn-group-vertical container-fluid" data-toggle="buttons" role="group" aria-label="Basic radio toggle button group">
                      <label class="label-li w-100 d-flex justify-content-between align-items-center flex-row-reverse">
                        <input type="checkbox" autocomplete="off">Lower Back
                      </label>
                    </div>
                  </li>
                  <li class="text-bg-dark d-flex flex-col-reverse container-fluid mb-2 list-group-item w-100">
                    <div class="li-hover py-1 btn-group-vertical container-fluid" data-toggle="buttons" role="group" aria-label="Basic radio toggle button group">
                      <label class="label-li w-100 d-flex justify-content-between align-items-center flex-row-reverse">
                        <input type="checkbox" autocomplete="off">Traps
                      </label>
                    </div>
                  </li>
                  <li class="text-bg-dark d-flex flex-col-reverse container-fluid mb-2 list-group-item w-100">
                    <div class="li-hover py-1 btn-group-vertical container-fluid" data-toggle="buttons" role="group" aria-label="Basic radio toggle button group">
                      <label class="label-li w-100 d-flex justify-content-between align-items-center flex-row-reverse">
                        <input type="checkbox" autocomplete="off">Lats
                      </label>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="card mb-3 text-bg-dark" style="max-width: 720px;">
            <div class="px-2 pt-2 card-title fw-bold text-center card-header border-light">
              <h4>ARMS</h4>
            </div>
            <div class="row card-body">
              <div class="d-flex align-items-center d-flex justify-content-center">
                <ul class="form-check container-fluid list-group list-group-flush ">
                  <li class="text-bg-dark d-flex flex-col-reverse container-fluid mb-2 list-group-item w-100">
                    <div class="li-hover py-1 btn-group-vertical container-fluid" data-toggle="buttons" role="group" aria-label="Basic radio toggle button group">
                      <label class="label-li w-100 d-flex justify-content-between align-items-center flex-row-reverse">
                        <input type="checkbox" autocomplete="off">Shoulders
                      </label>
                    </div>
                  </li>
                  <li class="text-bg-dark d-flex flex-col-reverse container-fluid mb-2 list-group-item w-100">
                    <div class="li-hover py-1 btn-group-vertical container-fluid" data-toggle="buttons" role="group" aria-label="Basic radio toggle button group">
                      <label class="label-li w-100 d-flex justify-content-between align-items-center flex-row-reverse">
                        <input type="checkbox" autocomplete="off">Biceps
                      </label>
                    </div>
                  </li>
                  <li class="text-bg-dark d-flex flex-col-reverse container-fluid mb-2 list-group-item w-100">
                    <div class="li-hover py-1 btn-group-vertical container-fluid" data-toggle="buttons" role="group" aria-label="Basic radio toggle button group">
                      <label class="label-li w-100 d-flex justify-content-between align-items-center flex-row-reverse">
                        <input type="checkbox" autocomplete="off">Triceps
                      </label>
                    </div>
                  </li>
                  <li class="text-bg-dark d-flex flex-col-reverse container-fluid mb-2 list-group-item w-100">
                    <div class="li-hover py-1 btn-group-vertical container-fluid" data-toggle="buttons" role="group" aria-label="Basic radio toggle button group">
                      <label class="label-li w-100 d-flex justify-content-between align-items-center flex-row-reverse">
                        <input type="checkbox" autocomplete="off">Forearms
                      </label>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="card mb-3 text-bg-dark" style="max-width: 720px;">
            <div class="px-2 pt-2 card-title fw-bold text-center card-header border-light">
              <h4>LEGS</h4>
            </div>
            <div class="row card-body">
              <div class="d-flex align-items-center d-flex justify-content-center">
                <ul class="form-check container-fluid list-group list-group-flush ">
                  <li class="text-bg-dark d-flex flex-col-reverse container-fluid mb-2 list-group-item w-100">
                    <div class="li-hover py-1 btn-group-vertical container-fluid" data-toggle="buttons" role="group" aria-label="Basic radio toggle button group">
                      <label class="label-li w-100 d-flex justify-content-between align-items-center flex-row-reverse">
                        <input type="checkbox" autocomplete="off">Quads
                      </label>
                    </div>
                  </li>
                  <li class="text-bg-dark d-flex flex-col-reverse container-fluid mb-2 list-group-item w-100">
                    <div class="li-hover py-1 btn-group-vertical container-fluid" data-toggle="buttons" role="group" aria-label="Basic radio toggle button group">
                      <label class="label-li w-100 d-flex justify-content-between align-items-center flex-row-reverse">
                        <input type="checkbox" autocomplete="off">Hamstrings
                      </label>
                    </div>
                  </li>
                  <li class="text-bg-dark d-flex flex-col-reverse container-fluid mb-2 list-group-item w-100">
                    <div class="li-hover py-1 btn-group-vertical container-fluid" data-toggle="buttons" role="group" aria-label="Basic radio toggle button group">
                      <label class="label-li w-100 d-flex justify-content-between align-items-center flex-row-reverse">
                        <input type="checkbox" autocomplete="off">Glutes
                      </label>
                    </div>
                  </li>
                  <li class="text-bg-dark d-flex flex-col-reverse container-fluid mb-2 list-group-item w-100">
                    <div class="li-hover py-1 btn-group-vertical container-fluid" data-toggle="buttons" role="group" aria-label="Basic radio toggle button group">
                      <label class="label-li w-100 d-flex justify-content-between align-items-center flex-row-reverse">
                        <input type="checkbox" autocomplete="off">Abductors
                      </label>
                    </div>
                  </li>
                  <li class="text-bg-dark d-flex flex-col-reverse container-fluid mb-2 list-group-item w-100">
                    <div class="li-hover py-1 btn-group-vertical container-fluid" data-toggle="buttons" role="group" aria-label="Basic radio toggle button group">
                      <label class="label-li w-100 d-flex justify-content-between align-items-center flex-row-reverse">
                        <input type="checkbox" autocomplete="off">Adductors
                      </label>
                    </div>
                  </li>
                  <li class="text-bg-dark d-flex flex-col-reverse container-fluid mb-2 list-group-item w-100">
                    <div class="li-hover py-1 btn-group-vertical container-fluid" data-toggle="buttons" role="group" aria-label="Basic radio toggle button group">
                      <label class="label-li w-100 d-flex justify-content-between align-items-center flex-row-reverse">
                        <input type="checkbox" autocomplete="off">Calves
                      </label>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>


        <div class="w-100 d-flex flex-column align-content-center  align-items-center mb-5">
          <a href="/workout" class="btn btn-success px-5">SUBMIT</a>
        </div>

</div>

 @endsection
