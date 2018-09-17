@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div>
                      <b-button v-b-modal.modal1>Launch demo modal</b-button>

                      <!-- Modal Component -->
                      <b-modal id="modal1" title="Bootstrap-Vue">
                        <p class="my-4">Hello from modal!</p>
                      </b-modal>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
