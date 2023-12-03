<div class="row">
    @if($roommaintain)                        
        @foreach ($roommaintain as $key )
        <div class="col-xl-3 col-lg-4 col-md-6 col-12">        
            <div class="card text-start card-disply">
                <div class="card-body">
                    <div>
                        <img src="{{url('assets/images/dashroombook.png')}}" style="height:100px;width:100px;" class="img-fluid p-2">
                        <p class="">Room Number</p>
                    </div>                           
                    <div class="d-flex justify-content-between ">
                        <h1 class="card-text  ">{{$key->room_no}}</h1>
                        <button wire:click="maintain({{ $key->id }})" class="maintanence romaintainbtn {{ $key->is_maintenence == 1 ? ' romfreebtn' : '' }}">
                            {{ $key->is_maintenence == 0 ? 'AVAILABLE' : 'MAINTENENCE' }}
                        </button>                        
                    </div>                            
                </div>
            </div>
        </div>
        @endforeach 
    @endif
</div>
